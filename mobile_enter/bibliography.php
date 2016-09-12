<?php session_start();
# $username = $_SESSION['name'];

$index = $_POST['hma'];
include ('connect.php');
?>
<html>
<head><title>Bibliography</title>
<LINK REL=StyleSheet HREF="flyout_h.css" style type="text/css"> 
</style>

<style>
input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  padding: 10px;
}
</style>


</head>
<body style="width=100%;">

<h1 style="text-align: center; font-size: 80px;"> Bibliography </h1>
<form id="bibliography" action="proc_bibliography.php" method="post" style="border: 2px solid navy; display: block; margin: 0 auto; width: 70%; margin-top: 70px; margin-bottom: 140px;" >

<span style="display: block; margin: 0 auto; text-align: center; font-size: 60px;">

<label for="btype">Type of Bibliography</label>
<br>
<select style="height: 60px; width: 200px;" name="btype" id="btype">
<option value="none"> </option>
<option value="Abstract">Abstract</option>
<option value="Article">Article</option>
<option value="Book">Book</option>
<option value="Book Chapter">Book Chapter</option>
<option value="Case Report">Case Report</option>
<option value="Editorial">Editorial</option>
<option value="Invited Paper">Invited Paper</option>
<option value="Monograph">Monograph</option>
<option value="Thesis">Thesis</option>
<option value="Curriculum">Curriculum</option>
<option value="Poster">Poster</option>
</select>
<br><br>

<label for="status">Publication Status</label>
<br>
<select style="height: 60px; width: 200px;" name="status" id="btype">
<option value="none">  </option>
<option value="Accepted/in press">Accepted/in press</option>
<option value="in preparation">in preparation</option>
<option value="rejected">rejected</option>
<option value="submitted">submitted</option>
<option value="published">Published</option>
</select>
<br><br>

<label for="status">Year</label>
<br>
<input style="height: 60px; width: 200px;" type="text" name="year" size="5" />
<br><br>

<label for="status">Month</label>
<br>
<select style="height: 60px; width: 200px;"  name="month" id="Month">
<option value=" "> </option>
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
</select>
<br><br>


<label for="status">Day</label>
<br>
<input style="height: 60px; width: 200px;" type="text" name="day" size="4" /> 
<br><br>

<label for="status">Peer Review</label>
<br>
<!-- <input type="checkbox" name="peerr[]" value="yes" /> -->
<select style="height: 60px; width: 200px;"  name="peer_review" >
<option value=""> </option>
<option value="0">no </option>
<option value="1">yes </option>
</select>
<br><br>

<label id="abstract"> Title of Abstract,<br> Article, Chapter etc</label>
<br>
<input type="text" name="title" id="ttitle" style="height: 80px;" size="60"/>
<br><br>

<label id="periodical">Title of Periodical</label>
<br>
<input type="text" name="periodical" id="tperiodical" style="height: 80px;" size="60"/>
<br><br>

<label for="volume">Volume</label>
<br>
<input style="height: 80px; width: 200px;" type="text" name="volume"  />
<br>

<label for="issue">Issue</label>
<br>
<input style="height: 80px; width: 200px;" type="text" name="issue" size="6" />
<br>

<label for="edition">Edition</label>
<br>
<input style="height: 80px; width: 200px;" type="text" name="edition" size="6" />
<br>

<label for="pages">Pages</label>
<br>
<input style="height: 80px; width: 200px;" type="text" name="pages" size="12" />
<br><br>

<label id="book">Title of Book</label>
<br>
<input style="height: 80px;" size="60" type="text" name="book" id="tbook"  />
<br>

<label id="editor">Editor(s)</label>
<br>
<input type="text" name="editor" id="teditor" style="height: 80px;" size="60" />
<br>

<label id="publisher">Publisher</label>
<br>
<input type="text" name="publisher" id="tpublisher" style="height: 80px;" size="60" />
<br><br>

<label for="place">Place of Publication</label>
<br>
<input type="text" name="place" style="height: 80px;" size="60" />
<br>
<br>

<label for="authors">
Order
&nbsp;
Author
&nbsp;
Resident
</label>
<br>

<table id="authors" style="width: 100%; display:block; margin: 0 auto;" border="1">

<?php
$i = 0;
while($i < $index) {
$i++;
$fauthor = '<tr style="margin-bottom:10px;"><td> <input style="height: 80px;" type="text" name="order" size="3" value=';
$fauthor .=$i;
$fauthor .= '>'; 
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .= '<input style="height: 80px;" type="text" name="author'.$i.'"';
$fauthor .='size="50">';
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .='&nbsp;&nbsp;&nbsp;';
$fauthor .='<input style="height: 80px;" type="checkbox" name="res'.$i.'"';
$fauthor .= ' value="yes"></td></tr>';
echo ($fauthor);
}
?>
</table>
<br>
<input style="display: block; margin: 0 auto; height: 80px; width: 200px;" type="submit" value="Save">

</span>
</form>
</body>
</html>

<!--
<ul class="addLink">
<li><a href="number_authors.html" >New Entry</a></li>
</ul>

 <div id="menu4">
<li><a href="number_authors.html" >New Entry</a></li>
</div> 
-->
