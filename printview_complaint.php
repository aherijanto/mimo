<?php
if (isset($_GET['cmpcode']))
{
	$mynocmp=$_GET['cmpcode'];
	$sqlcomplaint="SELECT * FROM cdtcomplain,cdtpatient WHERE cdtcomplain.compno='$mynocmp' AND cdtpatient.ptncode=cdtcomplain.ptncode";
	mysql_connect('localhost','root','root');
	mysql_select_db('cappamed');
	$resultsearch=mysql_query($sqlcomplaint);
	if(!$resultsearch) {
	   	 die("Database query failed: " . mysql_error());
	   	 echo 'NO DATA';
	   	 exit;
			}
	else{
		
		echo '<table style="width: 60%">';
		while($row = mysql_fetch_array( $resultsearch )) {
			$myptncode=$row['ptncode'];
			$myname=$row['ptnname'];
			$myaddress=$row['ptnaddress'];
			$myklrh=$row['ptnklrh'];
			$mykcmt=$row['ptnkcmt'];
			$mygender=$row['ptngender'];
			$myhusband=$row['ptnhusband'];
			$myptndob=$row['ptndob'];
			$dateprint=date('d-M-Y');
			$timeprint=date("h:i:sa");
			$mycompdate=strtotime($row['compdate']);
			$mycompdate1=date('d-M-Y',$mycompdate);
			
			echo '<tr>';
			echo '<td class="auto-style2" colspan="2">'.$myname.' ('.$myptncode.')</td>';
			echo '<td class="auto-style1" style="width: 507px">'.$mynocmp.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">ALAMAT</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$myaddress.'</td>';
			echo '<td class="auto-style3" style="width: 507px">'.$mycompdate1.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">KELURAHAN</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$myklrh.'</td>';
			echo '<td class="auto-style3" style="width: 507px">&nbsp;</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">KECAMATAN</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$mykcmt.'</td>';
			echo '<td class="auto-style5" style="width: 507px">&nbsp;</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">GENDER</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$mygender.'</td>';
			echo '<td style="width: 507px">&nbsp;</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">UMUR</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$myptndob.'</td>';
			echo '<td class="auto-style3" style="width: 507px">'.$dateprint.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">NAMA SUAMI/ISTRI</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$myhusband.'</td>';
			echo '<td class="auto-style3" style="width: 507px">'.$timeprint.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan="3"><hr /></td>';
			echo '</tr>';
			echo '</table>';
			echo '<p class="auto-style4">***** '.$row['comptext'].'</p>';
			}	
			echo '<br><br><br><br><br><br><br><br><br><br><table width="60%"><tr><td colspan="3"><hr/></td></tr>';
			echo '<tr><td align="left" class="auto-style4">PARAF DOKTER</td>';
			echo '<td align="center" class="auto-style4"><a href="/patient_hist.php">Semoga Lekas Sembuh</a></td>';
			echo '<td align="right" class="auto-style4">KLINIK UTAMA AN-NISAA</td></tr>';
			echo '</table>';		
		}
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Print Preview Complaint</title>
<style type="text/css">
.auto-style1 {
	text-align: right;
	font-size: x-large;
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	color: #5F5A5A;
}
.auto-style2 {
	text-align: left;
	font-size: x-large;
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	color: #5F5A5A;
}
.auto-style3 {
	text-align: right;
	font-family: Calibri;
	font-size: small;
}
.auto-style4 {
	font-size: small;
	font-family: Calibri;
}
.auto-style5 {
	font-family: Calibri;
	font-size: medium;
}
</style>
</head>

<body>


</body>

</html>
