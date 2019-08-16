<?php
/*
* Copyright (C) 2019 Mason City Schools.
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

//required verifications
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php'); //required verification security
require(dirname(__FILE__) . '/../../../../core/abre_dbconnect.php');
$data = $_POST['data']; //shouldn't need to run escaping stuff on it bc using bind param
$siteID = intval($_SESSION['siteID']);

//only need to worry about updating bc should be inserted when we call fetch_settings and create it if its missing.
$sql = 'UPDATE moods_settings Set emailAdmin = ?, emailCounselors = ?, emailTeacher = ?, willLink = ?, link = ? where buttonName = ? and siteID = ?';
$stmt = $db->stmt_init(); //create statement
$stmt->prepare($sql); //prepare sql for use in statement
$stmt->bind_param('iiiissi', intval($data['emailAdmin']), intval($data['emailCounselors']), intval($data['emailTeacher']), intval($data['willLink']), $data['link'], $data['button'], $siteID); //insert data into statement
$stmt->execute(); //execute statement
$stmt->close(); //close up

$db->close();