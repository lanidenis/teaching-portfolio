<?php session_start();
// $idx = $_SESSION['idx'];
// $attend = $_SESSION['attend'];
 $username = $_SESSION['uname'];
$institution = $_SESSION['institution'];
$name = $_SESSION['name'];


$msg = "Dr. $name<br>";
$awards = $_POST['awards'];
$eval = $_POST['evaluation'];
$date = $_POST['aw_date'];
$problem = false;
if($awards == null) {
$msg .="Please enter awards<br>";
$problem = true;
}
if($_POST && !$problem) {
include ('connect.php');
$query = "INSERT INTO awards VALUES ('', '$awards', '$eval', '$date', '$username' ) ";
$rs = mysqli_query($mysql, $query) or die("Cannot insert into awards");
include ('closedb.php');
if($rs > 0) { 
header("Location: ../workbook2.php");
$msg .="Record entered into awards<br>$awards<br>$date";}
}
?>


