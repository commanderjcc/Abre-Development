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
$siteID = intval($_SESSION['siteID']);
if($_SESSION['usertype']=="staff"){
    $staffID = intval(GetStaffUniqueID($email));
    $studentID = $_POST['studentID'];
} else {
    $studentID = GetStudentUniqueID($studentEmail);
}

//prepare picture statement
$picStmt = $db->stmt_init();
$picSql = "SELECT Value From abre_vendorlink_sis_studentpictures WHERE StudentID = ? And siteID = " . $siteID;
$picStmt->prepare($picSql);
$picStmt->bind_param("i", $studentID);
//prepare mood statement
$moodStmt = $db->stmt_init();
$moodSql = "SELECT last_Mood FROM moods where StudentID = ? And siteID = " . $siteID;
$moodStmt->prepare($moodSql);
$moodStmt->bind_param('i', $studentID);
//prepare moodHistory statement
$moodHistoryStmt = $db->stmt_init();
$moodHistorySql = "SELECT mood_History FROM moods where StudentID = ? And siteID = " . $siteID;
$moodHistoryStmt->prepare($moodHistorySql);
$moodHistoryStmt->bind_param('i', $studentID);
//prepare name statement
$nameStmt = $db->stmt_init();
$nameSql = "SELECT FirstName, LastName FROM Abre_Students where StudentID = ? And siteID = " . $siteID;
$nameStmt->prepare($nameSql);
$nameStmt->bind_param('i', $studentID);

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
$studentName = $firstName . " " . substr($lastName, 0, 1) . ".";
//get mood
$moodStmt->execute();
$moodResult = $moodStmt->get_result();
$moodRow = $moodResult->fetch_assoc();
$moodJson = $moodRow['last_Mood'];
$lastMoodDecoded = json_decode($moodJson, true);
//get moodHistory
$moodHistoryStmt->execute();
$moodHistoryResult = $moodHistoryStmt->get_result();
$moodHistoryRow = $moodHistoryResult->fetch_assoc();
$moodHistoryJson = $moodHistoryRow['mood_History'];
$moodHistoryDecoded = json_decode($moodHistoryJson, true);

//make student data object
$student = [
    "mood" => $lastMoodDecoded['mood'],
    "time" => $lastMoodDecoded['time'],
    'zone' => $lastMoodDecoded['zone'],
    'history' => $moodHistoryDecoded,
    'photo' => $picDecoded,
    'name' => $studentName,
];

echo json_encode($student);
//close up shop
$moodStmt->close();
$picStmt->close();
$nameStmt->close();
$db->close();