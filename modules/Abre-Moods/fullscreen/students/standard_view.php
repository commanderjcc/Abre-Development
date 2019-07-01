<?php
//echo "standard view";
?>
<div class="page_container mdl-shadow--4dp">
    <div id="normal_emoji_container" class="centered_container">
        <div class="centered_container no_padding">
            <div class="centered_container no_padding">
                <div class="emoji centered_container vertical no_padding">
                    <div id='widget_happy' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-slightly-smiling-face'></i>
                        Happy
                    </div>
                    <div id='widget_okay' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-neutral-face'></i>
                        Okay
                    </div>
                    <div id='widget_down' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-confused-face'></i>
                        Down
                    </div>
                </div>
                <div class='emoji centered_container vertical no_padding'>
                    <div id='widget_thrilled' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-beaming-face-with-smiling-eyes'></i>
                        Thrilled
                    </div>
                    <div id='widget_meh' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-expressionless-face'></i>
                        Meh
                    </div>
                    <div id='widget_sad' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-loudly-crying-face'></i>
                        Sad
                    </div>
                </div>
            </div>
            <div>
                <div class='emoji centered_container no_padding'>
                    <div id='widget_stressed' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-grimacing-face'></i>
                        Stressed
                    </div>
                    <div id='widget_worried' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-fearful-face'></i>
                        Worried
                    </div>
                    <div id='widget_scared' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-face-screaming-in-fear'></i>
                        Scared
                    </div>
                </div>
                <div class='emoji centered_container no_padding'>
                    <div id='widget_annoyed' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-unamused-face'></i>
                        Annoyed
                    </div>
                    <div id='widget_angry' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-angry-face'></i>
                        Angry
                    </div>
                    <div id='widget_frustrated' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-face-with-steam-from-nose'></i>
                        Frustrated
                    </div>
                </div>
                <div class='emoji centered_container no_padding'>
                    <div id='widget_allergic' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-sneezing-face'></i>
                        Allergic
                    </div>
                    <div id='widget_sick' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-face-with-thermometer'></i>
                        Sick
                    </div>
                    <div id='widget_tired' class='emoji widget_emoji'>
                        <i class='twa twa-8x twa-sleeping-face'></i>
                        Tired
                    </div>
                </div>
            </div>
        </div>
        <div class="normal-help">
            <div class='emoji centered_container vertical no_padding'>
                <div id='widget_speak_up' class='emoji widget_emoji'>
                    <i class='twa twa-8x twa-eye-in-speech-bubble'></i>
                    Speak Up
                </div>
                <div id='widget_needs_help' class='emoji widget_emoji'>
                    <i class='twa twa-8x twa-sos-button'></i>
                    I need help
                </div>
                <div id='widget_needs_talk' class='emoji widget_emoji'>
                    <i class='twa twa-8x twa-speech-balloon'></i>
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
    var emojiClicked = function() {
        let id = $(this).attr('id');
        let studentID = '69';
        console.log('posting with ' + id + ' and ' + studentID);
        var jQueryRequest = $.post('modules/Abre-Moods/data_access/students/upload_mood.php', {studentID:studentID,id:id}, function(data) {
            //log data to console for testing, can remove for production
            console.log(data);
        });
    };
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
