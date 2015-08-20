<?php
/**
 * Copyright (c) Enalean, 2015. All Rights Reserved.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Tuleap\Trafficlights\REST\v1;

use Luracast\Restler\RestException;
use Tuleap\REST\Header;
use Tracker_Artifact;
use UserManager;

class NodeResource {

    /**
     * @url OPTIONS
     */
    public function options() {
        Header::allowOptions();
    }

    /**
     * @url OPTIONS {id}
     */
    public function optionsId($id) {
        Header::allowOptionsGet();
    }

    /**
     * Get a node representation /!\ EXPERIMENTAL DO NOT USE IT/!\
     *
     * Please, don't, itl will change, your code will break and you will be sad
     *
     * @url GET {id}
     *
     * @param string $id Id of the node
     * @throws 404
     * @throws 500
     * @return Tuleap\Trafficlights\REST\v1\NodeRepresentation
     */
    protected function getId($id) {
        try {
            $factory = new NodeBuilderFactory();
            $user = UserManager::instance()->getCurrentUser();

            $artifact = $factory->getArtifactById($user, $id);

            $this->sendAllowHeaders($artifact);

            return $factory->getNodeRepresentation($user, $artifact);
        } catch (Tracker_Exception $exception) {
            if ($GLOBALS['Response']->feedbackHasErrors()) {
                throw new RestException(500, $GLOBALS['Response']->getRawFeedback());
            }
            throw new RestException(500, $exception->getMessage());
        } catch (Tracker_ResourceDoesntExistException $exception) {
            throw new RestException(404, 'Node not found');
        }
        Header::allowOptionsGet();
    }


    private function sendAllowHeaders(Tracker_Artifact $artifact) {
        $date = $artifact->getLastUpdateDate();
        Header::allowOptionsGet();
        Header::lastModified($date);
    }
}
