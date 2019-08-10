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

//get required information for db queries
$email = $_SESSION['escapedemail'];
$staffID = intval(GetStaffUniqueID($email));
$siteID = intval($_SESSION['siteID']);

$bell = $_POST["bell"];

//set up query/statment for later use
$stmt = $db->stmt_init();
$sql = 'SELECT StudentID FROM Abre_StudentSchedules WHERE StaffID = ? AND Period = ? AND siteID = '.$siteID;
$stmt->prepare($sql);
//prevents SQL injection by using variables to encapulsate everything
$stmt->bind_param("ii",$staffID,$bell);
$stmt->execute();

$studentID = null;
$studentIDs = [];
//binds result so we can just fetch until done
$stmt->bind_result($studentID);
while($stmt->fetch()){
    //add each student from fetch() to studentIDs array
    array_push($studentIDs, $studentID);
}
//close DB to save resources
$stmt->close();

//prepare picture statement
$picStmt = $db->stmt_init();
$picSql = "SELECT Value From abre_vendorlink_sis_studentpictures WHERE StudentID = ? And siteID = ".$siteID;
$picStmt->prepare($picSql);
$picStmt->bind_param("i", $studentID);
//prepare mood statement
$moodStmt = $db->stmt_init();
$moodSql = "SELECT last_Mood FROM moods where StudentID = ? And siteID = ".$siteID;
$moodStmt->prepare($moodSql);
$moodStmt->bind_param('i', $studentID);
//prepare name statement
$nameStmt = $db->stmt_init();
$nameSql = "SELECT FirstName, LastName FROM Abre_Students where StudentID = ? And siteID = ".$siteID;
$nameStmt->prepare($nameSql);
$nameStmt->bind_param('i', $studentID);

$outputArray = [];
//for each studentID, execute statements and fetch results
foreach ($studentIDs as $studentID) {
    //get picture
    $picStmt->execute();
    $picResult = $picStmt->get_result();
    $picRow = $picResult->fetch_assoc();
    $encodedPic = $picRow['Value'];
    $picDecoded = base64_decode($encodedPic);
    //get name
    $nameStmt->execute();
    $nameResult = $nameStmt->get_result();
    $nameRow = $nameResult->fetch_assoc();
    $firstName = $nameRow['FirstName'];
    $lastName = $nameRow['LastName'];
    $studentName = $firstName . " " . substr($lastName,0,1) .".";
    //get mood
    $moodStmt->execute();
    $moodResult = $moodStmt->get_result();
    $moodRow = $moodResult->fetch_assoc();
    $moodJson = $moodRow['last_Mood'];
    $lastMoodDecoded = json_decode($moodJson,true);

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
//close up shop
$moodStmt->close();
$picStmt->close();
$nameStmt->close();
$db->close();
