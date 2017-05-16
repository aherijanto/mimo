<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$item_total = 0;

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM cdtitem WHERE itemcode='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["itemcode"]=>array('name'=>$productByCode[0]["itemname"], 'code'=>$productByCode[0]["itemcode"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["opprice"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["itemcode"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["itemcode"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "save":
		
		if(!empty($_SESSION["cart_item"])) {
		
			mysql_connect('localhost','root','root');
			mysql_select_db('cappamed');
			$myinvno=date('Ymd').".".rand(9999,100000);
			$mydate1=date('Y-m-d');
			$insertheader="INSERT INTO cdtopsales (opcode,opdate,optotal) VALUES ('$myinvno','$mydate1','$item_total')";	
			$saveheader= mysql_query($insertheader) or die(mysql_error());
			
			
			foreach($_SESSION["cart_item"] as $myitem) {
				//if($productByCode[0]["itemcode"] == $k)
					$myitemcode= $myitem["code"];//$_SESSION["cart_item"][$k]["code"];//$productByCode[0]["itemcode"];
					$myitemname= $myitem["name"];//$_SESSION["cart_item"][$k]["name"];
					$myprice=$myitem["price"];//$productByCode[0]["opprice"];//$_SESSION["cart item"][$k]["price"];
					$myqty= $myitem["quantity"];//$_SESSION["cart_item"][$k]["quantity"];
					$mysub=$myprice*$myqty;
					$itemtotal=$itemtotal+$mysub;
					$insertdetails="INSERT INTO cdtopsalesdetail (opcode,itemcode,itemname,itemqty,itemprice,itemsub,itemdisc,itemtot) VALUES ('$myinvno','$myitemcode','$myitemname','$myqty','$myprice','$mysub','0','0')";	
					$savedetails= mysql_query($insertdetails) or die(mysql_error());

			}
			$updatetotalquery="UPDATE cdtopsales SET optotal='$itemtotal' WHERE opcode='$myinvno'";
			
			$updatetotal=mysql_query($updatetotalquery) or die(mysql_error());
			
		}
		unset($_SESSION["cart_item"]);
		header("Location:/printopsales.php?myinv=$myinvno");
		
		
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>OPEN SALES - PHARMACY</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.auto-style1 {
	font-family: Calibri;
}
.auto-style2 {
	border-style: none;
	border-color: inherit;
	border-width: 0;
	color: #D60202;
	padding: 2px 10px;
	font-size: small;
}
.auto-style3 {
	font-family: Calibri;
	font-size: small;
}
</style>
</HEAD>
<BODY>
<?php echo "<form method='post'><input name='txtsearch' type='text' autofocus='on'><input name='searchprod' type='submit' value='search'></form>";
$mydate=date('d-m-Y');
echo "Date : ".$mydate."<br/>"; 

?>
<div id="shopping-cart">
<div class="txt-heading">OPEN SALES - PHARMACY <a id="btnEmpty" href="opensales2.php?action=save">Save and Print</a><a id="btnEmpty" href="/opensales2.php?action=empty">Empty Cart</a></div>
<?php

if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th class="auto-style1"><strong>Name</strong></th>
<th class="auto-style1"><strong>Code</strong></th>
<th class="auto-style1"><strong>Quantity</strong></th>
<th class="auto-style1"><strong>Price</strong></th>
<th class="auto-style1"><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td class="auto-style3"><strong><?php echo $item["name"]; ?></strong></td>
				<td class="auto-style3"><?php echo $item["code"]; ?></td>
				<td class="auto-style3"><?php echo $item["quantity"]; ?></td>
				<td align=right class="auto-style3"><?php echo "Rp. ".number_format($item["price"]); ?></td>
				<td class="auto-style1">
				<a href="opensales2.php?action=remove&code=<?php echo $item["code"]; ?>" class="auto-style2">Remove Item</a></td>
				</tr>
				<?php
        $item_total = $item_total+($item["price"]*$item["quantity"]);
        
		}
		
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "Rp.".number_format($item_total); ?></td>
</tr>
</tbody>
</table>		
  <?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	
	<?php
	
	if (isset($_POST['searchprod']))
	{
	
	$myname=$_POST['txtsearch'];
	$product_array = $db_handle->runQuery("SELECT * FROM cdtitem where itemname like '$myname%' ORDER BY itemname ASC");
	
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="opensales2.php?action=add&code=<?php echo $product_array[$key]["itemcode"]; ?>">
			
			
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div><strong><?php echo $product_array[$key]["itemname"]; ?></strong></div>
			<div class="product-price"><?php echo "Rp. ".number_format($product_array[$key]["opprice"]); ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>
	
	<?php
			}
	}
	}
	?>
</div>
</BODY>
</HTML>