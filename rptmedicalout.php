<?php
include('mymenu.php');
$mydatefrom='';
$mydateto='';
$myfrom='';
$myto='';
$conn='';
?>
<html>

<head>
<title>
REPORT MEDICAL 0UT PER DATE PRERIOD
</title>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	font-family: Calibri;
	font-size: medium;
}
.auto-style3 {
	font-family: Calibri;
	font-size: small;
}
</style>
</head>
<body>
<form method="post" >
<p class="auto-style1"><strong>MEDICAL REPORT - PHARMACY SOLD</strong></p>
<table align="center" style="width: 22%">
	<tr>
		<td class="auto-style2" style="width: 95px"><strong>From</strong></td>
		<td><input name="txtdatefrom" type="date"></td>
	</tr>
	<tr>
		<td class="auto-style2" style="width: 95px; height: 45px;"><strong>To</strong></td>
		<td style="height: 45px"><input name="txtdateto" type="date"></td>
	</tr>
	<tr>
		<td class="auto-style1" colspan="2">
		<input name="processx" type="submit" value="process"></td>
	</tr>
</table>
</form>
<hr>
</body>
</html>
<?php
session_start();
if (isset($_POST['processx'])){
	$mydatefrom = $_POST['txtdatefrom'];
	$mydateto = $_POST['txtdateto'];
	$myfrom = date('Y-m-d',strtotime($mydatefrom));
	$myto = date('Y-m-d',strtotime($mydateto));
	$myfrom1 = date('d-m-Y',strtotime($mydatefrom));
	$myto1 = date('d-m-Y',strtotime($mydateto));

//$myqueryresep="SELECT cdtopresep.opcode, cdtopresepdetail.opcode, cdtopresep.opdate, cdtopresepdetail.itemcode, cdtopresepdetail.itemname, cdtopresepdetail.itemprice, cdtopresepdetail.itemqty FROM  `cdtopresepdetail` , cdtopresep WHERE (cdtopresepdetail.opcode = cdtopresep.opcode) AND (cdtopresep.opdate BETWEEN  '2016-06-14' AND  '2016-06-14') GROUP BY cdtopresepdetail.opcode ASC ";
$myquery="SELECT cdtopresep.opcode,cdtopresepdetail.opcode,cdtopresep.opdate,cdtopresepdetail.itemcode,cdtopresepdetail.itemname,cdtopresepdetail.itemprice,cdtopresepdetail.itemqty FROM `cdtopresepdetail`,cdtopresep WHERE (cdtopresepdetail.opcode=cdtopresep.opcode) AND (cdtopresep.opdate BETWEEN '$myfrom' AND '$myto') ORDER BY cdtopresep.opcode ASC";	
//
$conn = mysql_connect('localhost','root','root');
$dbfound=mysql_select_db('cappamed');
$resultsearch = mysql_query($myquery,$conn);
echo '<div>';
echo '<table align="center"><th><strong>DRUG OUT</strong></th>';
echo '<tr><td><strong>FROM: '.$myfrom1.' TO: '.$myto1.'</strong></td></tr></table>';
echo "<table class='auto-style3' border='1' cellpadding='2' align='center' style='border-collapse:collapse'>";
//echo "<tr> <th></th><th></th> <th></th>";
$myrow='';
while($row = mysql_fetch_array( $resultsearch )) {
			
			if ($myrow <> $row['opcode']){ 
				$myrow=$row['opcode'];
			
				echo '<tr><td colspan="4"><strong>' . $row['opcode'] . '</strong></td></tr>';
			}	
				echo '<tr><td>' . $row['itemcode'] . '</td>';
				echo '<td>' . $row['itemname'] . '</td>';
				echo '<td align="center">' . $row['itemqty'] . '</td></tr>';			
			
	} 
	
	echo "</table>";
}
echo '</div>';
echo '<hr>';
$myquerygr="SELECT cdtopresep.opcode,cdtopresepdetail.opcode,cdtopresep.opdate,cdtopresepdetail.itemcode,cdtopresepdetail.itemname,cdtopresepdetail.itemprice,SUM(cdtopresepdetail.itemqty) as qty FROM `cdtopresepdetail`,cdtopresep WHERE (cdtopresepdetail.opcode=cdtopresep.opcode) AND (cdtopresep.opdate BETWEEN '".$myfrom."' AND '".$myto."') GROUP BY cdtopresepdetail.itemcode ASC;";
$resultsearchgr =@mysql_query($myquerygr,$conn);
echo '<table align="center" class="auto-style3" border="1" style="border-collapse:collapse" ><tr><td colspan="3"><strong>TOTAL RECAP</strong></td></tr>';
while($rowgr = @mysql_fetch_array( $resultsearchgr )) {
	echo '<tr>';
	echo '<td>' . $rowgr['itemcode'] . '</td>';
	echo '<td>' . $rowgr['itemname'] . '</td>';
	echo '<td>' . $rowgr['qty'] . '</td></tr>';
}
echo '</table>';
?>


