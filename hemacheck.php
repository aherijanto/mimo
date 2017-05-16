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
	
	$myregno="HMA".date('Ymd').".".rand(9999,100000);
	
	
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
echo '<td colspan="4" bgcolor="#EAEDED">HEMATOLOGI</td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="4">&nbsp&nbsp&nbsp&nbspHematologi Automatic</td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLeukosit</td><td  align="center"><input type="text" name="leukosit" /></td><td align="center">ribu/mm3</td><td align="center">3.5 - 10.0</td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspErytrosit</td><td  align="center"><input type="text" name="erytrosit" /></td><td align="center">juta/mm3</td><td  align="center">3.80 - 5.80</td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHemoglobin</td><td  align="center"><input type="text" name="hemoglobin" /></td><td align="center">g/DL</td><td  align="center">12.0 - 16.0</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHematokrit</td><td  align="center"><input type="text" name="hematokrit" /></td><td align="center">%</td><td  align="center">35.0 - 50.0</td>';
echo ' </tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTrombosit</td><td  align="center"><input type="text" name="trombosit" /></td><td align="center">ribu/mm3</td><td  align="center">150 - 390</td>';
echo ' </tr>';
echo '<tr>';
echo '<td colspan="4">&nbsp&nbsp&nbsp&nbspHitung Jenis Leukosit</td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLymphosit</td><td  align="center"><input type="text" name="lymphosit" /></td><td align="center">%</td><td  align="center">17.0 - 48.0</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMonosit</td><td  align="center"><input type="text" name="monosit" /></td><td align="center">%</td><td  align="center">4.0 - 10.0</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGranulosit</td><td  align="center"><input type="text" name="granulosit" /></td><td align="center">%</td><td  align="center">43.0 - 76.0</td>';
echo ' </tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspLED 1 Jam</td><td  align="center"><input type="text" name="led1" /></td><td align="center">mm/jam</td><td  align="center"><12</td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspLED 2 Jam</td><td  align="center"><input type="text" name="led2" /></td><td align="center">mm/jam</td><td  align="center"><12</td>';
echo '</tr>';


echo '<tr>';
echo '<td colspan="4" bgcolor="#EAEDED">SEROIMUNOLOGI</td>';
echo '</tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspWidal</td><td></td><td></td><td></td>';
echo ' </tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspS.Typhi H</td><td  align="center"><input type="text" name="typhi-h" /></td><td  align="center"></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspS.Paratyphi AH</td><td  align="center"><input type="text" name="para-ah" /></td><td  align="center"></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspS.Paratyphi BH</td><td  align="center"><input type="text" name="para-bh" /></td><td  align="center"></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspS.Paratyphi CH</td><td  align="center"><input type="text" name="para-ch" /></td><td  align="center"></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspS.Typhi O</td><td  align="center"><input type="text" name="typhi-o" /></td><td  align="center"></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspS.Paratyphi AO</td><td  align="center"><input type="text" name="para-ao" /></td><td  align="center"></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspS.Paratyphi BO</td><td  align="center"><input type="text" name="para-bo" /></td><td  align="center"></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspS.Paratyphi CO</td><td  align="center"><input type="text" name="para-co" /></td><td  align="center"></td><td  align="center">NEGATIF</td>';
echo ' </tr>';




echo '<tr><td>&nbsp</td><td></td><td></td><td></td></tr>';
echo '</table>';
echo '</font>';

echo '</div>';

}
?>
