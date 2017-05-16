
<head>
<meta content="en-us" http-equiv="Content-Language">
<style type="text/css">
.auto-style1 {
	color: #102C82;
	font-family: Calibri;
	font-size: small;
}
.auto-style2 {
	color: #6117B7;
	font-family: Calibri;
	font-size: small;

}
</style>
</head>

<?php
$mydate=date('Y-m-d');
echo "Date : ".$mydate."<br/>";
$sqlrpttoday="SELECT * FROM cdtopresep WHERE opdate='$mydate'";
mysql_connect('localhost','root','root');
mysql_select_db('cappamed');
$runquery=mysql_query($sqlrpttoday);
$num_row_sql=mysql_num_rows($runquery);
if ($num_row_sql>0)
{
	$mytotal=0;
	echo '<table border="1">';
	echo '<tr align="center" class="auto-style2"><td><strong>INVOICE NO</strong></td><td><strong>COMPLAIN NO</strong></td><td><strong>PATIENT NO</td></strong><td><strong>TOTAL</td></strong></tr>';
	

	while($row = mysql_fetch_array( $runquery )) {
		echo '<tr align="center" class="auto-style1">';
		echo '<td>'.$row['opcode'].'</td>';
		echo '<td>'.$row['compno'].'</td>';
		echo '<td>'.$row['ptncode'].'</td>';
		echo '<td>'.number_format($row['optotal'],0).'</td>';
		$mytotal+=$row['optotal'];
	}
	echo '<tr align="right" class="auto-style1"><td colspan="4"><strong>GRAND TOTAL----->    '.number_format($mytotal,0).'</strong></td></tr>';
	echo'</table>';

}
?>

