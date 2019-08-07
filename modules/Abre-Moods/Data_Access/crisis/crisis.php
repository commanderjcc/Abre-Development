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



function handleCrisis($mood, $time, $currentPeriod, $studentId, $displayName, $studentEmail, $siteID) {
    //connect to the database and get the current settings
    require(dirname(__FILE__) . '/../../../../core/abre_dbconnect.php');
    $result = null;
    $stmt = $db->stmt_init();
    $sql = 'Select emailAdmin, emailCounselors, willLink, link from moods_settings where buttonName = ?  and siteID =' .$siteID;
    $stmt->prepare($sql);
    $stmt->bind_param('s',$mood);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $emailAdmin = $row['emailAdmin'];
    $emailCounselors = $row['emailCounselors'];
    $willLink = $row['willLink'];
    $link = $row['link'];
    $stmt->close();
    //remove underscores from mood
    $mood = str_replace("_",' ',$mood);

    //if we should email the admin
    if ($emailAdmin == 1) {
        //get admin emails
    $sqlAdmin = "";
    $stmtAdmin = $db->stmt_init();
    $stmtAdmin->prepare($sqlAdmin);
    $stmtAdmin->bind_param();
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
//            mail($email,$displayName ." ". $mood,"At ".$time. " " .$displayName." marked that they ".$mood);
        }
    }

    if ($emailCounselors == 1) {
        //get counselor emails

        //for each admin email
        foreach($counselorEmails as $email) {
            //email them
//            mail($email,$displayName ." ". $mood,"At ".$time. " " .$displayName." marked that they ".$mood);
        }
    }

    //email teachers



    //return a link
    if ($willLink == 1) {
        return $link;
    }

}