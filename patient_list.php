<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" type="text/css" href="menu.css"/>

<title>INVENTORY - PATIENT LIST</title>
<style type="text/css">
.auto-style1 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: xx-large;
	color: #FBFAFC;
	background-color: #3399FF;
}
.auto-style2 {
	
	text-align: left;
	font-family: Calibri;
	font-size: small;
	color: #5D12A7;
}

</style>
</head>

<body>
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
		<td class="auto-style1">INVENTORY - PATIENT LIST</td>
	</tr>
</table>
<?php

include 'cappamedcon.inc';
connect_db('localhost','root','root','cappamed');

		$sqlinsert = "SELECT * from cdtpatient ORDER BY ptncode ASC;";

		$conn = mysql_connect('localhost','root','root');
		$dbfound=mysql_select_db('cappamed');
		$resultsearch = mysql_query($sqlinsert,$conn);
		if(!$resultsearch) {
	   	 die("Database query failed: " . mysql_error());
			}
		
	echo "<table class='auto-style2' border='1' cellpadding='2'>";
	echo "<tr> <th>PATIENT CODE</th> <th>FULL NAME</th> <th>QTY ADDRESS</th> <th>KELURAHAN</th><th>KECAMATAN</th> <th>TGL.LAHIR</th><th>PHONE</th><th>GENDER</th><th>BLOOD TYPE</th><th>RELIGION</th><th>NAMA SUAMI/ISTRI</th> <th></th></tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $resultsearch )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['ptncode'] . '</td>';
		echo '<td>' . $row['ptnname'] . '</td>';
		echo '<td align="center">' . $row['ptnaddress'] . '</td>';
		echo '<td align="center">' . $row['ptnklrh'] . '</td>';
		echo '<td align="center">' . $row['ptnkcmt'] . '</td>';
		echo '<td align="center">' . $row['ptndob'] . '</td>';
		echo '<td align="center">' . $row['ptnphone'] . '</td>';
		echo '<td align="center">' . $row['ptngender'] . '</td>';
		echo '<td align="center">' . $row['ptnblood'] . '</td>';
		echo '<td align="center">' . $row['ptnreligion'] . '</td>';	
		echo '<td align="center">' . $row['ptnhusband'] . '</td>';
		echo '<td><a href="inventory_patient_edit.php?ptncode=' . $row['ptncode'] . '">Edit</a></td>';
		echo '<td><a href="delete.php?itemcode=' . $row['ptncode'] . '">Delete</a></td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";

?>


</body>

</html>
