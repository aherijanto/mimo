
<?php
$conn = mysql_connect('localhost','root','root');
$dbfound=mysql_select_db('cappamed');


if (isset($_POST['saveroom'])){

$myptncode=$_POST['roomcode'];
$myptnname=$_POST['roomname'];
$mygrouproom=$_POST['mygrouproom'];

$sqlprice="SELECT roomprice from cdtgrouproom where roomcode='$mygrouproom'";
$resultsearch = mysql_query($sqlprice,$conn);
while($row = mysql_fetch_array( $resultsearch )) {
			$mypriceroom=$row['roomprice'];
}

if ($myptncode=="" || $myptnname=="" )
{
	echo "Something wrong with your input <br/>";
	echo "<a href='/masterroom.php'>Back</a>";
	exit;
}

$sqlinsert = "INSERT INTO cdtmasterroom (cdtroomcode,roomcode,cdtroomname,cdtroomprice) VALUES ('$myptncode','$mygrouproom','$myptnname','$mypriceroom')";

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
<link rel="stylesheet" type="text/css" href="menu.css"/>
<title>MASTER ROOM</title>
<style type="text/css">
.auto-style7 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: x-large;
	color: #F5F3F3;
	background-color: #FF0000;
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

<table style="width: 100%; height: 13px">
	<tr>
		<td class="auto-style7">MASTER ROOM</td>
	</tr>
	</table>
<form method="post" action="">
<table style="width: 99%">
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>ROOM CODE</strong></td>
		<td><input name="roomcode" style="width: 118px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>ROOM NAME</strong></td>
		<td><input name="roomname" style="width: 159px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8">
		<strong>GROUP ROOM</strong></td>
		<td><select name="mygrouproom">
		    <?
		    	$sqlgrouproom="SELECT * FROM cdtgrouproom";
		    	$conn = mysql_connect('localhost','root','root');
		    	$dbfound=mysql_select_db('cappamed');
		    	$resultgroup= mysql_query($sqlgrouproom,$conn);
				
	
				while($row = mysql_fetch_array($resultgroup)) 
				{
					echo '<option value="'.$row['roomcode'].'">'.$row['roomcode'].'</option>';
					
				}
		     ?>
		    </select>&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style8" colspan="2">
		<input name="saveroom" type="submit" value="Save Room"/><span class="auto-style9">&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/masterroom_list.php">view list</a></span></td>
	</tr>
</table>
</form>
</body>

</html>
