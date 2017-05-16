<?php
function patient_no()
{

}

?>

<?php
if (isset($_POST['saveptn'])){
	
$myptncode=$_POST['txtmyno'];
$myptnname=$_POST['txtmyname'];
$myptnaddr=$_POST['txtmyaddr'];
$myptnkel=$_POST['txtmykel'];
$myptnkcmt=$_POST['txtmykcmt'];
$myptndate=$_POST['txtmydate'];
$myptnphone=$_POST['txtmyphone'];
$myptngender=$_POST['mygender'];
$myptnrel=$_POST['myreligion'];
$myptnblood=$_POST['myblood'];
$myptnhusband=$_POST['txtsuami'];
$myptnfolder=$_POST['txtfolder'];

if ($myptncode=="" || $myptnname=="" || $myptnaddr=="" || $myptnkel=="" || $myptnkel=="" || $myptnkcmt=="" || $myptndate=="" || $myptnphone=="" || $myptnfolder=="")
{
	echo "Something wrong with your input <br/>";
	echo "<a href='/register_patient.php'>Back</a>";
	exit;
}

$sqlinsert = "INSERT INTO cdtpatient (ptncode,ptnname,ptnaddress,ptnklrh,ptnkcmt,ptndob,ptnphone,ptngender,ptnblood,ptnreligion,ptnhusband) VALUES ('$myptncode','$myptnname','$myptnaddr','$myptnkel','$myptnkcmt','$myptndate','$myptnphone','$myptngender','$myptnblood','$myptnrel','$myptnhusband')";
$insertfolder="INSERT INTO cdtrjfolder (ptncode,ptnfolder,ptnname) VALUES ('$myptncode','$myptnfolder','$myptnname')";

$conn = mysql_connect('localhost','root','root');
$dbfound=mysql_select_db('cappamed');

$resultsearch = mysql_query($sqlinsert,$conn);
		if(!$resultsearch) {
		    die("Database query failed: " . mysql_error());
		    }

$resultsearch1 = mysql_query($insertfolder,$conn);
if(!$resultsearch1) {
		    die("Database query failed: " . mysql_error());
		    }

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>REGISTER PATIENT</title>
<style type="text/css">
.auto-style7 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: x-large;
	color: #F5F3F3;
	background-color: #FF9933;
}
.auto-style8 {
	font-family: Calibri;
	font-size: small;
}
.auto-style9 {
	font-size: medium;
}
</style>
</head>

<body style="width: 1000px">
<?php include('mymenu.php');?>
<table style="width: 100%; height: 13px">
	<tr>
		<td class="auto-style7">REGISTRATION</td>
	</tr>
	</table>
<form method="post" action="">
<table style="width: 99%">
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>PATIENT NO</strong></td>
		<td><input name="txtmyno" style="width: 118px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>NAMA LENGKAP</strong></td>
		<td><input name="txtmyname" style="width: 159px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>ALAMAT</strong></td>
		<td><textarea name="txtmyaddr" style="width: 175px; height: 74px"></textarea></td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>KELURAHAN</strong></td>
		<td><input name="txtmykel" style="width: 166px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>KECAMATAN</strong></td>
		<td><input name="txtmykcmt" style="width: 161px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>UMUR</strong></td>
		<td><input name="txtmydate" style="width: 140px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>TELEPON</strong></td>
		<td><input name="txtmyphone" style="width: 143px" type="text" /></td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>JENIS KELAMIN</strong></td>
		<td><select name="mygender">
		    <option value="Laki-Laki">Laki-Laki</option>
		    <option value="Perempuan">Perempuan</option>
		    </select>&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>AGAMA</strong></td>
		<td><select name="myreligion">
		    <option value="Hindu">Hindu</option>
		    <option value="Budha">Budha</option>
		    <option value="Islam">Islam</option>
		    <option value="Kristen">Kristen</option>
		    <option value="Katholik">Katholik</option>
		    
		    </select>&nbsp;</td>
	
	</tr>
	<tr>
		<td class="auto-style8" style="width: 186px"><strong>GOLONGAN DARAH&nbsp;</strong></td>
		<td><select name="myblood">
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="AB">AB</option>
		    <option value="O">O</option>
		    
		    
		    </select>&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style8"><strong>NAMA SUAMI / ISTRI
		</strong>
		</td>
		<td class="auto-style8"><input name="txtsuami" style="width: 161px" type="text" /></td>
	</tr>
		
		<td class="auto-style8"><strong><br/>FOLDER NO</strong></td>
		<td class="auto-style8"><br/>
		<input name="txtfolder" style="width: 123px" type="text" /></td>

	<tr>
		<td class="auto-style8" colspan="2">
		<br/><br/><br/><input name="saveptn" type="submit" value="Save Data"/>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/search_complaint.php" class="auto-style9">input 
		keluhan</a><span class="auto-style9">&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/patient_list.php">view list</a></span></td>
	</tr>
</table>
</form>
</body>

</html>
