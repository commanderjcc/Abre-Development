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
//require_once(dirname(__FILE__) . '/../../data_access/teachers/dataManagement.php');
echo "<link rel='stylesheet' type='text/css' href='/modules/" . basename(dirname(__DIR__, 2)) . "/css/teacher/widget.css'>";
echo "<hr style='height:0' class='widget_hr'>"; //keep
echo "<div class='widget_body'>";
echo "<div id='class_head_bar' class='teacher_color_bar'>
					<div id='shaded_total_bar' class='loading_bar class_progress_bar'></div>
					<div class='bar_text_container'>
						Total - <span class='num_students'></span>
					</div>
				</div>
				<div id='blue' class='teacher_color_bar'>
					<div id='shaded_blue_bar' class='loading_bar'></div>
					<div class='bar_text_container'>
						Blue - <span class='num_students'></span>
					</div>
				</div>
				<div id='green' class='teacher_color_bar'>
					<div id='shaded_green_bar' class='loading_bar'></div>
					<div class='bar_text_container'>
						Green - <span class='num_students'></span>
					</div>
				</div>
				<div id='yellow' class='teacher_color_bar'>
				<div id='shaded_yellow_bar' class='loading_bar'></div>
					<div class='bar_text_container'>
						Yellow - <span class='num_students'></span>
					</div>
				</div>
				<div id='red' class='teacher_color_bar'>
				<div id='shaded_red_bar' class='loading_bar'></div>
					<div class='bar_text_container'>
						Red - <span class='num_students'></span>
					</div>
				</div>
			</div>";
echo "</div>"; ?>

<script type='text/javascript'>
    var masonSchedule = new schedule(); //create schedule for getting current period
    selectedClass = Object.keys(masonSchedule.getCurrentPeriod(now))[0] - 1; //set the selectedClass to the current period
    var pageDataManager = new dataManager(); //make a dataManager
    // //Have to use .bind to set it to the correct object
    setNamedInterval("data",pageDataManager.updateData.bind(pageDataManager),10000); //update every 10000ms
</script>
