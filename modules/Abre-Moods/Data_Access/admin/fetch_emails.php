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

$button = $_POST['button']; //get button we're currently working with
$siteID = intval($_SESSION['siteID']);

//ask db for all the emails and related data for that button
$sql = "Select id, email, admin, counselor FROM moods_contact_list WHERE buttonName = '" . $button . "' AND siteID = " . $siteID;
$result = $db->query($sql);

$emails = [];
if ($result) { //if we have a result
    while($emailrow = $result->fetch_assoc()) { //for each result...
        $emailObj = [
            'id' => $emailrow['id'],
            'email' => $emailrow['email'],
            'admin' => $emailrow['admin'],
            'counselor' => $emailrow['counselor'],
        ];
        array_push($emails, $emailObj); //push the information from that row into the emails array
    }
}

echo json_encode($emails); //send email array to client with json