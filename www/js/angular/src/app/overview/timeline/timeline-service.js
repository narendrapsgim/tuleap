angular
    .module('tuleap.pull-request')
    .service('TimelineService', TimelineService);

TimelineService.$inject = [
    'lodash',
    '$sce',
    'TimelineRestService'
];

function TimelineService(
    lodash,
    $sce,
    TimelineRestService
) {
    var self = this;

    lodash.extend(self, {
        timeline_pagination: {
            limit : 50,
            offset: 0
        },
        getTimeline: getTimeline,
        addComment : addComment,
        formatEvent: formatEvent
    });

    function getPaginatedTimeline(pull_request, accTimeline, limit, offset) {
        return TimelineRestService.getTimeline(pull_request.id, limit, offset)
            .then(function(response) {
                accTimeline.push.apply(accTimeline, response.data.collection);

                var headers = response.headers();
                var total   = headers['x-pagination-size'];

                if ((limit + offset) < total) {
                    return getPaginatedTimeline(pull_request, accTimeline, limit, offset + limit);
                }

                return accTimeline;
            });
    }

    function getTimeline(pull_request, limit, offset) {
        var initialTimeline = [];
        return getPaginatedTimeline(pull_request, initialTimeline, limit, offset)
        .then(function(timeline) {
            lodash.forEach(timeline, function(event) {
                self.formatEvent(event, pull_request);
            });
            return timeline;
        });
    }

    function addComment(pullRequest, timeline, newComment) {
        TimelineRestService.addComment(pullRequest.id, newComment).then(function(event) {
            self.formatEvent(event, pullRequest);
            timeline.push(event);
        });
    }

    var eventMessages = {
        comment: function(content) {
            return content.replace(/(?:\r\n|\r|\n)/g, '<br/>');
        },
        'inline-comment': function(content) {
            return content.replace(/(?:\r\n|\r|\n)/g, '<br/>');
        },
        update: function() {
            return 'Has updated the pull request.';
        },
        rebase: function() {
            return 'Has rebased the pull request.';
        },
        merge: function() {
            return 'Has merged the pull request.';
        },
        abandon: function() {
            return 'Has abandoned the pull request.';
        }
    };
    function getContentMessage(event) {
        var content = eventMessages[event.event_type || event.type](event.content);
        return $sce.trustAsHtml(content);
    }


    function formatEvent(event, pull_request) {
        event.isFromPRAuthor = (event.user.id === pull_request.user_id);
        event.isInlineComment = (event.type === 'inline-comment');
        event.content = getContentMessage(event);
    }
}
