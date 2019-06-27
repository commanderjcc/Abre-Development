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

require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php'); //required verification security

//This file serves the teacher widget once requested by jQuery through loadWidget (modules/steam/widgets.php)

echo "<hr class='widget_hr'>"; //keep
//echo "<div class='widget_holder'>"; //keep
echo "<div class='emoji_container'>
          <div id='widget_happy' class='widget_emoji'>
            <i class='twa twa-slightly-smiling-face'></i>
            Happy
          </div>
          <div id='widget_okay' class='widget_emoji'>
            <i class='twa twa-neutral-face'></i>
            Okay
          </div>
          <div id='widget_down' class='widget_emoji'>
            <i class='twa twa-confused-face'></i>
            Down
          </div>
          <div id='widget_thrilled' class='widget_emoji'>
            <i class='twa twa-beaming-face-with-smiling-eyes'></i>
            Thrilled
          </div>
          <div id='widget_meh' class='widget_emoji'>
            <i class='twa twa-expressionless-face'></i>
            Meh
          </div>
          <div id='widget_sad' class='widget_emoji'>
            <i class='twa twa-loudly-crying-face'></i>
            Sad
          </div>
          <div id='widget_stressed' class='widget_emoji'>
            <i class='twa twa-grimacing-face'></i>
            Stressed
          </div>
          <div id='widget_worried' class='widget_emoji'>
            <i class='twa twa-fearful-face'></i>
            Worried
          </div>
          <div id='widget_scared' class='widget_emoji'>
            <i class='twa twa-face-screaming-in-fear'></i>
            Scared
          </div>
          <div id='widget_annoyed' class='widget_emoji'>
            <i class='twa twa-unamused-face'></i>
            Annoyed
          </div>
          <div id='widget_angry' class='widget_emoji'>
            <i class='twa twa-angry-face'></i>
            Angry
          </div>
          <div id='widget_frustrated' class='widget_emoji'>
            <i class='twa twa-face-with-steam-from-nose'></i>
            Frustrated
          </div>
          <div id='widget_allergic' class='widget_emoji'>
            <i class='twa twa-sneezing-face'></i>
            Allergic
          </div>
          <div id='widget_sick' class='widget_emoji'>
            <i class='twa twa-face-with-thermometer'></i>
            Sick
          </div>
          <div id='widget_tired' class='widget_emoji'>
            <i class='twa twa-sleeping-face'></i>
            Tired
          </div>
          <div id='widget_speak_up' class='widget_emoji'>
            <i class='twa twa-eye-in-speech-bubble'></i>
            Speak Up
          </div>
          <div id='widget_needs_help' class='widget_emoji'>
            <i class='twa twa-sos-button'></i>
            I need help
          </div>
          <div id='widget_needs_talk' class='widget_emoji'>
            <i class='twa twa-speech-balloon'></i>
            I need to talk
          </div>
       </div>";
//echo "<div class='widget_container widget_body' style='color:#666;'>Menu<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_menu_or_roster.php' data-reload='true'>menu</i></div>";
//echo "<div class='widget_container widget_body' style='color:#666;'>History<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_history_or_overview.php' data-reload='true'>history</i></div>";
//echo "</div>";
