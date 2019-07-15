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

$email = $_SESSION['escapedemail'];
$staffID = intval(GetStaffUniqueID($email));
$siteID = intval($_SESSION['siteID']);

$bell = $_POST["bell"];
$amount = $_POST["amount"];

$sql = 'SELECT StudentID FROM Abre_StudentSchedules WHERE StaffID = '.$staffID.' AND Period = '.$bell.' AND siteID = '.$siteID;
$result = $db->query($sql);
$studentIDs = [];
while ($row = $result->fetch_assoc()) {
    array_push($studentIDs, intval($row['StudentID']));
}

$outputArray = [];

foreach ($studentIDs as $studentID){
    //get picture
    $sql = "SELECT Value From abre_vendorlink_sis_studentpictures WHERE StudentID = ".$studentID." And siteID = ".$siteID;
    $result=$db->query($sql);
    $picsr = $result->fetch_assoc();
    $picDecoded=base64_decode($picsr["Value"]);

    //get lastMood
    $sql = "SELECT lastMood FROM moods where StudentID = ".$studentID." And siteID = ".$siteID;
    $result=$db->query($sql);
    $row = $result->fetch_assoc();
    $lastMood = $row['lastMood'];
    $lastMoodDecoded = json_decode($lastMood,true);

    //get name
    $sql = "SELECT FirstName, LastName FROM Abre_Students where StudentID = ".$studentID." And siteID = ".$siteID;
    $result=$db->query($sql);
    $row = $result->fetch_assoc();
    $studentName = $row['FirstName'] . " " . substr($row['LastName'],0,1) .".";

    //make student data object
    $student = [
        "mood" => $lastMoodDecoded['mood'],
        "time" => $lastMoodDecoded['time'],
        'zone' => $lastMoodDecoded['zone'],
        'photo' => $picDecoded,
        'name' => $studentName,
        ];
    //add by studetnt id to the output
    $outputArray[$studentID] = $student;
}
echo json_encode($outputArray);