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
	
	$myregno="CHM".date('Ymd').".".rand(9999,100000);
	
	
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
echo '<td colspan="4" bgcolor="#EAEDED">KIMIA DARAH</td>';
echo '</tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCholesterol Total</td><td  align="center"><input type="text" name="chtotal" /></td><td align="center">mg/dL</td><td align="center"><200</td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHDL Cholesterol</td><td  align="center"><input type="text" name="hdl" /></td><td align="center">mg/dL</td><td  align="center">45-95</td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLDL Cholesterol</td><td  align="center"><input type="text" name="ldl" /></td><td align="center">mg/dL</td><td  align="center"><130</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTrigliserid</td><td  align="center"><input type="text" name="trigliserid" /></td><td align="center">mg/dL</td><td  align="center"><200</td>';
echo ' </tr>';

echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGlukosa Puasa</td><td  align="center"><input type="text" name="gpuasa" /></td><td align="center">mg/dL</td><td  align="center">70-100</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGlukosa 2 jam PP</td><td  align="center"><input type="text" name="gjam" /></td><td align="center">mg/dL</td><td  align="center"><140</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGlukosa Sewaktu</td><td  align="center"><input type="text" name="gwaktu" /></td><td align="center">mg/dL</td><td  align="center"><110</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSGOT</td><td  align="center"><input type="text" name="sgot" /></td><td align="center">U/L</td><td  align="center">P:<38<br/>W:<32</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSGPT</td><td  align="center"><input type="text" name="sgpt" /></td><td align="center">U/L</td><td  align="center">P:<41<br/>W:<32</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUreum</td><td  align="center"><input type="text" name="ureum" /></td><td align="center">mg/dL</td><td  align="center">10-50</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCreatinin</td><td  align="center"><input type="text" name="creatinin" /></td><td align="center">mg/dL</td><td  align="center">P:0.7-1.3<br/>W:0.5-0.9</td>';
echo ' </tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAsam Urat</td><td  align="center"><input type="text" name="asamurat" /></td><td align="center">mg/dL</td><td  align="center">P:3.4-7.0<br/>W:2.4-5.7</td>';
echo ' </tr>';


echo '</tr>';
echo '<td>&nbsp&nbsp&nbsp&nbspSerologi</td><td></td><td></td><td></td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHbsAg</td><td  align="center"><input type="text" name="hbsag" /></td><td></td><td  align="center">NEGATIF</td>';
echo ' </tr>';
echo '<tr><td>&nbsp</td><td></td><td></td><td></td></tr>';
echo '</table>';
echo '</font>';

echo '</div>';

}
?>
