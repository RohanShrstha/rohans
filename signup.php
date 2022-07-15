<?php
include "include/conn.php";
function test_input($data) {
    $data = trim($data);    
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER['REQUEST_METHOD']=='POST')
{

    if(isset($_POST['submit']))
    {
        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $pass = test_input($_POST['pass']);
        $cpass = test_input($_POST['cpass']);

        

        $sql = "SELECT * FROM tbl_customer WHERE customer_name = '$name' OR customer_email = '$email'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0)
        {
            $_SESSION['error'] = "Username or User E-mail already exists";
        }
        else
        {
            $pass = md5($pass);
            $stmt ="INSERT INTO tbl_customer (customer_name,customer_email,customer_pass) VALUES('$name','$email','$pass')";

            if(mysqli_query($conn,$stmt))
            {
                $_SESSION['email'] = $email;
                header('location:details.php');
            }
            else
            {
                $_SESSION['error'] = "Error in user registration. Please try again later.";
            }
        }
        

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuPu Shopping Store</title>
    <link rel="icon" href="./images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/signupvalidate.js"></script>
    <link rel="stylesheet" href="css/signup.css">
    <style>
        .errormsg{
            z-index: 1;
            text-align: center;
            font-size: 16px;
            color: red;
            margin: 10px 0 -20px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="forms">

            <!-- Registration Form -->
            <div class="form login">
                <span class="title">Registration</span>

                <form action="#" method="POST" onsubmit="return formvalidate()" id="form">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" name="name" id="name" onkeyup="namevalidation()">
                        <div class="msg-box"></div>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your E-mail" name="email" id="email" onkeyup="emailvalidation()">
                        <div class="msg-box"></div>
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Create a Password" name="pass" id="pass" onkeyup="passwordvalidation()">
                        <div class="msg-box"></div>
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Confirm your password" name="cpass" id="cpass" onkeyup="cpasswordvalidation()">
                        <div class="msg-box"></div>
                        <i class="fa fa-lock"></i>
                    </div>

                    <?php
                        if(isset($_SESSION['error']))
                        {
                    ?>
                    <div class="errormsg">
                        <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </div>
                    <?php
                        }
                    
                    ?>

                    <div class="input-field button">
                        <input type="submit" value="Sign Up" name="submit">
                        <div class="msg-box"></div>
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="index.php" class="text login-link" style="text-decoration: none;">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>