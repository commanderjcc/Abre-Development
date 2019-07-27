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

echo "<link rel='stylesheet' type='text/css' href='/modules/".basename(dirname(__DIR__,2))."/css/student/widget.css'>";?>

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
    //add jquery animations
    var addEmojiAnimations = function() {
        $('.emoji i').hover(function(){
           $(this).children().remove();
           $(this).append(`<div id='shadow'></div>`);
        },function(){
           $(this).children().remove();
        });
    };

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
        let now = moment();
        let time = now.format();
        console.log('posting with mood: ' + mood + ', zone: ' + zone + ', time: ' + time);
        var jQueryRequest = $.post('modules/Abre-Moods/Data_Access/students/upload_mood.php', {mood:mood,time:time,zone:zone});
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
    //define function to add click funciton to all the divs
    var addEmojiClickFunctions = function(){
        var emojiDivs = $('div.widget_emoji');
        emojiDivs.off('click');
        emojiDivs.click(emojiClicked);
    };

    //Arrow expander
    $(document).ready(function(){
        addEmojiAnimations();
        addEmojiClickFunctions();
        $('.arrow_container').click(function(){
            //add the additional Moods from above, added up there so things are closer together for layout
           $('.emoji.centered_container:not(.no_padding)').append(additionalMoods);
           $(this).remove();
           //have to rerun to add new emoji
           addEmojiAnimations();
           addEmojiClickFunctions()
        });
    });
</script>
