<?php
include 'include/conn.php';
session_start();
// session_destroy();
$status = "";
if (isset($_POST['action']) && $_POST['action'] == "remove") {
    if (empty($_SESSION["shopping_cart"])) {
       {
            if ($_POST["productid"] == $key) {
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
            }
            if (empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["shopping_cart"] as &$value) {
        if ($value['productid'] === $_POST["productid"]) {
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }
}
?>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/product.css">
    <title>SuPu Store | My Cart</title>
    <link rel="icon" href="./images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <style>
        .product_wrapper {
            float: left;
            padding: 10px;
            text-align: center;
        }

        .product_wrapper:hover {
            box-shadow: 0 0 0 2px #e5e5e5;
            cursor: pointer;
        }

        .product_wrapper .name {
            font-weight: bold;
        }

        .product_wrapper .buy {
            text-transform: uppercase;
            background: #F68B1E;
            border: 1px solid #F68B1E;
            cursor: pointer;
            color: #fff;
            padding: 8px 40px;
            margin-top: 10px;
        }

        .product_wrapper .buy:hover {
            background: #f17e0a;
            border-color: #f17e0a;
        }

        .message_box .box {
            margin: 10px 0px;
            border: 1px solid #2b772e;
            text-align: center;
            font-weight: bold;
            color: #2b772e;
        }

        .table th {
            border-bottom: #F0F0F0 1px solid;
            padding: 10px;
        }

        .cart_div {
            float: right;
            font-weight: bold;
            position: relative;
        }

        .cart_div a {
            color: #000;
        }

        .cart_div span {
            font-size: 12px;
            line-height: 14px;
            background: #F68B1E;
            padding: 2px;
            border: 2px solid #fff;
            border-radius: 50%;
            position: absolute;
            top: -1px;
            left: 13px;
            color: #fff;
            width: 14px;
            height: 13px;
            text-align: center;
        }

        .cart .remove {
            background: none;
            border: none;
            color: #0067ab;
            cursor: pointer;
            padding: 0px;
        }

        .cart .remove:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="heading">
        <?php
        include 'include/header.php';
        ?>
    </div>
    <div style="width:700px; margin:50 auto;">

        <h2>My Cart</h2>

        <div class="cart">
            <?php
            if (isset($_SESSION["shopping_cart"])) {
                $total_price = 0;
            ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <th></th>
                            <th>ITEM NAME</th>
                            <th>QUANTITY</th>
                            <th>UNIT PRICE</th>
                            <th>ITEMS TOTAL</th>
                        </tr>
                        <?php
                        foreach ($_SESSION["shopping_cart"] as $product) {
                        ?>
                            <tr>
                                <td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
                                <td><?php echo $product["productname"]; ?><br />
                                    <form method='post' action=''>
                                        <input type='hidden' name='productid' value="<?php echo $product["productid"]; ?>" />
                                        <input type='hidden' name='action' value="remove" />
                                        <button type='submit' class='remove'>Remove Item</button>
                                    </form>
                                </td>
                                <td>
                                    <form method='post' action=''>
                                        <input type='hidden' name='productid' value="<?php echo $product["productid"]; ?>" />
                                        <input type='hidden' name='action' value="change" />
                                        <select name='quantity' class='quantity' onchange="this.form.submit()">
                                            <option <?php if ($product["quantity"] == 1) echo "selected"; ?> value="1">1</option>
                                            <option <?php if ($product["quantity"] == 2) echo "selected"; ?> value="2">2</option>
                                            <option <?php if ($product["quantity"] == 3) echo "selected"; ?> value="3">3</option>
                                            <option <?php if ($product["quantity"] == 4) echo "selected"; ?> value="4">4</option>
                                            <option <?php if ($product["quantity"] == 5) echo "selected"; ?> value="5">5</option>
                                        </select>
                                    </form>
                                </td>
                                <td><?php echo "Rs. " . $product["price"]; ?></td>
                                <td><?php echo "Rs. " . $product["price"] * $product["quantity"]; ?></td>
                            </tr>
                        <?php
                            $total_price += ($product["price"] * $product["quantity"]);
                        }
                        ?>
                        <tr>
                            <td colspan="5" style="text-align:right">
                                <strong>TOTAL: <?php echo "Rs. " . $total_price; ?></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php
            } else {
                echo "<h3>Your cart is empty!</h3>";
            }
            ?>
        </div>

        <div style="clear:both;"></div>

        <div class="message_box" style="margin:10px 0px;">
            <?php echo $status; ?>
        </div>

    </div>
</body>

</html>