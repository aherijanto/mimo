<?php
if (isset($_GET['ptncode']))
{
	$mynocmp=$_GET['ptncode'];
	$sqlcomplaint="SELECT * FROM cdtcomplain,cdtpatient WHERE cdtpatient.ptncode='$mynocmp' AND cdtcomplain.ptncode='$mynocmp'";
	mysql_connect('localhost','root','root');
	mysql_select_db('cappamed');
	$resultsearch=mysql_query($sqlcomplaint);
	if(!$resultsearch) {
	   	 die("Database query failed: " . mysql_error());
	   	 echo 'NO DATA';
	   	 exit;
			}
	else{
		
		echo '<table style="width: 100%">';
		$row = mysql_fetch_array($resultsearch );
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
			echo '<td colspan="4" align="center"><strong>KLINIK UTAMA AN-NISAA</strong></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan="4" align="center">JL.PROJOSUMARTO I NO.1. TELP::(0283) 340263. KALIGAYAM - TALANG, TEGAL </td>';
			echo '<tr>';
			echo '<td class="auto-style2" colspan="2">'.$myname.'</td>';
			echo '<td class="auto-style3" style="width: 507px">&nbsp;</td>';
			echo '<td class="auto-style1" style="width: 507px">'.$myptncode.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">ALAMAT</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$myaddress.'</td>';
			echo '<td class="auto-style3" style="width: 507px">&nbsp;</td>';
			echo '<td class="auto-style3" style="width: 507px">&nbsp;</td>';

			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">KELURAHAN</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$myklrh.'</td>';
			echo '<td class="auto-style3" style="width: 507px">&nbsp;</td>';
			echo '<td class="auto-style3" style="width: 507px">&nbsp;</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">KECAMATAN</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$mykcmt.'</td>';
			echo '<td class="auto-style5" style="width: 507px">&nbsp;</td>';
			echo '<td class="auto-style3" style="width: 507px">&nbsp;</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">GENDER</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$mygender.'</td>';
			echo '<td style="width: 507px">&nbsp;</td>';
			echo '<td class="auto-style3" style="width: 507px">&nbsp;</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">UMUR</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$myptndob.'</td>';
			echo '<td class="auto-style3" style="width: 507px">&nbsp;</td>';
			echo '<td class="auto-style3" style="width: 507px">'.$dateprint.'</td>';
			
			echo '</tr>';
			
			

			echo '<tr>';
			echo '<td class="auto-style4" style="width: 157px">NAMA SUAMI/ISTRI</td>';
			echo '<td class="auto-style4" style="width: 344px">'.$myhusband.'</td>';
			echo '<td class="auto-style3" style="width: 507px">&nbsp;</td>';
			echo '<td class="auto-style3" style="width: 507px">'.$timeprint.'</td>';
			
			echo '</tr>';
			
			echo '<tr>';
			echo '<td colspan="4"><hr /></td>';
			echo '</tr>';
			echo '<tr class="auto-style3">';
			echo '<td align="center"><strong>TANGGAL</strong></td><td align="center"><strong>TANDA/GEJALA/DIAGNOSIS</strong></td><td align="center"><strong>PENGOBATAN</strong></td><td align="center"><strong>PARAF</strong></td>';
			echo '</tr>';
			echo '<tr><td colspan="4"><hr/></td></tr>';
			$sqlcomplaint1="SELECT * FROM cdtcomplain WHERE cdtcomplain.ptncode='$mynocmp' ORDER BY compdate DESC LIMIT 4;";
			$resultsearch=mysql_query($sqlcomplaint1);

			while($row = mysql_fetch_array( $resultsearch)) {
				$mycompno=$row['compno'];
				$mycompdate=strtotime($row['compdate']);
				$mycompdate1=date('d-M-Y',$mycompdate);

				echo '<tr>';
				echo '<td class="auto-style4" align="center">'.$mycompdate1.'</td>';
				echo '<td class="auto-style4" align="center" width="100">'.$row['compno'].'***  '.$row['comptext'].'</td>';
				$sqlinv="SELECT cdtopresep.opcode,cdtopresep.compno,cdtopresepdetail.itemname,cdtopresepdetail.itemqty FROM cdtopresep,cdtopresepdetail WHERE (cdtopresep.compno='$mycompno') AND (cdtopresepdetail.opcode=cdtopresep.opcode)";
				$showopcode= mysql_query($sqlinv) or die(mysql_error());
				$num_rows = mysql_num_rows($showopcode);
				
				echo '<td class="auto-style4" align="center">';	
					while($row1 = mysql_fetch_array( $showopcode))
					{
					
						echo $row1['itemname'] .'   '.$row1['itemqty'].'<br>';					
					}
					echo '</td>';

			}
				echo '</table>';
			
			
			
		
			echo '<br><br><br><br><br><table width="100%"><tr><td colspan="3"><hr/></td></tr>';
			
			echo '<td colspan="4" align="center" class="auto-style4"><a href="/register_patient.php">Semoga Lekas Sembuh</a></td>';
			
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
	font-size: medium;
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	color:#000000;
}
.auto-style2 {
	text-align: left;
	font-size: medium;
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	color: #000000;
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
