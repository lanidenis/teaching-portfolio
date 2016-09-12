<?php session_start();
#$username = $_SESSION['name'];
#$idx = $_SESSION['idx'];
# $attend = $_SESSION['attend'];
 $username = $_SESSION['uname'];
$institution = $_SESSION['institution'];
$name = $_SESSION['name'];
$array_attend = array();
include ('connect.php');
	$sql = "SELECT * from profile";
	$rs =mysqli_query($mysql, $sql) or die("Cannot execute query");
while($row = mysqli_fetch_row($rs)) {
$uid = $row[5];
$lname = $row[0];
$fname = $row[1];
$attend = $lname.', '.$fname;
$array_attend[$uid] =  $attend;
#echo $attend.'  '.$uid.'<br>';
}
mysqli_close($mysql);
 ?>
 
<HTML> 
<head><title>Teaching / Presentations</title>
<LINK REL=StyleSheet HREF="tp.css" style type="text/css"> 
</style>

<style>
	span {display: block;}
</style>

</head>
<body>

<div style="display: block; background-color: grey; width:100%; height: 555px; margin-top: 35px; margin-bottom: 30px; position: absolute; z-index: -1;">
</div> 
 
<form style="position: static; display: block; width: 610px; height: 510px; margin: 0 auto; margin-top: 57px;" id="bibliography" action="scholar2.php" method="post">

<!-- <form id="bibliography" action="<?php $_SERVER['PHP_SELF'] ?>"  method="post"> 
<form id="bibliography" action="scholar2.php"  method="post" enctype="multipart/form-data"> -->

<h5 style="display: block; margin: 0 auto; padding-top: 20px;"> Teaching / Presentations </h5> <br><br>

<span style="margin-left: 110px;">
<label for="method">Method</label>
<input type="text" name="method" size="20" />
<label for="session" style="margin-left: 20px;" >Hours Session</label>
<input style= type="text" name="session" size="10" />  <br><br>
</span>

<b style="display: block; margin: 0 auto; text-align: center"> Upload your file here</b> 
<input style="display: block; margin: 0 auto; padding-left: 75px;" name="userfile" type="file"/>

<br /><br />

<label style="margin-left: 100px;" for="arow">Presentor:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Activity/Presentation:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;

Audience:
</label>

<br>
<?php
echo '<select style="margin-left: 80px;" name="presentor" id="presentor" required>';
echo '<option value="none">Select Name</option>\n';
 foreach ($array_attend as $key => $value) {
 $selected = '<option value=';
$selected .=$key;
$selected .='>';
$selected .=$value;
$selected .='</option>\n';
echo ($selected);
  }
echo '</select>';
?>

<select style="margin-left: 30px;" name="presentation" id="presentation" required>
<option value="none"> </option>
<option value="clinical">Departmental/Clinical</option>
<option value="non_clinical">Departmental/NonClinical</option>
<option value="interdepartmental">Interdepartmental</option>
<option value="international">International</option>
<option value="national">National</option>
<option value="regional">Regional</option>
</select>

<select style="margin-left: 30px;" name="audience" id="btype" style="margin-right: 50px">
<option value="none"> </option>
<option value="public">General Public</option>
<option value="physicians">Physicians</option>
<option value="students">Students</option>
<option value="others">Others</option>

</select><br><br>


<label style="display: block; margin: 0 auto; text-align: center;" for="evaluation">Evaluation Feedback:</label>
<textarea style="display: block; margin: 0 auto;" name="evaluation" row="7" cols="30"></textarea>
<br />



<label style="margin-left: 30px;" for="title">Title</label><br>
<input style="margin-left: 30px;" type="text" name="title" id="title" size="90" required/> <br />
<label style="margin-left: 30px;" for="meeting">Meeting</label><br>
<input style="margin-left: 30px;" type="text" name="meeting" id="meeting" size="90" /> <br />
<label style="margin-left: 30px;" for="authors1">Authors</label><br>
<input style="margin-left: 30px;" type="text" name="authors" id="authors1" size="90" /> <br />

<label style="margin-left: 30px;" for="location">Location
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Year
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Month
</label><br>
<input style="margin-left: 30px;" type="text" name="location" id="location" size="50" required/>
<input style="margin-left: 30px;" type="text" name="year" id="year" size="5" /> 
<select style="margin-left: 30px;" name="month" id="month">
<option value="none"> </option>
<option value="Jan">January</option>
<option value="Feb">February</option>
<option value="Mar">March</option>
<option value="Apr">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="Aug">August</option>
<option value="Sep">September</option>
<option value="Oct">October</option>
<option value="Nov">November</option>
<option value="Dec">December</option>
</select>
<br><br><br>


<input type="submit" value="Submit" style="display: block; margin: 0 auto; font-size:24px;" />


</form>
</body>
</HTML> 



