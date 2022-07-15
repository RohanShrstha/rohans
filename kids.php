<?php
include 'include/conn.php';
session_start();
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SuPu Shopping | Kidsware</title>
    <link rel="icon" href="./images/logo.png" />
</head>

<body>
    <div class="heading">
        <?php
        include 'include/header.php';
        ?>
    </div>

    <div class="container">

        <div class="category">Kidsware</div>
        
        <div class="dropdown1">
            <button class="dropbtn1">Categories</button>
            <div class="dropdown-content1">
                <a href="products.php">All Categories</a>
                <a href="mens.php">Mensware</a>
                <a href="womens.php">Womensware</a>
            </div>
        </div>
        
        <div class=" product" id="myBtn">
            <?php
            $sql = "SELECT * FROM tbl_products WHERE category = 'kidsware'";
            $result = mysqli_query($conn, $sql);
            $i = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($value = mysqli_fetch_assoc($result)) {
            ?>
            <div class="item" onclick="show('<?php echo $i; ?>')">
                <div class="image">
                    <img src="images/upload/<?php echo $value['img1']; ?>" alt="" height="200px" width="200px" ;>
                </div>
                <div class="desc">
                    <div class="productname">
                        <?php echo $value['productname']; ?>
                    </div>
                    <div class="title">
                        <?php echo $value['title']; ?>
                    </div>
                    <div class="price">
                        <?php echo "Rs " . $value['price']; ?>
                    </div>
                </div>
            </div>

            <div id='<?php echo $i; ?>' class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeWindow(<?php echo $i; ?>)">&times;</span>

                    <div class="image">
                        <img src="images/upload/<?php echo $value['img1']; ?>" alt="" height="400px" width="380px" ;>
                    </div>
                    <div class="information">
                        <div class="pname">
                            <?php echo $value['productname']; ?>
                        </div>
                        <div class="ptitle">
                            <b><label>Title : </label></b>
                            <?php echo $value['title']; ?>
                        </div>
                        <div class="pdescription">
                            <b><label>Description : </label></b>
                            <?php echo $value['description']; ?>
                        </div>
                        <div class="pprice">
                            <?php echo "Rs. " . $value['price']; ?>
                        </div>

                        <form action="cart.php">
                            <div class="pquantity">
                                <b><label for="quantity">Quantity : </label></b>
                                <input type="number" id="quantity" name="quantity" min="1" max="5" value="1">
                            </div>
                            <div class="bottonss">
                                <input class="button" type="submit" value="Add to Cart" name="submit" style="background-color: tomato;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                    $i++;
                }
            }
            ?>

        </div>

    </div>

    <script src="js/productinfo.js"></script>

</body>

</html>