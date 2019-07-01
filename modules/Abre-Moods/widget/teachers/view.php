<?php

/*
	* Copyright (C) 2019 Mason City Schools.
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


//This file serves the teacher widget once requested by jQuery through loadWidget (modules/steam/widgets.php)

require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
echo "<link rel='stylesheet' type='text/css' href='/modules/".basename(dirname(__DIR__,2))."/css/teacher/widget.css'>";
echo "<hr style='height:0' class='widget_hr'>"; //keep
//echo "<div class='widget_holder'>"; //keep
//echo "<div class='widget_container widget_body' style='color:#666;'>Roster<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_menu_or_roster.php' data-reload='true'>group</i></div>";
//echo "<div class='widget_container widget_body' style='color:#666;'>Overview<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_history_or_overview.php' data-reload='true'>table_chart</i></div>";
echo "<div class='widget_body'>";
echo 	"<div id='total_bar' class='teacher_color_bar'>
					<div id='shaded_total_bar' class='shaded_bar'></div>
					<div class='bar_text_container'>
						Total - <span class='bold_bar_text'></span>
					</div>
				</div>
				<div id='blue_bar' class='teacher_color_bar'>
					<div id='shaded_blue_bar' class='shaded_bar'></div>
					<div class='bar_text_container'>
						Blue - <span class='bold_bar_text'></span>
					</div>
				</div>
				<div id='green_bar' class='teacher_color_bar'>
					<div id='shaded_green_bar'class='shaded_bar'></div>
					<div class='bar_text_container'>
						Green - <span class='bold_bar_text'></span>
					</div>
				</div>
				<div id='yellow_bar' class='teacher_color_bar'>
				<div id='shaded_yellow_bar' class='shaded_bar'></div>
					<div class='bar_text_container'>
						Yellow - <span class='bold_bar_text'></span>
					</div>
				</div>
				<div id='red_bar' class='teacher_color_bar'>
				<div id='shaded_red_bar' class='shaded_bar'></div>
					<div class='bar_text_container'>
						Red - <span class='bold_bar_text'></span>
					</div>
				</div>
			</div>";
echo "</div>";

//creates and registers updater that uses post ajax calls to pull down latest data
echo "<script type='text/javascript'>
                //Updater as a function with a ajax post call
			    var TeacherOverviewUpdater = function() {
						//should probably remove teacherID for security reasons... could theoretically use an obtained teacherID to snoop on students
					var jQueryRequest = $.post('modules/Abre-Moods/data_access/teachers/get_all_students_history.php', {teacherID:'test'}, function(data) {
						//log data to console for testing, can remove for production
					    //console.log(data);
					});

					//Do if request succeeded
					jQueryRequest.done(function(data) {
					    var jsonData = JSON.parse(data);

					    //update text
					    $('#total_bar .bar_text_container .bold_bar_text').html(jsonData.totalResponses+'/'+jsonData.totalStudents);

					    //animate shaded bar across div
					    $('#total_bar .shaded_bar').animate({
					        'width': 100 * (jsonData.totalStudents - jsonData.totalResponses)/jsonData.totalStudents + '%'
					    });


					    //repeat for blue
					    $('#blue_bar .bar_text_container .bold_bar_text').html(jsonData.blue+'/'+jsonData.totalStudents);

					    //animate shaded bar across div
					    $('#blue_bar .shaded_bar').animate({
					        'width': 100 * (jsonData.totalStudents - jsonData.blue)/jsonData.totalStudents + '%'
					    });


					    //repeat for green
					    $('#green_bar .bar_text_container .bold_bar_text').html(jsonData.green+'/'+jsonData.totalStudents);

					    //animate shaded bar across div
					    $('#green_bar .shaded_bar').animate({
					        'width': 100 * (jsonData.totalStudents - jsonData.green)/jsonData.totalStudents + '%'
					    });


					    //repeat for yellow
					    $('#yellow_bar .bar_text_container .bold_bar_text').html(jsonData.yellow+'/'+jsonData.totalStudents);

					    //animate shaded bar across div
					    $('#yellow_bar .shaded_bar').animate({
					        'width': 100 * (jsonData.totalStudents - jsonData.yellow)/jsonData.totalStudents + '%'
					    });


					    //repeat for red
					    $('#red_bar .bar_text_container .bold_bar_text').html(jsonData.red+'/'+jsonData.totalStudents);

					    //animate shaded bar across div
					    $('#red_bar .shaded_bar').animate({
					        'width': 100 * (jsonData.totalStudents - jsonData.red)/jsonData.totalStudents + '%'
					    });
					});
			    };
			    //puts the function on a NAMED timer, name must be same for each updater.
			    setNamedInterval('TeacherOverview',TeacherOverviewUpdater,1000);
		</script>";
