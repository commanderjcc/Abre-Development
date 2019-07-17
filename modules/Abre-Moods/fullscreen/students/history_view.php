<?php

require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
echo "<link rel='stylesheet' type='text/css' href='/modules/" . basename(dirname(__DIR__, 2)) . "/css/student/history.css'>";
?>
<div id="historyPage" class="">
    <div id="informationPane" class="">
        <div id="currentMoodInfo" class="mdl-shadow--2dp detail-container mcontainer">
            <div style="background-image: url('/profile.jpg')" id="profileHolder" class="student_image">
                <i class="student_mood twa twa-3x twa-sad"></i>
            </div>
            <div id="studentDetails" class="">
                <span id="student_name" class="">Joshua Christensen</span>
                <span id="lastMood" class="">"Frustrated" at 12:12 AM</span>
            </div>
        </div>
        <div id="moodHistory" class="mdl-shadow--2dp detail-container mcontainer">
            <div class="mood">
                <i class="twa twa-3x twa-sad"></i>
                <div class="moodDetails">
                    <span class="moodName">"Frustrated" <span class="moodTime">12:12 AM</span></span>
                    <span class="moodDate">Monday, Jan 12th</span>
                </div>
            </div>
        </div>
    </div>
    <div id="graphHolder" class="mdl-shadow--4dp mcontainer">
        <div id="graphAspect">
            <div id="graph">
                <canvas id="ctx"></canvas>
            </div>
        </div>
    </div>

</div>
