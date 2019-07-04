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

echo " <link rel='stylesheet' type='text/css' href='/modules/".basename(dirname(__DIR__,2))."/css/teacher/alert.css'>
    <script type='text/javascript'>
            //create updater function
			var TeacherHelpUpdater = function() {
			    var jQueryRequest = $.post('modules/Abre-Moods/data_access/crisis/i_need_help.php', {teacherId : 'test'},function(data){
			        //log data to console, remove from production
			        //console.log(data);
			    });

			    //if request succeeds insert alert bar
			    jQueryRequest.done(function(data){
			        if(data != null && data !=''){
			            //parsing the data into a useable Javascript obj
			            var jsonData = JSON.parse(data);
			            var spaceLessName = jsonData.name.replace(/\s+/g, '_');
			            //string form of the alert bar
			            var layout = `
			            	<div name='`+ spaceLessName +`' class='alert_bar'>
								<div class='alert_bar_information_container'>
									<p class='alert_details_name'>`+ jsonData.name +`</p>
									<p class='alert_details_message'>Marked: `+ jsonData.message +`</p>
									<p class='alert_details_time'>` + jsonData.time + `</p>
								</div>
								<div class='alert_bar_close'>
									<i class='material-icons alert_bar_close_icon'>close</i>
								</div>
							</div>
			    		`;
			            //this prepends the alert bar to the page
			            $('.mdl-layout__content').prepend(layout);
						//this prepends the alert bar to the widget
						$('#widgetbody_Abre-Moods .widget_body').prepend(layout);
						//make close button clickable
						$('[name='+spaceLessName+'] .alert_bar_close').click(function(){
						    $('[name='+spaceLessName+']').remove();
						});
						//make clicking name take you to menu !!!!!NOT WORKING YET!!!!!
						$('[name='+spaceLessName+']').click(function(){
						    window.location.href = '#moods';
						});
			        }
			    });
			};
			//call updater every 1000ms and give it a name of TeacherHelp
			setNamedInterval('TeacherHelp',TeacherHelpUpdater,30000);
		</script>";
