<?php
/**
 * Copyright (c) Enalean, 2018 - Present. All Rights Reserved.
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

namespace Tuleap\Tracker\Artifact\ActionButtons;

use Tuleap\Glyph\Glyph;

class AdditionalButtonLinkPresenter
{
    /**
     * @var string
     */
    public $link_label;

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $glyph;

    /**
     * @var bool
     */
    public $disabled;

    public function __construct(string $link_label, string $url, ?Glyph $glyph = null, bool $disabled = false)
    {
        $this->link_label = $link_label;
        $this->url        = $url;
        $this->glyph      = $glyph ? $glyph->getInlineString(): '';
        $this->disabled   = $disabled;
    }
}
