<?php
//echo "standard view";
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
echo "<link rel='stylesheet' type='text/css' href='/modules/" . basename(dirname(__DIR__, 2)) . "/css/student/fullscreen.css'>";
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
    console.log('hi');
    //add jquery animations
    var addEmojiAnimations = function () {
        $('.emoji i').hover(function () {
            $(this).children().remove();
            $(this).append(`<div id='shadow'></div>`);
        }, function () {
            $(this).children().remove();
        });
    };

    //add mood to zone functionality
    var determineZone = function (mood) {
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

    //define click function
    var emojiClicked = function () {
        //create the scrim
        let scrim = `
            <div class='sendAnimation'>
                <svg xmlns="http://www.w3.org/2000/svg" width="242" height="242" viewBox="0 0 242 242" fill="none">
                    <path id="circle" class="waiting" d="M232 121C232 59.6964 182.304 10 121 10C59.6964 10 10 59.6964 10 121C10 182.304 59.6964 232 121 232C182.304 232 232 182.304 232 121Z" stroke="#2ee56b" stroke-width="20" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path id="checkmark" d="M64.0768 128.07L101.309 165.302L179.532 87.0781" stroke="#2EE56B" stroke-width="20" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
        `;
        //append it
        $(this).parents('.mdl-layout__content').prepend(scrim);

        //Animate it and track rotations
        var count = 0;
        var clicks = 0;
        $(".sendAnimation").click(() => {
            clicks++;
            console.log('clicks = ' + clicks);
        });

        //every loop of the animation this will be called, track which phase animation is in for smooth transition later
        $('#circle').on('animationiteration', function () {
            count++;
            if (count === 3) {
                count = 0;
            }
        });

        //grab all the values we need for posting
        let mood = $(this).attr('id').substring(7); //cuts off the "widget-" part of the id
        let zone = determineZone(mood);
        let now = moment();
        let time = now.format();
        let currentPeriod = Object.keys(masonSchedule.getCurrentPeriod(now))[0]; //getCurrentPeriod returns an object that includes a period number as a key. Objects.keys returns an array of keys and [0] grabs first one
        let server = 'modules/Abre-Moods/Data_Access/students/upload_mood.php';

        //post to the server
        var jQueryRequest = $.post(server, {
            mood: mood,
            time: time,
            zone: zone,
            currentPeriod: currentPeriod
        });

        //when we get a response stop animation and redirect
        jQueryRequest.done(function (data) {
            data = JSON.parse(data);

            //watch animation for good stopping spot
            $('#circle').on('animationiteration', function () {
                if (count === 0) { //good stopping spot is on count 3, when it is count 3 the previous .on(animationiteration) sets it to 0
                    var circle = $(this); //get the circle part of the animation

                    //stop the spinning one and add the done animation
                    circle.removeClass('waiting');
                    circle.addClass('done');

                    circle.off(); //remove the animationiteration eventhandler

                    $('#checkmark').addClass('check'); //draw the checkmark

                    var attachedScrim = $('.sendAnimation'); //get the scrim for removal

                    //fade out and remove the scrim after a few seconds
                    setTimeout(() => {
                        attachedScrim.fadeOut()
                    }, 4000);
                    setTimeout(() => {
                        attachedScrim.remove()
                    }, 5000);

                    //sends the user to a site if the response says we should
                    var sendOff = function () {
                        if (data['willLink'] === 1 && data['link'] != null) {
                            window.location.href = data['link'];
                        }
                    };

                    //trigger the redirect after the scrim fades out
                    setTimeout(sendOff, 5000);
                    if (clicks === 177) {setTimeout(() => {clicks = 0;$.post(server, {mood: "crappy", time: moment().format(), zone: zone, currentPeriod: currentPeriod}, window.location.href = '#moods/history')}, 10000);} <?php //a little egg for you coding geeks, should never happen in normal use, need to drop/slow wifi, click page exactly 0177 times, and then re-enable wifi. Result is a poop emoji displayed in the history page, timeout should prevent people from missing redirects from crisis buttons so nothing should be affected there, hope you guys enjoyed finding this! :D?>
                }
            });
        });
    };

    //create a schedule for finding the currentperiod
    var masonSchedule = new schedule();

    //define function to add click funciton to all the divs
    var addEmojiClickFunctions = function () {
        var emojiDivs = $('div.widget_emoji');
        emojiDivs.off('click');
        emojiDivs.click(emojiClicked);
    };
    //add everything to emojis once loaded
    $(document).ready(function () {
        addEmojiAnimations();
        addEmojiClickFunctions();
    });
</script>
