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
    selectedClass = Object.keys(masonSchedule.getCurrentPeriod(now))[0]; //set the selectedClass to the current period
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
            closeDropdown() //if the person clicks off the page, close the dropdown
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

    var studentClicked = function() {
        console.log(this.id);
        window.location = '/#moods/student/' + this.id;
    };


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
