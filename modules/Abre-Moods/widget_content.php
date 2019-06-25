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
	//different icons and text for staff vs students
	//$pagerestrictions="staff";
	//$pagerestrictions="student";
	//if($_SESSION['usertype']=="student")
	//if($pagerestrictions=="student")
	if($isStudent)
	{
		echo "<hr class='widget_hr'>"; //keep
		echo "<div class='widget_holder'>"; //keep
        echo "student";
			//echo "<div class='widget_container widget_body' style='color:#666;'>Menu<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_menu_or_roster.php' data-reload='true'>menu</i></div>";
			//echo "<div class='widget_container widget_body' style='color:#666;'>History<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_history_or_overview.php' data-reload='true'>history</i></div>";
		echo "</div>";
	}
	else if($isStaff){
		echo "<hr class='widget_hr'>"; //keep
		//echo "<div class='widget_holder'>"; //keep
		//echo "<div class='widget_container widget_body' style='color:#666;'>Roster<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_menu_or_roster.php' data-reload='true'>group</i></div>";
		//echo "<div class='widget_container widget_body' style='color:#666;'>Overview<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_history_or_overview.php' data-reload='true'>table_chart</i></div>";
		echo "<div class='widget_body'>
				<div class='alert_bar'>
					<div class='alert_bar_information_container'>
						<p class='alert_details'>John Smith <span class='alert_details_time'>- 8:23 AM </span></p>
						<p class='alert_details'><span class='alert_details_message'>Marked: \"I need help\"</span></p>
					</div> 
					<div class='alert_bar_close'>
						<i class='material-icons alert_bar_close_icon'>close</i>
					</div>
				</div>";
		echo 	"<div id='total_bar' class='teacher_color_bar'>
					<div id='shaded_total_bar' class='shaded_bar'></div>
					<div class='bar_text_container'>
						Total - <span class='bold_bar_text'>20/30</span>
					</div>
				</div>
				<div id='blue_bar' class='teacher_color_bar'>
					<div id='shaded_blue_bar' class='shaded_bar'></div>
					<div class='bar_text_container'>
						Blue - <span class='bold_bar_text'>20/30</span>
					</div>
				</div>
				<div id='green_bar' class='teacher_color_bar'>
					<div id='shaded_green_bar'class='shaded_bar'></div>
					<div class='bar_text_container'>
						Green - <span class='bold_bar_text'>20/30</span>
					</div>
				</div>
				<div id='yellow_bar' class='teacher_color_bar'>
				<div id='shaded_yellow_bar' class='shaded_bar'></div>
					<div class='bar_text_container'>
						Yellow - <span class='bold_bar_text'>20/30</span>
					</div>
				</div>
				<div id='red_bar' class='teacher_color_bar'>
				<div id='shaded_red_bar' class='shaded_bar'></div>
					<div class='bar_text_container'>
						Red - <span class='bold_bar_text'>20/30</span>
					</div>
				</div>
			</div>";
	echo "</div>";
	}
	echo "<div class='result'></div>";
	//creates and registers updater that uses post ajax calls to pull down latest data
	echo "<script type='text/javascript'>
			    var TeacherOverviewUpdater = function() {		         
					$.post('modules/Abre-Moods/get_time.php', {request:'test'}, function(data) {
						console.log(data);
					}).done(function(data) {
						$('.result').html(data);
					});   
			    }
			    setNamedInterval('TeacherOverview',TeacherOverviewUpdater,1000);
		</script>";
?>
