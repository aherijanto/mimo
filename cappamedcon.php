<?php
function connect_db($sname,$uname,$pname,$dname)
{
$conn = mysql_connect($sname, $uname, $pname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
} 
echo "";

$db_found=mysql_select_db($dname);
if ($db_found) {

print "ok ";
}
else {
print "Database NOT Found";
}

}
?>
