<?php
//echo "standard view";
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
echo "<link rel='stylesheet' type='text/css' href='/modules/".basename(dirname(__DIR__,2))."/css/student/fullscreen.css'>";
?>
<div class="page_container mdl-shadow--4dp">
    <div id="normal_emoji_container" class="centered_container">
        <div class="centered_container no_padding">
            <div class="centered_container no_padding">
                <div class="emoji centered_container vertical no_padding">
                    <div id='widget_happy' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-happy'></i>
                        Happy
                    </div>
                    <div id='widget_okay' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-okay'></i>
                        Okay
                    </div>
                    <div id='widget_down' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-down'></i>
                        Down
                    </div>
                </div>
                <div class='emoji centered_container vertical no_padding'>
                    <div id='widget_thrilled' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-thrilled'></i>
                        Thrilled
                    </div>
                    <div id='widget_meh' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-meh'></i>
                        Meh
                    </div>
                    <div id='widget_sad' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-sad'></i>
                        Sad
                    </div>
                </div>
            </div>
            <div>
                <div class='emoji centered_container no_padding'>
                    <div id='widget_stressed' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-stressed'></i>
                        Stressed
                    </div>
                    <div id='widget_worried' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-worried'></i>
                        Worried
                    </div>
                    <div id='widget_scared' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-scared'></i>
                        Scared
                    </div>
                </div>
                <div class='emoji centered_container no_padding'>
                    <div id='widget_annoyed' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-annoyed'></i>
                        Annoyed
                    </div>
                    <div id='widget_angry' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-angry'></i>
                        Angry
                    </div>
                    <div id='widget_frustrated' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-frustrated'></i>
                        Frustrated
                    </div>
                </div>
                <div class='emoji centered_container no_padding'>
                    <div id='widget_allergic' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-allergic'></i>
                        Allergic
                    </div>
                    <div id='widget_sick' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-sick'></i>
                        Sick
                    </div>
                    <div id='widget_tired' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-tired'></i>
                        Tired
                    </div>
                </div>
            </div>
        </div>
        <div class="normal-help">
            <div class='emoji centered_container vertical no_padding'>
                <div id='widget_wants_to_speak_up' class='emoji widget_emoji'>
                    <i class='twa twa-8x twa-wants_to_speak_up'></i>
                    Speak Up
                </div>
                <div id='widget_needs_help' class='emoji widget_emoji'>
                    <i class='twa twa-8x twa-needs_help'></i>
                    I need help
                </div>
                <div id="widget_needs_to_talk" class='emoji widget_emoji'>
                    <i class='twa twa-8x twa-needs_to_talk'></i>
                    I need to talk
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    //add jquery animations
    var addEmojiAnimations = function() {
        $('.emoji i').hover(function(){
            $(this).children().remove();
            $(this).append(`<div id='shadow'></div>`);
        },function(){
            $(this).children().remove();
        });
    };
    //define click function
    var determineZone = function(mood) {
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

    //define click function
    var emojiClicked = function() {
        let mood = $(this).attr('id').substring(7);
        let zone = determineZone(mood);
        let d = new Date();
        let time = d.toISOString();
        let currentPeriod = Object.keys(masonSchedule.getCurrentPeriod(now))[0]; //getCurrentPeriod returns an object that includes a period number as a key. Objects.keys returns an array of keys and [0] grabs first one
        console.log('posting with mood: ' + mood + ', zone: ' + zone + ', time: ' + time);
        var jQueryRequest = $.post('modules/Abre-Moods/Data_Access/students/upload_mood.php', {mood:mood,time:time,zone:zone,currentPeriod:currentPeriod});
        jQueryRequest.done(function(data) {
            //log data to console for testing, can remove for production
            console.log(data);
            data = JSON.parse(data);
            console.log(data);
            if(data['willLink']===1 && data['link']!= null) {
                window.location.href = data['link'];
            }
        });
    };

    var masonSchedule = new schedule();

    //define function to add click funciton to all the divs
    var addEmojiClickFunctions = function(){
        var emojiDivs = $('div.widget_emoji');
        emojiDivs.off('click');
        emojiDivs.click(emojiClicked);
    };
    $(document).ready(function(){
        addEmojiAnimations();
        addEmojiClickFunctions();
    });
</script>
