<?php

require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
echo "<link rel='stylesheet' type='text/css' href='/modules/" . basename(dirname(__DIR__, 2)) . "/css/student/history.css'>";
?>
<div id="historyPage" class="">
    <div id="informationPane" class="">
        <div id="currentMoodInfo" class="mdl-shadow--2dp detail-container mcontainer">
            <div style="background-image: url('/profile.jpg')" id="profileHolder" class="student_image">
                <i class="student_mood twa twa-3x"></i>
            </div>
            <div id="studentDetails" class="">
                <span id="student_name" class="">Joshua Christensen</span>
                <span id="lastMood" class="">"Frustrated" at 12:12 AM</span>
            </div>
        </div>
        <div id="moodHistory" class="mdl-shadow--2dp detail-container mcontainer">
        </div>
    </div>
    <div id="graphHolder" class="mdl-shadow--4dp mcontainer">
        <div id="graphAspect">
            <div id="graph" class="ct-chart">

            </div>
        </div>
    </div>

</div>
<script defer type="text/javascript">
    var capitalizeFirst = function(str) {
        return str.replace(/\w\S*/g,function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        })
    }
    var zoneConversion = ['', 'Blue', 'Green', 'Yellow', 'Red', ''];
    var jqxhr = $.post('/modules/Abre-Moods/Data_Access/Students/get_history.php', {studentID:<?php echo intval($_POST['studentID']); ?>});
    var chart;
    jqxhr.done(function (data) {
        console.log(JSON.parse(data));
        data = JSON.parse(data);
        var graphData = {

            // Our series array that contains series objects or in this case series data arrays
            series: [
                {
                    name: 'mood',
                    data: data.history.map((moodObj)=>{
                        console.log(moodObj);
                        return {'meta':moodObj.mood,'x':moment(moodObj.time).valueOf(),'y':zoneConversion.indexOf(capitalizeFirst(moodObj.zone))}
                    })
                }
            ]
        };

        var options = {
            onlyInteger: true,
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
                high: new moment('20191231').valueOf(),
                low: new moment('20190101').valueOf(),
                ticks: [
                    new moment('20190101').valueOf(),
                    new moment('20190201').valueOf(),
                    new moment('20190301').valueOf(),
                    new moment('20190401').valueOf(),
                    new moment('20190501').valueOf(),
                    new moment('20190601').valueOf(),
                    new moment('20190701').valueOf(),
                    new moment('20190801').valueOf(),
                    new moment('20190901').valueOf(),
                    new moment('20191001').valueOf(),
                    new moment('20191101').valueOf(),
                    new moment('20191201').valueOf(),
                ],
                labelInterpolationFnc: function (value) {
                    console.log(value);
                    return moment(value).format('MMM D YY');
                }
            },
            plugins: [
                Chartist.plugins.tooltip({
                    anchorToPoint: true,
                    appendToBody: true,
                    transformTooltipTextFnc: function (value) {
                        console.log(value);
                        return new moment(parseInt(value.split(',')[0])).format('MMM D');
                    }
                }),
            ],
        };

        // In the global name space Chartist we call the Line function to initialize a line chart. As a first parameter we pass in a selector where we would like to get our chart created. Second parameter is the actual data object and as a third parameter we pass in our options
        chart = new Chartist.Line('.ct-chart', graphData, options);
        chart.on('draw', function (data) {
            if (data.type === 'grid') {

                if (data.axis.units.pos === 'y') {
                    if (data.element.parent().querySelector('.bar' + data.index) != null) {
                        data.element.parent().querySelector('.bar' + data.index).remove();
                    }

                    var offsetHeight = data.axis.chartRect.height() / 10;
                    var pos = {
                        'y1': data.element._node.attributes.y1.value,
                        'x1': data.element._node.attributes.x1.value,
                    };
                    var foreignObj = data.element.foreignObject('<div class="moodbar"></div>', {
                        'y': pos.y1 - offsetHeight,
                        'x': pos.x1,
                        'height': 2 * offsetHeight,
                        'width': "100%",
                    }, 'bar' + data.index, true);
                    data.element.parent().append(foreignObj);
                }
            }
        });

        $('#student_name').text(data.name);
        $('#profileHolder').css('background-image','url("'+data.photo+'")');
        $('#profileHolder .student_mood').addClass('twa-'+data.mood);
        $('#lastMood').text('"'+capitalizeFirst(data.mood)+'" at '+moment(data.time).format('h:mm A'));

        var outline = [`<div class="mood">
                <i class="twa twa-3x twa-`,`"></i>
                <div class="moodDetails">
                    <span class="moodName">"`,`" <span class="moodTime">`,`</span></span>
                    <span class="moodDate">`,`</span>
                </div>
            </div>`];
        data.history.forEach((moodObj)=>{
            $('#moodHistory').append(outline[0]+data.mood+outline[1]+data.name+outline[2]+moment(data.time).format('h:mm A')+outline[3]+moment(data.time).format('dddd[,] MMM Do'))
        })

    });

</script>
