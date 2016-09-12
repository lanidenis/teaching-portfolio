<?php session_start();
//$idx = $_SESSION['idx'];
//$attend = $_SESSION['attend'];
 $username = $_SESSION['uname'];
$institution = $_SESSION['institution'];
$name = $_SESSION['name'];
$msg = "Dr. $name<br>";
$activities = $_POST['activities'];
$appointment = $_POST['appointment'];
$institution = $_POST['institution'];
$from = $_POST['from'];
$to = $_POST['to'];
$description = $_POST['description'];
$problem = false;
if($activities == null || $appointment  == null || $institution  == null || $from == null) {
$msg .="You have to fill out form before submitting<br>";
$problem = true;
}
if($_POST && !$problem && $username != null) {
include ('connect.php');
$query = "INSERT INTO ProfAppointments VALUES ('', '$appointment', '$institution', '$from', '$to', '$activities', '$description', '$username' ) ";
$rs = mysqli_query($mysql, $query) or die("Cannot insert into prof activities");
include ('closedb.php');
if($rs > 0) { 
$msg .="Record entered into Professional Appointments<br>$appointment<br>$activities<br>$institution";
header("Location: ../workbook2.php");
}

}

