<?php session_start();
# include ('cme.html');
// $attend = $_SESSION['attend'];
//$idx = $_SESSION['idx'];
$msg = "Dr. $name<br>";
$username = $_SESSION['uname'];
 $institution = $_SESSION['institution'];
 $name = $_SESSION['name'];
 
$dt = explode('/',$_POST['dc']);
$dy = $dt[2];
$dm = $dt[0];
$dd = $dt[1];
#$date = $_POST['dc'];
$date = $dy.'-'.$dm.'-'.$dd;
$type = $_POST['type'];
$title = $_POST['title'];
$credit = $_POST['credit'];
# $total = $_POST['total'];
$problem = false;
if($_POST['dc'] == null || $_POST['type'] == null || $_POST['title'] == null || $_POST['credit'] == null ) {
$problem = true;
# $msg .= "You did not fill out the form<br>";
}

# $msg .="CME Date: $date<br>";
# $msg .="Type: $type<br>"; 
# $msg .="Credit: $credit<br>"; 
# $msg .="Title: $title<br>"; 
if($_POST && $problem == false ) {
include ('connect.php');
$sql = "INSERT INTO cme VALUES  ('', '$date', '$title', '$type', '$credit', '$username' ) ";

$rs = mysqli_query($mysql, $sql) or die("Cannot insert into CME");
if($rs > 0) {
 include('closedb.php');
header("Location: ../workbook2.php");
 # $msg .= "New Record added to CME table<br>";
 }

}

?>

