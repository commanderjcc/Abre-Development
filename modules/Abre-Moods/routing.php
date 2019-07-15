<?php

	/*
	* Copyright (C) 2016-2018 Abre.io Inc.
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

    //Required configuration files
	require_once(dirname(__FILE__) . '/../../core/abre_verification.php');
	require_once (dirname(__FILE__). '/permissions.php');
	//echo "//$isStudent";
	//echo "//$isStaff";
	if($isStaff){
		echo "
		    'moods': function(name) {
			    $('#navigation_top').hide();
			    $('#content_holder').hide();
			    $('#loader').show();
			    $('#titletext').text('Moods');
			    document.title = 'Moods';
				$('#content_holder').load('modules/".basename(__DIR__)."/fullscreen/teachers/overview.php', function() { init_page(); });
				//$('#modal_holder').load('modules/".basename(__DIR__)."/modals.php');
				//ga('set', 'page', '/#moods/');
				//ga('send', 'pageview');
				//$('#navigation_top').show();
				//$('#navigation_top').load('modules/".basename(__DIR__)."/menu.php', function() {
					//$('#navigation_top').show();
					//$('.tab_1').addClass('tabmenuover');
				//});
			},
				
			'moods/student/:studentID': function(studentID) {
				$('#navigation_top').hide();
				$('#content_holder').hide();
				$('#loader').show();
				$('#titletext').text('Moods');
				document.title = 'Mood History';
				$('#content_holder').load('modules/".basename(__DIR__)."/fullscreen/students/history_view.php', {studentID:studentID} , function() { init_page(); });
				//$('#navigation_top').show();
				//$('#navigation_top').load('modules/".basename(__DIR__)."/menu.php', function() {
					//$('#navigation_top').show();
					//$('.tab_2').addClass('tabmenuover');
				//});
			},
		";
	} elseif ($isStudent) {
		echo "
			'moods': function(name) {
			    $('#navigation_top').hide();
			    $('#content_holder').hide();
			    $('#loader').show();
			    $('#titletext').text('Moods');
			    document.title = 'Moods';
				$('#content_holder').load('modules/".basename(__DIR__)."/fullscreen/', function() { init_page(); });
				//$('#modal_holder').load('modules/".basename(__DIR__)."/modals.php');
				//ga('set', 'page', '/#moods/');
				//ga('send', 'pageview');
				//console.log('testing moods registrations');
				$('#navigation_top').show();
				$('#navigation_top').load('modules/".basename(__DIR__)."/menu.php', function() {
					$('#navigation_top').show();
					$('.tab_1').addClass('tabmenuover');
				});
			},
			
			'moods/history': function(name) {
			    $('#navigation_top').hide();
			    $('#content_holder').hide();
			    $('#loader').show();
			    $('#titletext').text('Moods');
			    document.title = 'Moods';
				$('#content_holder').load('modules/".basename(__DIR__)."/fullscreen/students/history_view.php', function() { init_page(); });
				//$('#modal_holder').load('modules/".basename(__DIR__)."/modals.php');
				//ga('set', 'page', '/#moods/');
				//ga('send', 'pageview');
				$('#navigation_top').show();
				$('#navigation_top').load('modules/".basename(__DIR__)."/menu.php', function() {
					$('#navigation_top').show();
					$('.tab_2').addClass('tabmenuover');
				});
			},
		";
	}


?>
