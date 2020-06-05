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


//this function is called by /Data_Access/Students/upload_mood.php when they encounter a crisis button
function handleCrisis($mood, $time, $currentPeriod, $studentId, $displayName, $studentEmail, $siteID) {
    //connect to the database and get the current settings
    require(dirname(__FILE__) . '/../../../../core/abre_dbconnect.php');
    $result = null;
    $stmt = $db->stmt_init();
    $sql = 'Select emailAdmin, emailCounselors, emailTeacher, willLink, link from moods_settings where buttonName = ?  and siteID =' .$siteID;
    $stmt->prepare($sql);
    $stmt->bind_param('s',$mood);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $emailAdmin = $row['emailAdmin'];
    $emailCounselors = $row['emailCounselors'];
    $emailTeachers = $row['emailTeacher'];
    $willLink = $row['willLink'];
    $link = $row['link'];
    $stmt->close();
    //remove underscores from mood
    $moodstr = str_replace("_",' ',$mood);

    //if we should email the admin
    if ($emailAdmin == 1) {
        //get admin emails
    $sqlAdmin = "Select email from moods_contact_list where buttonName = ? and admin = 1 and siteID = ?";
    $stmtAdmin = $db->stmt_init();
    $stmtAdmin->prepare($sqlAdmin);
    $stmtAdmin->bind_param('si',$mood,$siteID);
    $stmtAdmin->execute();
    $resultAdmin = $stmtAdmin->get_result();
    $adminEmails = [];
    while ($rowAdmin = $resultAdmin->fetch_assoc()) {
        array_push($adminEmails,$rowAdmin['email']);
    }
    $stmtAdmin->close();

        //for each admin email
        foreach($adminEmails as $email) {
            //email them
            mail($email,$displayName ." ". $mood,"Hello, \n At ".$time."(bell ".$currentPeriod."), ".$displayName."(".$studentId.") marked \"".$moodstr."\" through the moods app. \n\nAdministration has specified that this crisis response should email you. \nIf you believe this automated response was sent to you incorrectly, please notify an administrator.");
        }
    }

    if ($emailCounselors == 1) {
        //get counselor emails
        $sqlCounselor = "Select email from moods_contact_list where buttonName = ? and counselor = 1 and siteID = ?";
        $stmtCounselor = $db->stmt_init();
        $stmtCounselor->prepare($sqlCounselor);
        $stmtCounselor->bind_param('si',$mood,$siteID);
        $stmtCounselor->execute();
        $resultCounselor = $stmtCounselor->get_result();
        $counselorEmails = [];
        while ($rowCounselor = $resultCounselor->fetch_assoc()) {
            array_push($counselorEmails,$rowCounselor['email']);
        }
        $stmtCounselor->close();

        //for each admin email
        foreach($counselorEmails as $email) {
            //email them
            mail($email,$displayName ." ". $mood,"Hello, \n At ".$time."(bell ".$currentPeriod."), ".$displayName."(".$studentId.") marked \"".$moodstr."\" through the moods app. \n\nAdministration has specified that this crisis response should email you. \nIf you believe this automated response was sent to you incorrectly, please notify an administrator.");
        }
    }

    //email teachers
    if ($emailTeachers == 1) {
        //get Teacher's Staff ID
        $sqlTeacherID = "Select StaffId from Abre_StudentSchedules where StudentId = ? and Period = ? and siteID = ?";
        $stmtTeacherID = $db->stmt_init();
        $stmtTeacherID->prepare($sqlTeacherID);
        $stmtTeacherID->bind_param('sii',$studentId,$currentPeriod,$siteID);
        $stmtTeacherID->execute();
        $resultTeacherID = $stmtTeacherID->get_result();
        $rowTeacherID = $resultTeacherID->fetch_assoc();
        $teacherID = $rowTeacherID['StaffId'];
        $stmtTeacherID->close();

        //get email associated with ID
        $sqlTeacherEmail = "Select EMail1, FirstName, LastName from Abre_Staff where StaffID = ? and siteID = ?";
        $stmtTeacherEmail = $db->stmt_init();
        $stmtTeacherEmail->prepare($sqlTeacherEmail);
        $stmtTeacherEmail->bind_param('ii', intval($teacherID), $siteID);
        $stmtTeacherEmail->execute();
        $resultTeacherEmail = $stmtTeacherEmail->get_result();
        $rowTeacherEmail = $resultTeacherEmail->fetch_assoc();
        $teacherEmail = $rowTeacherEmail['EMail1'];
        $teacherFName = $rowTeacherEmail['FirstName'];
        $teacherLName = $rowTeacherEmail['LastName'];
        $stmtTeacherEmail->close();

        //email the teacher
        mail($teacherEmail,$displayName ." ". $moodstr,"Hello Mr./Ms. ".$teacherFName." ".$teacherLName.", \n At ".$time."(bell ".$currentPeriod."), your student ".$displayName."(".$studentId.") marked \"".$moodstr."\" through the moods app. \n\nYour administration has specified that this crisis response should email you. \nIf you believe this automated response was sent to you incorrectly, please notify an administrator.",'From: noreply@localhost');
   }


    //return a link
    if ($willLink == 1) {
        return $link;
    }
}