<?php session_start();
# $username = $_SESSION['name'];

$index = $_POST['hma'];
include ('connect.php');
?>
<html>
<head><title>Bibliography</title>
<LINK REL=StyleSheet HREF="flyout_h.css" style type="text/css"> 
</style>
</head>
<body>

<h1> Bibliography </h1>
<form id="bibliography" action="proc_bibliography.php" method="post" style="position: static; display: block; width: 52%; margin: 0 auto; margin-top: 50px;" >
<label for="btype">Type of Bibliography</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<label for="status">Publication Status</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Year:
&nbsp;&nbsp;

Month:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Day:
&nbsp;&nbsp;&nbsp;&nbsp;
Peer Review:
<br>
<select name="btype" id="btype">
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name="status" id="btype">
<option value="none">  </option>
<option value="Accepted/in press">Accepted/in press</option>
<option value="in preparation">in preparation</option>
<option value="rejected">rejected</option>
<option value="submitted">submitted</option>
<option value="published">Published</option>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="text" name="year" size="5" />
&nbsp;
<select name="month" id="Month">
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
&nbsp;&nbsp;&nbsp;
<input type="text" name="day" size="4" /> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!-- <input type="checkbox" name="peerr[]" value="yes" /> -->
<select name="peer_review" >
<option value=""> </option>
<option value="0">no </option>
<option value="1">yes </option>
</select>
<br><br>
<label id="abstract"> Title of Abstract, Article, Chapter etc</label><br>
 <input type="text" name="title" id="ttitle" size="90" />

<br><br>
<label id="periodical">Title of Periodical</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;


<label for="volume">Volume</label>
&nbsp;&nbsp;

<label for="issue">Issue</label>
&nbsp;

<label for="edition">Edition</label>
&nbsp;

<label for="pages">Pages</label>


<br>
 <input type="text" name="periodical" id="tperiodical" size="60" />
<input type="text" name="volume" size="6" />
&nbsp;
<input type="text" name="issue" size="6" />
&nbsp;
<input type="text" name="edition" size="6" />
<input type="text" name="pages" size="12" />
<br><br>
<label id="book">Title of Book</label>&nbsp; 
<input type="text" name="book" id="tbook" size="90" />
<br>
<label id="editor">Editor(s)</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

<input type="text" name="editor" id="teditor" size="90" />
<br>
<label id="publisher">Publisher</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="text" name="publisher" id="tpublisher" size="90" />
<br>

<label for="place">Place of Publication</label>
<input type="text" name="place" size="60" />
<br><br>
<br>
<label for="authors">
&nbsp;&nbsp;&nbsp;
Order
&nbsp;&nbsp;&nbsp;&nbsp;
Author
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;

Resident
</label>
<br>
<table id="authors" style="width: 100%;" border="1">

<?php
$i = 0;
while($i < $index) {
$i++;
$fauthor = '<tr><td> <input type="text" name="order" size="3" value=';
$fauthor .=$i;
$fauthor .= '>'; 
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .= '<input type="text" name="author'.$i.'"';
$fauthor .='size="75">';
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$fauthor .='&nbsp;&nbsp;&nbsp;';
$fauthor .='<input type="checkbox" name="res'.$i.'"';
$fauthor .= ' value="yes"></td></tr>';
echo ($fauthor);
}
?>
</table>
<br><br><br>
<input style="display: block; margin: 0 auto;" type="submit" value="Save">

</form>
</body>
</html>
<!--
<ul class="addLink">
<li><a href="number_authors.html" >New Entry</a></li>
</ul>

 <div id="menu4">
<li><a href="number_authors.html" >New Entry</a></li>
</div> -->
