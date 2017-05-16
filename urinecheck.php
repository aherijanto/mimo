<?php
function check_ok($myfield) {
    switch($myfield) {
	case "Yes":
		$z = 'YES';
		break;
	case "No":
		$z='NO';
	}
		
    return $z;
}
?>

<?php
function check_ok1($myfield1) {
    switch($myfield1) {
	case "Yes":
		$n = '<span style="font-family: wingdings; font-size: 200%;">&#252;</span>';
		break;
	case "No":
		$n='&#10008';
	}
		
    return $n;
}
?>

<?php


if (isset($_GET['ptncode']))
{
	$myptncode=$_GET['ptncode'];
	
	$myregno="URN".date('Ymd').".".rand(9999,100000);
	
	
echo '<!DOCTYPE html>';
echo '<html>';
echo '<style>';
echo 'table {';
echo ' border-collapse: collapse;';
echo ' border: 1px solid black;}';
echo 'tr.border_bottom td {';
echo 'border-bottom:1pt solid black';
echo '}';
echo '</style>';
echo '<form action="#" method="post">';
echo '<div>';
echo '<font face="calibri" size="2">';
echo '<table  width="700px">';
echo '<caption> MEDICAL REPORT </caption>';

$sqlcomplaint="SELECT * FROM cdtpatient WHERE ptncode='$myptncode'";
	mysql_connect('localhost','root','root');
	mysql_select_db('cappamed');
	$resultsearch=mysql_query($sqlcomplaint);
	if(!$resultsearch) {
	   	 die("Database query failed: " . mysql_error());
	   	 echo 'NO DATA';
	   	 exit;
	}
	else
	{
		while($row = mysql_fetch_array( $resultsearch )) {
			$myname=$row['ptnname'];
			$mydob=$row['ptndob'];
			$mygender=$row['ptngender'];
			$myaddr=$row['ptnaddress'];
			
echo '<tr><td>Reg No   : </td><td>'.$myregno.'</td></tr>';
echo '<tr><td>Pengirim : </td><td><input name="sender" type="text" /></td></tr>';
echo '<tr><td width="30%">Date </td> <td>'.date('d F Y').'</td> </tr>';
echo '<tr><td width="30%">Name </td> <td>'.$myname.'</td> </tr>';
echo '<tr><td width="30%">Date of Birth </td> <td>'.date('d F Y',strtotime($row['ptndob'])).' </td> </tr>';
echo '<tr><td width="30%">Sex </td> <td>'.$mygender.' </td> </tr>';
echo '<tr><td width="30%">Address </td> <td>'.$myaddr.' </td> </tr>';
echo '</table>';
echo '</font>';
echo '</div>';
		}
	}
echo '<div><br/>';
echo '<font face="calibri" size="2">';
echo '<table width="700px">';
echo '<tr bgcolor="#ABB2B9"><th>PARAMETERS</th><th>TEST RESULT</th><th>UNIT</th><th>NORMAL VALUE</th></tr>';
echo '<tr>';
echo '<td colspan="4" bgcolor="#EAEDED">URINE</td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="4">&nbsp&nbsp&nbsp&nbspMakroskopis</td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspWarna</td><td  align="center"><input type="text" name="warna" /></td><td></td><td align="center">KUNING</td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspKekeruhan</td><td  align="center"><input type="text" name="keruh" /></td><td></td><td  align="center">JERNIH</td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsppH</td><td  align="center"><input type="text" name="ph" /></td><td></td><td  align="center">5.0-7.0</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBerat Jenis</td><td  align="center"><input type="text" name="beratjenis" /></td><td></td><td  align="center">1.005-1.030</td>';
echo ' </tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGlukosa (Reduksi)</td><td  align="center"><input type="text" name="glukosa" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProtein</td><td  align="center"><input type="text" name="protein" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBlood</td><td  align="center"><input type="text" name="blood" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBilirubin</td><td  align="center"><input type="text" name="bilirubin" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspKeton</td><td  align="center"><input type="text" name="keton" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNitrit</td><td  align="center"><input type="text" name="nitrit" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLeukosit</td><td  align="center"><input type="text" name="leukosit" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUrobilinogen</td><td  align="center"><input type="text" name="urobilinogen" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspMikroskopis</td><td></td><td></td><td></td>';
echo ' </tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspErytrosit</td><td  align="center"><input type="text" name="erytrosit" /></td><td  align="center">/LPB</td><td  align="center">0-4</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLeukosit</td><td  align="center"><input type="text" name="leukosit" /></td><td  align="center">/LPB</td><td  align="center">0-5</td>';
echo ' </tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspSel Epitel</td><td></td><td></td><td></td>';
echo ' </tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEpitel Gepeng</td><td  align="center"><input type="text" name="egepeng" /></td><td align="center">/LPK</td><td  align="center">0-15</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEpitel Transisional</td><td  align="center"><input type="text" name="etrans" /></td><td align="center">/LPK</td><td  align="center">0-10</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEpitel Bulat</td><td  align="center"><input type="text" name="ebul" /></td><td  align="center">/LPK</td><td  align="center">0-10</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEpitel Silinder</td><td  align="center"><input type="text" name="esil" /></td><td  align="center">/LPK</td><td  align="center">0-0</td>';
echo ' </tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspKristal</td><td  align="center"><input type="text" name="kristal" align="center" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspBakteri</td><td  align="center"><input type="text" name="bakteri" align="center" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspJamur</td><td  align="center"><input type="text" name="jamur" align="center" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspTrichomonas</td><td align="center"><input type="text" name="tricho" align="center" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspCells</td><td  align="center"><input type="text" name="cells"  align="center"/></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspBenang Mucosa</td><td  align="center"><input type="text" name="mukosa" align="center" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';

echo '<tr>';
echo '<td>Urine</td><td></td><td></td><td></td>';
echo ' </tr>';
echo '<tr>';
echo '<td>Urine PP Test</td><td  align="center"><input type="text" name="urinepp" align="center" /></td><td></td><td  align="center">NEGATIF</td>';

echo ' </tr>';
echo '<tr><td>&nbsp</td><td></td><td></td><td></td></tr>';
echo '</table>';
echo '</font>';

echo '</div>';

}
?>
