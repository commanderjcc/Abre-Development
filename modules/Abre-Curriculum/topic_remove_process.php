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
	require_once(dirname(__FILE__) . '/../../core/abre_dbconnect.php');	
		
	$curriculumtopicid=mysqli_real_escape_string($db, $_GET["curriculumtopicid"]);
	
	//Delete Topic
	$stmtrecord = $db->prepare("DELETE from curriculum_unit where ID = ?");
	$stmtrecord->bind_param("i",$curriculumtopicid);	
	$stmtrecord->execute();
	$stmtrecord->close();
	
	//Delete resources
	$stmtrecord = $db->prepare("DELETE from curriculum_resources where TopicID = ?");
	$stmtrecord->bind_param("i",$curriculumtopicid);	
	$stmtrecord->execute();
	$stmtrecord->close();
	
	//End
	$db->close();
	echo "The topic has been removed.";			
	
?>