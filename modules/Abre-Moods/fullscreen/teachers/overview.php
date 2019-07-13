<?php
//echo "overivew";
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
echo "<link rel='stylesheet' type='text/css' href='/modules/" . basename(dirname(__DIR__, 2)) . "/css/teacher/moods-overview.css'>";
?>

<div id="entire_class" class="zone mdl-shadow--4dp moods-section">
    <div id="class_head_bar" class="zone_head_bar">
        <div id="class_picker" class="">
            <span class="class_name">Test Class</span><span class="bell">Bell #</span>
            <i class="material-icons pick_bell">expand_more</i>
        </div>

        <span class="num_students">##/##</span>
        <div class="loading_bar class_progress_bar"></div>
    </div>
    <div class="students_container">

    </div>
</div>
<div id="zone_information" class="moods-section centered_container no_padding">
    <div id="blue" class="zone mdl-shadow--4dp">
        <div class="zone_head_bar">
            Blue Zone
            <span class="num_students">##/##</span>
            <div class="loading_bar"></div>
        </div>
        <div class="students_container">

        </div>
    </div>
    <div id="green" class="zone mdl-shadow--4dp">
        <div class="zone_head_bar">
            Green Zone
            <span class="num_students">##/##</span>
            <div class="loading_bar"></div>
        </div>
        <div class="students_container">

        </div>
    </div>
    <div id="yellow" class="zone mdl-shadow--4dp">
        <div class="zone_head_bar">
            Yellow Zone
            <span class="num_students">##/##</span>
            <div class="loading_bar"></div>
        </div>
        <div class="students_container">

        </div>
    </div>
    <div id="red" class="zone mdl-shadow--4dp">
        <div class="zone_head_bar">
            Red Zone
            <span class="num_students">##/##</span>
            <div class="loading_bar"></div>
        </div>
        <div class="students_container">


        </div>
    </div>
</div>
<script type="text/javascript">
    var selectedClass = 0;

    var layout = `<div class="student">
                      <div class="student_image">
                          <i class="student_mood"></i>
                      </div>
                      Name
                  </div>`;

    var closeDropdown = function () {
        $('.select_dropdown').remove();
        $('.click_catcher').remove();
        $('.pick_bell').removeClass('dd_active').addClass('dd_inactive');
    };

    var createClassDropdown = function (options) {
        var layout = [`<div class='class_select_dropdown' data-index="`, `">
                        <span class="class_name">`, `</span><span class="bell">Bell `, `</span>
                      </div>`];

        $('#class_head_bar').after(`<div class="select_dropdown mdl-shadow--4dp"></div>`);
        $('.mdl-layout__content').append(`<div class='click_catcher'></div>`);
        $('.click_catcher').click(function () {
            closeDropdown()
        });
        options.forEach(function (element, index) {
            $('.select_dropdown').append(layout[0] + (index + 1) + layout[1] + element + layout[2] + (index + 1) + layout[3]);
        });

        $('.class_select_dropdown').click(function () {
            selectedClass = $(this).data('index') - 1;
            closeDropdown();
            pageDataManager.classChanged();
            pageDataManager.updateData();
        });
    };

    class schedule {
        now;
        day;
        hour;
        minute;
        startTimes = {
            0: [
                {7: moment().day(-2).hour(13).minute(38)},
                {1: moment().day(1).hour(7).minute(30)},
            ],
            1: [
                {7: moment().day(-2).hour(13).minute(38)},
                //need last class of previous day in 0th position to check if its before school in morning
                //moments are calculated from the end of the class before them
                {1: moment().day(1).hour(7).minute(30)},
                {2: moment().day(1).hour(8).minute(35)},
                {3: moment().day(1).hour(9).minute(27)},
                {4: moment().day(1).hour(10).minute(19)},
                {5: moment().day(1).hour(11).minute(54)},
                {6: moment().day(1).hour(12).minute(46)},
                {7: moment().day(1).hour(13).minute(38)},
            ],
            2: [
                {7: moment().day(1).hour(13).minute(38)},
                //need last class of previous day
                {1: moment().day(2).hour(7).minute(30)},
                {3: moment().day(2).hour(8).minute(55)},
                {4: moment().day(2).hour(10).minute(10)},
                {6: moment().day(2).hour(12).minute(0)},
                {7: moment().day(2).hour(13).minute(15)},
            ],
            3: [
                {7: moment().day(2).hour(13).minute(15)},
                //need last class of previous day
                {2: moment().day(3).hour(7).minute(30)},
                {5: moment().day(3).hour(8).minute(55)},
                {3: moment().day(3).hour(10).minute(10)},
                {'connect1': moment().day(3).hour(12).minute(0)},
                {'connect2': moment().day(3).hour(12).minute(40)},
                {6: moment().day(3).hour(13).minute(15)},

            ],
            4: [
                {6: moment().day(3).hour(13).minute(15)},
                //need last class of previous day
                {1: moment().day(4).hour(7).minute(30)},
                {2: moment().day(4).hour(8).minute(55)},
                {4: moment().day(4).hour(10).minute(10)},
                {5: moment().day(4).hour(12).minute(0)},
                {7: moment().day(4).hour(13).minute(15)},
            ],
            5: [
                {7: moment().day(4).hour(13).minute(15)},
                //need last class of previous day
                {1: moment().day(5).hour(7).minute(30)},
                {2: moment().day(5).hour(8).minute(35)},
                {3: moment().day(5).hour(9).minute(27)},
                {4: moment().day(5).hour(10).minute(19)},
                {5: moment().day(5).hour(11).minute(54)},
                {6: moment().day(5).hour(12).minute(46)},
                {7: moment().day(5).hour(13).minute(38)},
            ],
            6: [
                {7: moment().day(5).hour(13).minute(38)},
                {1: moment().day(8).hour(7).minute(30)},
            ]
        };

        constructor() {
            this.update();
        }

        update(when = moment()) {
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
                        currentDay = -1;
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

        getSlotStart(slot, day = this.day) {
            return this.startTimes[day][slot]
        }

        getPeriodStart(period, day = this.day) {
            var available = this.startTimes[day];
            var output;
            available.forEach((periodObj, slot) => {
                if (slot !== 0) {
                    for (var periodProp in periodObj) {
                        if (periodObj.hasOwnProperty(periodProp)) {
                            if (periodProp == period) {
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

    class dataManager {
        parsedStudentData = {};
        sortedStudentData = {
            'unanswered': [],
            'blue': [],
            'green': [],
            'yellow': [],
            'red': [],
            'crisis': [],
        };
        rawStudentData = {};
        classes = [];

        static isEquivalent(a, b) {
            if (a == null || b == null || a == undefined || b == undefined) {
                return false
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

            this.updateClasses();
            this.updateData();
        }

        updateClasses() {
            var tempClasses;
            var jqxhr = $.post('/modules/Abre-Moods/data_access/teachers/get_classes.php');

            //Used arrow function here, allows for 'this' to reference the dataManager class instead of the funciton call
            jqxhr.done(data => {
                console.log(data);
                tempClasses = JSON.parse(data);
                this.classes = tempClasses;
                $('#class_picker .class_name').html(this.classes[selectedClass]);
                $('#class_picker .bell').html('Bell '+(selectedClass+1));
            });

        }

        classChanged() {
            this.parsedStudentData = {};
            this.sortedStudentData = {
                'unanswered': [],
                'blue': [],
                'green': [],
                'yellow': [],
                'red': [],
                'crisis': [],
            };
            this.rawStudentData = '';
            $('.student').remove();
            $('#class_picker .class_name').html(this.classes[selectedClass]);
            $('#class_picker .bell').html('Bell '+(selectedClass+1));
        }

        updateData() {
            var jqxhr = $.post('/modules/Abre-Moods/data_access/teachers/get_all_students_status.php', {
                "amount": "full",
                "bell": selectedClass + 1
            });
            //Same here with the arrow function, it makes everything easier
            jqxhr.done(data => {
                console.log('updating');
                //var tempData = JSON.parse(data);
                if (data === this.rawStudentData) {

                } else {
                    console.log('re-processing');
                    var tempData = JSON.parse(data);


                    for (var studentID in tempData) {
                        if (tempData.hasOwnProperty(studentID)) {
                            if (!dataManager.isEquivalent(tempData[studentID], this.parsedStudentData[studentID])) {
                                var zone;
                                var lastUpdateMoment = moment(tempData[studentID]['time']);
                                //add one so the selected class matches the appearance-based naming of the classes
                                var selectedPeriodStartTime = masonSchedule.getPeriodStart(selectedClass + 1);
                                if (masonSchedule.isAfterPeriodStart(lastUpdateMoment, selectedPeriodStartTime)) {
                                    zone = tempData[studentID]['zone'];

                                } else {
                                    zone = 'unanswered';
                                }
                                var containers = Object.getOwnPropertyNames(this.sortedStudentData);
                                containers.forEach((zoneArr)=>{
                                    //remove student from other zones, have to search them all...
                                    this.sortedStudentData[zoneArr].forEach((foundStudent, foundLocation, array)=>{
                                        if(foundStudent.hasOwnProperty(studentID)) {
                                            array.splice(foundLocation, 1);
                                        }
                                    });
                                });
                                    this.sortedStudentData[zone][this.sortedStudentData[zone].length] = {[studentID]: tempData[studentID]};
                                this.parsedStudentData[studentID] = tempData[studentID];
                                this.updateLocation(studentID,zone);
                            } //else do nothing
                        }
                    }
                    //this.parsedStudentData = tempData;
                    this.rawStudentData = data;
                    this.displayData();
                }
            });
        }


        displayData() {
            this.updateDisplayBars();
            this.updateDisplayNums();
            //this.updatePeopleLocations();
        }

        updateDisplayBars() {
            var data = this.sortedStudentData;
            var total = data['unanswered'].length + data['blue'].length + data ['green'].length + data['yellow'].length + data['red'].length + data['crisis'].length;
            //animate total bar
            $('.class_progress_bar').animate({'width': 100 * (data['unanswered'].length) / total + '%'});
            //animate blue bar
            $('#blue .zone_head_bar .loading_bar').animate({'width': 100 * (total - data['blue'].length) / total + '%'});
            //animate green bar
            $('#green .zone_head_bar .loading_bar').animate({'width': 100 * (total - data['green'].length) / total + '%'});
            //
            $('#yellow .zone_head_bar .loading_bar').animate({'width': 100 * (total - data['yellow'].length) / total + '%'});
            //
            $('#red .zone_head_bar .loading_bar').animate({'width': 100 * (total - data['red'].length) / total + '%'});
        }

        updateDisplayNums() {
            var data = this.sortedStudentData;
            var total = data['unanswered'].length + data['blue'].length + data ['green'].length + data['yellow'].length + data['red'].length + data['crisis'].length;
            //update class
            console.log('total: ' + total);
            $('#class_head_bar span.num_students').text(total - data['unanswered'].length + "/" + total);
            //update blue
            $('#blue .zone_head_bar .num_students').text(data['blue'].length + "/" + total);
            //update green
            $('#green .zone_head_bar .num_students').text(data['green'].length + "/" + total);
            //update yellow
            $('#yellow .zone_head_bar .num_students').text(data['yellow'].length + "/" + total);
            //update red
            $('#red .zone_head_bar .num_students').text(data['red'].length + "/" + total);
        }

        updateLocation(studentID,zone) {
            let data = this.sortedStudentData;
            let containers = {
               'unanswered': $('#entire_class .students_container'),
                'blue' : $('#blue .students_container'),
                'green' : $('#green .students_container'),
                'yellow' : $('#yellow .students_container'),
                'red' : $('#red .students_container'),
                'crisis': $('#red .students_container'),
            };

            let studentGroup = $('#' + studentID);
            let studentData = this.parsedStudentData[studentID];
            let mood = studentData['mood'];
            if (studentGroup.length === 1) {
                studentGroup.detach().appendTo(containers[zone]);
                let moodImg = studentGroup.find('.student_mood');
                let previousMood = moodImg.attr('class').split(' ').pop();
                moodImg.removeClass(previousMood);
                moodImg.addClass('twa-'+mood);

            } else {
                studentGroup.remove();
                let studentLayout = [
                    `<div id="`, `" class='student'>
                    <div style="background-image: url('`, `')" class="student_image">
                        <i class="student_mood twa twa-3x twa-`, `"></i>
                    </div>
                        <span class='student_name'>`, `</span>
                </div>`
                ];
                var createStudent = function (studentId, imgURL, mood, name) {
                    return studentLayout[0] + studentId + studentLayout[1] + imgURL + studentLayout[2] + mood + studentLayout[3] + name + studentLayout[4]
                };
                let photo = this.parsedStudentData[studentID]['photo'];
                let name = this.parsedStudentData[studentID]['name'];
                containers[zone].append(createStudent(studentID, photo, mood, name));
            }
        }
    }

    var masonSchedule = new schedule();

    var pageDataManager = new dataManager();
    //Have to use .bind to set it to the correct object
    setNamedInterval("data", pageDataManager.updateData.bind(pageDataManager), 10000);

    $(document).ready(function () {
        $('.pick_bell').click(function () {
            var arrow = $(this);
            if (arrow.hasClass('dd_active')) {
                closeDropdown();
            } else {
                pageDataManager.updateClasses();
                arrow.removeClass('dd_inactive');
                arrow.addClass('dd_active');
                createClassDropdown(pageDataManager.classes);
            }
        });
    });
</script>
