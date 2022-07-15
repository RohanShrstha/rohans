<?php
    include 'include/conn.php';
    session_start();

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        // echo $password;
        $sql = "SELECT * FROM tbl_customer WHERE customer_email = '$email' AND customer_pass = '$password'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1)
        {
            $_SESSION['log_status'] = true;
            $_SESSION['email'] = $email;
            echo "<script> 
                alert ('Welcome to SuPu Store.');
                window.location.href='index.php'; 
            </script>";
        }
        else
        {
            header('location:index.php');
            $_SESSION['error'] = "E-mail or password incorrect";
        }
    }
?>