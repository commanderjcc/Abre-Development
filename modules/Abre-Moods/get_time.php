<?php
$request = $_POST['request'];

$timeZone = new DateTimeZone("America/New_York");
$time = new DateTime("now",$timeZone);
$formattedTime = $time->format("Y-m-d h:i:s A");
echo $request.$formattedTime;
