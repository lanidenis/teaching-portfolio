<?php session_start();
// $username = $_SESSION['name'];
//$attend = $_SESSION['attend'];
// $idx = $_SESSION['idx'];
 $username = $_SESSION['uname'];
$institution = $_SESSION['institution'];
$name = $_SESSION['name'];

$pr = $_POST['peer_review'];
$btype = $_POST['btype'];
$status = $_POST['status'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
$title = $_POST['title'];
$periodical = $_POST['periodical'];
$book = $_POST['book'];
$editor = $_POST['editor'];
$publisher = $_POST['publisher'];
$place = $_POST['place'];
$volume = $_POST['volume'];
$issue = $_POST['issue'];
$edition = $_POST['edition'];
$pages = $_POST['pages'];
$loop = $_POST['order'];
$publ = getIndex();
$problem = false;

$msg = "Dr. $name <br> BType: $btype <br>status: $status  <br> on: $month,  $day  $year <br> title:  $title <br> periodical: $periodical <br> Book: $book <br> editor: $editor <br> publisher: $publisher <br>
place of publication: $place<br> peer review:    $num <br> ";

 
if ($title == NULL) { $msg .= "Title is missing<br>"; $problem = true; }
if($_POST['author1'] == Null) {  $msg .= "Who is the author? <br>"; $problem = true;}
if ($btype == NULL) {  $msg .= "What type of bibliography is it?<br>"; $problem = true;}
if($status == Null) {  $msg .= "What is the status of bibliography?<br> "; $problem = true; }
if(($title == NULL) && ($periodical == Null) &&  ($book == NULL) &&  ($editor == NULL) &&  ($publisher == NULL)) 
 {  $msg .= "Not enough information to proceed<br>"; $problem = true; }


 if($_POST && !$problem && $$username != null)  {
include ('connect.php');
$insert = "INSERT INTO bibliography VALUES   ( '$publ', '$title', '$book','$periodcal', '$publisher', '$place', '$editor', '$year', '$month', '$day', '$volume', '$issue', '$edition', '$pages', '$status', '$btype', '$pr', '$username') ";
$rs=mysqli_query($mysql, $insert) or die ("Cannot insert data into Bibliography table");
if($rs >0 ) { $msg .= "Record Entered<br>";} 
      for($i = 1; $i <= $loop; $i++) {
$aut = "author".$i;
$resident = "res".$i;
 $ord =  $i;
 $auth = $_POST[$aut]; 
 $blres = $_POST[$resident]; 
 if($blres == "yes") { $blres = 1; }

$sql = "INSERT INTO authors   VALUES ('', '$auth', '$ord', '$blres', '$publ' ) ";
$rs = mysqli_query($mysql, $sql) or die("Cannot insert into Authors");

if($rs >0 ) {

 $msg .= "$ord, $auth, $blres <br>"; }

}
 mysqli_close($mysql);
 }
?>
<html>
<head><title>Process Bibliography</title>
<style type="text/css">
@import url(flyout_h.css);
</style>
</head>
<!-- <div id="comment">
<?php # print $msg; echo '<br> <br> <br>';

 ?> -->
<!-- <ul class="addLink">
<li><a href="number_authors.html" >New Entry</a></li>
</ul>

 <div id="menu14">
<li><a href="number_authors.html" >More Publications?</a></li>
</div>
</div> -->
<?php
function getIndex() {
include ('connect.php');
$sqlid = "SELECT MAX(PubID) FROM bibliography";
$result = mysqli_query($mysql, $sqlid) or die("Cannot find Publication ID");
$row = mysqli_fetch_row($result);
$pid = $row[0] + 1;
mysqli_close($mysql);
return $pid;
}
header("Location: ../workbook2.php");
?>
