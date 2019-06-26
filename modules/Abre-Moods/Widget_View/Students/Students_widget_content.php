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

require_once(dirname(__FILE__) . '/../../core/abre_verification.php'); //required verification security

//This file serves the teacher widget once requested by jQuery through loadWidget (modules/steam/widgets.php)

echo "<hr class='widget_hr'>"; //keep
echo "<div class='widget_holder'>"; //keep
echo "<i class=\"em em-slightly_smiling_face\"></i>
      <i class=\"em em-neutral_face\"></i>
      <i class=\"em em-confused\"></i>
      <i class=\"em em-grin\"></i>
      <i class=\"em em-expressionless\"></i>
      <i class=\"em em-sob\"></i>
      <i class=\"em em-grimacing\"></i>
      <i class=\"em em-fearful\"></i>
      <i class=\"em em-scream\"></i>
      <i class=\"em em-unamused\"></i>
      <i class=\"em em-angry\"></i>
      <i class=\"em em-triumph\"></i>
      <i class=\"em em-sneezing_face\"></i>
      <i class=\"em em-face_with_thermometer\"></i>
      <i class=\"em em-sleeping\"></i>
      
      
      
      
      
      
      
      
      ";
//echo "<div class='widget_container widget_body' style='color:#666;'>Menu<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_menu_or_roster.php' data-reload='true'>menu</i></div>";
//echo "<div class='widget_container widget_body' style='color:#666;'>History<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_history_or_overview.php' data-reload='true'>history</i></div>";
echo "</div>";