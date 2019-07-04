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
	//require(dirname(__FILE__) . '/../../configuration.php'); //not sure If we need this, disabling for now
	require_once(dirname(__FILE__) . '/../../core/abre_verification.php'); 
	require_once(dirname(__FILE__) . '/../../core/abre_functions.php'); 
	require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
	$isStudent = False;
	$isStaff = False;

	//prevent parents...I hope. idk how parents work
    $pagerestrictions = 'parent';

    if($_SESSION['usertype']=="student"){
        $isStudent=true;
    } elseif($_SESSION['usertype']=="staff"){
        $isStaff=true;
    }

    //hardcoding for a bit
    $isStudent = true;
    $isStaff = false;

?>