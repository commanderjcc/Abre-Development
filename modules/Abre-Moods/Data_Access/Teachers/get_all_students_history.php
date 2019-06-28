<?php



//TEMPORARY FILLER DATA FOR DEBUGGIN'

$timeZone = new DateTimeZone("America/New_York");
$time = new DateTime("now",$timeZone);
$formattedTime = $time->format("s");
$integerTime = intval($formattedTime);
$TEMPstudentdata=[
    "totalStudents"=>60,
    "totalResponses"=>$integerTime,
    "blue"=>$integerTime,
    "green"=>$integerTime,
    "yellow"=>$integerTime,
    "red"=>$integerTime
];
$jsonObj = json_encode($TEMPstudentdata);
echo $jsonObj;