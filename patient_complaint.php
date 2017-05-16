<?php 
session_start();
if (isset($_POST['subcomplain'])){
	$mycomplain=$_POST['txtcomplain'];
	
	$myptncode=$_POST['codepasien'];
	$mycompdate=$_POST['txtdate'];
	$mycomptxt=$_POST['txtcomplain'];
	$mycompno="CMP".date('Ymd',strtotime($mycompdate)).".".rand(9999,100000);
	$sqlinsert_complain= "INSERT INTO cdtcomplain (compno,ptncode,actcode,compdate,comptext) VALUES ('$mycompno','$myptncode','zero','$mycompdate','$mycomptxt')";
	mysql_connect('localhost','root','root');	
	mysql_select_db('cappamed');
	$resultinsert=mysql_query($sqlinsert_complain);
	if(!$resultinsert) {
	   	 die("Database query failed: " . mysql_error());
	   	 echo 'NO DATA';
	   	 exit;
			}
}
?>
<html>
<head>
<meta content="en-us" http-equiv="Content-Language">
<link rel="stylesheet" type="text/css" href="menu.css"/>

<style type="text/css">
.auto-style1 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: large;
	color: #FFFAFA; 
	background-color: #FF3300;
}
.auto-style3 {
	font-family: Calibri;
	font-size: small;
	color: #5A66F1;
}
</style>
</head>
<ul>
  <li><a class="active" href="/xlogin.php">About</a></li>
  <li class="dropdown">
    <a href="#" class="dropbtn">Medical</a>
    <div class="dropdown-content">
      <a href="/inventory.php">Inventory Apothecary</a>
      <a href="/opensales2.php">Open Sales</a>
    </div>
   </li>
  <li class="dropdown">
    <a href="#" class="dropbtn">Patient</a>
    <div class="dropdown-content">
      <a href="/register_patient.php">Register Patient</a>
      <a href="/search_complaint.php">Search Complaint</a>
      <a href="/masterroom.php">Master Room</a>
      <a href="/room_group.php">Group Room</a>
    </div>
  </li>
</ul>


<table style="width: 100%">
	<tr>
		<td class="auto-style1">PATIENT COMPLAINT&nbsp;</td>
	</tr>
</table>



</html>
	

<?php
if (isset($_GET['ptncode']))
{
	$mynoptn=$_GET['ptncode'];
	$sqlcomplaint="SELECT * FROM cdtpatient WHERE ptncode='$mynoptn'";
	mysql_connect('localhost','root','root');
	mysql_select_db('cappamed');
	$resultsearch=mysql_query($sqlcomplaint);
	if(!$resultsearch) {
	   	 die("Database query failed: " . mysql_error());
	   	 echo 'NO DATA';
	   	 exit;
			}
	else{
		echo "<table>";
		while($row = mysql_fetch_array( $resultsearch )) {
			$myptncode=$row['ptncode'];
			echo '<table style="width: 100%">';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>CODE</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptncode'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>FULLNAME</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnname'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>ADDRESS</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnaddress'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>KELURAHAN</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnklrh'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>KECAMATAN</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnkcmt'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>UMUR</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptndob'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>PHONE</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnphone'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>GENDER</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptngender'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>BLOOD TYPE</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnblood'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>RELIGION</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnreligion'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>SUAMI/ISTRI NAME</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnhusband'].'</td></tr>';
			echo '</table>';
			echo '<form method="post">';
			echo '<table style="width: 100%">';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>DATE</strong></td><td><input type="date" name="txtdate"></td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>KELUHAN</strong></td><td><textarea name="txtcomplain" style="width: 223px; height: 146px"></textarea></td></tr><br>';
			echo '<input type="hidden" value="'.$myptncode.'" name="codepasien" />';
			echo '</table>';
			echo '<br><input name="subcomplain" type="submit" value="Submit Complain"></form>';
			}
			echo '<br><br><a href="/patient_hist.php?ptncode='.$myptncode.'" class="auto-style3">History</a>';
		}
}

?>

