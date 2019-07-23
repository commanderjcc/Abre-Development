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
                    // {x: new moment().year(2018).month(11).day(1).unix(), y: 4},
                    {x: new moment().year(2019).month(0).day(1).unix(), y: 2},
                    // {x: new moment().year(2018).month(12).day(31).unix(), y: 3},
                    {x: new moment().year(2019).month(1).day(1).unix(), y: 2},
                    {x: new moment().year(2019).month(1).day(2).unix(), y: 2},
                    {x: new moment().year(2019).month(1).day(3).unix(), y: 2},
                    {x: new moment().year(2019).month(1).day(4).unix(), y: 2},
                    // {x: new moment().year(2019).month(1).day(31).unix(), y: 1},
                    {x: new moment().year(2019).month(2).day(1).unix(), y: 4},
                    // {x: new moment().year(2019).month(2).day(28).unix(), y: 4},
                    {x: new moment().year(2019).month(3).day(1).unix(), y: 4},
                    // {x: new moment().year(2019).month(3).day(31).unix(), y: 4},
                    {x: new moment().year(2019).month(4).day(1).unix(), y: 4},
                    // {x: new moment().year(2019).month(4).day(30).unix(), y: 4},
                    {x: new moment().year(2019).month(5).day(1).unix(), y: 4},
                    // {x: new moment().year(2019).month(5).day(31).unix(), y: 4},
                    {x: new moment().year(2019).month(6).day(1).unix(), y: 4},
                    // {x: new moment().year(2019).month(6).day(30).unix(), y: 4},
                    {x: new moment().year(2019).month(7).day(1).unix(), y: 4},
                    // {x: new moment().year(2019).month(7).day(31).unix(), y: 4},
                    {x: new moment().year(2019).month(8).day(1).unix(), y: 4},
                    // {x: new moment().year(2019).month(8).day(30).unix(), y: 4},
                    {x: new moment().year(2019).month(9).day(1).unix(), y: 4},
                    // {x: new moment().year(2019).month(9).day(31).unix(), y: 4},
                    {x: new moment().year(2019).month(10).day(1).unix(), y: 4},
                    // {x: new moment().year(2019).month(10).day(31).unix(), y: 4},
                    {x: new moment().year(2019).month(11).day(1).unix(), y: 4},
                    // {x: new moment().year(2019).month(11).day(30).unix(), y: 4},
                    {x: new moment().year(2020).month(0).day(1).unix(), y: 4},
                    {x: new moment().year(2019).month(12).day(31).unix(), y: 4},

                ]
            }
        ]
    };

    var zoneConversion = ['Error','Blue','Green','Yellow','Red',''];

    // As options we currently only set a static size of 300x200 px
    var options = {
        // high: new Date(2019, 11, 31),
        // low: new Date(2019,0,1),
        // width: '300px',
        // height: '200px',
        onlyInteger: true,
        axisY: {

            type: Chartist.FixedStepAxis,
            high: 5,
            low: 1,

            referenceValue: 1,
            labelInterpolationFnc: function(value) {
                return zoneConversion[value];
            },
        },
        axisX: {
            type: Chartist.FixedScaleAxis,
            // high: new Date(2019, 11, 31),
            // low: new Date(2019,0,1),
            high: new moment().year(2019).month(11).day(31).unix(),
            low: new moment().year(2019).month(0).day(1).unix(),
            referenceValue: new moment().year(2019).month(0).day(1).unix(),
            divisor: 13,
            // ticks: [
            //     new Date(2019,0,1,0,0,0,0),
            //     new Date(2019,1,1,0,0,0,0),
            //     new Date(2019,2,1,0,0,0,0),
            //     new Date(2019,3,1,0,0,0,0),
            //     new Date(2019,4,1,0,0,0,0),
            //     new Date(2019,5,1,0,0,0,0),
            //     new Date(2019,6,1,0,0,0,0),
            //     new Date(2019,7,1,0,0,0,0),
            //     new Date(2019,8,1,0,0,0,0),
            //     new Date(2019,9,1,0,0,0,0),
            //     new Date(2019,10,1,0,0,0,0),
            //     new Date(2019,11,1,0,0,0,0),
            // ],
            labelInterpolationFnc: function(value) {
                console.log(value*1000);
                return moment(value*1000).format('MMM D YY');
            }
        },
    };

    // In the global name space Chartist we call the Line function to initialize a line chart. As a first parameter we pass in a selector where we would like to get our chart created. Second parameter is the actual data object and as a third parameter we pass in our options
    var chart = new Chartist.Line('.ct-chart', data, options);
</script>
