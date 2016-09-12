<?php session_start();
 //include ('moca.html');
// $attend = $_SESSION['attend'];
//$idx = $_SESSION['idx'];

$username = $_SESSION['uname'];
 $institution = $_SESSION['institution'];
 $name = $_SESSION['name'];
 $msg = "Dr. $name<br>";

$dt = explode('/',$_POST['dc']);
$dy = $dt[2];
$dm = $dt[0];
$dd = $dt[1];

$mdate = $dy.'-'.$dm.'-'.$dd;
$status = $_POST['status'];
#echo 'Status: ' .$status.'</br />';
$activity = $_POST['activity'];
$title = $_POST['title'];
$credit = $_POST['credit'];
# print  $institution.'  '.$username.'<br />';
# echo $title.' '.'<br />';
# print 'Date, status, activity: '. $mdate.' '.$status. ' '.$activity.' '.$credit;

$problem = false;
# echo '<br />'.$msg;

if($_POST['dc'] == null || $_POST['activity'] == null || $_POST['title'] == null || $_POST['credit'] == null ) {
$problem = true;
 $msg .= "You did not fill out the form<br>";
 print $msg.'<br />';
}

# $msg .="M Date: $date<br>";
# $msg .="Type: $<br>"; 
# $msg .="Credit: $credit<br>"; 
# $msg .="Title: $title<br>"; 
# print $msg;

if($_POST && $problem == false ) {

include ('connect.php');
$sql = "INSERT INTO MOCA VALUES ('', '$username', '$status', '$activity', '$title', '$mdate', '$credit') ";

$rs = mysqli_query($mysql, $sql) or die("Cannot insert into MOCA");
if($rs > 0) {
include ('closedb.php');
header("Location: ../workbook2.php");
  $msg .= "New Record added to MOCA table<br>";
 }

}

?>

