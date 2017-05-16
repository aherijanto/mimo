
<head>
<link rel="stylesheet" type="text/css" href="menu.css"/>
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

<style type="text/css">
.auto-style1 {
	background-color: #800080;
}
.auto-style2 {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: large;
	color: #F8F1F1;
}
.auto-style3 {
	font-family: Calibri;
	font-size: small;
	color: #357FEA;
}

</style>
</head>

<?php
if (isset($_GET['ptncode']))
{
	$mynoptn=$_GET['ptncode'];
	$sqlcomplaint="SELECT * FROM cdtpatient WHERE ptncode='$mynoptn'";
	mysql_connect('localhost','root','root');
	mysql_select_db('cappamed');
	$resultsearch=mysql_query($sqlcomplaint);
	if(!$resultsearch) {
	   	 die("Database query failed: " . mysql_error());
	   	 echo 'NO DATA';
	   	 exit;
			}
	else{
		echo '<table class="auto-style1" style="width: 100%"><tr><td class="auto-style2">PATIENT HISTORY - '.$mynoptn.'</td></tr></table>';
		echo "<table>";
		while($row = mysql_fetch_array( $resultsearch )) {
			$myptncode=$row['ptncode'];
			echo '<table style="width: 100%">';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>CODE</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptncode'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>FULLNAME</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnname'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>ADDRESS</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnaddress'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>KELURAHAN</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnklrh'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>KECAMATAN</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnkcmt'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>UMUR</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptndob'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>PHONE</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnphone'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>GENDER</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptngender'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>BLOOD TYPE</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnblood'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>RELIGION</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnreligion'].'</td></tr>';
			echo '<tr><td style="width: 39px" class="auto-style3"><strong>SUAMI/ISTRI NAME</strong></td><td style="width: 435px" class="auto-style3">'.$row['ptnhusband'].'</td></tr>';
			echo '</table>';
			echo '<form method="post">';
			echo '<table style="width: 100%">';
			}
			
			//Loading history from database
			$sqlhistory="SELECT * from cdtcomplain where ptncode='$myptncode' ORDER BY compdate DESC";
			$resulthist=mysql_query($sqlhistory);
			if(!$resulthist) {
	   			 die("Database query failed: " . mysql_error());
	   	 		echo 'NO DATA';
	   			
				}

			echo "<br><br><table class='auto-style3' border='1' cellpadding='2'>";
			echo "<tr> <th>DATE COMPLAIN</th> <th>COMPLAINT NO</th> <th>COMPLAINT</th><th>ACTION</th><th>VIEW</th></tr>";
			while($row = mysql_fetch_array( $resulthist )) {
				echo "<tr>";
				echo '<td>' . date('d-m-Y',strtotime($row['compdate'])) . '</td>';
				echo '<td>' . $row['compno'] . '</td>';
				echo '<td align="center">' . $row['comptext'] . '</td>';
				$mycompno=$row['compno'];
				$sqlinv="SELECT cdtopresep.opcode,cdtopresep.compno,cdtopresepdetail.itemname,cdtopresepdetail.itemqty FROM cdtopresep,cdtopresepdetail WHERE (cdtopresep.compno='$mycompno') AND (cdtopresepdetail.opcode=cdtopresep.opcode)";
				$showopcode= mysql_query($sqlinv) or die(mysql_error());
				$num_rows = mysql_num_rows($showopcode);
				echo '<td align="center">';	
					while($row1 = mysql_fetch_array( $showopcode))
					{
					
						echo $row1['itemname'] .' '.$row1['itemqty'].'<br>';					
					}
				echo '</td>';
					
				 	 //echo '<td align="center">'Not Available'</td>';
				 	
				
				echo '<td> <a href="/print_preview_complaint.php?ptncode='.$row['ptncode'].'">Print Complain </a>:::<a href="/medical_sales.php?compno='.$row['compno'].'"> Input Resep</a></td>';
				echo "</tr>"; 

			}
			echo '</table>';
			
			echo '<br><br><a href="/register_patient.php" class="auto-style3">Go to Register Patient</a>';
			echo '<br><br><a href="/search_complaint.php" class="auto-style3">Go to Search Patient</a>';
		}
}

?>


