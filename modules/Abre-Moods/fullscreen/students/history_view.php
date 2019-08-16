<?php

require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
echo "<link rel='stylesheet' type='text/css' href='/modules/" . basename(dirname(__DIR__, 2)) . "/css/student/history.css'>";
?>
<script id='pickerScript' type="text/javascript"
        src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<div id="historyPage" class="">
    <div id="informationPane" class="">
        <div id="currentMoodInfo" class="mdl-shadow--2dp detail-container mcontainer">
            <div style="background-image: url('/profile.jpg')" id="profileHolder" class="student_image">
                <i class="student_mood twa twa-3x"></i>
            </div>
            <div id="studentDetails" class="">
                <span id="student_name" class=""></span>
                <span id="lastMood" class=""></span>
            </div>
        </div>
        <div id="moodHistory" class="mdl-shadow--2dp detail-container mcontainer">
        </div>
    </div>
    <div id="graphHolder" class="mdl-shadow--4dp mcontainer">
        <div id="controller">
            <button class="mdl-button mdl-js-button" id="durationPicker">Today <i class="material-icons">keyboard_arrow_down</i>
            </button>
        </div>
        <div id="graphAspect">
            <div id="graph" class="ct-chart">

            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    var waitForPicker = function () { //because we were having sometrouble with the picker's files downloading and executing on time, this makes sure they get run first
        setTimeout(function () {
            if (jQuery().daterangepicker) { //check if installed
                console.log('daterangepicker installed');
                installPicker();
            } else {
                console.log('still failed');
                waitForPicker(); //call itself and check again in 100
            }
        }, 100); //do this every 100ms
    };
</script>

<script defer type="text/javascript">
    var zoneConversion = ['', 'Blue', 'Green', 'Yellow', 'Red', ''];
    var data;
    var options;
    var chart;

    var capitalizeFirst = function (str) { //does what it says, used to make things look pretty
        return str.replace(/\w\S*/g, function (txt) { //breaks by spaces
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        })
    };

    var installPicker = function () {
        $('#durationPicker').daterangepicker({
            "showDropdowns": true,
            "timePicker": true,
            "timePickerIncrement": 5,
            ranges: {
                'Today': [moment().startOf('day'), moment().endOf('day')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
            },
            "linkedCalendars": false,
            "showCustomRangeLabel": false,
            "alwaysShowCalendars": true,
            "startDate": "08/07/2019",
            "endDate": "08/13/2019",
            "opens": "left",
            "buttonClasses": "mdl-button margined",
            "applyButtonClasses": "mdl-button--raised mdl-button--colored"
        }, function (start, end, label) {
            // console.log('New date range selected: ' + start.format('YYYY-MM-DD h:mm A') + ' to ' + end.format('YYYY-MM-DD h:mm A') + ' (predefined range: ' + label + ')');
            updateChart(data, start, end);
        });
    };

    var updateChart = function (data, start, end) {
        var filteredData = autoFilter(data.history, start, end);

        var graphData = {
            series: [
                {
                    name: 'mood',
                    data: filteredData.points,
                }
            ]
        };
        var options = {
            axisX: {
                showLabel: true,
                showGrid: true,
                type: Chartist.FixedScaleAxis,
                low: filteredData.ticks[0],
                high: filteredData.ticks[10],
                ticks: filteredData.ticks,
                labelInterpolationFnc: (function (filteredData) {
                    var duration = filteredData.ticks[10] - filteredData.ticks[0];
                    if (duration <= moment.duration(1, 'd')) {
                        return function (value)  {
                            return moment(value).format('h:mm A');
                        };
                    } else if (duration <= moment.duration(10, 'd')) {
                        return function (value)  {
                            return moment(value).format('dd, h:mm A');
                        };
                    } else if (duration <= moment.duration(30, 'd')) {
                        return function (value)  {
                            return moment(value).format('MMM, Do');
                        };
                    } else if (duration <= moment.duration(1, 'y')) {
                        return function (value)  {
                            return moment(value).format('MMM Do YY');
                        };
                    } else if (duration <= moment.duration(2, 'y')) {
                        return function (value)  {
                            return moment(value).format('MMM YY');
                        };
                    } else {
                        return function (value)  {
                            return moment(value).format('MM/DD/YY');
                        };
                    }
                })(filteredData),
            }
        };

        chart.update(graphData, options, true);
    };

    var autoFilter = function (data, startDate, endDate) {
        //make all the tickmarks
        var tickOffset = (endDate.valueOf() - startDate.valueOf()) / 10; //12 is the number of ticks we'll be using
        var ticks = [];
        for (i = 0; i <= 10; i++) {
            console.log(i);
            ticks.push(startDate.valueOf() + i * tickOffset); //add milisecond values for use with our ticks later in the chart
        }

        //make the points
        var pointOffset = (endDate.valueOf() - startDate.valueOf()) / 50; //50 is the number of maximum points we want to have
        var isCompressed = false; //used to see if the graph has combined any points so far
        var points = []; //init vars
        var tempData = data;
        var progress = 0;
        for (i = 0; i < 50; i++) { //end 1 early so we work add 1 to get end point
            var divisionStartTime = moment(startDate.valueOf() + i * pointOffset); //create start and end moment
            var divisionEndTime = moment(startDate.valueOf() + (i + 1) * pointOffset);
            var tempPoints = [];
            while (progress < tempData.length) { //make sure we dont go over our bounds
                var currentPointTime = moment(tempData[progress].time); //make a moment of current time
                if (currentPointTime.isBetween(divisionStartTime, divisionEndTime, null, "[]")) { //check if its in our division
                    tempPoints.push(tempData[progress]); //add to temp points
                    progress++ //move to next point, so we dont rescan all the points
                } else if (currentPointTime.isAfter(divisionEndTime)) { //stop once we reach end of our division
                    break;
                } else if (currentPointTime.isBefore(divisionStartTime)) { //skip any points infront of our division
                    progress++
                }
            }

            var time = 0; //init vars
            var zone = 0; //can a be value between 1-4 will get converted blue/green/yellow/red later
            var mood = "";

            if (tempPoints.length > 1) { //if we have more than 1 points then we need to compress them
                isCompressed = true; //let the rest of the function know things have been compressed

                var moods = { //init keys with 0 for incrementing later, ranked by least neutral to most neutral, more netural ones win ties
                    "crappy": 0,
                    "allergic": 0,
                    "sick": 0,
                    "scared": 0,
                    "angry": 0,
                    "thrilled": 0,
                    "tired": 0,
                    "sad": 0,
                    "happy": 0,
                    "frustrated": 0,
                    "worried": 0,
                    "annoyed": 0,
                    "stressed": 0,
                    "down": 0,
                    "okay": 0,
                    "meh": 0,
                };

                tempPoints.forEach((moodObj, index) => {
                    time += moment(moodObj.time).valueOf(); //add each time to the result's time
                    moods[moodObj.mood]++; //increment whichever mood has been selected
                    zone += zoneConversion.indexOf(capitalizeFirst(moodObj.zone)); //add the zone value of each moodObj. Need capitalizeFirst bc Zones are capitalized for appearance in zoneConversion
                });

                time = time / tempPoints.length; //average out the time
                zone = zone / tempPoints.length; //average the zone value
                mood = capitalizeFirst(Object.keys(moods).reduce((a, b) => moods[a] > moods[b] ? a : b)); //find whichever is highest. reduce goes through entire array and compares to see if its bigger than the last.
                mood += " (Averaged)"; //adds Averaged so people know its been averaged

            } else if (tempPoints.length === 1) {//if we have 1 or 0 points then we dont need to combine any points
                time = moment(tempPoints[0]['time']).valueOf();
                zone = zoneConversion.indexOf(capitalizeFirst(tempPoints[0]['zone']));
                mood = capitalizeFirst(tempPoints[0]['mood']);
            } else { //zero so dont add any points
                continue;
            }

            points.push({'meta': mood, 'x': time, 'y': zone}); //all the conversions have already been done so we can add the points in plain
        }
        console.log(ticks);
        console.log(points);
        return {'ticks': ticks, 'points': points};
    };


    var jqxhr = $.post('/modules/Abre-Moods/Data_Access/Students/get_history.php', {studentID:<?php echo intval($_POST['studentID']); ?>});


    jqxhr.done(function (responseData) {
        console.log(JSON.parse(responseData));
        responseData = JSON.parse(responseData);

        data = responseData;
        var filteredData = autoFilter(data.history.reverse(), moment().subtract(7, 'd'), moment());
        var graphData = {
            series: [
                {
                    name: 'mood',
                    data: filteredData.points,
                }
            ]
        };

        var options = {
            width: 'calc(100% - 3rem)',
            chartPadding: {
                top: 10,
                right: 10,
                bottom: 20,
                left: 10,
            },
            axisY: {
                type: Chartist.FixedScaleAxis,
                high: 5,
                low: 0,
                divisor: 5,
                referenceValue: 1,
                labelInterpolationFnc: function (value) {
                    return zoneConversion[value];
                },
            },
            axisX: {
                type: Chartist.FixedScaleAxis,
                low: filteredData.ticks[0],
                high: filteredData.ticks[10],
                ticks: filteredData.ticks,
                labelInterpolationFnc: function (value) {
                    //console.log(value);
                    return moment(value).format('dd, h:mm A');
                }
            },
            plugins: [
                Chartist.plugins.tooltip({
                    anchorToPoint: true,
                    appendToBody: true,
                    transformTooltipTextFnc: function (value) {
                        //console.log(value);
                        return new moment(parseInt(value.split(',')[0])).format('MMM D h:mm A');
                    }
                }),
            ],
        };

        // In the global name space Chartist we call the Line function to initialize a line chart. As a first parameter we pass in a selector where we would like to get our chart created. Second parameter is the actual data object and as a third parameter we pass in our options

        chart = new Chartist.Line('.ct-chart', graphData, options);
        chart.on('draw', function (data) {
            if (data.type === 'grid') { //creating colored bars behind everything

                if (data.axis.units.pos === 'y') {
                    if (data.element.parent().querySelector('.bar' + data.index) != null) {
                        data.element.parent().querySelector('.bar' + data.index).remove(); //remove any previously existing colored bars
                    }

                    var offsetHeight = data.axis.chartRect.height() / 10; //find how much off the center we end to shift things
                    var width = data.axis.chartRect.width();
                    var pos = {
                        'y1': data.element._node.attributes.y1.value, //get position values of original line
                        'x1': data.element._node.attributes.x1.value,
                    };
                    var foreignObj = data.element.foreignObject('<div class="moodbar"></div>', { //create div based on location of line and hieght offsets
                        'y': pos.y1 - offsetHeight,
                        'x': pos.x1,
                        'height': 2 * offsetHeight,
                        'width': width,
                    }, 'bar' + data.index, true); //give it an class of bar1, bar2, etc...
                    data.element.parent().append(foreignObj); //add it to the svg chart
                }
            }
        });

        $('#student_name').text(responseData.name);
        $('#profileHolder').css('background-image', 'url("' + responseData.photo + '")');
        $('#profileHolder .student_mood').addClass('twa-' + responseData.mood);
        $('#lastMood').text('"' + capitalizeFirst(responseData.mood) + '" at ' + moment(responseData.time).format('h:mm A'));

        var outline = [`<div class="mood">
                <i class="twa twa-3x twa-`, `"></i>
                <div class="moodDetails">
                    <span class="moodName">"`, `" <span class="moodTime">`, `</span></span>
                    <span class="moodDate">`, `</span>
                </div>
            </div>`];
        responseData.history.forEach((moodObj) => {
            //console.log(moodObj);
            $('#moodHistory').append(outline[0] + moodObj.mood + outline[1] + capitalizeFirst(moodObj.mood) + outline[2] + moment(moodObj.time).format('h:mm A') + outline[3] + moment(moodObj.time).format('dddd[,] MMM Do'))
        })

    });

    $(window).on('hashchange', function(){ //remove a bunch of janky junk when we click away
        $('#durationPicker').daterangepicker().remove();
        $('.daterangepicker').remove();
        $('chartist-tooltip').remove();
    });

</script>
