<?php
    include 'include/conn.php';
    session_start();

    if (isset($_POST['display'])) 
    {
        $conname = $_POST['conname'];
        $conemail = $_POST['conemail'];
        $conphone = $_POST['conphone'];
        $conmessage = $_POST['conmessage'];

        // database insert SQL code
        $sql = "INSERT INTO `tbl_msg` (cname, email, phone, message) VALUES ('$conname', '$conemail ', '$conphone', '$conmessage')";
        // insert in database 
        if (mysqli_query($conn, $sql)) {
            echo "<script> 
                alert ('Your message has been sent Successfully. We will contact you shortly.');
                window.location.href='index.php'; 
            </script>";
        }
    }
    else
    {
        echo "<script>
            alert('Error to send message.');
            window.location='index.php';
        </script>";
    }
?>