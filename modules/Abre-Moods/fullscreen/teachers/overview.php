<?php
//echo "overivew";
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
//require_once(dirname(__FILE__) . '/../../data_access/teachers/dataManagement.php');
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
    var masonSchedule = new schedule(); //create schedule
    // console.log(selectedClass);
    // selectedClass = parseInt(Object.keys(masonSchedule.getCurrentPeriod())[0])-1; //set the selectedClass to the current period
    // console.log(selectedClass + 1);
    var pageDataManager = new dataManager(); //create a dataManager

    var closeDropdown = function () {  //remove dropdown
        $('.select_dropdown').remove(); //remove the dropdown part
        $('.click_catcher').remove(); //remove the div to catch clicks
        $('.pick_bell').removeClass('dd_active').addClass('dd_inactive'); //spin the arrow
    };

    var createClassDropdown = function (options) { //make a dropdown
        //create layout for the each dropdown pieces
        var layout = [`<div class='class_select_dropdown' data-index="`, `">
                        <span class="class_name">`, `</span><span class="bell">Bell `, `</span>
                      </div>`];

        $('#class_head_bar').after(`<div class="select_dropdown mdl-shadow--4dp"></div>`);//add the dropdown holder
        $('.mdl-layout__content').append(`<div class='click_catcher'></div>`);//add the click catcher
        $('.click_catcher').click(function () {
            closeDropdown() //if the person clicks off the dropdown selection, close the dropdown
        });
        Object.keys(options).forEach(function (period) { //for each period we have...
            //add a dropdown menu part
            $('.select_dropdown').append(layout[0] + (period) + layout[1] + options[period] + layout[2] + (period) + layout[3]);
        });

        $('.class_select_dropdown').click(function () { //add click function to all of them at once
            selectedClass = $(this).data('index'); //get the selected class with the data-index property
            closeDropdown();
            pageDataManager.classChanged(); //update the class data
            pageDataManager.updateData();
        });
    };

    var studentClicked = function() {
        console.log(this.id);
        window.location = '/#moods/student/' + this.id; //make students link to their history page
    };


    //Have to use .bind to set it to the correct object
    setNamedInterval("data", pageDataManager.updateData.bind(pageDataManager), 10000); //update every 10000ms

    $(document).ready(function () {
        $('.pick_bell').click(function () { //enable functionality on the downdown
            var arrow = $(this);
            if (arrow.hasClass('dd_active')) { //if dropdown is already open
                closeDropdown(); //close it
            } else { //open the dropdown
                pageDataManager.updateClasses(); //get the current classes
                arrow.removeClass('dd_inactive'); //switch to active
                arrow.addClass('dd_active');
                createClassDropdown(pageDataManager.classes); //make a dropdown with the classes
            }
        });
    });
</script>
