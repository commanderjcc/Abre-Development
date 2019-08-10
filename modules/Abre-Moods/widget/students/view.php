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
//

//required verifications
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php'); //required verification security

echo "<link rel='stylesheet' type='text/css' href='/modules/" . basename(dirname(__DIR__, 2)) . "/css/student/widget.css'>"; ?>

<hr class='widget_hr'>

<div class='emoji centered_container'>
    <div class='emoji centered_container no_padding'>
        <div id='widget_happy' class='emoji widget_emoji'>
            <i class='twa twa-5x twa-happy'></i>
            Happy
        </div>
        <div id='widget_okay' class='emoji widget_emoji'>
            <i class='twa twa-5x twa-okay'></i>
            Okay
        </div>
        <div id='widget_down' class='emoji widget_emoji'>
            <i class='twa twa-5x twa-down'></i>
            Down
        </div>
    </div>
    <div class='emoji centered_container no_padding'>
        <div id='widget_thrilled' class='emoji widget_emoji'>
            <i class='twa twa-5x twa-thrilled'></i>
            Thrilled
        </div>
        <div id='widget_meh' class='emoji widget_emoji'>
            <i class='twa twa-5x twa-meh'></i>
            Meh
        </div>
        <div id='widget_sad' class='emoji widget_emoji'>
            <i class='twa twa-5x twa-sad'></i>
            Sad
        </div>
    </div>
</div>
<!--insert arrow to load the others-->
<div class='centered_container arrow_container'>
    <svg width='59' height='33' viewBox='0 0 59 33' fill='none' xmlns='http://www.w3.org/2000/svg'>
        <path id='arrow' d='M29.3771 32.5009C30.5289 32.4344 31.6219 31.9773 32.4709 31.2071L56.4709 9.52143C56.9748 9.08986 57.386 8.56316 57.6801 7.97247C57.9743 7.38177 58.1455 6.73903 58.1836 6.08208C58.2217 5.42513 58.126 4.76732 57.9021 4.14741C57.6783 3.5275 57.3307 2.95805 56.88 2.47265C56.4293 1.98724 55.8846 1.59571 55.2779 1.32113C54.6712 1.04654 54.0149 0.894457 53.3477 0.873872C52.6805 0.853287 52.0158 0.964634 51.3929 1.20128C50.77 1.43793 50.2015 1.79512 49.7209 2.25179L29.0959 20.888L8.47088 2.25179C7.99026 1.79512 7.42174 1.43793 6.79885 1.20128C6.17596 0.964634 5.5113 0.853287 4.84407 0.873872C4.17684 0.894457 3.52054 1.04654 2.91388 1.32113C2.30722 1.59571 1.76248 1.98724 1.31177 2.47265C0.861061 2.95805 0.513515 3.5275 0.289626 4.14741C0.0657362 4.76732 -0.0299657 5.42513 0.00816398 6.08208C0.0462937 6.73903 0.217483 7.38177 0.511637 7.97247C0.805791 8.56316 1.21695 9.08986 1.72088 9.52143L25.7209 31.2071C26.2119 31.6523 26.7884 31.9961 27.4163 32.2183C28.0442 32.4405 28.7109 32.5366 29.3771 32.5009Z' fill='black' fill-opacity='1'/>
    </svg>
</div>
<!--save layout of additional moods-->
<script type='text/javascript'>
    let additionalMoods = `
          <div class='emoji centered_container no_padding'>
              <div id='widget_stressed' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-stressed'></i>
                  Stressed
              </div>
              <div id='widget_worried' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-worried'></i>
                  Worried
              </div>
              <div id='widget_scared' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-scared'></i>
                  Scared
              </div>
          </div>
          <div class='emoji centered_container no_padding'>
              <div id='widget_annoyed' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-annoyed'></i>
                  Annoyed
              </div>
              <div id='widget_angry' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-angry'></i>
                  Angry
              </div>
              <div id='widget_frustrated' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-frustrated'></i>
                  Frustrated
              </div>
          </div>
          <div class='emoji centered_container no_padding'>
              <div id='widget_allergic' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-allergic'></i>
                  Allergic
              </div>
              <div id='widget_sick' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-sick'></i>
                  Sick
              </div>
              <div id='widget_tired' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-tired'></i>
                  Tired
              </div>
          </div>
          <div class='emoji centered_container no_padding'>
              <div id='widget_wants_to_speak_up' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-wants_to_speak_up'></i>
                  Speak Up
              </div>
              <div id='widget_needs_help' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-needs_help'></i>
                  I need help
              </div>
              <div id='widget_needs_to_talk' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-needs_to_talk'></i>
                  I need to talk
              </div>
          </div>
        `</script>
<script type='text/javascript'>

    //add hover affects with jQuery
    var addEmojiAnimations = function () {
        $('.emoji i').hover(function () {
            $(this).children().remove();
            $(this).append(`<div id='shadow'></div>`);
        }, function () {
            $(this).children().remove();
        });
    };

    //used to find zone from moods
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

    //What should happen when the emojis are clicked
    var emojiClicked = function () {
        //make scrim for pop up
        let scrim = `
            <div class='sendAnimation'>
                <svg xmlns="http://www.w3.org/2000/svg" width="242" height="242" viewBox="0 0 242 242" fill="none">
                    <path id="circle" class="waiting" d="M232 121C232 59.6964 182.304 10 121 10C59.6964 10 10 59.6964 10 121C10 182.304 59.6964 232 121 232C182.304 232 232 182.304 232 121Z" stroke="#2ee56b" stroke-width="20" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path id="checkmark" d="M64.0768 128.07L101.309 165.302L179.532 87.0781" stroke="#2EE56B" stroke-width="20" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
        `;
        //prepend scrim to the widget
        $(this).parents('.collapsible-body').prepend(scrim);

        //track animation cyles
        var count = 0;
        $('#circle').on('animationiteration', function () {
            count++;
            if(count === 3) {
                count = 0;
            }
        });

        //get data needed for posting
        let mood = $(this).attr('id').substring(7); //removes 'widget-' from the id
        let zone = determineZone(mood);
        let now = moment();
        let time = now.format();
        let currentPeriod = Object.keys(masonSchedule.getCurrentPeriod(now))[0]; //getCurrentPeriod returns an object that includes a period number as a key. Objects.keys returns an array of keys and [0] grabs first one

        //post the data to the server
        var jQueryRequest = $.post('modules/Abre-Moods/Data_Access/students/upload_mood.php', {
            mood: mood,
            time: time,
            zone: zone,
            currentPeriod: currentPeriod
        });

        //once request is done turn off animation and remove scrim
        jQueryRequest.done(function (data) {
            data = JSON.parse(data);

            //add a new listener for syncing the animations
            $('#circle').on('animationiteration', function () {
                if(count === 0) { //on count 3 animations are synced but need to use 0 bc the previous listener sets counts of 3 to 0
                    //get the circle with the animations
                    var circle = $(this);

                    //switch out the animations
                    circle.removeClass('waiting');
                    circle.addClass('done');

                    //remove the event listener
                    circle.off();

                    //draw the checkmark
                    $('#checkmark').addClass('check');

                    //grab the entire scrim for removal
                    var attachedScrim = $('.sendAnimation');

                    //remove the scrim after a bit
                    setTimeout(()=>{attachedScrim.fadeOut()},4000);
                    setTimeout(()=>{attachedScrim.remove()},5000);

                    //redirect people if data says we should
                    var sendOff = function() {
                        if (data['willLink'] === 1 && data['link'] != null) {
                            window.location.href = data['link'];
                        }
                    };

                    //wait to send people until scrim is removed
                    setTimeout(sendOff,5000);
                }
            });
        });
    };
    //define function to add click funciton to all the divs
    var addEmojiClickFunctions = function () {
        var emojiDivs = $('div.widget_emoji');
        emojiDivs.off('click');
        emojiDivs.click(emojiClicked);
    };

    //make schedule so we can get the current period
    var masonSchedule = new schedule();

    //add click functions
    $(document).ready(function () {
        addEmojiAnimations();
        addEmojiClickFunctions();
        //add functionality to the arrow
        $('.arrow_container').click(function () {
            //add the additional Moods from above, added up there so things are closer together for layout
            $('.emoji.centered_container:not(.no_padding)').append(additionalMoods);
            $(this).remove();
            //have to rerun to add new emoji
            addEmojiAnimations();
            addEmojiClickFunctions()
        });
    });
</script>
