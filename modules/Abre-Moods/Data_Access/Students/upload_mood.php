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

//Pull data from Session and POST request
$selectedMood = htmlspecialchars($_POST['mood']);
$zone = htmlspecialchars($_POST['zone']);
$time = htmlspecialchars($_POST['time']);

$siteID = intval($_SESSION['siteID']);
$studentEmail = $_SESSION['escapedemail'];
$studentID = intval(GetStudentUniqueID($studentEmail));

//create lastMood JSON object
$lastMood = [
        'mood' => $selectedMood, 
        'zone' => $zone,
        'time' => $time,
        ];
$lastMood = json_encode($lastMood);
//ask DB for history
$sql = 'SELECT moodHistory FROM moods WHERE studentID = ? AND siteID = ?';
$stmt = $db->stmt_init();
$stmt->prepare($sql);
$stmt->bind_param("ii", $studentID, $siteID);
$stmt->execute();
$stmt->bind_result($result);
$stmt->fetch();
$stmt->close();

//if result is null or ''
if ($result == null) {
    //dont worry about past history
    $newHistory = [$time=>$selectedMood];
    $newHistory = json_encode($newHistory);
} else {
    //worry about past history
    $result = json_decode($result, true);
    $newHistory = [$time=>$selectedMood] + $result;
    $newHistory = json_encode($newHistory);
}
//if actually null
if ($result === null) {
    //make new row
    $sql = "INSERT into moods(studentID, lastMood, moodHistory, siteID) values (?, ?, ?, ?)";
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("issi", $studentID, $lastMood, $newHistory, $_SESSION['siteID']);
    $stmt->execute();
    $stmt->close();
} else {
    //update existing row
    $sql = "UPDATE moods SET lastMood = ?, moodHistory = ? WHERE studentID = ? AND siteID = ?";
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("ssii", $lastMood, $newHistory, $studentID, $siteID);
    $stmt->execute();
    $stmt->close();
}
$db->close();

//TAKE OUT FOR PRODUCTION, JUST for debuggin'
$response = [
    'mood' => $selectedMood,
    'studentEmail' => $studentEmail,
    'zone' => $zone,
    'time' => $time,
    'studentID' => $studentID,
    'lastMood' => $lastMood,
    'moodHistory' => $newHistory,
];

echo json_encode($response);