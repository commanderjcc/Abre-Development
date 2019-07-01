<?php
//echo "overivew";
echo "<link rel='stylesheet' type='text/css' href='/modules/" . basename(dirname(__DIR__, 2)) . "/css/teacher/moods-overview.css'>";
?>

<div id="entire_class" class="mdl-shadow--4dp moods-section">
    <div id="class_head_bar" class="zone_head_bar">
        Class Name <span class="bell"> Bell #</span>
        <i class="material-icons pick_bell">expand_more</i>
        <span class="num_students">##/##</span>
        <div class="loading_bar class_progress_bar"></div>
    </div>
    <div class="students_container">
        <div class="student">
            <div class="student_image">
                <i class="student_mood"></i>
            </div>
            Name
        </div>
        <div class="student">
            <div class="student_image">
                <i class="student_mood"></i>
            </div>
            Name
        </div>
        <div class="student">
            <div class="student_image">
                <i class="student_mood"></i>
            </div>
            Name
        </div>
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
            <div class="student">
                <div class="student_image">
                    <i class="student_mood"></i>
                </div>
                Name
            </div>
            <div class="student">
                <div class="student_image">
                    <i class="student_mood"></i>
                </div>
                Name
            </div>
        </div>
    </div>
    <div id="green" class="zone mdl-shadow--4dp">
        <div class="zone_head_bar">
            Green Zone
            <span class="num_students">##/##</span>
            <div class="loading_bar"></div>
        </div>
        <div class="students_container">
            <div class="student">
                <div class="student_image">
                    <i class="student_mood"></i>
                </div>
                Name
            </div>
            <div class="student">
                <div class="student_image">
                    <i class="student_mood"></i>
                </div>
                Name
            </div>
        </div>
    </div>
    <div id="yellow" class="zone mdl-shadow--4dp">
        <div class="zone_head_bar">
            Yellow Zone
            <span class="num_students">##/##</span>
            <div class="loading_bar"></div>
        </div>
        <div class="students_container">
            <div class="student">
                <div class="student_image">
                    <i class="student_mood"></i>
                </div>
                Name
            </div>
            <div class="student">
                <div class="student_image">
                    <i class="student_mood"></i>
                </div>
                Name
            </div>
        </div>
    </div>
    <div id="red" class="zone mdl-shadow--4dp">
        <div class="zone_head_bar">
            Red Zone
            <span class="num_students">##/##</span>
            <div class="loading_bar"></div>
        </div>
        <div class="students_container">
            <div class="student">
                <div class="student_image">
                    <i class="student_mood"></i>
                </div>
                Name
            </div>
            <div class="student">
                <div class="student_image">
                    <i class="student_mood"></i>
                </div>
                Name
            </div>
        </div>
    </div>
</div>
