<?php
session_start();
$date = date('d,m,Y',strtotime($_POST['date']));
$split = explode(",", $date);
$day = intval($split[0]);
$month = intval($split[1]);
$year = intval($split[2]);
$jd = gregoriantojd($month,$day,$year);
$dow = jddayofweek($jd, 0);
$time = $_POST['catalog_1'];
$ampm = $_POST['am_pm'];
$_SESSION['dow'] = $dow;
$_SESSION['time'] = $time;
$_SESSION['AMorPM'] = $ampm;
require './studentRequestReturn.php';
