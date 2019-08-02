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
                <a href="#speak_up-panel" class="mdl-tabs__tab is-active">Speak Up</a>
                <a href="#needs_help-panel" class="mdl-tabs__tab">I Need Help</a>
                <a href="#needs_to_talk-panel" class="mdl-tabs__tab">I Need To Talk</a>
            </div>
            <br>
            <!--Speak up tab-->
            <div class="mdl-tabs__panel is-active" id="speak_up-panel">
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
                                   for="suadmin">
                                <input type="checkbox" id="suadmin" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                                   for="suadmin">
                                <input type="checkbox" id="suadmin" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <i class="pointer material-icons">add</i>
                        </td>
                    </tr>
                    </tfoot>
                </table>

                <!--checkboxes-->
                <br>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="speak_up-admin">
                    <input type="checkbox" id="speak_up-admin" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Admin</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="speak_up-counselors">
                    <input type="checkbox" id="speak_up-counselors" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Counselors</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="speak_up-teacher">
                    <input type="checkbox" id="speak_up-teacher" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Teacher</span>
                </label>

                <!--div for keeping checkbox and link on same line-->
                <div class="link-box">
                    <label class="not-full-width mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="speak_up-link">
                        <input type="checkbox" id="speak_up-link" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label">Send to Link</span>
                    </label>
                    <div class="input-field col s12">
                        <input id="speak_up-url" type="url" class="validate">
                        <label for="speak_up-url"></label>
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
                                   for="suadmin">
                                <input type="checkbox" id="suadmin" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                                   for="suadmin">
                                <input type="checkbox" id="suadmin" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <i class="pointer material-icons">add</i>
                        </td>
                    </tr>
                    </tfoot>
                </table>

                <!--checkboxes-->
                <br>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_help-admin">
                    <input type="checkbox" id="needs_help-admin" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Admin</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_help-counselors">
                    <input type="checkbox" id="needs_help-counselors" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Counselors</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_help-teacher">
                    <input type="checkbox" id="needs_help-teacher" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Teacher</span>
                </label>

                <!--div for keeping checkbox and link on same line-->
                <div class="link-box">
                    <label class="not-full-width mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                           for="needs_help-link">
                        <input type="checkbox" id="needs_help-link" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label">Send to Link</span>
                    </label>
                    <div class="input-field col s12">
                        <input id="needs_help-url" type="url" class="validate">
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
                                   for="suadmin">
                                <input type="checkbox" id="suadmin" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                                   for="suadmin">
                                <input type="checkbox" id="suadmin" class="mdl-checkbox__input">
                            </label>
                        </td>
                        <td>
                            <i class="pointer material-icons">add</i>
                        </td>
                    </tr>
                    </tfoot>
                </table>

                <!--checkboxes-->
                <br>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_to_talk-admin">
                    <input type="checkbox" id="needs_to_talk-admin" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Admin</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_to_talk-counselors">
                    <input type="checkbox" id="needs_to_talk-counselors" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Counselors</span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="needs_to_talk-teacher">
                    <input type="checkbox" id="needs_to_talk-teacher" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Teacher</span>
                </label>

                <!--div for keeping checkbox and link on same line-->
                <div class="link-box">
                    <label class="not-full-width mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                           for="needs_to_talk-link">
                        <input type="checkbox" id="needs_to_talk-link" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label">Send to Link</span>
                    </label>
                    <div class="input-field col s12">
                        <input id="needs_to_talk-url" type="url" class="validate">
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
        let admin = $('input[type="checkbox"][id="' + button + 'admin"]')[0];
        let counselors = $('input[type="checkbox"][id="' + button + 'counselors"]')[0];
        let teacher = $('input[type="checkbox"][id="' + button + 'teacher"]')[0];
        let willLink = $('input[type="checkbox"][id="' + button + 'link"]')[0];

        let link = $('input[type="url"][id="' + button + 'url"]')[0];

        //convert their 'on'/'off' to 1/0
        var checkboxes = {
            'emailAdmin': admin.value === "on" ? 1 : 0,
            'emailCounselors': counselors.value === "on" ? 1 : 0,
            'emailTeacher': teacher.value === "on" ? 1 : 0,
            'willLink': willLink.value === "on" ? 1 : 0,
            'link': link.value === "on" ? 1 : 0,
        };

        var jqxhr = $.post('/modules/Abre-Moods/Data_Access/admin/post_settings.php', {
            'data': {
                'checkboxes': checkboxes,
            }
        });
    };

    //adds a row to the table and optionally to the db
    var addRow = function (button, id, email, admin, counselor, db) {
        //get table we are adding into
        let tableBody = $('#' + button + '-panel tbody');
        //make outline for rows with gaps for supplied data
        let rowOutline = [`
        <tr data-id="`, `">
            <td class="mdl-data-table__cell--non-numeric">
                <input onchange="updateRow("` + button + `")"  data-id="`, `"class="email" type="text" value="`, `">
            </td>
            <td>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                       for="`, `">
                    <input onchange="updateRow("` + button + `")" data-id="`, `" type="checkbox" id="`, `" class="mdl-checkbox__input">
                </label>
            </td>
            <td>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect not-full-width"
                       for="`, `">
                    <input onchange="updateRow("` + button + `")" data-id="`, `"type="checkbox" id="`, `" class="mdl-checkbox__input">
                </label>
            </td>
            <td>
                <i onclick="deleteRow("` + button + `")" data-id="`, `" class="pointer material-icons">delete</i>
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
        if (admin) {
            makeChecked(adminButton);
        } else {
            makeUnchecked(adminButton);
        }

        if (counselor) {
            makeChecked(counselorButton);
        } else {
            makeUnchecked(counselorButton);
        }


        if (db) {
            let data = {
                'email': email,
                'admin': admin,
                'counselor': counselor,
            };
            //add to the db
            $.post('modules/Abre-Moods/Data_Access/admin/post_emails.php', {'data': data, 'operation': 'add'})
        }
    };

    //when a row in the table is changed, update the row in the db
    var updateRow = function (button) {
        //find row with id from updated item, use [0] to get DOM element for .value use
        let id = $(this).data('id');
        let row = $('tr[data-id = "' + id + '"]');
        let email = row.child('.email')[0].value;
        let admin = row.child('#' + button + '-isAdmin' + id)[0].value === "on" ? 1 : 0;
        let counselor = row.child('#' + button + '-isCounselor' + id)[0].value === "on" ? 1 : 0;
        let data = {
            'id': id,
            'email': email,
            'admin': admin,
            'counselor': counselor,
        };
        var jqxhr = $.post('modules/Abre-Moods/Data_Access/admin/post_emails.php', {
            'data': data,
            'operation': 'update'
        });
    };

    //deletes the row from the db and page
    var deleteRow = function (button) {
        let id = $(this).data('id');
        let data = {
            'id':id,
        }
        var jqxhr = $.post('modules/Abre-Moods/Data_Access/admin/post_emails.php', {
            'data': data,
            'operation': 'delete',
        })
    };

    //update the checkbox section of the site
    var updateCheckboxes = function (button, data) {
        //define all the jquery objects for later use
        let admin = $('input[type="checkbox"][id="' + button + '-admin"]');
        let counselors = $('input[type="checkbox"][id="' + button + '-counselors"]');
        let teacher = $('input[type="checkbox"][id="' + button + '-teacher"]');
        let willLink = $('input[type="checkbox"][id="' + button + '-link"]');

        let link = $('div > input[type="url"][id="' + button + '-url"]')[0];

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
            addRow(button, emailObj['id'], emailObj['email'], emailObj['admin'], emailObj['counselor'], false)
        });
    };

    //update the selected button
    var updateData = function (button) {
        var jqxhrCheckboxes = $.post('/modules/Abre-Moods/Data_Access/admin/fetch_settings.php', {'button': button});
        jqxhrCheckboxes.done((data) => {
            console.log(data);
            data = JSON.parse(data);
            console.log(data);
            updateCheckboxes(button, data);
        });
        var jqxhrEmails = $.post('/modules/Abre-Moods/Data_Access/admin/fetch_emails.php', {'button': button});
        jqxhrEmails.done((data) => {
            console.log(data);
            data = JSON.parse(data);
            console.log(data);
            updateEmails(button, data);
        });
    }

    $('a[href^="#speak_up"]').click(function () {
        updateData('speak_up');
    });
    $('a[href^="#needs_help"]').click(function () {
        updateData('needs_help')
    });
    $('a[href^="#needs_to_talk"]').click(function () {
        updateData('needs_to_talk')
    });

    var jqxhr = $.post('/modules/Abre-Moods/Data_Access/admin/fetch_settings.php', {'button': 'speak_up'});
    jqxhr.done((data) => {
        console.log(data);
        data = JSON.parse(data);
        console.log(data);
        updateData('speak_up');
    });


</script>