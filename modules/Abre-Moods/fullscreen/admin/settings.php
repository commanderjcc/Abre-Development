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
                <a href="#starks-panel" class="mdl-tabs__tab is-active">Starks</a>
                <a href="#lannisters-panel" class="mdl-tabs__tab">Lannisters</a>
                <a href="#targaryens-panel" class="mdl-tabs__tab">Targaryens</a>
            </div>

            <div class="mdl-tabs__panel is-active" id="starks-panel">
                <ul>
                    <li>Eddard</li>
                    <li>Catelyn</li>
                    <li>Robb</li>
                    <li>Sansa</li>
                    <li>Brandon</li>
                    <li>Arya</li>
                    <li>Rickon</li>
                </ul>
            </div>
            <div class="mdl-tabs__panel" id="lannisters-panel">
                <ul>
                    <li>Tywin</li>
                    <li>Cersei</li>
                    <li>Jamie</li>
                    <li>Tyrion</li>
                </ul>
            </div>
            <div class="mdl-tabs__panel" id="targaryens-panel">
                <ul>
                    <li>Viserys</li>
                    <li>Daenerys</li>
                </ul>
            </div>
        </div>







        <div id="emailSettings">
            <div class="emailList">
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                    <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Admin</span>
                </label>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" ></textarea>
                    <label class="mdl-textfield__label" for="sample5">Admin Emails</label>
                </div>
            </div>
            <div class="emailList">
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                    <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Counselors</span>
                </label>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" ></textarea>
                    <label class="mdl-textfield__label" for="sample5">Counselor Emails</label>
                </div>
            </div>
        </div>
        <div>
            <div class="emailList">
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                    <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Email Teacher</span>
                </label>
            </div>
            <div>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                    <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Send to Link</span>
                </label>
                <div class="input-field col s12">
                    <input id="url" type="url" class="validate">
                    <label for="url">Link</label>
                </div>
            </div>
        </div>
    </div>

</div>