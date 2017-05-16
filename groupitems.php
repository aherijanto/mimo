<?php
session_start();

include 'cappamedcon.inc';
connect_db('localhost','root','root','cappamed');

if (isset($_REQUEST['savegroup']))
	{
 	$mygrpcode=$_REQUEST['grpcode'];
  	$mygrpname=$_REQUEST['grpname'];
	
	if ($mygrpcode=="" || $mygrpname=="")
		{
		echo "Something wrong with your input<br/>";
		echo "<a href='groupitems.php'>Back</a>";
		}
		else
		{
		$sqlinsert = "INSERT INTO cdtgroup (grpcode,grpname) VALUES ('$mygrpcode','$mygrpname')";

		$conn = mysql_connect('localhost','root','root');
		$dbfound=mysql_select_db('cappamed');
		$resultsearch = mysql_query($sqlinsert,$conn);
		if(!$resultsearch) {
	   	 die("Database query failed: " . mysql_error());
			}
		}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>INVENTORY - GROUP ITEMS</title>
<style type="text/css">
.auto-style1 {
	font-size: xx-large;
	color: #FBFAFC;
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	background-color: #3399FF;
}
.auto-style2 {
	font-family: Calibri;
	font-size: small;
}
.auto-style3 {
	font-family: Calibri;
	font-size: small;
	text-align: left;
}
.auto-style5 {
	font-family: Calibri;
	font-size: small;
	text-align: right;
}
</style>
</head>

<body>
<table style="width: 100%">
	<tr>
		<td class="auto-style1">INVENTORY - GROUP ITEMS</td>
	</tr>
</table>
<form method="post" action="">

<table style="height: 108px; width: 280px;">
	<tr>
		<td class="auto-style2" style="width: 139px; height: 28px;">Group Code</td>
		<td style="width: 139px; height: 28px;">
		<input name="grpcode" style="width: 142px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style2" style="width: 139px; height: 28px;">Group Name</td>
		<td style="width: 139px; height: 28px;">
		<input name="grpname" style="width: 141px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style3">
		<input name="savegroup" type="submit" value="Save" />          </td>
		<td class="auto-style5">
		<a href="grouplist.php">see lists</a></td>
	</tr>
</table>
</form>
</body>

</html>
