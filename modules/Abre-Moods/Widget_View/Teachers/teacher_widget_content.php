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


require_once(dirname(__FILE__) . '/../../core/abre_verification.php');





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