<?php
    include 'include/conn.php';
    session_start();

    if (isset($_POST['submit'])) 
    {
        $image = $_POST['image'];
        $info = $_POST['info'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        // database insert SQL code
        $sql = "INSERT INTO `tbl_cart` (image, info, title, price, quantity) VALUES ('$image', '$info', '$title', '$price', '$quantity')";
        // insert in database 
        if (mysqli_query($conn, $sql)) {
            echo "<script> 
                alert ('Your order has been sent Successfully. We will contact you shortly.');
                window.location.href='index.php'; 
            </script>";
        }
    }
    else
    {
        echo "<script>
            alert('Error to send order.');
            window.location='index.php';
        </script>";
    }
?>