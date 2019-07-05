<?php
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');

function getCurrentBellStartTime() {
    $now = new DateTime();
    $day = intval($now->format('w'));
    switch ($day) {
        case 0:
        case 6:
            return "Mon 07:45 AM";
            break;
        case 1:
        case 5:
            normalDay();
            break;
        case 2:
        case 4:
            break;

    }
}

