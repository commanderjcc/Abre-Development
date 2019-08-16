<?php

/*
	* Copyright (C) 2019 Mason City Schools
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

//required verification files
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
require_once(dirname(__FILE__) . '/../../permissions.php');?>

<script type="text/javascript">
    var selectedClass = 0;

    //contains a schedule for mason, so you'll probably need to adapt it to other schools
    class schedule {
        now; //a moment() for right now
        day; //the day of the week
        hour; //current hour
        minute; //current minute
        startTimes = { //starting times for each period, here 'starting' times are defined as when the last period is over (passing periods count as the next period)
            0: [
                {7: moment().day(-2).hour(13).minute(38).seconds(0)},
                {1: moment().day(1).hour(7).minute(30).seconds(0).seconds(0)},
            ],
            1: [
                {7: moment().day(-2).hour(13).minute(38).seconds(0).seconds(0)},
                //need last class of previous day in 0th position to check if its before school in morning
                //moments are calculated from the end of the class before them
                {1: moment().day(1).hour(7).minute(30).seconds(0)},
                {2: moment().day(1).hour(8).minute(35).seconds(0)},
                {3: moment().day(1).hour(9).minute(27).seconds(0)},
                {4: moment().day(1).hour(10).minute(19).seconds(0)},
                {5: moment().day(1).hour(11).minute(54).seconds(0)},
                {6: moment().day(1).hour(12).minute(46).seconds(0)},
                {7: moment().day(1).hour(13).minute(38).seconds(0)},
            ],
            2: [
                {7: moment().day(1).hour(13).minute(38).seconds(0)},
                //need last class of previous day
                {1: moment().day(2).hour(7).minute(30).seconds(0)},
                {3: moment().day(2).hour(8).minute(55).seconds(0)},
                {4: moment().day(2).hour(10).minute(10).seconds(0)},
                {6: moment().day(2).hour(12).minute(0).seconds(0)},
                {7: moment().day(2).hour(13).minute(15).seconds(0)},
            ],
            3: [
                {7: moment().day(2).hour(13).minute(15).seconds(0)},
                //need last class of previous day
                {2: moment().day(3).hour(7).minute(30).seconds(0)},
                {5: moment().day(3).hour(8).minute(55).seconds(0)},
                {3: moment().day(3).hour(10).minute(10).seconds(0)},
                {'connect1': moment().day(3).hour(12).minute(0).seconds(0)},
                {'connect2': moment().day(3).hour(12).minute(40).seconds(0)},
                {6: moment().day(3).hour(13).minute(15).seconds(0)},

            ],
            4: [
                {6: moment().day(3).hour(13).minute(15).seconds(0)},
                //need last class of previous day
                {1: moment().day(4).hour(7).minute(30).seconds(0)},
                {2: moment().day(4).hour(8).minute(55).seconds(0)},
                {4: moment().day(4).hour(10).minute(10).seconds(0)},
                {5: moment().day(4).hour(12).minute(0).seconds(0)},
                {7: moment().day(4).hour(13).minute(15).seconds(0)},
            ],
            5: [
                {7: moment().day(4).hour(13).minute(15).seconds(0)},
                //need last class of previous day
                {1: moment().day(5).hour(7).minute(30).seconds(0)},
                {2: moment().day(5).hour(8).minute(35).seconds(0)},
                {3: moment().day(5).hour(9).minute(27).seconds(0)},
                {4: moment().day(5).hour(10).minute(19).seconds(0)},
                {5: moment().day(5).hour(11).minute(54).seconds(0)},
                {6: moment().day(5).hour(12).minute(46).seconds(0)},
                {7: moment().day(5).hour(13).minute(38).seconds(0)},
            ],
            6: [
                {7: moment().day(5).hour(13).minute(38).seconds(0)},
                {1: moment().day(8).hour(7).minute(30).seconds(0)},
            ]
        };

        constructor() {
            this.update();//initialize all values
            selectedClass = parseInt(Object.keys(this.getCurrentPeriod(this.now))[0]); //set selected class to be the current class
        }

        update(when = moment()) { //updates all the times to be current
            this.now = when;
            this.day = this.now.day();
            this.hour = this.now.hour();
            this.minute = this.now.minute();

        }

        getCurrentPeriod(when = moment()) {
            this.update(when);
            //for each of the start times of today
            var output;
            this.startTimes[this.day].forEach((periodObj, slot, day) => {
                var selectedPeriod;
                var nextPeriod;
                // if the next slot will be outside of the number of slots for the day then dont compare
                if (slot + 1 !== day.length) {
                    //get the period in that slot, have to use this weird method bc we dont know the period
                    for (var period in periodObj) {
                        if (periodObj.hasOwnProperty(period)) {
                            selectedPeriod = periodObj[period];
                        }
                    }
                    //get the next period in that slot, have to use this weird method bc we dont know the period
                    for (var next in day[slot + 1]) {
                        if (day[slot + 1].hasOwnProperty(next)) {
                            nextPeriod = day[slot + 1][next];
                        }
                    }
                } else {
                    //get the period in that slot, have to use this weird method bc we dont know the period
                    for (var period in periodObj) {
                        if (periodObj.hasOwnProperty(period)) {
                            selectedPeriod = periodObj[period];
                        }
                    }

                    var currentDay = this.day;
                    if (this.day === 6) {
                        currentDay = -1; //used to wrap the week around to the front, use -1 bc when you add 1 later its 0
                    }

                    //get the first class of the next day
                    for (var next in this.startTimes[currentDay + 1][1]) {
                        if (this.startTimes[currentDay + 1][1].hasOwnProperty(next)) {
                            nextPeriod = this.startTimes[currentDay + 1][1][next];
                        }
                    }
                }
                //if we are currently between the selectedPeriod and the start of the next period, then we must
                //be in the selectedPeriod so return the object containing the period number and the period times
                if (this.now.isBetween(selectedPeriod, nextPeriod)) {
                    output = periodObj;
                }
            });
            return output;
        }

        getSlotStart(slot, day = this.day) { //used to get the time that a 'slot' or one of the class blocks of that day starts
            return this.startTimes[day][slot]
        }

        getPeriodStart(period, day = this.day) {
            var available = this.startTimes[day];
            var output;
            available.forEach((periodObj, slot) => { //loop through all the 'slots' aka blocks
                if (slot !== 0) { //omit the first one, which is from yesterday and isn't important
                    for (var periodProp in periodObj) { //loop through all the properties
                        if (periodObj.hasOwnProperty(periodProp)) {
                            if (periodProp == period) { //if that period exists (not every day has every period) return it
                                output = periodObj;
                            }
                        }
                    }
                }
            });
            return output
        }

        //this is a boolean test for if the lastupdate of the mood was in this period
        isAfterPeriodStart(updateTime, periodStart = this.getCurrentPeriod()) {
            return updateTime.isAfter(periodStart);
        }
    }
<?php if($isStaff) { //only allow access to dataManager class if they are a teacher?>
    class dataManager {
        parsedStudentData = {}; //a data object with the student data
        sortedStudentData = { //data object with the student data sorted by zone
            'unanswered': [],
            'blue': [],
            'green': [],
            'yellow': [],
            'red': [],
            'crisis': [],
        };
        rawStudentData = {}; //raw data used for quick testing for updates
        classes = {}; //the available classes for the teachers

        static isEquivalent(a, b) { //used to test equivalence later
            if (a == null || b == null || a == undefined || b == undefined) {
                return false //return false for any null, undef values
            }

            // Create arrays of property names
            var aProps = Object.getOwnPropertyNames(a);
            var bProps = Object.getOwnPropertyNames(b);

            // If number of properties is different,
            // objects are not equivalent
            if (aProps.length != bProps.length) {
                return false;
            }

            var areEqual = true;
            aProps.forEach((propName) => {
                // If values of same property are not equal,
                // objects are not equivalent
                if (a[propName] !== b[propName]) {
                    areEqual = false;
                }
            });

            // If we made it this far, objects
            // are considered equivalent
            return areEqual;
        }

        //used to convert moods into zones
        static determineZone(mood) {
            switch (mood) {
                case "meh":
                case "sad":
                case "down":
                case "allergic":
                case "sick":
                case "tired":
                    return "blue";
                case "happy":
                case "thrilled":
                case "okay":
                case "crappy":
                    return "green";
                case "stressed":
                case "worried":
                case "annoyed":
                case "frustrated":
                    return "yellow";
                case "scared":
                case "angry":
                    return "red";
                case "wants_to_speak_up":
                case "needs_help":
                case "needs_to_talk":
                    return "crisis";
            }
        };

        constructor() {
            this.updateClasses(); //get classes
            this.updateData(); //fetch data for first class
        }

        updateClasses() {
            //post to get_classes and wait for response
            var jqxhr = $.post('/modules/Abre-Moods/data_access/teachers/get_classes.php');

            //Used arrow function here, allows for 'this' to reference the dataManager class instead of the funciton call
            jqxhr.done(data => {
                this.classes = JSON.parse(data); //store response as classes
                $('#class_picker .class_name').html(this.classes[selectedClass]); //update the page with the new class
                $('#class_picker .bell').html('Bell '+(selectedClass));
            });

        }

        classChanged() {
            this.parsedStudentData = {}; //reset all the data to be empty
            this.sortedStudentData = {
                'unanswered': [],
                'blue': [],
                'green': [],
                'yellow': [],
                'red': [],
                'crisis': [],
            };
            this.rawStudentData = '';
            $('.student').remove(); //remove all the students
            $('#class_picker .class_name').html(this.classes[selectedClass]); //update the title with the new class
            $('#class_picker .bell').html('Bell '+(selectedClass)); //change the bell number
        }

        updateData() { //used to fetch all the data
            var jqxhr = $.post('/modules/Abre-Moods/data_access/teachers/get_all_students_status.php', {
                "bell": selectedClass //need to add 1 to selectedClass because its zero based
            });
            //Same here with the arrow function, it makes everything easier
            jqxhr.done(data => {
                if (data === this.rawStudentData) {
                    //do nothing bc the data hasn't changed yet
                } else {
                    //data has changed so we need to figure out what has changed
                    var tempData = JSON.parse(data); //convert the text to JSON
                    for (var studentID in tempData) { //Look at each student
                        if (tempData.hasOwnProperty(studentID)) {
                            if (!dataManager.isEquivalent(tempData[studentID], this.parsedStudentData[studentID])) { //if the student hasn't updated then you can skip it
                                //now we need update the student's data

                                //determining which zone they'll be in
                                var zone; // the zone of the student
                                var lastUpdateMoment = moment(tempData[studentID]['time']); //gets the time the student last posted a mood
                                var selectedPeriodStartTime = masonSchedule.getPeriodStart(selectedClass); //get the time the period started, add one so the selected class matches the appearance-based naming of the classes
                                if (masonSchedule.isAfterPeriodStart(lastUpdateMoment, selectedPeriodStartTime)) { //did the student update after the period started
                                    zone = tempData[studentID]['zone']; //they updated after the start of the period so their response is sorted
                                } else {
                                    zone = 'unanswered'; //they havent sumbitted a mood yet so they are unanswered and dont count towards numbers incrementing
                                }

                                //we need to remove them from their old zone
                                var containers = Object.getOwnPropertyNames(this.sortedStudentData); //get the zone containers from the sorted data object
                                containers.forEach((zoneArr)=>{
                                    //remove student from other zones, have to search them all...
                                    this.sortedStudentData[zoneArr].forEach((foundStudent, foundLocation, array)=>{
                                        if(foundStudent.hasOwnProperty(studentID)) { //if they share student IDs then...
                                            array.splice(foundLocation, 1); //remove the student from that array
                                        }
                                    });
                                });
                                this.sortedStudentData[zone][this.sortedStudentData[zone].length] = {[studentID]: tempData[studentID]}; //add the student to the correct zone
                                this.parsedStudentData[studentID] = tempData[studentID]; //add the student to the unsorted parsed data
                                this.updateLocation(studentID,zone); //update the student's visuals
                            }
                        }
                    }
                    this.rawStudentData = data; //set the raw datas equal so we can compare them later for changes
                    this.displayData(); //update the visuals
                }
            });
        }


        displayData() {
            this.updateDisplayBars(); //update the bars animating across
            this.updateDisplayNums(); //update the numbers
        }

        updateDisplayBars() {
            var data = this.sortedStudentData;
            var total = data['unanswered'].length + data['blue'].length + data ['green'].length + data['yellow'].length + data['red'].length + data['crisis'].length;
            //animate total bar
            $('.class_progress_bar').animate({'width': 100 * (data['unanswered'].length) / total + '%'});
            //animate blue bar
            $('#blue .loading_bar').animate({'width': 100 * (total - data['blue'].length) / total + '%'}); //have to subtract bc it animates from right to left
            //animate green bar
            $('#green .loading_bar').animate({'width': 100 * (total - data['green'].length) / total + '%'});
            //animate yellow bar
            $('#yellow .loading_bar').animate({'width': 100 * (total - data['yellow'].length) / total + '%'});
            //animate red bar
            $('#red .loading_bar').animate({'width': 100 * (total - data['red'].length) / total + '%'});
        }

        updateDisplayNums() {
            var data = this.sortedStudentData;
            var total = data['unanswered'].length + data['blue'].length + data ['green'].length + data['yellow'].length + data['red'].length + data['crisis'].length;
            //update class
            console.log('total: ' + total);
            $('#class_head_bar span.num_students').text(total - data['unanswered'].length + "/" + total);
            //update blue
            $('#blue .num_students').text(data['blue'].length + "/" + total);
            //update green
            $('#green .num_students').text(data['green'].length + "/" + total);
            //update yellow
            $('#yellow .num_students').text(data['yellow'].length + "/" + total);
            //update red
            $('#red .num_students').text(data['red'].length + "/" + total);
        }

        updateLocation(studentID,zone) {
            let data = this.sortedStudentData;
            let containers = { //get all the jquery objects we'll need
                'unanswered': $('#entire_class .students_container'),
                'blue' : $('#blue .students_container'),
                'green' : $('#green .students_container'),
                'yellow' : $('#yellow .students_container'),
                'red' : $('#red .students_container'),
                'crisis': $('#red .students_container'),
            };

            let studentGroup = $('#' + studentID); //look for any existing people
            let studentData = this.parsedStudentData[studentID]; //getting the data we'll need
            let mood = studentData['mood'];
            if (studentGroup.length === 1) { //if one exists,
                studentGroup.detach().appendTo(containers[zone]); //move it to the new zone
                let moodImg = studentGroup.find('.student_mood'); //find emoji
                let previousMood = moodImg.attr('class').split(' ').pop();//find previous mood class
                moodImg.removeClass(previousMood); //remove previous class
                moodImg.addClass('twa-'+mood); // add the new class

            } else {
                studentGroup.remove();// if there were more than one, remove them something's glitched and we'll reset
                let studentLayout = [ //studentClicked.bind(this)() calls the studentClicked function in overview.php, the bind(this) set the this for the function to the object, () calls the function after binding
                    `<div id="`, `" class='student' onclick="studentClicked.bind(this)()">
                    <div style="background-image: url('`, `')" class="student_image">
                        <i class="student_mood twa twa-3x twa-`, `"></i>
                    </div>
                        <span class='student_name'>`, `</span>
                </div>`
                ];
                var createStudent = function (studentId, imgURL, mood, name) { //contatonates all the stuff we need for a working student
                    return studentLayout[0] + studentId + studentLayout[1] + imgURL + studentLayout[2] + mood + studentLayout[3] + name + studentLayout[4]
                };
                let photo = this.parsedStudentData[studentID]['photo']; //getting more of the data we'll need
                let name = this.parsedStudentData[studentID]['name'];
                containers[zone].append(createStudent(studentID, photo, mood, name)); //append a student in the correct zone.
            }
        }
    }
<?php } ?>
</script>
