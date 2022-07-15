<?php
session_start();

include 'include/conn.php';
$status = "";
if (isset($_POST['productid']) && $_POST['productid'] != "") {
	$productid = $_POST['productid'];
	$result = mysqli_query($conn, "SELECT * FROM `tbl_products` WHERE `productid`='$productid'");
	$row = mysqli_fetch_assoc($result);
	$productname = $row['productname'];
	$productid = $row['productid'];
	$price = $row['price'];
	$img1 = $row['img1'];

	$cartArray = array(
		$productid => array(
			'productname' => $productname,
			'productid' => $productid,
			'price' => $price,
			'quantity' => 1,
			'img1' => $img1
		)
	);

	if (empty($_SESSION["shopping_cart"])) {
		$_SESSION["shopping_cart"] = $cartArray;
		$status = "<div class='box'>Product is added to your cart!</div>";
	} else {
		$array_keys = array_keys($_SESSION["shopping_cart"]);
		if (in_array($productid, $array_keys)) {
			$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";
		} else {
			$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
			$status = "<div class='box'>Product is added to your cart!</div>";
		}
	}
}
?>
<html>

<head>

	<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>

<body>

		<?php
		

		$result = mysqli_query($conn, "SELECT * FROM `tbl_products`");
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='productid' value=" . $row['productid'] . " />
			  <div class='img1'><img src='" . $row['img1'] . "' /></div>
			  <div class='name'>" . $row['productname'] . "</div>
		   	  <div class='price'>$" . $row['price'] . "</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
		}
		mysqli_close($conn);
		?>

		<div style="clear:both;"></div>

		<div class="message_box" style="margin:10px 0px;">
			<?php echo $status; ?>
		</div>

	</div>
</body>

</html>