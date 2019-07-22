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
            <div id="graph" class="ct-chart">

            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    var data = {
        // Our series array that contains series objects or in this case series data arrays
        series: [
            {
                name: 'mood',
                data: [
                    {x: 0,y:0},
                    {x: 1,y:2},
                    {x: 2,y:3},
                    {x: 3,y:2},
                    {x: 4,y:1},
                    {x: 5,y:1},
                    {x: 6,y:0},
                ]
            }
        ]
    };

    var zoneConversion = ['Error','Blue','Green','Yellow','Red','Crisis'];

    // As options we currently only set a static size of 300x200 px
    var options = {
        // width: '300px',
        // height: '200px',
        axisY: {
            
            labelInterpolationFnc: function(value) {
                return zoneConversion[value];
            }
        }
    };

    // In the global name space Chartist we call the Line function to initialize a line chart. As a first parameter we pass in a selector where we would like to get our chart created. Second parameter is the actual data object and as a third parameter we pass in our options
    var chart = new Chartist.Line('.ct-chart', data, options);
</script>
