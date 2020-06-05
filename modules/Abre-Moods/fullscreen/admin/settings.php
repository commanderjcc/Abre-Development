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
echo "<link rel='stylesheet' type='text/css' href='/modules/" . basename(dirname(__DIR__, 2)) . "/css/admin/settings.css'>";
?>
<div class="page_container mdl-shadow--2dp">
    <div class="page">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <!--Tabs at the top of the page -->
            <div class="mdl-tabs__tab-bar">
                <a href="#wants_to_speak_up-panel" class="mdl-tabs__tab is-active">Speak Up</a>
                <a href="#needs_help-panel" class="mdl-tabs__tab">I Need Help</a>
                <a href="#needs_to_talk-panel" class="mdl-tabs__tab">I Need To Talk</a>
            </div>
            <br>
            <!--Speak up tab-->
            <div class="mdl-tabs__panel is-active" id="wants_to_speak_up-panel">
                <!--email table-->
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--3dp">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Email</th>
                        <th>Admin List</th>
                        <th>Counselor List</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr id="addRow">
                        <td class="mdl-data-table__cell--non-numeric">
                            <input class="email new-email" type="text">
                        </td>
                        <td>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                                   for="wants_to_speak_up-adminNew">
                                <input type="checkbox" id="wants_to_speak_up-adminNew" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                                   for="wants_to_speak_up-counselorNew">
                                <input type="checkbox" id="wants_to_speak_up-counselorNew" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <i onclick="addNewRow('wants_to_speak_up', this)" class="pointer material-icons">add</i>
                        </td>
                    </tr>
                    </tfoot>
                </table>

                <!--checkboxes-->
                <br>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="wants_to_speak_up-admin">
                    <input onchange="saveCheckboxes('wants_to_speak_up')" type="checkbox" id="wants_to_speak_up-admin" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Admin</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="wants_to_speak_up-counselors">
                    <input onchange="saveCheckboxes('wants_to_speak_up')" type="checkbox" id="wants_to_speak_up-counselors" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Counselors</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="wants_to_speak_up-teacher">
                    <input onchange="saveCheckboxes('wants_to_speak_up')" type="checkbox" id="wants_to_speak_up-teacher" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Teacher</span>
                </label>

                <!--div for keeping checkbox and link on same line-->
                <div class="link-box">
                    <label class="not-full-width mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="wants_to_speak_up-link">
                        <input onchange="saveCheckboxes('wants_to_speak_up')" type="checkbox" id="wants_to_speak_up-link" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label">Send to Link</span>
                    </label>
                    <div class="input-field col s12">
                        <input onchange="saveCheckboxes('wants_to_speak_up')" id="wants_to_speak_up-url" type="url" class="validate">
                        <label for="wants_to_speak_up-url"></label>
                    </div>
                </div>

            </div>

            <!--Needs help page-->
            <div class="mdl-tabs__panel" id="needs_help-panel">
                <!--email table-->
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--3dp">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Email</th>
                        <th>Admin List</th>
                        <th>Counselor List</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr id="addRow">
                        <td class="mdl-data-table__cell--non-numeric">
                            <input class="email new-email" type="text">
                        </td>
                        <td>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                                   for="needs_help-adminNew">
                                <input type="checkbox" id="needs_help-adminNew" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                                   for="needs_help-counselorNew">
                                <input type="checkbox" id="needs_help-counselorNew" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <i onclick="addNewRow('needs_help', this)" class="pointer material-icons">add</i>
                        </td>
                    </tr>
                    </tfoot>
                </table>

                <!--checkboxes-->
                <br>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_help-admin">
                    <input onchange="saveCheckboxes('needs_help')" type="checkbox" id="needs_help-admin" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Admin</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_help-counselors">
                    <input onchange="saveCheckboxes('needs_help')" type="checkbox" id="needs_help-counselors" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Counselors</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_help-teacher">
                    <input onchange="saveCheckboxes('needs_help')" type="checkbox" id="needs_help-teacher" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Teacher</span>
                </label>

                <!--div for keeping checkbox and link on same line-->
                <div class="link-box">
                    <label class="not-full-width mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                           for="needs_help-link">
                        <input onchange="saveCheckboxes('needs_help')" type="checkbox" id="needs_help-link" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label">Send to Link</span>
                    </label>
                    <div class="input-field col s12">
                        <input onchange="saveCheckboxes('needs_help')" id="needs_help-url" type="url" class="validate">
                        <label for="needs_help-url"></label>
                    </div>
                </div>

            </div>

            <!--Needs to talk page-->
            <div class="mdl-tabs__panel" id="needs_to_talk-panel">
                <!--email table-->
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--3dp">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Email</th>
                        <th>Admin List</th>
                        <th>Counselor List</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr id="addRow">
                        <td class="mdl-data-table__cell--non-numeric">
                            <input class="email new-email" type="text">
                        </td>
                        <td>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                                   for="needs_to_talk-adminNew">
                                <input type="checkbox" id="needs_to_talk-adminNew" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                                   for="needs_to_talk-counselorNew">
                                <input type="checkbox" id="needs_to_talk-counselorNew" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <i onclick="addNewRow('needs_to_talk', this)" class="pointer material-icons">add</i>
                        </td>
                    </tr>
                    </tfoot>
                </table>

                <!--checkboxes-->
                <br>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_to_talk-admin">
                    <input onchange="saveCheckboxes('needs_to_talk')" type="checkbox" id="needs_to_talk-admin" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Admin</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_to_talk-counselors">
                    <input onchange="saveCheckboxes('needs_to_talk')" type="checkbox" id="needs_to_talk-counselors" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Counselors</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_to_talk-teacher">
                    <input onchange="saveCheckboxes('needs_to_talk')" type="checkbox" id="needs_to_talk-teacher" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Teacher</span>
                </label>

                <!--div for keeping checkbox and link on same line-->
                <div class="link-box">
                    <label class="not-full-width mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                           for="needs_to_talk-link">
                        <input onchange="saveCheckboxes('needs_to_talk')" type="checkbox" id="needs_to_talk-link" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label">Send to Link</span>
                    </label>
                    <div class="input-field col s12">
                        <input onchange="saveCheckboxes('needs_to_talk')" id="needs_to_talk-url" type="url" class="validate">
                        <label for="needs_to_talk-url"></label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    //takes a selected material checkbox($('input') not $('label')) and make it checked programmatically
    var makeChecked = function (jqObj) {
        jqObj.prop('checked', true);
        jqObj.parent()[0].MaterialCheckbox.check(); //the [0] is used to get the actual DOM element
    };

    //takes a selected material checkbox($('input') not $('label')) and make it unchecked programmatically
    var makeUnchecked = function (jqObj) {
        jqObj.prop('checked', false);
        jqObj.parent()[0].MaterialCheckbox.uncheck(); //the [0] is used to get the actual DOM element
    };

    //When theres a change in the checkboxes save them to the db
    var saveCheckboxes = function (button) {
        //find the checkboxes, the [0] is to make them into DOM elements instead of jquery so that .value works
        let admin = $('input[type="checkbox"][id="' + button + '-admin"]')[0];
        let counselors = $('input[type="checkbox"][id="' + button + '-counselors"]')[0];
        let teacher = $('input[type="checkbox"][id="' + button + '-teacher"]')[0];
        let willLink = $('input[type="checkbox"][id="' + button + '-link"]')[0];

        let link = $('input[type="url"][id="' + button + '-url"]')[0];

        //convert their 'on'/'off' to 1/0
        var data = {
            'emailAdmin': admin.checked ? 1 : 0,
            'emailCounselors': counselors.checked ? 1 : 0,
            'emailTeacher': teacher.checked ? 1 : 0,
            'willLink': willLink.checked ? 1 : 0,
            'link': link.value,
            'button':button,
        };

        var jqxhr = $.post('/modules/Abre-Moods/Data_Access/admin/post_settings.php', {
            'data': data,
        });
    };

    //adds a row to the table and optionally to the db
    var addNewRow = function (button, self) {
        let row = $(self).parents('tr'); //find the parent table row
        let email = row.find('.email')[0].value;  //using child to only get checkboxes from that row
        let admin = row.find('#' + button + '-adminNew')[0].checked ? "1" : "0"; // get the value of the checkboxes and convert "true/false" to 1/0
        let counselor = row.find('#' + button + '-counselorNew')[0].checked ? "1" : "0";

        let data = {
            'email': email,
            'admin': admin,
            'counselor': counselor,
            'button': button,
        };

        //add to the db
        var jqxhr = $.post('/modules/Abre-Moods/Data_Access/admin/post_emails.php', {'data': data, 'operation': 'add'});
        jqxhr.done(function(data) {
            //call the add row function
            addRow(button, data, email, admin, counselor, true);
            //reset input area to blank
            row.find('.email')[0].value = '';
            row.find("label[for='" + button + "-adminNew']")[0].MaterialCheckbox.uncheck();
            row.find("label[for='" + button + "-counselorNew']")[0].MaterialCheckbox.uncheck();
        });
    };

    var addRow = function (button, id, email, admin, counselor) {
        //get table we are adding into
        let tableBody = $('#' + button + '-panel tbody');
        //make outline for rows with gaps for supplied data
        let rowOutline = [`
        <tr data-id="`, `">
            <td class="mdl-data-table__cell--non-numeric">
                <input onchange="updateRow('` + button + `', this)"  data-id="`, `"class="email" type="text" value="`, `">
            </td>
            <td>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                       for="`, `">
                    <input onchange="updateRow('` + button + `', this)" data-id="`, `" type="checkbox" id="`, `" class="mdl-checkbox__input">
                </label>
            </td>
            <td>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                       for="`, `">
                    <input onchange="updateRow('` + button + `', this)" data-id="`, `"type="checkbox" id="`, `" class="mdl-checkbox__input">
                </label>
            </td>
            <td>
                <i onclick="deleteRow('` + button + `', this)" data-id="`, `" class="pointer material-icons">delete</i>
            </td>
        </tr>
    `];
        //assemble row from outline and email data
        let newRow = rowOutline[0] + id + rowOutline[1] + id + rowOutline[2] + email + rowOutline[3] + button + '-isAdmin' + id + rowOutline[4] + id + rowOutline[5] + button + '-isAdmin' + id + rowOutline[6] + button + '-isCounselor' + id + rowOutline[7] + id + rowOutline[8] + button + '-isCounselor' + id + rowOutline[9] + id + rowOutline[10];
        //append it to the body of the table
        tableBody.append(newRow);
        //find the new buttons
        let adminButton = $('#' + button + '-isAdmin' + id + '[data-id="' + id + '"]');
        let counselorButton = $('#' + button + '-isCounselor' + id + '[data-id="' + id + '"]');
        //upgrade them with mdl so that they can be auto-checked
        componentHandler.upgradeElement(adminButton.parent()[0]);
        componentHandler.upgradeElement(counselorButton.parent()[0]);
        //check buttons if data says to
        if (admin == "1") {
            makeChecked(adminButton);
        } else {
            makeUnchecked(adminButton);
        }

        if (counselor == "1") {
            makeChecked(counselorButton);
        } else {
            makeUnchecked(counselorButton);
        }
    };

    //when a row in the table is changed, update the row in the db
    var updateRow = function (button, self) {
        //find row with id from updated item, use [0] to get DOM element for .value use
        console.log(self);
        let id = $(self).data('id');
        let row = $('tr[data-id = "' + id + '"]');
        let email = row.find('.email')[0].value;  //using child to only get checkboxes from that row
        let admin = row.find('#' + button + '-isAdmin' + id)[0].checked ? 1 : 0; // convert "true/false" to 1/0
        let counselor = row.find('#' + button + '-isCounselor' + id)[0].checked ? 1 : 0;
        let data = {
            'id': id,
            'button': button,
            'email': email,
            'admin': admin,
            'counselor': counselor,
        };
        //post update to db
        var jqxhr = $.post('modules/Abre-Moods/Data_Access/admin/post_emails.php', {
            'data': data,
            'operation': 'update'
        });
    };

    //deletes the row from the db and page
    var deleteRow = function (button, self) {
        let id = $(self).data('id'); //get id and do everything based of the id
        let data = {
            'id': id,
            'button': button,
        };
        //post delete operation to db
        var jqxhr = $.post('modules/Abre-Moods/Data_Access/admin/post_emails.php', {
            'data': data,
            'operation': 'delete',
        });
        jqxhr.done(()=>{
            //find row with id and remove
            let row = $('tr[data-id="'+ id +'"]');
            row.remove();
        });
    };

    //update the checkbox section of the site
    var updateCheckboxes = function (button, data) {
        //define all the jquery objects for later use
        let admin = $('input[type="checkbox"][id="' + button + '-admin"]');
        let counselors = $('input[type="checkbox"][id="' + button + '-counselors"]');
        let teacher = $('input[type="checkbox"][id="' + button + '-teacher"]');
        let willLink = $('input[type="checkbox"][id="' + button + '-link"]');

        let link = $('input[type="url"][id="' + button + '-url"]')[0];

        //if the data is true set the checkbox to checked if not make it unchecked
        if (data.emailAdmin == "1") {
            makeChecked(admin);
        } else {
            makeUnchecked(admin);
        }

        if (data.emailCounselors == "1") {
            makeChecked(counselors);
        } else {
            makeUnchecked(counselors);
        }

        if (data.emailTeacher == "1") {
            makeChecked(teacher);
        } else {
            makeUnchecked(teacher);
        }

        if (data.willLink == "1") {
            makeChecked(willLink);
        } else {
            makeUnchecked(willLink);
        }

        //set the value of the link textbox to whatever was in the db
        link.value = data.link;
    };

    //update the email section of the site
    var updateEmails = function (button, data) {
        //clear table for filling up later
        let tableBody = $('#' + button + '-panel tbody');
        tableBody.empty();

        //for each email make a new row
        data.forEach((emailObj) => {
            addRow(button, emailObj['id'], emailObj['email'], emailObj['admin'], emailObj['counselor'])
        });
    };

    //update the selected button
    var updateData = function (button) {
        //all data is separated into two categories, the email related data and then the button related data.
        //the button related data is anything related to checkboxes or settings and is below the table
        //the email related data is anything related to emails and is contained in the table
        var jqxhrCheckboxes = $.post('/modules/Abre-Moods/Data_Access/admin/fetch_settings.php', {'button': button});
        jqxhrCheckboxes.done((data) => {
            console.log(data);
            data = JSON.parse(data);
            console.log(data);
            updateCheckboxes(button, data);
        });
        var jqxhrEmails = $.post('/modules/Abre-Moods/Data_Access/admin/fetch_emails.php', {'button': button});
        jqxhrEmails.done((data) => {
            data = JSON.parse(data);
            updateEmails(button, data);
        });
    };

    //register clicks without interfering with mdl, I hope
    $('a[href^="#wants_to_speak_up"]').click(function () {
        updateData('wants_to_speak_up');
    });
    $('a[href^="#needs_help"]').click(function () {
        updateData('needs_help')
    });
    $('a[href^="#needs_to_talk"]').click(function () {
        updateData('needs_to_talk')
    });

    //we start on wants_to_speak_up so we'll update that first
    updateData('wants_to_speak_up');


</script>