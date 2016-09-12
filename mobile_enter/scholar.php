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
 
<!--
<HTML> 
<head><title>Teaching / Presentations</title>
<LINK REL=StyleSheet HREF="tp.css" style type="text/css"> 
</style>

<style>
	span {display: block;}
</style>

</head>
<body>
-->

<div style="display: block; background-color: #d3d3d3; width:100%; height: 100px;"></div>
<div style="display: block; background-color: #d3d3d3; width:100%; height: 4500px; margin-bottom: 50px;">
 
<form style="
  	    background:  #fdedf2;     
            border: 2px solid maroon;	
	    width: 70%;               
	    display: block;
            margin: 0 auto;" action="mobile_enter/scholar2.php" method="post">

<!-- <form id="bibliography" action="<?php $_SERVER['PHP_SELF'] ?>"  method="post"> 
<form id="bibliography" action="scholar2.php"  method="post" enctype="multipart/form-data"> -->

<span style="display: block; margin: 0 auto; text-align: center; color: maroon; font-size: 70px;">
<b><p style="font-size: 72px; display: block; text-align: center; margin: 0 auto; margin-top: 30px; width: 90%; color: maroon;">Teaching/ Presentations</p></b>
<br>


<label for="method">Method</label>
<br>
<input style="height: 60px; width: 300px;" type="text" name="method"  />
<br><br>

<label for="session">Hours Session</label>
<br>
<input style="height: 60px; width: 300px;" style= type="text" name="session"  />  
<br><br>


<label for"userfile">Upload Your <br> File Here</label>
<br>
<input style="margin-left: 60px;" name="userfile" type="file" size= "60"/>
<br><br>

<label for="arow">Presentor</label>
<br>
<?php
echo '<select style="height: 60px; width: 200px;" name="presentor" id="presentor" required>';
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
<br><br>

<label for="arow">Activity/<br>Presentation</label>
<br>
<select style="height: 60px; width: 200px;" name="presentation" id="presentation" required>
<option value="none"> </option>
<option value="clinical">Departmental/Clinical</option>
<option value="non_clinical">Departmental/NonClinical</option>
<option value="interdepartmental">Interdepartmental</option>
<option value="international">International</option>
<option value="national">National</option>
<option value="regional">Regional</option>
</select>
<br><br>

<label for="arow">Audience</label>
<br>
<select style="height: 60px; width: 200px;" name="audience" id="btype">
<option value="none"> </option>
<option value="public">General Public</option>
<option value="physicians">Physicians</option>
<option value="students">Students</option>
<option value="others">Others</option>
</select>
<br><br>


<label for="evaluation">Evaluation<br>Feedback</label>
<br>
<textarea name="evaluation" rows="30" cols="90"></textarea>
<br><br>

<label for="title">Title</label>
<br>
<input style="height: 120px; width: 500px;" type="text" name="title" id="title" size="90" required/> 
<br><br>

<label for="meeting">Meeting</label>
<br>
<input style="height: 120px; width: 500px;" type="text" name="meeting" id="meeting" size="90" />
<br><br>

<label for="authors1">Authors</label>
<br>
<input style="height: 120px; width: 500px;" type="text" name="authors" id="authors1" size="90" />
<br><br>

<label for="location">Location</label>
<br>
<input style="height: 120px; width: 500px;" type="text" name="location" id="location" size="50" required/>
<br><br>

<label for="year">Year</label>
<br>
<input style="height: 60px; width: 300px;" type="text" name="year" id="year" size="5" /> 
<br><br>

<label for="month">Month</label>
<br>
<select style="height: 60px; width: 200px;" name="month" id="month">
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
<br><br>

<input style="height: 60px; width: 200px; margin-bottom: 60px;" type="submit" value="Submit"/>

</span>
</form>
</div>

<!--
</body>
</HTML> 
-->


