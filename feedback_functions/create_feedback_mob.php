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

<body id="sign-up" >
	<!-- Container -->	
	<div id="container"  style="margin-bottom: 70px;"><div id="container-inner">

		<h1 id="goodie">Create Your <br> Feedback Form</h1>
		<p class="log-in"><a href="view2.php">Go back</a>.</p>
		<form id="portfolio" action="create_feedback_mob2.php" method="post" multipart/form-data>
			<fieldset>
				<p class="introduction"><b>&nbsp;&nbsp;&nbsp; Below, please enter the title of the feedback form you wish to create, and select the number of each type of question you wish to have.</b></p>

	<fieldset>
	
<span style="display: block; margin: 0 auto; text-align: center">
<label for="title">Form Title</label>
<br>
<input style="height: 50px; width: 400px;" type="text" name="title" id="title" class="required" title="title" />
<br><br><br>

<label for="yes">Yes/No</label>
<br>
<select style="height: 60px; width: 200px;" name="yes" id="generic" class="required" title="yes">
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
<br><br><br>

<label for="mult">Multiple Choice</label>
<br>
<select style="height: 60px; width: 200px;" name="mult" id="generic" class="required" title="mult">
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
<br><br><br>

<label for="short">Short Response</label>
<br>
<select style="height: 60px; width: 200px;" name="short" id="generic" class="required" title="short">
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
<br><br><br>

<label for="long">Long Response</label>
<br>
<select style="height: 60px; width: 200px;" name="long" id="generic" class="required" title="long"> 
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
<br><br><br>

<label for="drop">Drop-Down Menu</label>
<br>
<select style="height: 60px; width: 200px;" name="drop" id="generic" class="required" title="drop">
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
<br><br><br>

<label for="scroll">Scrolling Box</label>
<br>
<select style="height: 60px; width: 200px;" name="scroll" id="generic" class="required" title="scroll">
<option value=""></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>						
</select>
<br><br><br>

<!--The ENT_QUOTES flag allows entity conversion of php single and double quotes to writable html ones -->
<input type=hidden name=username value="<?php echo $username; ?>" />
<input type=hidden name=pid value="<?php echo $pid; ?>" />
<!-- session_start(); echo htmlspecialchars($_SESSION['record'], ENT_QUOTES); -->

				</span>
				</fieldset>
		
				<!-- Controls -->
				<!--<div class="controls">-->
<input style="height: 80px; width: 35%; position: static; background: grey; display: block; margin: 0 auto; font-size: 40px; margin-top: 20px; margin-bottom:50px; text-align: center;" name="submit" type="submit" value="Submit" />
				<!--</div>-->
	</fieldset>
	</form>
			
	</div></div>	<!-- /Container -->
	
</body>
</html>
