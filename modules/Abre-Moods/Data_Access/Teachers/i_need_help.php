<?php
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php');
//Just for testing purposes
$timeZone = new DateTimeZone("America/New_York");
$time = new DateTime("now",$timeZone);
$formattedTime = $time->format("s");
$integerTime = intval($formattedTime);
//disabling for testing
if (false) {
    $jsonObj = [
        name => 'Josh Christesensen',
        message => 'I need help',
        time => $time->format('H:i A')
    ];
    echo json_encode($jsonObj);
} else if (false) {
    $jsonObj = [
        name => 'Joshua Christesensen',
        message => 'I need to talk',
        time => $time->format('H:i A')
    ];
    echo json_encode($jsonObj);
};
