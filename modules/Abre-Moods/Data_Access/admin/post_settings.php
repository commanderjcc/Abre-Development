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
$data = $_POST['data'];
$siteID = intval($_SESSION['siteID']);

$sql = 'UPDATE moods_settings Set emailAdmin = ?, emailCounselors = ?, emailTeacher = ?, willLink = ?, link = ? where buttonName = ? and siteID = ?';
$stmt = $db->stmt_init();
$stmt->prepare($sql);
$stmt->bind_param('iiiissi', intval($data['emailAdmin']), intval($data['emailCounselors']), intval($data['emailTeacher']), intval($data['willLink']), $data['link'], $data['button'], $siteID);
$stmt->execute();
$stmt->close();