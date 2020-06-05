<?php

/*
	* Copyright (C) 2019 Mason City Schools
	*
	* This program is free software: you can redistribute it and/or modify
    * it under the terms of the Affero General Public License version 3
    * as published by the Free Software Foundation.
	*
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU Affero General Public License for more details.
	*
    * You should have received a copy of the Affero General Public License
    * version 3 along with this program.  If not, see https://www.gnu.org/licenses/agpl-3.0.en.html.
    */

//required verification files
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
require(dirname(__FILE__) . '/../../../../core/abre_dbconnect.php');
require_once(dirname(__FILE__) . '/../../../../core/abre_functions.php');

$email = $_SESSION['escapedemail']; //get staff identification from session
$staffID = intval(GetStaffUniqueID($email));
$siteID = intval($_SESSION['siteID']);

//query db for courses with the staffid and siteid
$sql = 'SELECT CourseName, Period FROM Abre_StaffSchedules WHERE StaffID = '.$staffID.' AND siteID = '.$siteID.' Order by SectionCode ASC, Period ASC';
$result = $db->query($sql);
$classes = [];
while ($row = $result->fetch_assoc()) {
    $classes[$row['Period']] = $row['CourseName']; //output all the courses by period into the classes object
}

echo json_encode($classes);