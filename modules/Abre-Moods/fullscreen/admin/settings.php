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

//required verifications
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php'); //required verification security
echo "<link rel='stylesheet' type='text/css' href='/modules/".basename(dirname(__DIR__,2))."/css/admin/settings.css'>";
?>
<div class="page_container mdl-shadow--2dp">
    <div class="page">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#speakup-panel" class="mdl-tabs__tab is-active">Speak Up</a>
                <a href="#needshelp-panel" class="mdl-tabs__tab">I Need Help</a>
                <a href="#needstalk-panel" class="mdl-tabs__tab">I Need To Talk</a>
            </div>

            <div class="mdl-tabs__panel is-active" id="speakup-panel">
                <br>
                <!--Using su as prefix for Speak Up -->
                <div id="emailSettings">
                    <div class="emailList">
                        <label id="ICHOOSEYOU" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="suadmin">
                            <input type="checkbox" id="suadmin" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Email Admin</span>
                        </label>
                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="suadminemails" ></textarea>
                            <label class="mdl-textfield__label" for="suadminemails"></label>
                        </div>
                    </div>
                    <div class="emailList">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="sucounselors">
                            <input type="checkbox" id="sucounselors" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Email Counselors</span>
                        </label>
                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="sucounselorsemails" ></textarea>
                            <label class="mdl-textfield__label" for="sucounselorsemails"></label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="emailList">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="suteacher">
                            <input type="checkbox" id="suteacher" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Email Teacher</span>
                        </label>
                    </div>
                    <div>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="sulink">
                            <input type="checkbox" id="sulink" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Send to Link</span>
                        </label>
                        <div class="input-field col s12">
                            <input id="suurl" type="url" class="validate">
                            <label for="suurl"></label>
                        </div>
                    </div>
                    <button onclick='save("speak_up")' class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        Save
                    </button>
                </div>

            </div>

            <div class="mdl-tabs__panel" id="needshelp-panel">
                <br>
                <!-- Using nh as prefix for Needs Help-->
                <div id="emailSettings">
                    <div class="emailList">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="nhadmin">
                            <input type="checkbox" id="nhadmin" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Email Admin</span>
                        </label>
                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="nhadminemails" ></textarea>
                            <label class="mdl-textfield__label" for="nhadminemails"></label>
                        </div>
                    </div>
                    <div class="emailList">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="nhcounselors">
                            <input type="checkbox" id="nhcounselors" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Email Counselors</span>
                        </label>
                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="nhcounselorsemails" ></textarea>
                            <label class="mdl-textfield__label" for="nhcounselorsemails"></label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="emailList">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="nhteacher">
                            <input type="checkbox" id="nhteacher" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Email Teacher</span>
                        </label>
                    </div>
                    <div>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="nhlink">
                            <input type="checkbox" id="nhlink" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Send to Link</span>
                        </label>
                        <div class="input-field col s12">
                            <input id="nhurl" type="url" class="validate">
                            <label for="nhurl"></label>
                        </div>
                    </div>
                    <button onclick='save("needs_help")' class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        Save
                    </button>
                </div>
            </div>
            <div class="mdl-tabs__panel" id="needstalk-panel">
                <br>
                <!-- Using ntt as prefix for Needs to talk -->
                <div id="emailSettings">
                    <div class="emailList">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="nttadmin">
                            <input type="checkbox" id="nttadmin" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Email Admin</span>
                        </label>
                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="nttadminemails" ></textarea>
                            <label class="mdl-textfield__label" for="nttadminemails"></label>
                        </div>
                    </div>
                    <div class="emailList">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="nttcounselors">
                            <input type="checkbox" id="nttcounselors" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Email Counselors</span>
                        </label>
                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="nttcounselorsemails" ></textarea>
                            <label class="mdl-textfield__label" for="nttcounselorsemails"></label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="emailList">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="nttteacher">
                            <input type="checkbox" id="nttteacher" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Email Teacher</span>
                        </label>
                    </div>
                    <div>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="nttlink">
                            <input type="checkbox" id="nttlink" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">Send to Link</span>
                        </label>
                        <div class="input-field col s12">
                            <input id="ntturl" type="url" class="validate">
                            <label for="ntturl"></label>
                        </div>
                    </div>
                    <button onclick='save("needs_to_talk")' class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type = 'text/javascript'>
    var aliasConversion = {
        'speak_up' : 'su',
        'needs_help' : 'nh',
        'needs_to_talk': 'ntt',
    };

    var makeChecked = function(jqObj) {
        jqObj.prop('checked',true);
        jqObj.parent()[0].MaterialCheckbox.check();
    };

    var makeUnchecked = function(jqObj) {
        jqObj.prop('checked',false);
        jqObj.parent()[0].MaterialCheckbox.uncheck();
    };

    var save = function(button) {
        let admin = $('input[type="checkbox"][id="'+aliasConversion[button]+'admin"]')[0];
        let counselors = $('input[type="checkbox"][id="'+aliasConversion[button]+'counselors"]')[0];
        let teacher = $('input[type="checkbox"][id="'+aliasConversion[button]+'teacher"]')[0];
        let willLink = $('input[type="checkbox"][id="'+aliasConversion[button]+'link"]')[0];

        let adminemails = $('textarea[type="text"][id="'+aliasConversion[button]+'adminemails"]')[0];
        let counseloremails = $('textarea[type="text"][id="'+aliasConversion[button]+'counselorsemails"]')[0];
        let link = $('input[type="url"][id="'+aliasConversion[button]+'url"]')[0];

        var checkboxes = {
            'emailAdmin': admin.value,
            'emailCounselors': counselors.value,
            'emailTeacher': teacher.value,
            'willLink': willLink.value,
            'link': link.value,
        };
        var adminEmails = adminemails.value.replace(/\s/g, '').split(",");
        var counselorEmails = counseloremails.value.replace(/\s/g, '').split(",");

        var jqxhr = $.post('/modules/Abre-Moods/Data_Access/admin/post_settings.php',{
            'data': {
                'checkboxes' : checkboxes,
                'adminEmails' : adminEmails,
                'counselorEmails' : counselorEmails
            }
        });


    };

    var updateData = function(button, data) {
        let admin = $('input[type="checkbox"][id="'+aliasConversion[button]+'admin"]');
        let counselors = $('input[type="checkbox"][id="'+aliasConversion[button]+'counselors"]');
        let teacher = $('input[type="checkbox"][id="'+aliasConversion[button]+'teacher"]');
        let willLink = $('input[type="checkbox"][id="'+aliasConversion[button]+'link"]');

        let adminemails = $('textarea[type="text"][id="'+aliasConversion[button]+'adminemails"]')[0];
        let counseloremails = $('textarea[type="text"][id="'+aliasConversion[button]+'counselorsemails"]')[0];
        let link = $('input[type="url"][id="'+aliasConversion[button]+'url"]')[0];

        if(data.checkboxes.emailAdmin == "1") {
            makeChecked(admin);
        } else {
            makeUnchecked(admin);
        }

        if(data.checkboxes.emailCounselors == "1") {
            makeChecked(counselors);
        } else {
            makeUnchecked(counselors);
        }

        if(data.checkboxes.emailTeacher == "1") {
            makeChecked(teacher);
        } else {
            makeUnchecked(teacher);
        }

        if(data.checkboxes.willLink == "1") {
            makeChecked(willLink);
        } else {
            makeUnchecked(willLink);
        }

        adminemails.value = '';
        counseloremails.value = '';
        link.value = data.checkboxes.link;

        data.adminEmails.forEach((email)=>{
            adminemails.value += email + ',';
        });

        data.counselorEmails.forEach((email)=>{
            counseloremails.value += email + ',';
        });
    };

    $('a[href^="#speakup"]').click(function(){
        var jqxhr = $.post('/modules/Abre-Moods/Data_Access/admin/fetch_settings.php',{'button':'speak_up'});
        jqxhr.done((data)=>{
            console.log(data);
            data = JSON.parse(data);
            console.log(data);
            updateData('speak_up',data);
        });
    });
    $('a[href^="#needshelp"]').click(function(){
        var jqxhr = $.post('/modules/Abre-Moods/Data_Access/admin/fetch_settings.php',{'button':'needs_help'});
        jqxhr.done((data)=>{
            console.log(data);
            data = JSON.parse(data);
            console.log(data);
            updateData('needs_help',data);
        });
    });
    $('a[href^="#needstalk"]').click(function(){
        var jqxhr = $.post('/modules/Abre-Moods/Data_Access/admin/fetch_settings.php',{'button':'needs_to_talk'});
        jqxhr.done((data)=>{
            console.log(data);
            data = JSON.parse(data);
            console.log(data);
            updateData('needs_to_talk',data);
        });
    });

    var jqxhr = $.post('/modules/Abre-Moods/Data_Access/admin/fetch_settings.php',{'button':'speak_up'});
    jqxhr.done((data)=> {
        console.log(data);
        data = JSON.parse(data);
        console.log(data);
        updateData('speak_up', data);
    });



</script>