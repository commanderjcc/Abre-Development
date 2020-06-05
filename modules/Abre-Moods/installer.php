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

		//###################### DATABASE STRUCTURE ###########################
		//    ID      |  email   |  buttonName  |  admin           |  counselor        |  siteID
		// -------------------------------------------------------------------------------------
		//   int(11)  |  text    | text         | int(11) (1 or 0) |  int(11) (1 or 0) | int(11)

		//Check for Moods_contact_list table
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT * FROM moods_contact_list LIMIT 1"))
		{
			$sql = "CREATE TABLE `moods_contact_list` (`ID` int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			$sql .= "ALTER TABLE `moods_contact_list` ADD PRIMARY KEY (`ID`);";
			$sql .= "ALTER TABLE `moods_contact_list` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for email field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT email FROM moods_contact_list LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_contact_list` ADD `email` text NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for buttonName field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT buttonName FROM moods_contact_list LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_contact_list` ADD `buttonName` text NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for admin field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT admin FROM moods_contact_list LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_contact_list` ADD `admin` int(11) NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for counselor field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT counselor FROM moods_contact_list LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_contact_list` ADD `counselor` int(11) NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for siteID field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT siteID FROM moods_contact_list LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_contact_list` ADD `siteID` int(11) NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//###################### DATABASE STRUCTURE ###########################
		//    ID      |  buttonName   |  emailAdmin       |  emailCounselors  |  emailTeacher     |  willLink        |  link  |  siteID
		// -----------------------------------------------------------------------------------------------------------------------------
		//   int(11)  |  text         | int(11) (1 or 0)  | int(11) (1 or 0)  |  int(11) (1 or 0) | int(11) (1 or 0) |  text  |  int(11)

		//Check for Moods table
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT * FROM moods_settings LIMIT 1"))
		{
			$sql = "CREATE TABLE `moods_settings` (`ID` int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			$sql .= "ALTER TABLE `moods_settings` ADD PRIMARY KEY (`ID`);";
			$sql .= "ALTER TABLE `moods_settings` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for buttonName field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT buttonName FROM moods_settings LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_settings` ADD `buttonName` text NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for emailAdmin field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT emailAdmin FROM moods_settings LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_settings` ADD `emailAdmin` int(11) NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for emailCounselors field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT emailCounselors FROM moods_settings LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_settings` ADD `emailCounselors` int(11) NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for emailTeachers field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT emailTeacher FROM moods_settings LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_settings` ADD `emailTeacher` int(11) NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for willLink field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT willLink FROM moods_settings LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_settings` ADD `willLink` int(11) NOT NULL;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for link field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT link FROM moods_settings LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_settings` ADD `link` text;";
			$db->multi_query($sql);
		}
		$db->close();

		//Check for siteID field
		require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
		if(!$db->query("SELECT siteID FROM moods_settings LIMIT 1"))
		{
			$sql = "ALTER TABLE `moods_settings` ADD `siteID` int(11) NOT NULL;";
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
