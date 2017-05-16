<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" type="text/css" href="menu.css"/>

<title>Search Patients</title>
&nbsp;<style type="text/css">
.auto-style2 {
	font-family: Calibri;
	font-size: small;
	color: #9104C5;
}
			.auto-style3 {
				font-family: Verdana, Geneva, Tahoma, sans-serif;
				color: #F8F7F8;
				background-color: #9966FF;
			}
			.auto-style4 {
				color: #8D8E94;
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
  <li class="dropdown">
    <a href="#" class="dropbtn">Reports</a>
    <div class="dropdown-content">
      <a href="rptmedicaltoday">Medical Today</a>
      <a href="#">Medical Period</a>
      <a href="#">Patient Today</a>
    </div>
  </li>

</ul>
<table style="width: 100%">
	<tr>
		<td class="auto-style3"><strong>SEARCH PATIENT</strong></td>
	</tr>
</table>
<body>

<form method="post">
<table style="width: 100%">
	<tr>
		<td class="auto-style2" style="width: 136px"><strong>Search by Patient 
		No</strong></td>
		<form method="post">
		<td class="auto-style1" style="width: 134px">
		
			<input name="txtno" type="text" autofocus="on" /></td>
		<td class="auto-style1">
		<input name="searchno" type="submit" value="Search" /></td></form>
	</tr>
	<tr>
		<td class="auto-style2" style="width: 136px"><strong>Search by Name</strong></td>
		<form method="post">
		<td class="auto-style1" style="width: 134px">
		
			<input name="txtname" type="text" /></td>
		<td class="auto-style1">
		<input name="searchname" type="submit" value="Search" /></td></form>
	</tr>
	<tr>
		<td class="auto-style2" style="width: 136px"><strong>Search by Address</strong></td>
		<form method="post">
		<td class="auto-style1" style="width: 134px">
		
			<input name="txtaddr" type="text" /></td>
		<td class="auto-style1">
		<input name="searchaddr" type="submit" value="Search" /></td></form>
	</tr>
	<tr>
		<td class="auto-style1" colspan="3"><hr /></td>
	</tr>
</table>
</form>
</body>

</html>
<?php
if (isset($_POST['searchno']))
{
	$mynoptn=$_POST['txtno'];
	$sqlcomplaint="SELECT * FROM cdtpatient WHERE ptncode like '%$mynoptn%'";
	mysql_connect('localhost','root','root');
	mysql_select_db('cappamed');
	$resultsearch=mysql_query($sqlcomplaint);
	
	$rowcount = mysql_num_rows($resultsearch);
	if ($rowcount==0){
		echo '<a href="/register_patient.php">No Data Found - Go to Register Patient</a>';
		}
	else
		{
		echo '<p class="auto-style4">Total Record(s) found: '.$rowcount.'</p>';
		while($row = mysql_fetch_array( $resultsearch )) 
		{
			
			$myptncode=$row['ptncode'];
			$myptnname=$row['ptnname'];
			$myptnaddr=$row['ptnaddress'];
			
			echo '<a href="/patient_complaint.php?ptncode='.$myptncode.'" class="auto-style2"> '.$myptncode.' - '.$myptnname.' - '.$myptnaddr.'</a>';
			echo '&nbsp&nbsp&nbsp&nbsp<a href="/urinecheck.php?ptncode='.$myptncode.'" class="auto-style2">URINE LAB</a>';
			echo '&nbsp&nbsp&nbsp&nbsp<a href="/chemcheck.php?ptncode='.$myptncode.'" class="auto-style2">CHEMICAL LAB</a>';
			echo '&nbsp&nbsp&nbsp&nbsp<a href="/hemacheck.php?ptncode='.$myptncode.'" class="auto-style2">HEMATOLOGY LAB</a><br><br>';
		}
		}
}

if (isset($_POST['searchname']))
{
	$mynoptn=$_POST['txtname'];
	$sqlcomplaint="SELECT * FROM cdtpatient WHERE ptnname like '%$mynoptn%'";
	mysql_connect('localhost','root','root');
	mysql_select_db('cappamed');
	$resultsearch=mysql_query($sqlcomplaint);
	
	$rowcount = mysql_num_rows($resultsearch);
	if ($rowcount==0){
		echo '<a href="/register_patient.php">No Data Found - Go to Register Patient</a>';
		}
	else
		{
		echo '<p class="auto-style4">Total Record(s) found: '.$rowcount.'</p>';

		while($row = mysql_fetch_array( $resultsearch )) 
		{
			
			$myptncode=$row['ptncode'];
			$myptnname=$row['ptnname'];
			$myptnaddr=$row['ptnaddress'];
			echo '<a href="/patient_complaint.php?ptncode='.$myptncode.'" class="auto-style2"> '.$myptncode.' - '.$myptnname.' - '.$myptnaddr.'</a>';
			echo '&nbsp&nbsp&nbsp&nbsp<a href="/urinecheck.php?ptncode='.$myptncode.'" class="auto-style2">URINE LAB</a>';
			echo '&nbsp&nbsp&nbsp&nbsp<a href="/chemcheck.php?ptncode='.$myptncode.'" class="auto-style2">CHEMICAL LAB</a>';
			echo '&nbsp&nbsp&nbsp&nbsp<a href="/hemacheck.php?ptncode='.$myptncode.'" class="auto-style2">HEMATOLOGY LAB</a><br><br>';
		}	
		}
}

if (isset($_POST['searchaddr']))
{
	$mynoptn=$_POST['txtaddr'];
	$sqlcomplaint="SELECT * FROM cdtpatient WHERE ptnaddress like '%$mynoptn%'";
	mysql_connect('localhost','root','root');
	mysql_select_db('cappamed');
	$resultsearch=mysql_query($sqlcomplaint);
	
	$rowcount = mysql_num_rows($resultsearch);
	if ($rowcount==0){
		echo '<a href="/register_patient.php">No Data Found - Go to Register Patient</a>';
		}
	else
		{
		echo '<p class="auto-style4">Total Record(s) found: '.$rowcount.'</p>';

		while($row = mysql_fetch_array( $resultsearch )) 
		{
			
			$myptncode=$row['ptncode'];
			$myptnname=$row['ptnname'];
			$myptnaddr=$row['ptnaddress'];
			echo '<a href="/patient_complaint.php?ptncode='.$myptncode.'" class="auto-style2"> '.$myptncode.' - '.$myptnname.' - '.$myptnaddr.'</a>';
			echo '&nbsp&nbsp&nbsp&nbsp<a href="/urinecheck.php?ptncode='.$myptncode.'" class="auto-style2">URINE LAB</a>';
			echo '&nbsp&nbsp&nbsp&nbsp<a href="/chemcheck.php?ptncode='.$myptncode.'" class="auto-style2">CHEMICAL LAB</a>';
			echo '&nbsp&nbsp&nbsp&nbsp<a href="/hemacheck.php?ptncode='.$myptncode.'" class="auto-style2">HEMATOLOGY LAB</a><br><br>';
		}	
		}
}

?>


