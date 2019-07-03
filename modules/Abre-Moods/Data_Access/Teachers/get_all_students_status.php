<?php



$bell = $_POST["bell"];
$amount = $_POST["amount"];
//TEMPORARY FILLER DATA FOR DEBUGGIN'

$timeZone = new DateTimeZone("America/New_York");
$time = new DateTime("now",$timeZone);
$formattedTime = $time->format("s");
$integerTime = intval($formattedTime);
$normalTime = $time->format("Y-m-d h:m A");

if ($amount == "counts" || $amount == "full") {
    $TEMPstudentdata = [
        "totalStudents"=>60,
        "totalResponses"=>$integerTime,
        "blue"=>intval($integerTime * .3),
        "green"=>intval($integerTime * .5),
        "yellow"=>intval($integerTime * .15),
        "red"=>intval($integerTime * .05)
    ];
}

if ($amount == "full") {
    $TEMPstudentdata +=
        [
            "studentData" => [
                "Jeff Gordon"=> ["mood" => "happy", "time" => $normalTime],
                "Jeff Bordon"=> ["mood" => "sad", "time" => $normalTime],
                "Jeff cool"=> ["mood" => "angry", "time" => $normalTime],
                "Jeff silly"=> ["mood" => "frustrated", "time" => $normalTime]
            ]
        ];
}

//echo json_encode($TEMPstudentdata);