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

require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php'); //required verification security

//This file serves the teacher widget once requested by jQuery through loadWidget (modules/steam/widgets.php)

echo "<hr class='widget_hr'>"; //keep
//widget layout
echo "<div class='emoji centered_container'>
          <div class='emoji centered_container no_padding'>
              <div id='widget_happy' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-slightly-smiling-face'></i>
                  Happy
              </div>
              <div id='widget_okay' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-neutral-face'></i>
                  Okay
              </div>
              <div id='widget_down' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-confused-face'></i>
                  Down
              </div>
          </div>
          <div class='emoji centered_container no_padding'>
              <div id='widget_thrilled' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-beaming-face-with-smiling-eyes'></i>
                  Thrilled
              </div>
              <div id='widget_meh' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-expressionless-face'></i>
                  Meh
              </div>
              <div id='widget_sad' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-loudly-crying-face'></i>
                  Sad
              </div>
          </div>
      </div>";
//insert arrow to load the others
echo "  <div class='centered_container arrow_container'>
            <svg width='59' height='33' viewBox='0 0 59 33' fill='none' xmlns='http://www.w3.org/2000/svg'>
                <path id='arrow' d='M29.3771 32.5009C30.5289 32.4344 31.6219 31.9773 32.4709 31.2071L56.4709 9.52143C56.9748 9.08986 57.386 8.56316 57.6801 7.97247C57.9743 7.38177 58.1455 6.73903 58.1836 6.08208C58.2217 5.42513 58.126 4.76732 57.9021 4.14741C57.6783 3.5275 57.3307 2.95805 56.88 2.47265C56.4293 1.98724 55.8846 1.59571 55.2779 1.32113C54.6712 1.04654 54.0149 0.894457 53.3477 0.873872C52.6805 0.853287 52.0158 0.964634 51.3929 1.20128C50.77 1.43793 50.2015 1.79512 49.7209 2.25179L29.0959 20.888L8.47088 2.25179C7.99026 1.79512 7.42174 1.43793 6.79885 1.20128C6.17596 0.964634 5.5113 0.853287 4.84407 0.873872C4.17684 0.894457 3.52054 1.04654 2.91388 1.32113C2.30722 1.59571 1.76248 1.98724 1.31177 2.47265C0.861061 2.95805 0.513515 3.5275 0.289626 4.14741C0.0657362 4.76732 -0.0299657 5.42513 0.00816398 6.08208C0.0462937 6.73903 0.217483 7.38177 0.511637 7.97247C0.805791 8.56316 1.21695 9.08986 1.72088 9.52143L25.7209 31.2071C26.2119 31.6523 26.7884 31.9961 27.4163 32.2183C28.0442 32.4405 28.7109 32.5366 29.3771 32.5009Z' fill='black' fill-opacity='1'/>
            </svg>
        </div>";
//save layout of additional moods
echo "<script type='text/javascript'>
        let additionalMoods = `
          <div class='emoji centered_container no_padding'>
              <div id='widget_stressed' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-grimacing-face'></i>
                  Stressed
              </div>
              <div id='widget_worried' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-fearful-face'></i>
                  Worried
              </div>
              <div id='widget_scared' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-face-screaming-in-fear'></i>
                  Scared
              </div>
          </div>
          <div class='emoji centered_container no_padding'>
              <div id='widget_annoyed' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-unamused-face'></i>
                  Annoyed
              </div>
              <div id='widget_angry' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-angry-face'></i>
                  Angry
              </div>
              <div id='widget_frustrated' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-face-with-steam-from-nose'></i>
                  Frustrated
              </div>
          </div>
          <div class='emoji centered_container no_padding'>
              <div id='widget_allergic' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-sneezing-face'></i>
                  Allergic
              </div>
              <div id='widget_sick' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-face-with-thermometer'></i>
                  Sick
              </div>
              <div id='widget_tired' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-sleeping-face'></i>
                  Tired
              </div>
          </div>
          <div class='emoji centered_container no_padding'>
              <div id='widget_speak_up' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-eye-in-speech-bubble'></i>
                  Speak Up
              </div>
              <div id='widget_needs_help' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-sos-button'></i>
                  I need help
              </div>
              <div id='widget_needs_talk' class='emoji widget_emoji'>
                  <i class='twa twa-5x twa-speech-balloon'></i>
                  I need to talk
              </div>
          </div>
        `</script>";



echo " <script type='text/javascript'>
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
</script>";
//echo "<div class='widget_container widget_body' style='color:#666;'>Menu<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_menu_or_roster.php' data-reload='true'>menu</i></div>";
//echo "<div class='widget_container widget_body' style='color:#666;'>History<i class='right material-icons widget_holder_refresh pointer' data-path='/modules/Abre-Moods/widget_history_or_overview.php' data-reload='true'>history</i></div>";
//echo "</div>";
