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
	require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
	require_once(dirname(__FILE__) . '/../../core/abre_functions.php');
	//require(dirname(__FILE__) . '/../../core/abre_version.php');

	//Check for installation
	if(admin()){ require('installer.php'); }


//Not quite certain what this stuff does...
	$pageview = 1;
	$drawerhidden = 0;
	$pageorder = 2;
	$pagetitle = "Moods";
	$description = "Track and communicate how your students are feeling!"; //changes the description in the store
	$version = 0; //the version number
	$repo = NULL;
	$pageicon = "mood";
	$pagepath = "moods";

	require_once(dirname(__FILE__) .'/permissions.php');

	echo "<link rel='stylesheet' type='text/css' href='/modules/".basename(__DIR__)."/css/main_0.0.9.css'>";
	echo "<link rel='stylesheet' type='text/css' href='/modules/".basename(__DIR__)."/css/twemoji-amazing.css'>";


	// This JS allows us to track each timer so that no two updaters are running at the same time
	echo "<script type='text/javascript'>
			var timers = {};
			var setNamedInterval = (function() {
				timers = {};
				return function(name, f, interval, ...args) {
					if (!timers[name]) {
						timers[name] = setInterval(function() {
							f(...args);
						}, interval)
					}
				}
			})()
		  </script>";


	//if they are staff, add detection for students that need help
	if($isStaff) {
		require(dirname(__FILE__) .'/Retrieve_Data/Teachers/alert_displayer.php');
	}
?>
