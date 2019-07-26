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



function handleCrisis($mood, $studentId, $displayName, $studentEmail, $siteID) {
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
    return $link;
}