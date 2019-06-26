<?php

//Just for testing purposes
$timeZone = new DateTimeZone("America/New_York");
$time = new DateTime("now",$timeZone);
$formattedTime = $time->format("s");
$integerTime = intval($formattedTime);
if ($integerTime == 30) {
    $jsonObj = [
        name => 'Josh Christesensen',
        message => 'I need help',
        time => $time->format('H:i A')
    ];
    echo json_encode($jsonObj);
} else if ($integerTime == 0) {
    $jsonObj = [
        name => 'Joshua Christesensen',
        message => 'I need to talk',
        time => $time->format('H:i A')
    ];
    echo json_encode($jsonObj);
};

