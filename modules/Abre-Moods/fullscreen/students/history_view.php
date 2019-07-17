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
<script src="/modules/Abre-Moods/js/Chart.js"></script>
<script type="text/javascript">
		var timeFormat = 'MM/DD/YYYY HH:mm';

		function newDate(days) {
			return moment().add(days, 'd').toDate();
		}

		function newDateString(days) {
			return moment().add(days, 'd').format(timeFormat);
		}

		var color = Chart.helpers.color;
		var config = {
		    maintainAspectRatio: false,
            aspectRatio: 2,
			type: 'line',
			data: {
				labels: [ // Date Objects
					newDate(0),
					newDate(1),
					newDate(2),
					newDate(3),
					newDate(4),
					newDate(5),
					newDate(6)
				],
				datasets: [{
					label: 'Dataset with point data',
					backgroundColor: color('green').alpha(0.5).rgbString(),
					borderColor: 'green',
					fill: false,
					data: [{
						x: newDateString(0),
						y: 12
					}, {
						x: newDateString(5),
						y: 13
					}, {
						x: newDateString(7),
						y: 15
					}, {
						x: newDateString(15),
						y: 3
					}],
				}]
			},
			options: {
				title: {
					text: 'Mood',
				},
                legend: {
				    position: 'none',
                },
				scales: {
					xAxes: [{
						type: 'time',
						time: {
							parser: timeFormat,
							// round: 'day'
							tooltipFormat: 'll HH:mm'
						},
						scaleLabel: {
							display: true,
							labelString: 'Date'
						}
					}],
					yAxes: [{
						scaleLabel: {
							display: true,
							labelString: 'Zone'
						}
					}]
				},
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('ctx').getContext('2d');
			window.myLine = new Chart(ctx, config);

		};

		// document.getElementById('randomizeData').addEventListener('click', function() {
		// 	config.data.datasets.forEach(function(dataset) {
		// 		dataset.data.forEach(function(dataObj, j) {
		// 			if (typeof dataObj === 'object') {
		// 				dataObj.y = randomScalingFactor();
		// 			} else {
		// 				dataset.data[j] = randomScalingFactor();
		// 			}
		// 		});
		// 	});
        //
		// 	window.myLine.update();
		// });
        //
		// var colorNames = Object.keys(window.chartColors);
		// document.getElementById('addDataset').addEventListener('click', function() {
		// 	var colorName = colorNames[config.data.datasets.length % colorNames.length];
		// 	var newColor = window.chartColors[colorName];
		// 	var newDataset = {
		// 		label: 'Dataset ' + config.data.datasets.length,
		// 		borderColor: newColor,
		// 		backgroundColor: color(newColor).alpha(0.5).rgbString(),
		// 		data: [],
		// 	};
        //
		// 	for (var index = 0; index < config.data.labels.length; ++index) {
		// 		newDataset.data.push(randomScalingFactor());
		// 	}
        //
		// 	config.data.datasets.push(newDataset);
		// 	window.myLine.update();
		// });
        //
		// document.getElementById('addData').addEventListener('click', function() {
		// 	if (config.data.datasets.length > 0) {
		// 		config.data.labels.push(newDate(config.data.labels.length));
        //
		// 		for (var index = 0; index < config.data.datasets.length; ++index) {
		// 			if (typeof config.data.datasets[index].data[0] === 'object') {
		// 				config.data.datasets[index].data.push({
		// 					x: newDate(config.data.datasets[index].data.length),
		// 					y: randomScalingFactor(),
		// 				});
		// 			} else {
		// 				config.data.datasets[index].data.push(randomScalingFactor());
		// 			}
		// 		}
        //
		// 		window.myLine.update();
		// 	}
		// });
        //
		// document.getElementById('removeDataset').addEventListener('click', function() {
		// 	config.data.datasets.splice(0, 1);
		// 	window.myLine.update();
		// });
        //
		// document.getElementById('removeData').addEventListener('click', function() {
		// 	config.data.labels.splice(-1, 1); // remove the label first
        //
		// 	config.data.datasets.forEach(function(dataset) {
		// 		dataset.data.pop();
		// 	});
        //
		// 	window.myLine.update();
		// });
</script>
