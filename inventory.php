<?php
//session_start();

include 'cappamedcon.inc';
connect_db('localhost','root','root','cappamed');

if (isset($_REQUEST['save']))
	{
 	$mycode=$_REQUEST['itemcode'];
  	$myname=$_REQUEST['itemname'];
	$mysqty=$_REQUEST['sqty'];
	$mylqty=$_REQUEST['lqty'];
	$myexpdate=$_REQUEST['expdate'];
	$myvolume=$_REQUEST['volume'];
	$myunit=$_REQUEST['unit'];
	$mydcprice=$_REQUEST['dcprice'];
	$myriprice=$_REQUEST['riprice'];
	$myalkesprice=$_REQUEST['alkesprice'];
	$myswapmedprice=$_REQUEST['swapmedprice'];
	$myikprice=$_REQUEST['ikprice'];
	$myopprice=$_REQUEST['opprice'];
	$mybprice=$_REQUEST['cogs'];
	$mybatchno=$_REQUEST['batchno'];
	$mygroup=$_REQUEST['mygroup'];
	
	if ($mycode=="" || $myname=="" || $mysqty=="" || $myexpdate=="" || $myvolume==""|| $myunit==""){
		echo 'Something went wrong on your input :: cannot save your data';
		echo '<br/><a href="/inventory.php">Back</a>';
		exit();
	}
	else {
		$sqlinsert = "INSERT INTO cdtitem (itemcode,itemname,sqty,lqty,expdate,volume,unit,dcprice,riprice,alkesprice,swamedprice,ikprice,opprice,bprice,batchno,grpcode) VALUES ('$mycode','$myname','$mysqty','$mylqty','$myexpdate','$myvolume','$myunit','$mydcprice','$myriprice','$myalkesprice','$myswapmedprice','$myikprice','$myopprice','$mybprice','$mybatchno','$mygroup')";

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
<link rel="stylesheet" type="text/css" href="menu.css"/>
<style type="text/css">
.auto-style2 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: x-small;
}
.auto-style4 {
	text-align: center;
	color: #F2F4FA;
	font-family: Calibri;
}
.auto-style5 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: x-small;
	text-align: center;
}
.auto-style6 {
	font-family: Calibri;
}
.auto-style7 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: x-large;
	color: #F5F3F3;
	background-color: #6699FF;
}
.auto-style8 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: x-small;
	text-align: left;
}
.auto-style9 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: x-small;
	text-align: right;
}
</style>
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
		<td class="auto-style7">INVENTORY - Master Items</td>
	</tr>
	</table>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>AN NISAA - INVENTORY</title>
</head>
<body>

<form>

<br/><br/>
	<table align="center" style="width: 417px" frame="box">
		<tr>
			<td bgcolor="#6699FF" class="auto-style4" colspan="4"><strong>ITEM 
			DETAILS</strong></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Item Code</strong></td>
			<td colspan="2">
			<input name="itemcode" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Item Name</strong></td>
			<td colspan="2">
			<input name="itemname" style="width: 146px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Qty. Small</strong></td>
			<td colspan="2">
			<input name="sqty" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Qty. Big</strong></td>
			<td colspan="2">
			<input name="lqty" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Volume</strong></td>
			<td colspan="2">
			<input name="volume" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Unit</strong></td>
			<td colspan="2">
			<input name="unit" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>DC-Price</strong></td>
			<td colspan="2">
			<input name="dcprice" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>RI-Price</strong></td>
			<td colspan="2">
			<input name="riprice" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Alkes-Price</strong></td>
			<td colspan="2">
			<input name="alkesprice" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Swamed-Price</strong></td>
			<td colspan="2">
			<input name="swapmedprice" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>IK-Price</strong></td>
			<td colspan="2">
			<input name="ikprice" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>OP-Price</strong></td>
			<td colspan="2">
			<input name="opprice" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>COGS</strong></td>
			<td colspan="2">
			<input name="cogs" style="width: 95px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Exp.Date</strong></td>
			<td colspan="2">
			<input name="expdate" style="width: 127px" type="date" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Batch No</strong></td>
			<td colspan="2">
			<input name="batchno" style="width: 98px" type="text" /></td>
		</tr>
		<tr>
			<td class="auto-style8" colspan="2"><strong>Group Item</strong></td>
			<td class="auto-style8" colspan="2">
			<?php
				$conn = mysql_connect('localhost','root','root');
		$dbfound=mysql_select_db('cappamed');

				$sqlgroup="SELECT grpcode FROM cdtgroup ORDER BY grpcode ASC;";
				$resultgrp=mysql_query($sqlgroup,$conn);
				echo '<select name="mygroup">';
				while ($row = mysql_fetch_array($resultgrp)) {
   					echo '<option value="'.$row['grpcode'].'">'.$row['grpcode'].'</option>';
				}

				echo '</select>';
				
				?>
			</td>
		</tr>
		<tr>
			<td class="auto-style5"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />
			</td>
			<td class="auto-style5" colspan="2"><br><br>
			<input class="auto-style6" name="save" type="submit" value="save data" /></td>
			<td class="auto-style9"><br><br><a href="inventorylist.php">view list</a></td>
		</tr>
	</table>

</form>
</body>

</html>
