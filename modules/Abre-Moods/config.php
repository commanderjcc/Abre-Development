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
	$version = $abre_version; //the version number (4.5.9)
	$repo = NULL;
	$pageicon = "mood";
	$pagepath = "moods";

	require_once(dirname(__FILE__) .'/permissions.php');

	echo "<link rel='stylesheet' type='text/css' href='/modules/".basename(__DIR__)."/css/main_0.0.9.css'>";

	// This JS allows us to track each timer so that no two updaters are running at the same time
	echo "<script type='text/javascript'>
			var setNamedInterval = (function() {
				var timers = {};
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
		echo "<script type='text/javascript'>
		$(document).ready(function(){
			var TeacherHelpUpdater = function() {
			    var jQueryRequest = $.post('/modules/Abre-Moods/Retrieve_Data/Teachers/i_need_help.php', {teacherID:'test'} ,function(data){
			        //log data to console, remove from production
			        console.log(data);
			    });
			    
			    jQueryRequest.done(function(data){
			        if(data != null && data !=''){
			            var jsonData = JSON.parse(data);
			            //this prepends the alert bar to the widget
			            $('#widgetbody_Abre-Moods .widget_body').prepend(\"<div class='alert_bar'><div class='alert_bar_information_container'><p class='alert_details_name'>\"+ jsonData.name +\"</p><p class='alert_details_message'><span class='alert_details_message'>Marked: \"+ jsonData.message +\"</span></p><p class='alert_details_time'>\" + jsonData.time + \"</p></div><div class='alert_bar_close'><i class='material-icons alert_bar_close_icon'>close</i></div></div>\"
			            )
			        }
			    });
			    jQueryRequest.fail(function(data){
			        console.log('Failed: '+data);
			    });
			};
			setNamedInterval('TeacherHelp',TeacherHelpUpdater,1000);
		});
		</script>";
	}
?>
