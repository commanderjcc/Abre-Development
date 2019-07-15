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

require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
//require_once(dirname(__FILE__) . '/../../data_access/teachers/dataManagement.php');
echo "<link rel='stylesheet' type='text/css' href='/modules/" . basename(dirname(__DIR__, 2)) . "/css/teacher/widget.css'>";
echo "<hr style='height:0' class='widget_hr'>"; //keep
//echo "<div class='widget_holder'>"; //keep
//echo "<div class='widget_container widget_body' style='color:#666;'>Roster<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_menu_or_roster.php' data-reload='true'>group</i></div>";
//echo "<div class='widget_container widget_body' style='color:#666;'>Overview<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_history_or_overview.php' data-reload='true'>table_chart</i></div>";
echo "<div class='widget_body'>";
echo "<div id='class_head_bar' class='teacher_color_bar'>
					<div id='shaded_total_bar' class='loading_bar class_progress_bar'></div>
					<div class='bar_text_container'>
						Total - <span class='num_students'></span>
					</div>
				</div>
				<div id='blue' class='teacher_color_bar'>
					<div id='shaded_blue_bar' class='loading_bar'></div>
					<div class='bar_text_container'>
						Blue - <span class='num_students'></span>
					</div>
				</div>
				<div id='green' class='teacher_color_bar'>
					<div id='shaded_green_bar'class='loading_bar'></div>
					<div class='bar_text_container'>
						Green - <span class='num_students'></span>
					</div>
				</div>
				<div id='yellow' class='teacher_color_bar'>
				<div id='shaded_yellow_bar' class='loading_bar'></div>
					<div class='bar_text_container'>
						Yellow - <span class='num_students'></span>
					</div>
				</div>
				<div id='red' class='teacher_color_bar'>
				<div id='shaded_red_bar' class='loading_bar'></div>
					<div class='bar_text_container'>
						Red - <span class='num_students'></span>
					</div>
				</div>
			</div>";
echo "</div>"; ?>

<script type='text/javascript'>
    //Updater as a function with a ajax post call








    // class schedule {
    //     now;
    //     day;
    //     hour;
    //     minute;
    //     startTimes = {
    //         0: [
    //             {7: moment().day(-2).hour(13).minute(38)},
    //             {1: moment().day(1).hour(7).minute(30)},
    //         ],
    //         1: [
    //             {7: moment().day(-2).hour(13).minute(38)},
    //             //need last class of previous day in 0th position to check if its before school in morning
    //             //moments are calculated from the end of the class before them
    //             {1: moment().day(1).hour(7).minute(30)},
    //             {2: moment().day(1).hour(8).minute(35)},
    //             {3: moment().day(1).hour(9).minute(27)},
    //             {4: moment().day(1).hour(10).minute(19)},
    //             {5: moment().day(1).hour(11).minute(54)},
    //             {6: moment().day(1).hour(12).minute(46)},
    //             {7: moment().day(1).hour(13).minute(38)},
    //         ],
    //         2: [
    //             {7: moment().day(1).hour(13).minute(38)},
    //             //need last class of previous day
    //             {1: moment().day(2).hour(7).minute(30)},
    //             {3: moment().day(2).hour(8).minute(55)},
    //             {4: moment().day(2).hour(10).minute(10)},
    //             {6: moment().day(2).hour(12).minute(0)},
    //             {7: moment().day(2).hour(13).minute(15)},
    //         ],
    //         3: [
    //             {7: moment().day(2).hour(13).minute(15)},
    //             //need last class of previous day
    //             {2: moment().day(3).hour(7).minute(30)},
    //             {5: moment().day(3).hour(8).minute(55)},
    //             {3: moment().day(3).hour(10).minute(10)},
    //             {'connect1': moment().day(3).hour(12).minute(0)},
    //             {'connect2': moment().day(3).hour(12).minute(40)},
    //             {6: moment().day(3).hour(13).minute(15)},
    //
    //         ],
    //         4: [
    //             {6: moment().day(3).hour(13).minute(15)},
    //             //need last class of previous day
    //             {1: moment().day(4).hour(7).minute(30)},
    //             {2: moment().day(4).hour(8).minute(55)},
    //             {4: moment().day(4).hour(10).minute(10)},
    //             {5: moment().day(4).hour(12).minute(0)},
    //             {7: moment().day(4).hour(13).minute(15)},
    //         ],
    //         5: [
    //             {7: moment().day(4).hour(13).minute(15)},
    //             //need last class of previous day
    //             {1: moment().day(5).hour(7).minute(30)},
    //             {2: moment().day(5).hour(8).minute(35)},
    //             {3: moment().day(5).hour(9).minute(27)},
    //             {4: moment().day(5).hour(10).minute(19)},
    //             {5: moment().day(5).hour(11).minute(54)},
    //             {6: moment().day(5).hour(12).minute(46)},
    //             {7: moment().day(5).hour(13).minute(38)},
    //         ],
    //         6: [
    //             {7: moment().day(5).hour(13).minute(38)},
    //             {1: moment().day(8).hour(7).minute(30)},
    //         ]
    //     };
    //
    //     constructor() {
    //         this.update();
    //     }
    //
    //     update(when = moment()) {
    //         this.now = when;
    //         this.day = this.now.day();
    //         this.hour = this.now.hour();
    //         this.minute = this.now.minute();
    //     }
    //
    //     getCurrentPeriod(when = moment()) {
    //         this.update(when);
    //         //for each of the start times of today
    //         var output;
    //         this.startTimes[this.day].forEach((periodObj, slot, day) => {
    //             var selectedPeriod;
    //             var nextPeriod;
    //             // if the next slot will be outside of the number of slots for the day then dont compare
    //             if (slot + 1 !== day.length) {
    //                 //get the period in that slot, have to use this weird method bc we dont know the period
    //                 for (var period in periodObj) {
    //                     if (periodObj.hasOwnProperty(period)) {
    //                         selectedPeriod = periodObj[period];
    //                     }
    //                 }
    //                 //get the next period in that slot, have to use this weird method bc we dont know the period
    //                 for (var next in day[slot + 1]) {
    //                     if (day[slot + 1].hasOwnProperty(next)) {
    //                         nextPeriod = day[slot + 1][next];
    //                     }
    //                 }
    //             } else {
    //                 //get the period in that slot, have to use this weird method bc we dont know the period
    //                 for (var period in periodObj) {
    //                     if (periodObj.hasOwnProperty(period)) {
    //                         selectedPeriod = periodObj[period];
    //                     }
    //                 }
    //
    //                 var currentDay = this.day;
    //                 if (this.day === 6) {
    //                     currentDay = -1;
    //                 }
    //
    //                 //get the first class of the next day
    //                 for (var next in this.startTimes[currentDay + 1][1]) {
    //                     if (this.startTimes[currentDay + 1][1].hasOwnProperty(next)) {
    //                         nextPeriod = this.startTimes[currentDay + 1][1][next];
    //                     }
    //                 }
    //             }
    //             //if we are currently between the selectedPeriod and the start of the next period, then we must
    //             //be in the selectedPeriod so return the object containing the period number and the period times
    //             if (this.now.isBetween(selectedPeriod, nextPeriod)) {
    //                 output = periodObj;
    //             }
    //         });
    //         return output;
    //     }
    //
    //     getSlotStart(slot, day = this.day) {
    //         return this.startTimes[day][slot]
    //     }
    //
    //     getPeriodStart(period, day = this.day) {
    //         var available = this.startTimes[day];
    //         var output;
    //         available.forEach((periodObj, slot) => {
    //             if (slot !== 0) {
    //                 for (var periodProp in periodObj) {
    //                     if (periodObj.hasOwnProperty(periodProp)) {
    //                         if (periodProp == period) {
    //                             output = periodObj;
    //                         }
    //                     }
    //                 }
    //             }
    //         });
    //         return output
    //     }
    //
    //     //this is a boolean test for if the lastupdate of the mood was in this period
    //     isAfterPeriodStart(updateTime, periodStart = this.getCurrentPeriod()) {
    //         return updateTime.isAfter(periodStart);
    //     }
    // }
    //
    // class dataManager {
    //     parsedStudentData = {};
    //     sortedStudentData = {
    //         'unanswered': [],
    //         'blue': [],
    //         'green': [],
    //         'yellow': [],
    //         'red': [],
    //         'crisis': [],
    //     };
    //     rawStudentData = {};
    //     classes = [];
    //
    //     static isEquivalent(a, b) {
    //         if (a == null || b == null || a == undefined || b == undefined) {
    //             return false
    //         }
    //
    //         // Create arrays of property names
    //         var aProps = Object.getOwnPropertyNames(a);
    //         var bProps = Object.getOwnPropertyNames(b);
    //
    //         // If number of properties is different,
    //         // objects are not equivalent
    //         if (aProps.length != bProps.length) {
    //             return false;
    //         }
    //
    //         var areEqual = true;
    //         aProps.forEach((propName) => {
    //             // If values of same property are not equal,
    //             // objects are not equivalent
    //             if (a[propName] !== b[propName]) {
    //                 areEqual = false;
    //             }
    //         });
    //
    //         // If we made it this far, objects
    //         // are considered equivalent
    //         return areEqual;
    //     }
    //
    //     static determineZone(mood) {
    //         switch (mood) {
    //             case "meh":
    //             case "sad":
    //             case "down":
    //             case "allergic":
    //             case "sick":
    //             case "tired":
    //                 return "blue";
    //             case "happy":
    //             case "thrilled":
    //             case "okay":
    //                 return "green";
    //             case "stressed":
    //             case "worried":
    //             case "annoyed":
    //             case "frustrated":
    //                 return "yellow";
    //             case "scared":
    //             case "angry":
    //                 return "red";
    //             case "wants_to_speak_up":
    //             case "needs_help":
    //             case "needs_to_talk":
    //                 return "crisis";
    //         }
    //     };
    //
    //     constructor() {
    //         this.updateData();
    //     }
    //
    //     classChanged() {
    //         this.parsedStudentData = {};
    //         this.sortedStudentData = {
    //             'unanswered': [],
    //             'blue': [],
    //             'green': [],
    //             'yellow': [],
    //             'red': [],
    //             'crisis': [],
    //         };
    //         this.rawStudentData = '';
    //     }
    //
    //     updateData() {
    //         var periodObj = masonSchedule.getCurrentPeriod();
    //         var bell = Object.getOwnPropertyNames(periodObj)[0];
    //
    //         var jqxhr = $.post('/modules/Abre-Moods/data_access/teachers/get_all_students_status.php', {
    //             "amount": "full",
    //             "bell": bell,
    //         });
    //         //Same here with the arrow function, it makes everything easier
    //         jqxhr.done(data => {
    //             console.log('updating');
    //             //var tempData = JSON.parse(data);
    //             if (data === this.rawStudentData) {
    //
    //             } else {
    //                 console.log('re-processing');
    //                 var tempData = JSON.parse(data);
    //
    //
    //                 for (var studentID in tempData) {
    //                     if (tempData.hasOwnProperty(studentID)) {
    //                         var zone;
    //                         var lastUpdateMoment = moment(tempData[studentID]['time']);
    //                         //add one so the selected class matches the appearance-based naming of the classes
    //                         var selectedPeriodStartTime = masonSchedule.getPeriodStart(bell);
    //                         if (masonSchedule.isAfterPeriodStart(lastUpdateMoment, selectedPeriodStartTime)) {
    //                             zone = tempData[studentID]['zone'];
    //
    //                         } else {
    //                             zone = 'unanswered';
    //                         }
    //                         var containers = Object.getOwnPropertyNames(this.sortedStudentData);
    //                         containers.forEach((zoneArr)=>{
    //                             //remove student from other zones, have to search them all...
    //                             this.sortedStudentData[zoneArr].forEach((foundStudent, foundLocation, array)=>{
    //                                 if(foundStudent.hasOwnProperty(studentID)) {
    //                                     array.splice(foundLocation, 1);
    //                                 }
    //                             });
    //                         });
    //                         this.sortedStudentData[zone][this.sortedStudentData[zone].length] = {[studentID]: tempData[studentID]};
    //                         this.parsedStudentData[studentID] = tempData[studentID];
    //                     }
    //                 }
    //                 //this.parsedStudentData = tempData;
    //                 this.rawStudentData = data;
    //                 this.displayData();
    //             }
    //         });
    //     }
    //
    //
    //     displayData() {
    //         this.updateDisplayBars();
    //         this.updateDisplayNums();
    //     }
    //
    //     updateDisplayBars() {
    //         var data = this.sortedStudentData;
    //         var total = data['unanswered'].length + data['blue'].length + data ['green'].length + data['yellow'].length + data['red'].length + data['crisis'].length;
    //         //animate total bar
    //         $('#total_bar .loading_bar').animate({'width': 100 * (data['unanswered'].length) / total + '%'});
    //         //animate blue bar
    //         $('#blue_bar .loading_bar').animate({'width': 100 * (total - data['blue'].length) / total + '%'});
    //         //animate green bar
    //         $('#green_bar .loading_bar').animate({'width': 100 * (total - data['green'].length) / total + '%'});
    //         //
    //         $('#yellow_bar .loading_bar').animate({'width': 100 * (total - data['yellow'].length) / total + '%'});
    //         //
    //         $('#red_bar .loading_bar').animate({'width': 100 * (total - data['red'].length) / total + '%'});
    //     }
    //
    //     updateDisplayNums() {
    //         var data = this.sortedStudentData;
    //         var total = data['unanswered'].length + data['blue'].length + data ['green'].length + data['yellow'].length + data['red'].length + data['crisis'].length;
    //         //update class
    //         console.log('total: ' + total);
    //         $('#total_bar .bar_text_container .bold_bar_text').text(total - data['unanswered'].length + "/" + total);
    //         //update blue
    //         $('#blue_bar .bar_text_container .bold_bar_text').text(data['blue'].length + "/" + total);
    //         //update green
    //         $('#green_bar .bar_text_container .bold_bar_text').text(data['green'].length + "/" + total);
    //         //update yellow
    //         $('#yellow_bar .bar_text_container .bold_bar_text').text(data['yellow'].length + "/" + total);
    //         //update red
    //         $('#red_bar .bar_text_container .bold_bar_text').text(data['red'].length + "/" + total);
    //     }
    // }
    //
    var masonSchedule = new schedule();
    //
    var pageDataManager = new dataManager();
    // //Have to use .bind to set it to the correct object
    // setNamedInterval("data", widgetDataManager.updateData.bind(widgetDataManager), 10000);


    setNamedInterval("data",pageDataManager.updateData.bind(pageDataManager),10000);







    // var TeacherOverviewUpdater = function () {
    //     //should probably remove teacherID for security reasons... could theoretically use an obtained teacherID to snoop on students
    //     var jQueryRequest = $.post('modules/Abre-Moods/data_access/teachers/get_all_students_status.php', {amount: 'counts'}, function (data) {
    //         //log data to console for testing, can remove for production
    //         //console.log(data);
    //     });
    //
    //     //Do if request succeeded
    //     jQueryRequest.done(function (data) {
    //         var jsonData = JSON.parse(data);
    //
    //         //update text
    //         $('#total_bar .bar_text_container .bold_bar_text').text(jsonData.totalResponses + '/' + jsonData.totalStudents);
    //
    //         //animate shaded bar across div
    //         $('#total_bar .shaded_bar').animate({
    //             'width': 100 * (jsonData.totalStudents - jsonData.totalResponses) / jsonData.totalStudents + '%'
    //         });
    //
    //
    //         //repeat for blue
    //         $('#blue_bar .bar_text_container .bold_bar_text').text(jsonData.blue + '/' + jsonData.totalStudents);
    //
    //         //animate shaded bar across div
    //         $('#blue_bar .shaded_bar').animate({
    //             'width': 100 * (jsonData.totalStudents - jsonData.blue) / jsonData.totalStudents + '%'
    //         });
    //
    //
    //         //repeat for green
    //         $('#green_bar .bar_text_container .bold_bar_text').text(jsonData.green + '/' + jsonData.totalStudents);
    //
    //         //animate shaded bar across div
    //         $('#green_bar .shaded_bar').animate({
    //             'width': 100 * (jsonData.totalStudents - jsonData.green) / jsonData.totalStudents + '%'
    //         });
    //
    //
    //         //repeat for yellow
    //         $('#yellow_bar .bar_text_container .bold_bar_text').text(jsonData.yellow + '/' + jsonData.totalStudents);
    //
    //         //animate shaded bar across div
    //         $('#yellow_bar .shaded_bar').animate({
    //             'width': 100 * (jsonData.totalStudents - jsonData.yellow) / jsonData.totalStudents + '%'
    //         });
    //
    //
    //         //repeat for red
    //         $('#red_bar .bar_text_container .bold_bar_text').text(jsonData.red + '/' + jsonData.totalStudents);
    //
    //         //animate shaded bar across div
    //         $('#red_bar .shaded_bar').animate({
    //             'width': 100 * (jsonData.totalStudents - jsonData.red) / jsonData.totalStudents + '%'
    //         });
    //     });
    // };
    // //puts the function on a NAMED timer, name must be same for each updater.
    // setNamedInterval('TeacherOverview', TeacherOverviewUpdater, 1000);
</script>
