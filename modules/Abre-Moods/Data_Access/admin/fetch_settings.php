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

$button = $_POST['button'];
$siteID = intval($_SESSION['siteID']);

$sql = "Select id, emailAdmin, emailCounselors, emailTeacher, willLink, link FROM moods_settings WHERE buttonName = '".$button."' AND siteID = ".$siteID;
$result = $db->query($sql);

if($result) {
    $row = $result->fetch_assoc();
    $checkboxes = [
        'id' => $row['id'],
        'emailAdmin' => $row['emailAdmin'],
        'emailCounselors' => $row['emailCounselors'],
        'emailTeacher' => $row['emailTeacher'],
        'willLink' => $row['willLink'],
        'link' => $row['link'],
    ];
} else {
    $sql = 'INSERT into moods_settings(buttonName, emailAdmin, emailCounselors, emailTeacher, willLink, link, siteID) values (?,?,?,?,?,?,?)';
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param('siiiisi',$button,0,0,0,0,'',$siteID);
    $stmt->execute();
    $stmt->close();
}

$db->close();
echo json_encode($checkboxes);