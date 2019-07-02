<?php



$bell = $_POST["bell"];
$amount = $_POST["amount"];
//TEMPORARY FILLER DATA FOR DEBUGGIN'

$timeZone = new DateTimeZone("America/New_York");
$time = new DateTime("now",$timeZone);
$formattedTime = $time->format("s");
$integerTime = intval($formattedTime);
$normalTime = $time->format("Y-m-d h:m:s A");

if ($amount == "counts" || $amount == "full") {
    $TEMPstudentdata = [
        "totalStudents"=>60,
        "totalResponses"=>$integerTime,
        "blue"=>$integerTime,
        "green"=>$integerTime,
        "yellow"=>$integerTime,
        "red"=>$integerTime
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

echo json_encode($TEMPstudentdata);