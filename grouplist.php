<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>INVENTORY - GROUP LIST</title>
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

<table style="width: 100%">
	<tr>
		<td class="auto-style1">INVENTORY - GROUP LIST</td>
	</tr>
</table>
<?php
include 'cappamedcon.inc';
connect_db('localhost','root','root','cappamed');

		$sqlinsert = "SELECT * from cdtgroup ORDER BY grpcode ASC;";

		$conn = mysql_connect('localhost','root','root');
		$dbfound=mysql_select_db('cappamed');
		$resultsearch = mysql_query($sqlinsert,$conn);
		if(!$resultsearch) {
	   	 die("Database query failed: " . mysql_error());
			}
		
	echo "<table class='auto-style2' border='1' cellpadding='2'>";
	echo "<tr> <th>GROUP CODE</th> <th>GROUP NAME</th> <TH></TH> <TH></TH></tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $resultsearch )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['grpcode'] . '</td>';
		echo '<td>' . $row['grpname'] . '</td>';
		
		echo '<td><a href="edit.php?id=' . $row['grpcode'] . '">Edit</a></td>';
		echo '<td><a href="delete.php?id=' . $row['grpname'] . '">Delete</a></td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";

?>


</body>

</html>
