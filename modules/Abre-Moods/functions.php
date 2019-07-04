<?php

/*
	* Copyright (C) 2019 Mason City Schools
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

//required verification files
require_once(dirname(__FILE__) . '/../../core/abre_verification.php');
require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');

function determineZone(String $mood) {
    switch ($mood) {
        case "meh":
        case "sad":
        case "down":
        case "allergic":
        case "sick":
        case "tired":
            return "blue";
            break;
        case "happy":
        case "thrilled":
        case "okay":
            return "green";
            break;
        case "stressed":
        case "worried":
        case "annoyed":
        case "frustrated":
            return "yellow";
            break;
        case "scared":
        case "angry":
            return "red";
            break;
        case "wants_to_speak_up":
        case "needs_help":
        case "needs_to_talk":
            return "crisis";
            break;
    }
}
