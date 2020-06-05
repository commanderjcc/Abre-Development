<?php
/*
	* Copyright (C) 2019 Mason City Schools
	*
	* This program is free software, you can redistribute it and/or modify
    * it under the terms of the Affero General Public License version 3
    * as published by the Free Software Foundation.
	*
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU Affero General Public License for more details.
	*
    * You should have received a copy of the Affero General Public License
    * version 3 along with this program.  If not, see https,//www.gnu.org/licenses/agpl-3.0.en.html.
    */

//required verification files
require_once(dirname(__FILE__) . '/../../../core/abre_verification.php');
require_once('../../../modules/Abre-Moods/Data_Access/Teachers/dataManagement.php');
echo 'hi, starting to fill db with random data, this is only for testing purposes';
?>
<script type="text/javascript" src="/modules/Abre-Moods/js/moment.js"></script>
<script type="text/javascript" src="/core/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    var day = moment('20190101'); //start on jan 1st
    var stop = moment(); //go until today
    let moods = ["meh",
        "sad",
        "down",
        "allergic",
        "sick",
        "tired",
        "happy",
        "thrilled",
        "okay",
        "stressed",
        "worried",
        "annoyed",
        "frustrated",
        "scared",
        "angry",
        // "wants_to_speak_up", //dont use any of the crisis buttons
        // "needs_help",
        // "needs_to_talk",
    ];
    var mood;
    var time;
    var zone;
    setInterval(function () {
        if (day.isBefore(stop)) {
            mood = moods[Math.floor(Math.random() * moods.length)]; //get random mood
            time = day.toISOString();
            zone = dataManager.determineZone(mood);
            console.log('posting with mood: ' + mood + ', zone: ' + zone + ', time: ' + time);
            var jQueryRequest = $.post('students/upload_mood.php', { //post mood
                'mood': mood,
                'time': time,
                'zone': zone
            });
            day.add(1, 'd');//change the day by one forward
        }
    }, 200); //every 200 add a mood and upload
</script>

