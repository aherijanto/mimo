<?php

mysql_connect('localhost', 'root', 'root') or die(mysql_error());
mysql_select_db("cappamed") or die(mysql_error());

if (isset($_GET ['itemcode'])){
$mycode = $_GET ['itemcode'];
$query = mysql_query("SELECT * FROM cdtitem WHERE itemcode = '$mycode'") or die(mysql_error());

if(mysql_num_rows($query)>=1){
    while($row = mysql_fetch_array($query)) {
        $itemcode = $row['itemcode'];
        $itemname = $row['itemname'];
        $sqty = $row['sqty'];
		$lqty = $row['lqty'];
		$expdate = $row['expdate'];
		$volume = $row['volume'];
		$unit = $row['unit'];
		$dcprice = $row['dcprice'];
		$riprice = $row['riprice'];
		$alkesprice = $row['alkesprice'];
		$swamedprice = $row['swamedprice'];
		$ikprice = $row['ikprice'];
		$opprice = $row['opprice'];
		$bprice = $row['bprice'];
		$batchno = $row['batchno'];
		$grpcode = $row['grpcode'];
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
		<td class="auto-style7">INVENTORY - Master Items - UPDATE</td>
	</tr>
	</table>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>AN NISAA - INVENTORY</title>
</head>
<body>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">

<br/><br/>
	<table align="center" style="width: 417px" frame="box">
		<tr>
			<td bgcolor="#6699FF" class="auto-style4" colspan="4"><strong>ITEM 
			DETAILS</strong></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Item Code</strong></td>
			<td colspan="2">
			<input name="itemcode" style="width: 95px" type="text" value="<?= $itemcode ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Item Name</strong></td>
			<td colspan="2">
			<input name="itemname" style="width: 146px" type="text" value="<?= $itemname ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Qty. Small</strong></td>
			<td colspan="2">
			<input name="sqty" style="width: 95px" type="text" value="<?= $sqty?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Qty. Big</strong></td>
			<td colspan="2">
			<input name="lqty" style="width: 95px" type="text" value="<?= $lqty ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Volume</strong></td>
			<td colspan="2">
			<input name="volume" style="width: 95px" type="text" value="<?= $volume ?>" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Unit</strong></td>
			<td colspan="2">
			<input name="unit" style="width: 95px" type="text" value="<?= $unit ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>DC-Price</strong></td>
			<td colspan="2">
			<input name="dcprice" style="width: 95px" type="text" value="<?= $dcprice ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>RI-Price</strong></td>
			<td colspan="2">
			<input name="riprice" style="width: 95px" type="text" value="<?= $riprice ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Alkes-Price</strong></td>
			<td colspan="2">
			<input name="alkesprice" style="width: 95px" type="text" value="<?= $alkesprice ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Swamed-Price</strong></td>
			<td colspan="2">
			<input name="swapmedprice" style="width: 95px" type="text" value="<?= $swamedprice ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>IK-Price</strong></td>
			<td colspan="2">
			<input name="ikprice" style="width: 95px" type="text" value="<?= $ikprice ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>OP-Price</strong></td>
			<td colspan="2">
			<input name="opprice" style="width: 95px" type="text" value="<?= $opprice ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>COGS</strong></td>
			<td colspan="2">
			<input name="cogs" style="width: 95px" type="text" value="<?= $bprice ?>" /></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Exp.Date</strong></td>
			<td colspan="2">
			<input name="expdate" style="width: 127px" type="date" value="<?= $expdate ?>"/></td>
		</tr>
		<tr>
			<td class="auto-style2" style="width: 157px" colspan="2"><strong>Batch No</strong></td>
			<td colspan="2">
			<input name="batchno" style="width: 98px" type="text" value="<?= $batchno ?>"/></td>
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
			<input class="auto-style6" name="update" type="submit" value="update data" /></td>
			<td class="auto-style9"><br><br><a href="inventorylist.php">view list</a></td>
		</tr>
	</table>

</form>
</body>

</html>

<?php
if (isset($_POST['update']))
{
$itemcode = $_POST['itemcode'];
$itemname = $_POST['itemname'];
$sqty = $_POST['sqty'];
$lqty = $_POST['lqty'];
$expdate = $_POST['expdate'];
$volume = $_POST['volume'];
$unit = $_POST['unit'];
$dcprice= $_POST['dcprice'];
$riprice = $_POST['riprice'];
$alkesprice = $_POST['alkesprice'];
$swamedprice = $_POST['swamedprice'];
$ikprice = $_POST['ikprice'];
$opprice = $_POST['opprice'];
$bprice = $_POST['bprice'];
$batchno = $_POST['batchno'];
$grpcode = $_POST['grpcode'];

$query="UPDATE cdtitem SET itemcode = '$itemcode', itemname = '$itemname', sqty = '$sqty',lqty='$lqty',expdate='$expdate',volume='$volume',unit='$unit',dcprice='$dcprice',riprice='$riprice',alkesprice='$alkesprice',swamedprice='$swamedprice',ikprice='$ikprice',opprice='$opprice',bprice='$bprice',batchno='$batchno',grpcode='$grpcode' WHERE itemcode='$itemcode'";
mysql_query($query)or die(mysql_error());

}
?>

