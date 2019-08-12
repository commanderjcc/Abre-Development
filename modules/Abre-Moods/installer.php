<?php

	/*
	* Copyright (C) 2016-2018 Abre.io Inc.
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

	//TODO update with all the db systems

	//Required configuration files
	require_once(dirname(__FILE__) . '/../../core/abre_verification.php');
	require_once(dirname(__FILE__) . '/../../core/abre_functions.php');
	//findme
	if(superadmin() && !isAppInstalled("MCS-Moods"))
	{

		//###################### DATABASE STRUCTURE ###########################
		//    ID      |  studentID   |  last_Mood  |  mood_History  |  siteID
		// -------------------------------------------------------------------
 		//   int(11)  |  int(11)   | text(JSON)  |   text(JSON)   |  int(11)

		//Check for Moods table
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT * FROM moods LIMIT 1"))
		{
			$sql = "CREATE TABLE `moods` (`ID` int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			$sql .= "ALTER TABLE `moods` ADD PRIMARY KEY (`ID`);";
			$sql .= "ALTER TABLE `moods` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for user_ID field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT studentID FROM moods LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods` ADD `studentID` int(11) NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for last_mood field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT last_Mood FROM moods LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods` ADD `last_Mood` text NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for mood_history field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT mood_History FROM moods LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods` ADD `mood_History` text NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for siteID field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT siteID FROM moods LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods` ADD `siteID` int(11) NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Mark app as installed
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		$sql = "UPDATE apps_abre SET installed = 1 WHERE app = 'MCS-Moods'";
		$db->multi_query($sql);
		$db->close();

	}

?>
