<?php
    /* Called when widget down arrow is clicked


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
	//require_once(dirname(__FILE__) . '/../../core/abre_google_login.php');
  require_once(dirname(__FILE__) . '/../../core/abre_functions.php');
  require_once(dirname(__FILE__).'/permissions.php');
  //require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');

?>


<?php
	if($isStudent) //$isStudent and $isStaff comes from permissions.php
	{
		//insert all the data from /widget/students/students_widget_content.php
		require(dirname(__FILE__) . "/widget/students/view.php");
	}
	else if($isStaff) {
		//insert all the data from /widget/teachers/view.php
		require(dirname(__FILE__) . "/widget/teachers/view.php");
	}
?>
