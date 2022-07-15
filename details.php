<?php
include "include/conn.php";
session_start();
if(isset($_POST['submit']))
{
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    $email = $_SESSION['email'];

    $stmt = "UPDATE tbl_customer SET customer_phone = '$phone', customer_address = '$address' , customer_dob = '$dob', customer_gender = '$gender' WHERE customer_email = '$email'";

    if(mysqli_query($conn,$stmt))
    {
        echo "<script> 
                alert ('Your account has been created. Successfully');
                window.location.href='index.php'; 
            </script>";
        session_destroy();
    }
    else
    {
        echo "Error in Submission";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta phone="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuPu Store | Details</title>
    <link rel="icon" href="./images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: rgb(222, 222, 222);
        }

        .heading {
            height: 90px;
            background-image: linear-gradient(to right, rgb(0, 68, 20), rgb(0, 194, 194));
        }

        .container {
            max-width: 600px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            margin: 50px 450px 0;
        }

        .container .forms {
            display: flex;
            align-items: center;
            height: 520px;
            width: 150%;
            transition: height 0.2s ease;
        }

        .container .form {
            width: 65%;
            padding: 30px;
            background-color: #fff;
            transition: margin-left 0.18s ease;
        }

        .container .form .title {
            position: relative;
            font-size: 27px;
            font-weight: 600;
        }

        .form .input-field {
            position: relative;
            height: 40px;
            width: 100%;
            margin-top: 30px;
        }

        .input-field input {
            height: 100%;
            width: 100%;
            padding: 0 35px;
            border: none;
            outline: none;
            font-size: 16px;
            border-bottom: 2px solid #ccc;
            border-top: none;
            transition: all 0.2s ease;
        }

        .gentitle {
            font-size: 24px;
            color: #999;
        }

        .gen {
            position: relative;
            top: -26px;
        }

        .gen input {
            height: auto;
            margin-left: -250px;
        }

        .input-field i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 23px;
            transition: all 0.2s ease;
            margin-left: 5px;
        }

        .input-field label {
            font-size: 20px;
            line-height: 28px;
            margin-left: -245px;
        }

        .form .login-signup .text {
            font-size: 18px;
        }

        .form a {
            text-decoration: none;
        }

        .form .text {
            color: #333;
            font-size: 16px;
        }

        .form a.text {
            color: plum;
            text-decoration: none;
        }

        .form a.text:hover {
            color: tomato;
            text-decoration: none;
        }

        .form .button {
            margin-top: 10px;
            width: 530px;
        }

        .form .button input {
            border: none;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 6px;
            background-color: plum;
            cursor: pointer;
            transition: all 0.5s ease;
        }

        .button input:hover {
            background-color: tomato;
        }

        .form .login-signup {
            margin-top: 30px;
            text-align: center;
        }

        .msg-box{
            color: red;
            font-style: italic;
            text-align: center;
            font-size: 20px;
        }
        
    </style>
</head>

<body>
<div class="heading">
        <?php
        include 'include/header.php';
        ?>
    </div>
    <div class="container">
        <div class="forms">
            <div class="form detail">
                <span class="title">Fill up the form to continue</span>

                <form action="#" method="POST" onsubmit="return formvalidate()" id="form" name="form">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your phone" name="phone" id="phone" onkeyup="phonevalidation()">
                        <div class="msg-box"></div>
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="input-field">
                        <input type="date" placeholder="Enter your DOB" name="dob" id="dob" onkeyup="dobvalidation()">
                        <div class="msg-box"></div>
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your Address" name="address" id="address" onkeyup="addressvalidation()">
                        <div class="msg-box"></div>
                        <i class="fa fa-map-marker"></i>
                    </div><br>
                    <span class="gentitle">Gender</span>
                    <div class="input-field gen">
                        <input type="radio" name="gender" id="gender" value="Male" checked><label>Male</label></input><br>
                        <input type="radio" name="gender" id="gender" value="Female"><label>Female</label></input>
                        <div class="msg-box"></div>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Submit" name="submit">
                        <div class="msg-box"></div>
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Go back to Login page?
                        <a href="index.php" class="text login-link" style="text-decoration: none;">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setError(element, msg) {
            const input = element.parentElement;
            const errorDisplay = input.querySelector('.msg-box');

            errorDisplay.innerText = msg;
            errorDisplay.classList.add('error');
        }

        function setSuccess(element) {
            const input = element.parentElement;
            const errorDisplay = input.querySelector('.msg-box');

            errorDisplay.innerText = "";
            errorDisplay.classList.remove('error');
        }

        function phonevalidation() {
            var phone = document.getElementById('phone');
            var phoneV = phone.value;
            if (phoneV == "") {
                setError(phone, 'Phone cannot be empty');
                return false;
            }
            if (phoneV.length < 10) {
                setError(phone, 'Phone cannot be less than 10 characters');
                return false;
            }
            if (phoneV.length > 10) {
                setError(phone, 'Phone cannot be more than 10 characters');
                return false;
            } else {
                setSuccess(phone);
                return true;
            }
        }

        function dobvalidation() {
            var dob = document.getElementById('dob');
            var dobV = dob.value;
            if (!(dobV.match(/^[0-9\-]+[0-9\-]+[0-9]$/))) {
                setError(dob, 'Invalid dob format');
                return false;
            } else {
                setSuccess(dob);
                return true;
            }
        }

        function addressvalidation() {
            var address = document.getElementById('address');
            var addressV = address.value;

            if (addressV == "") {
                setError(address, 'Address cannot be empty');
                return false;
            }
            if (addressV.length > 20) {
                setError(address, 'Address cannot be more than 20 characters');
                return false;

            } else {
                setSuccess(address);
                return true;
            }
        }

        function formvalidate() {
            if (phonevalidation() && dobvalidation() && addressvalidation()) {
                var form = document.getElementById('form');
                form.submit();
            } else {
                event.preventDefault();
            }
        }
    </script>


</body>

</html>