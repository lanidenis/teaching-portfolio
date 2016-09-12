<?php session_start();
$attend = $_SESSION['attend'];
$idx = $_SESSION['idx'];
$method = $_POST['method'];
$session = $_POST['session'];
$presentor = $_POST['presentor'];
$presentation = $_POST['presentation'];
$audience  = $_POST['audience'];
$evaluation = $_POST['evaluation'];
$title = $_POST['title'];
$meeting = $_POST['meeting'];
$authors = $_POST['authors'];
$location = $_POST['location'];
$year  = $_POST['year'];
$month = $_POST['month'];
$msg = null;
$problem = false;
if($_POST['presentor'] != null) { $msg .="Presented by:  $presentor";  }
if($_POST['presentor'] == null) {
 $problem = true; $msg .="Please select presentor<br>"; }
if($_POST['presentation']  == null) {
 $problem = true; $msg .="What kind of activity?<br>"; }
if($_POST['title'] == null) {
 $problem = true; $msg .="You forgot to enter Title<br>"; }
if($_POST['location'] == null || $_POST['year'] == null || $_POST['month'] == null) {
 $problem = true; $msg .="Please enter location, year and select month<br>"; 
}
if($_POST && !$problem) { 
include ('connect.php');
$sql = "INSERT INTO presentations VALUES ('', '$idx', '$presentor', '$title', '$method', '$session', '$authors', '$audience', '$evaluation', '$meeting', '$presentation', '$location', '$year', '$month') ";
$rs=mysqli_query($mysql, $sql) or die ("Cannot insert data into Presentation table");


include ('closedb.php');
}

include('workbook.php');

?>
<html>
<!--
<head><title>Process Presentations</title>
<style type="text/css">
@import url(tp.css);
</style>
</head>
<body>
<div id="low_comment">
<?php print $msg; echo '<br><br><br>'; ?>
 <div id="menu14">
<li><a href="scholar.php" >More Presentations?</a></li>
</div>
<div>  -->

</body>
</html>