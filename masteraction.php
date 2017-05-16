<?php
function patient_no()
{

}

?>

<?php
$conn = mysql_connect('localhost','root','root');
$dbfound=mysql_select_db('cappamed');


if (isset($_POST['saveact'])){

$myptncode=$_POST['actcode'];
$myptnname=$_POST['actname'];
$myprice=$_POST['actprice'];


if ($myptncode=="" || $myptnname=="" || $myprice=="")
{
	echo "Something wrong with your input <br/>";
	echo "<a href='/masteraction.php'>Back</a>";
	exit;
}

$sqlinsert = "INSERT INTO cdtaction (actcode,actname,actprice) VALUES ('$myptncode','$myptnname','$myprice')";

$resultsearch = mysql_query($sqlinsert,$conn);
		if(!$resultsearch) {
		    die("Database query failed: " . mysql_error());
		    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>MEDICAL TREATMENT</title>
<style type="text/css">
.auto-style7 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: x-large;
	color: #F5F3F3;
	background-color: #33CC33;
}
.auto-style8 {
	font-family: Calibri;
	font-size: small;
}
.auto-style9 {
	font-size: medium;
}
</style>
</head>

<body style="width: 1000px">

<table style="width: 100%; height: 13px">
	<tr>
		<td class="auto-style7">MASTER ACTION</td>
	</tr>
	</table>
<form method="post" action="">
<table style="width: 99%">
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>ACTION CODE</strong></td>
		<td><input name="actcode" style="width: 118px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>ACTION NAME</strong></td>
		<td><input name="actname" style="width: 159px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8">
		<strong>PRICE</strong></td>
		<td><input name="actprice" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8" colspan="2">
		<input name="saveact" type="submit" value="Save Action"/><span class="auto-style9">&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/masteraction_list.php">view list</a></span></td>
	</tr>
</table>
</form>
</body>

</html>
