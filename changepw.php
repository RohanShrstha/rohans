<?php
session_start();
include 'include/conn.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $opass = md5($_POST['opass']);
    $npass = md5($_POST['npass']);
    $cpass = md5($_POST['cpass']);

    $query = mysqli_query($conn, "SELECT customer_email, customer_pass FROM tbl_customer WHERE customer_email = '$email' AND customer_pass = '$opass'");
    $num = mysqli_fetch_array($query);

    if ($num > 0) {
        if ($cpass == $npass) {
            $con = mysqli_query($conn, "UPDATE tbl_customer SET customer_pass = '$npass' WHERE customer_email = '$email'");
            $_SESSION['msg1'] = "Password Changed Successfully";
        } else {
            $_SESSION['msg1'] = "Password doesn't Match";
        }
    } else {
        $_SESSION['msg1'] = "Current Password doesn't Match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuPu Shopping | Change Passowrd</title>
    <link rel="icon" href="./images/logo.png" />
    <link rel="stylesheet" href="css/product.css">
    <style>
        * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

hr {
    width: 1120px;
}

.container {
    margin-left: 50px;
    padding-top: 20px;
    margin-bottom: 30px;
}

.title {
    letter-spacing: 3px;
    font-size: 30px;
}

table {
    table-layout: fixed;
    width: 70em;
    padding: 20px 50px;
    background: none;
    border: none;
    border-collapse: collapse;
}

.abc {
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
    border-radius: 6px;
    font-size: 16px;
    border: 2px solid rgba(177, 174, 174, 0.773);
}

td {
    padding: 10px 20px;
}

label {
    padding-left: 40px;
    font-weight: bold;
}

.button {
    width: 50%;
    padding: 0.75rem 3.6rem;
    background-color: tomato;
    color: #fff;
    font-size: 1vw;
    border: none;
    outline: none;
    cursor: pointer;
    transition: .3s;
    text-decoration: none;
    border-radius: 6px;
}

.button:hover {
    background-color: plum;
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
        <div class="title">Change Password</div><br>
        <hr><br>
        <div class="form-container">
            <table>
                <form name="chngpwd" action="" method="post">

                    <tr>
                        <div class="input-box">
                            <td><label for="email">EMAIL ID</label></td>
                            <td colspan="2"><input type="text" name="email" id="email" class="abc" value="<?php if(isset($email)){ echo $email;} ;?>"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="input-box">
                            <td><label for="opass">Current Password</label></td>
                            <td colspan="2"><input type="password" name="opass" id="opwd" class="abc" required ></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="input-box">
                            <td><label for="npass">New Passowrd</label> </td>
                            <td colspan="2"><input type="password" name="npass" id="npwd" class="abc" required></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="input-box">
                            <td><label for="cpass">Confirm Password</label> </td>
                            <td colspan="2"><input type="password" name="cpass" id="cpwd" class="abc" required></td>
                        </div>
                    </tr>
                    <tr>
                        <div>
                            <td></td>
                            <td><input class="button" type="submit" value="Save" name="submit">&nbsp;&nbsp;
                                <a href="changepw.php" class="button" width="500px">Reset</a>
                            </td>
                        </div> 
                    </tr>
                    
                </form>
            </table>
            <p style="color:red; margin-left:400px; margin-top:10px; font-size: 20px; font-style: italic;"><?php if (isset($_POST['submit'])) {echo $_SESSION['msg1']; } ?></p>
        </div>
    </div>


</body>

</html>