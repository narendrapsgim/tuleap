<?php
/**
 * Copyright (c) Enalean, 2020 - Present. All Rights Reserved.
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

namespace Tuleap\TestManagement;

use Planning_Milestone;
use Tuleap\AgileDashboard\Milestone\Pane\PaneInfo;

final class TestmanagementPaneInfo extends PaneInfo
{
    public const NAME = 'testmanagement';
    public const URL  = '/testmanagement/plan';

    /**
     * @var int
     */
    private $milestone_id;

    /**
     * @var \Project
     */
    private $project;

    public function __construct(Planning_Milestone $milestone)
    {
        parent::__construct($milestone);

        $artifact           = $milestone->getArtifact();
        $this->project      = $artifact->getTracker()->getProject();
        $this->milestone_id = (int) $artifact->getId();
    }

    public function getIdentifier()
    {
        return self::NAME;
    }

    public function getTitle()
    {
        return dgettext('tuleap-testmanagement', 'Tests');
    }

    public function getUri()
    {
        return self::URL
            . '/'
            . urlencode($this->project->getUnixNameMixedCase())
            . '/'
            . $this->milestone_id;
    }

    public function getIconName()
    {
        return 'fa-check';
    }
}
