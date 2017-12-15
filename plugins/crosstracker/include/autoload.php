<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
function autoloaddbcac9099e14c3fb8f6c9ee6c2b0a0ce($class) {
    static $classes = null;
    if ($classes === null) {
        $classes = array(
            'crosstrackerplugin' => '/crosstrackerPlugin.class.php',
            'tuleap\\crosstracker\\crosstrackerartifactreportdao' => '/CrossTracker/CrossTrackerArtifactReportDao.php',
            'tuleap\\crosstracker\\crosstrackerreport' => '/CrossTracker/CrossTrackerReport.php',
            'tuleap\\crosstracker\\crosstrackerreportdao' => '/CrossTracker/CrossTrackerReportDao.php',
            'tuleap\\crosstracker\\crosstrackerreportfactory' => '/CrossTracker/CrossTrackerReportFactory.php',
            'tuleap\\crosstracker\\crosstrackerreportnotfoundexception' => '/CrossTracker/CrossTrackerReportNotFoundException.php',
            'tuleap\\crosstracker\\permission\\crosstrackerpermissiongate' => '/CrossTracker/Permission/CrossTrackerPermissionGate.php',
            'tuleap\\crosstracker\\permission\\crosstrackerunauthorizedcolumnfieldexception' => '/CrossTracker/Permission/CrossTrackerUnauthorizedColumnFieldException.php',
            'tuleap\\crosstracker\\permission\\crosstrackerunauthorizedexception' => '/CrossTracker/Permission/CrossTrackerUnauthorizedException.php',
            'tuleap\\crosstracker\\permission\\crosstrackerunauthorizedprojectexception' => '/CrossTracker/Permission/CrossTrackerUnauthorizedProjectException.php',
            'tuleap\\crosstracker\\permission\\crosstrackerunauthorizedsearchfieldexception' => '/CrossTracker/Permission/CrossTrackerUnauthorizedSearchFieldException.php',
            'tuleap\\crosstracker\\permission\\crosstrackerunauthorizedtrackerexception' => '/CrossTracker/Permission/CrossTrackerUnauthorizedTrackerException.php',
            'tuleap\\crosstracker\\plugin\\plugindescriptor' => '/CrossTracker/Plugin/PluginDescriptor.php',
            'tuleap\\crosstracker\\plugin\\plugininfo' => '/CrossTracker/Plugin/PluginInfo.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\expertqueryvalidator' => '/CrossTracker/Report/Query/Advanced/ExpertQueryValidator.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidcomparisoncollectorparameters' => '/CrossTracker/Report/Query/Advanced/InvalidComparisonCollectorParameters.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidcomparisoncollectorvisitor' => '/CrossTracker/Report/Query/Advanced/InvalidComparisonCollectorVisitor.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidsearchablecollectorparameters' => '/CrossTracker/Report/Query/Advanced/InvalidSearchableCollectorParameters.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidsearchablecollectorvisitor' => '/CrossTracker/Report/Query/Advanced/InvalidSearchableCollectorVisitor.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidsemantic\\ichecksemanticfieldforacomparison' => '/CrossTracker/Report/Query/Advanced/InvalidSemantic/ICheckSemanticFieldForAComparison.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidsemantic\\titlesemantic\\equalcomparisonchecker' => '/CrossTracker/Report/Query/Advanced/InvalidSemantic/TitleSemantic/EqualComparisonChecker.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidsemantic\\titlesemantic\\titletofloatcomparisonexception' => '/CrossTracker/Report/Query/Advanced/InvalidSemantic/TitleSemantic/TitleToFloatComparisonException.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidsemantic\\titlesemantic\\titletointcomparisonexception' => '/CrossTracker/Report/Query/Advanced/InvalidSemantic/TitleSemantic/TitleToIntComparisonException.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidsemantic\\titlesemantic\\titletomyselfcomparisonexception' => '/CrossTracker/Report/Query/Advanced/InvalidSemantic/TitleSemantic/TitleToMyselfComparisonException.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidsemantic\\titlesemantic\\titletonowcomparisonexception' => '/CrossTracker/Report/Query/Advanced/InvalidSemantic/TitleSemantic/TitleToNowComparisonException.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\invalidsemantic\\titletodatecomparisonexception' => '/CrossTracker/Report/Query/Advanced/InvalidSemantic/TitleSemantic/TitleToDateComparisonException.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\querybuilder\\crosstrackerexpertqueryreportdao' => '/CrossTracker/Report/Query/Advanced/QueryBuilder/CrossTrackerExpertQueryReportDao.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\querybuilder\\searchablevisitor' => '/CrossTracker/Report/Query/Advanced/QueryBuilder/SearchableVisitor.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\querybuilder\\searchablevisitorparameters' => '/CrossTracker/Report/Query/Advanced/QueryBuilder/SearchableVisitorParameters.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\querybuilder\\semanticcomparisonfromwherebuilder' => '/CrossTracker/Report/Query/Advanced/QueryBuilder/SemanticComparisonFromWhereBuilder.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\querybuilder\\semanticequalcomparisonfromwherebuilder' => '/CrossTracker/Report/Query/Advanced/QueryBuilder/SemanticEqualComparisonFromWhereBuilder.php',
            'tuleap\\crosstracker\\report\\query\\advanced\\querybuildervisitor' => '/CrossTracker/Report/Query/Advanced/QueryBuilderVisitor.php',
            'tuleap\\crosstracker\\rest\\resourcesinjector' => '/CrossTracker/REST/ResourcesInjector.class.php',
            'tuleap\\crosstracker\\rest\\v1\\crosstrackerartifactreportfactory' => '/CrossTracker/REST/v1/CrossTrackerArtifactReportFactory.php',
            'tuleap\\crosstracker\\rest\\v1\\crosstrackerartifactreportrepresentation' => '/CrossTracker/REST/v1/CrossTrackerArtifactReportRepresentation.php',
            'tuleap\\crosstracker\\rest\\v1\\crosstrackerreportextractor' => '/CrossTracker/REST/v1/CrossTrackerReportExtractor.php',
            'tuleap\\crosstracker\\rest\\v1\\crosstrackerreportrepresentation' => '/CrossTracker/REST/v1/CrossTrackerReportRepresentation.php',
            'tuleap\\crosstracker\\rest\\v1\\crosstrackerreportsresource' => '/CrossTracker/REST/v1/CrossTrackerReportsResource.php',
            'tuleap\\crosstracker\\rest\\v1\\paginatedcollectionofcrosstrackerartifacts' => '/CrossTracker/REST/v1/PaginatedCollectionOfCrossTrackerArtifacts.php',
            'tuleap\\crosstracker\\rest\\v1\\trackerduplicateexception' => '/CrossTracker/REST/v1/TrackerDuplicateException.php',
            'tuleap\\crosstracker\\rest\\v1\\trackernotfoundexception' => '/CrossTracker/REST/v1/TrackerNotFoundException.php',
            'tuleap\\crosstracker\\widget\\projectcrosstrackersearch' => '/CrossTracker/Widget/ProjectCrossTrackerSearch.php',
            'tuleap\\crosstracker\\widget\\projectcrosstrackersearchpresenter' => '/CrossTracker/Widget/ProjectCrossTrackerSearchPresenter.php'
        );
    }
    $cn = strtolower($class);
    if (isset($classes[$cn])) {
        require dirname(__FILE__) . $classes[$cn];
    }
}
spl_autoload_register('autoloaddbcac9099e14c3fb8f6c9ee6c2b0a0ce');
// @codeCoverageIgnoreEnd
