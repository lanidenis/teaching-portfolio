<?php session_start();
$username = $_SESSION['uname'];
$pid = $_GET['hid'];

//echo "<p>".$username."</p>";
//echo "<p>".$pid."</p>";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>Create Feedback Form</title>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
	<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css" />
	<![endif]-->

	<!-- JS -->
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script> 
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="validation/jquery.validate.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	<script type="text/javascript" src="js/jquery.validate.pack.js"></script>
	<script type="text/javascript" src="js/init.js"></script>

</head>

<body id="feedback" >
	<!-- Container -->	
	<div id="container"><div id="container-inner">

		<p style="text-align: center; font-size: 32px; margin: 0px; padding: 0px;">Create Feedback Form</p>
		
		<form id="portfolio" action="create_feedback2.php" method="post" multipart/form-data>
			<fieldset>
				<p class="introduction">&nbsp;&nbsp;&nbsp; Below, please enter the title of the feedback form you wish to create, and select the number of each type of question you wish to have.</p>

	<fieldset>

<div>
<label for="title">Form Title</label>
<input type="text" style="width: 280px; height: 15px;" name="title" id="title" class="required" title="title" />
</div>
<br>

<div>
<label for="yes">Yes/No</label>
<select name="yes" id="generic" class="required" title="yes">
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
</div>
<br>

<div>
<label for="mult">Multiple Choice</label>
<select name="mult" id="generic" class="required" title="mult">
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
</div>
<br>

<div>
<label for="short">Short Response</label>
<select name="short" id="generic" class="required" title="short">
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
</div>
<br>

<div>
<label for="long">Long Response</label>
<select name="long" id="generic" class="required" title="long"> 
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
</div>
<br>

<div>
<label for="drop">Drop-Down Menu</label>
<select name="drop" id="generic" class="required" title="drop">
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
</div>
<br>

<div>
<label for="scroll">Scroll Through Box</label>
<select name="scroll" id="generic" class="required" title="scroll">
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
</div>
<br><br>

<!--The ENT_QUOTES flag allows entity conversion of php single and double quotes to writable html ones -->
<input type=hidden name=username value="<?php echo $username; ?>" />
<input type=hidden name=pid value="<?php echo $pid; ?>" />
<!-- session_start(); echo htmlspecialchars($_SESSION['record'], ENT_QUOTES); -->

				</fieldset>
		
				<!-- Controls -->
				<!-- <div class="controls"> -->
<input style="width: 80px; display: block; margin: 0 auto; border-radius: 25px; height: 35px; font-size: 18px; background: white;" name="submit" type="submit" value="Submit" />
				<!-- </div> -->
	</fieldset>
	<p class="log-in"><a href="view.php">Homepage</a></p>
	</form>
			
	</div></div>	<!-- /Container -->
	
</body>
</html>
