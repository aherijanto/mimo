<html>
<head>
<meta content="en-us" http-equiv="Content-Language">
<style type="text/css">
.auto-style1 {
	font-family: Calibri;
	font-size: small;
}
</style>
</head>

<?php
$myinvno1=$_GET['myinv'];
echo '<p class="auto-style1">';
echo 'KLINIK UTAMA AN NISAA <br/>';
echo 'JL.PROJOSUMARTO 1 <br/>';
echo 'KALIGAYAM TEGAL <br/>';
echo 'Telp: 0283 - 340263<br/>';
echo 'TEGAL';
echo '<br/></p>';
echo '<p class="auto-style1">';
echo 'Inv    : '.$myinvno1.'<br/>';
echo 'Tgl    : '.date('d-m-Y').'<br/>';
$mytime=date("h:i:sa");
echo 'Jam    : '.$mytime.'<br/>';
echo '----------------------------------------<br/></p>';
mysql_connect('localhost','root','root');
mysql_select_db('cappamed');
$sqlinv="SELECT * FROM cdtopsalesdetail where opcode='$myinvno1'";
$showdetail= mysql_query($sqlinv) or die(mysql_error());
$item_total=0;

echo '<p class="auto-style1">';
while ($row =mysql_fetch_array($showdetail))
{
	//echo'<br/>';
	echo $row['itemname'].'<br/>';
	$mysub=$row['itemqty']*$row['itemprice'];
	echo $row['itemqty'].' x '.number_format($row['itemprice']).'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRp.'.number_format($mysub).'<br/>';
	$item_total+=$mysub;
}
echo '----------------------------------------<br/>';
echo '                 TOTAL : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRp.'.number_format($item_total);
echo '<br/><br/><br/>Semoga Lekas Sembuh<br/>Terima Kasih</p>';                
?>


<p class="auto-style1"><a href="http://localhost/opensales2.php">back to sales</a></p>

</html>

