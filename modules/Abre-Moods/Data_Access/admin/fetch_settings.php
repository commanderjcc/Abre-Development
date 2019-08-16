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

$button = $_POST['button']; //get what button we're talking about
$siteID = intval($_SESSION['siteID']);

//fetch all the settings for that button from db
$sql = "Select id, emailAdmin, emailCounselors, emailTeacher, willLink, link FROM moods_settings WHERE buttonName = '".$button."' AND siteID = ".$siteID;
$result = $db->query($sql);

if($result->num_rows > 0) { //if a result exists..
    $row = $result->fetch_assoc();
    $checkboxes = [ //make the checkboxes object with the data
        'emailAdmin' => $row['emailAdmin'],
        'emailCounselors' => $row['emailCounselors'],
        'emailTeacher' => $row['emailTeacher'],
        'willLink' => $row['willLink'],
        'link' => $row['link'],
    ];
} else { //if its empty...
    $emptystring = '';
    //insert new default/blank row so we can update it later
    $sql = 'INSERT into moods_settings(buttonName, emailAdmin, emailCounselors, emailTeacher, willLink, link, siteID) values (?,0,0,0,0,?,?)';
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param('ssi',$button,$emptystring,$siteID);
    $stmt->execute();
    $stmt->close();
    $checkboxes = [ //create a checkbox object with default data inside
        'emailAdmin' => 0,
        'emailCounselors' => 0,
        'emailTeacher' => 0,
        'willLink' => 0,
        'link' => '',
    ];
}

$db->close();

//respond with json encoded data about checkboxes
echo json_encode($checkboxes);