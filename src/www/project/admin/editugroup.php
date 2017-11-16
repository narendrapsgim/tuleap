<?php
/**
 * Copyright (c) Xerox Corporation, Codendi Team, 2001-2009. All rights reserved
 * Copyright (c) Enalean, 2011 - 2017. All Rights Reserved.
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

require_once('pre.php');

$request = HTTPRequest::instance();

$group_id = $request->getValidated('group_id', 'GroupId', 0);
session_require(array('group' => $group_id, 'admin_flags' => 'A'));

$vFunc = new Valid_WhiteList('func', array('create', 'do_create', 'edit'));
$vFunc->required();
$func = $request->getValidated('func', $vFunc, 'create');


if (($func=='edit')||($func=='do_create')) {
    $router = new Project_Admin_UGroup_UGroupRouter();
    $router->process($request);
}
