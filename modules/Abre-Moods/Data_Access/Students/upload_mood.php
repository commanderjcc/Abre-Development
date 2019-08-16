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
$selectedMood = htmlspecialchars($_POST['mood']); //escape the response just in case
$zone = htmlspecialchars($_POST['zone']);
$time = htmlspecialchars($_POST['time']);
$currentPeriod = intval($_POST['currentPeriod']);

$siteID = intval($_SESSION['siteID']);
$studentEmail = $_SESSION['escapedemail'];
$studentID = intval(GetStudentUniqueID($studentEmail));
$displayName = $_SESSION['displayName'];

//interrupt if is part of crisis mode
if ($zone === 'crisis') {
    require(dirname(__FILE__).'/../crisis/crisis.php');
    $link = handleCrisis($selectedMood,$time,$currentPeriod, $studentID,$displayName,$studentEmail, $siteID); //look at crisis.php for more info
    if ($link != null) { //if should link...
        echo '{"willLink":1,"link":"'.$link.'"}'; //respond with willLink: 1 and a link to go to
    } else {
        echo '{"willLink":0}'; //respond with willLink: 0
    }
    exit; //stop the rest of the program from running, if it did continue a crisis mood would get added to the db
}



//create lastMood JSON object
$lastMood = [
    'mood' => $selectedMood,
    'zone' => $zone,
    'time' => $time,
];
$lastMood = json_encode($lastMood); //json encode for use in the db

//ask DB for history
$stmt = $db->stmt_init();
$sql = 'SELECT mood_History FROM moods WHERE studentID = ? AND siteID = ?';
$stmt->prepare($sql);
$stmt->bind_param("ii", $studentID, $siteID);
$stmt->execute();
$stmt->bind_result($result);
$stmt->fetch();
$stmt->close();

//if result is null or ''
if ($result == null) {
    //dont worry about past history
    $newHistory = '[]'; //if empty set newHistory to an empty array in stringified JSON form
} else {
    $newHistory = $result;
}
//worry about past history
$newHistory = json_decode($newHistory, true); //decode JSON
array_unshift($newHistory, ['mood' => $selectedMood, 'zone' => $zone, 'time' => $time]); //add new data to the front of the history
$newHistory = json_encode($newHistory); //re-encode Data to JSON

//if actually null (row doesn't exist)
if ($result === null) {
    //make new row
    $sql = "INSERT into moods(studentID, last_Mood, mood_History, siteID) values (?, ?, ?, ?)";
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("issi", $studentID, $lastMood, $newHistory, $_SESSION['siteID']);
    $stmt->execute();
    $stmt->close();
} else {
    //update existing row
    $sql = "UPDATE moods SET last_Mood = ?, mood_History = ? WHERE studentID = ? AND siteID = ?";
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("ssii", $lastMood, $newHistory, $studentID, $siteID);
    $stmt->execute();
    $stmt->close();
}
$db->close();

$response = [
    'willLink'=>0,
    'link' => $link,

    //for debugging purposes
//    'mood' => $selectedMood,
//    'studentEmail' => $studentEmail,
//    'zone' => $zone,
//    'time' => $time,
//    'studentID' => $studentID,
//    'lastMood' => $lastMood,
//    'moodHistory' => $newHistory,
];

echo json_encode($response);