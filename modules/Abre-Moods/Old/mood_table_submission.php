<?php

  $emojimood = $_POST['moodval'];
  $studentid = $_POST['stuid'];
  ?>
  <?php
  // I want this format saved: 2013-02-08 09:30:26  YYYY-MM-DD HH:MM:SS
  date_default_timezone_set('America/Indiana/Indianapolis');
  $datevar = date('Y-m-d');//works
  $timevar = date("H:i");


  //$userid=finduseridcore($_SESSION['useremail']); <-- need for "launch" version
  //Required configuration files
  require_once(dirname(__FILE__) . '/../../core/abre_verification.php');
  require_once(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
  require_once(dirname(__FILE__) . '/../../core/abre_functions.php');
  $email=$_SESSION['useremail'];
  $stmt1 = $db->stmt_init();
  $sqll="INSERT INTO moods (user_ID, last_mood, mood_history, siteID) VALUES ()";
  //$sql1="INSERT INTO mood_table (StudentID, Email, Daterow, Timerow, Feeling) VALUES ('$studentid', '$email','$datevar', '$timevar', '$emojimood')";
  $stmt1->prepare($sql1);
  $stmt1->execute();
  $stmt1->close();

?>
