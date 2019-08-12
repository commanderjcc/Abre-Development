<?php
$request = $_POST['request'];

//this seems unused, might be safe to delete

$timeZone = new DateTimeZone("America/New_York");
$time = new DateTime("now",$timeZone);
$formattedTime = $time->format("Y-m-d h:i:s A");
echo json_encode($formattedTime);
