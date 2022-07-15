
<?php
include "include/conn.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/signup.css">
    <title>SuPu Shopping Store</title>
    <link rel="icon" href="./images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/signupvalidate.js"></script>

    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 155px 10px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 155px 10px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
</head>


<body>
    <div id="home">
        <!-- First-Background -->
        <div class="first-container">

            <?php
            include 'include/header.php';
            ?>

            <!-- Description in background -->
            <div class="mid-desc">
                <h2 style="font-family: 'Georgia', serif; font-size: 50px">Sushma Purnima<br>SuPu Shopping Store</p>
                </h2><br>
                <p style="font-family:Verdana, sans-serif; font-size: 16px; line-height: 30px;">Where you can buy variety of products for men ,women and kids</p>
                <section>
                    <a href="products.php"><button id="aboutus">Our Products</button></a>
                    <a href="#contact"><button id="join">Contact Us</button></a>
                </section>
            </div>

        </div>

        <!-- Signup -->
        <?php 
            include 'signup.php';
        ?>
    </div>

    <div id="about">
        <!-- Small Description -->
        <div class="smalldesc">
            <p style="font-family: 'Georgia',serif; font-size: 20px; color: tomato"> What we do</p>
            <p style="font-family: 'Georgia',serif; font-size: 28px">WE SELL CLOTHES WITH BETTER OPTIONS</p><br>
        </div>


        <div class="about-content">
            <!-- Photo -->
            <img src="images/about.jpg" alt="Not Supported" width="400px">

            <!-- About Description -->
            <div class="aboutdesc">
                <h2 style="color: tomato; font-size: 40px; line-height: 40px;">About Us</h2>
                <p style="font-family: 'Georgia',serif; font-size: 26px; letter-spacing: 2px; padding-top: 15px;">SuPu Shopping Store</p><br>
                <p style="line-height: 34px; font-size: 18px; letter-spacing:1px; color: grey; text-align: justify;"> The SuPu Store is online website, which is developed to automate the functionalities of a user friendly and affordable Clothing Store. The main purpose of our website is to provide a friendly interface for the user to explore the products of the clothing store and buy them according to their choice. In SuPu Store, the user can easily buy products in affordable price.</p>
                <br>
                <h3 style="font-size:25px; color: tomato; ">We provide</h3>

                <div class="listabt">
                    <ul type=none>
                        <li><i class="fa fa-check-square"></i><a style="text-decoration:none;" href="womens.php">Women's Wear</a></li>
                        <li><i class="fa fa-check-square"></i><a a style="text-decoration:none;" href="mens.php">Men's Wear </a></li>
                        <li><i class="fa fa-check-square"></i><a a style="text-decoration:none;" href="kids.php">Kid's Wear </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="service">
        <!-- Second-Background -->
        <div class="second-container">
            <!-- Description on Service -->
            <div class="servicedesc" style="margin-top: 40px ;">
                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; letter-spacing: 5px;">A few clicks is all it takes</p>
                <div class="rightservice">
                    <p style="color: tomato; font-size: 26px;">What we provide</p>
                    <p style="font-size: 48px; margin-top: 20px;">Our Services</p>
                </div>
            </div>

            <!-- Galley View of Service -->
            <div class="servicegallery">
                <a href="mens.php">
                    <div class="item">
                        <img src="images/male.jpg" alt="" width="350px">
                        <h3>Mensware</h3>
                    </div>
                </a>
                <a href="womens.php">
                    <div class="item">
                        <img src="images/women.jpg" alt="" width="350px">
                        <h3>Womensware</h3>
                    </div>
                </a>
                <a href="kids.php">
                    <div class="item">
                        <img src="images/kids.jpg" alt="" width="350px">
                        <h3>Kidsware</h3>
                    </div>
                </a>
            </div>
            <div class="viewprod">
                <center><a href="products.php"><button><span>View Products</span></button></a></center>
            </div>
        </div>
    </div>

    <!-- Description on Features but used service's CSS -->
    <div class="servicedesc" style="padding-top: 100px;">
        <p style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; letter-spacing: 2px; color: grey;">
            If you are looking for best store to buy clothes<br>
            then this is your destination
        </p>
        <div class="rightservice">
            <p style="color: tomato; font-size: 26px;">Our hard work</p>
            <p style="font-size: 48px; margin-top: 20px; color: black;">Our Features</p>
        </div>
    </div>

    <div class="feature-content">
        <!-- Photo -->
        <img src="images/function.jpg" alt="Not Supported" width="400px" height="480px">

        <!-- Feature Box contents -->
        <div class="featuredesc">
            <div class="featurebox">
                <i class="fa fa-group"></i>
                <div class="information">
                    <h2>Variety of Products</h2>
                    <p>We carry clothes of different categories like women, men and kids. And also varieties of shoes, which makes diverse offerings.</p>
                </div>
            </div>

            <div class="featurebox" style="max-width:620px; margin-left:30px;">
                <i class="fa fa-leaf"></i>
                <div class="information">
                    <h2>Eco-Friendly</h2>
                    <p>We provide eco-friendly clothes<br> who are practicing eco-friendly lifestyles.</p>
                </div>
            </div>

            <div class="featurebox">
                <i class="fa fa-money"></i>
                <div class="information">
                    <h2>Affordable Prices</h2>
                    <p>We offer our products at a discounted rate as we buy products from factory and sell them which helps to recycle clothes.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- banner -->
    <div class="banner">
        <div class="item">
            <i class="fa fa-user"></i>
            <p class="number">
                <?php
                $sql = "SELECT COUNT(customer_id) AS total FROM tbl_customer;";
                $result = $conn->query($sql);
                $data =  $result->fetch_assoc();
                echo $data['total'];
                ?>+
            </p>
            <p class="text">Customers</p>
        </div>
        <div class="item">
            <i class="fa fa-smile-o"></i>
            <p class="number">
            <?php  
                $sql = "SELECT COUNT(productid) AS total FROM tbl_products;";
                $result = $conn->query($sql);
                $data =  $result->fetch_assoc();
                echo $data['total'];
                ?>+
            </p>
            <p class="text">Products</p>
        </div>
        <div class="item">
            <i class="fa fa-shopping-cart"></i>
            <p class="number">
            <?php  
                $sql = "SELECT COUNT(id) AS total FROM tbl_booking;";
                $result = $conn->query($sql);
                $data =  $result->fetch_assoc();
                echo $data['total'];
                ?>+
            </p>
            <p class="text">Bookings</p>
        </div>
        
        <div class="item">
            <i class="fa fa-comments-o"></i>
            <p class="number">
            <?php  
                $sql = "SELECT COUNT(customer_id) AS total FROM tbl_msg;";
                $result = $conn->query($sql);
                $data =  $result->fetch_assoc();
                echo $data['total'];
                ?>+
            </p>
            <p class="text">Contatced</p>
        </div>
    </div>

    <!-- Clients -->
    <div class="majorclient">
        <!-- Description on Clients but used service's CSS -->
        <div class="servicedesc" style="margin-top: 60px;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; letter-spacing: 5px; color: grey;">
                These are the reviews from our popular clients
            </p>
            <div class="rightservice">
                <p style="color: tomato; font-size: 26px;">What peoples say</p>
                <p style="font-size: 48px; margin-top: 20px; color: black;">Our Clients</p>
            </div>
        </div>

        <!-- Client Content -->
        <div class="clients">
            <div class="client-details">
                <img src="images/sita.jpg" alt="" width="250px">
                <h2>Sita</h2>
                <medium>Our Client</medium>
                <p>Best website to buy clothes online. I came here through my friends review and the quality is best and they provide very huge discount to the regular customer.</p>
            </div>

            <div class="client-details">
                <img src="images/bijaya.jpg" alt="" width="250px">
                <h2>Bijaya</h2>
                <medium>Our Client</medium>
                <p>They are very fast to response our orders and very secured and authentic website to use. I love it.</p>
            </div>

            <div class="client-details">
                <img src="images/gita.jpg" alt="" width="250px">
                <h2>Gita</h2>
                <medium>Our Client</medium>
                <p>This is my third time buying the products from this website and I'm coming back again and again. Loved the products they are serving.</p>
            </div>
        </div>
    </div>
    </div>

    <!-- Contact -->
    <div id="contact">
        <!-- Description on Contact but used service's CSS -->
        <div class="servicedesc" style="margin-top: 160px;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; letter-spacing: 5px; color: grey;">
                We stay on top so you can be on top.
            </p>
            <div class="rightservice">
                <p style="color: tomato; font-size: 26px;">Get Touch in</p>
                <p style="font-size: 48px; margin-top: 20px; color: black;">Contact Us</p>
            </div>
        </div>

        <!-- Contact Us -->
        
        <div class="contact-container">
            <div class="form">
                <form method="POST" action="contact.php">
                    <input type="text" placeholder="Name" name="conname" required><br>
                    <input type="email" placeholder="Email" name="conemail" required><br>
                    <input type="text" placeholder="Phone" name="conphone" required><br>
                    <textarea name="conmessage" id="message" placeholder="Message" cols="30" rows="10"></textarea><br>
                    <a href="#"><button name="display" id="sendbtn">Send</button></a>
                </form>
            </div>
            <div class="address">
                <div class="addressrow">
                    <i class="fa fa-home"></i>
                    <div class="addressdesc">
                        <h2>Address</h2><br>
                        <p>Thankot, Kathmandu, Nepal</p>
                    </div>
                </div>

                <div class="addressrow">
                    <i class="fa fa-phone"></i>
                    <div class="addressdesc">
                        <h2>Phone</h2><br>
                        <p><a href="#" style="text-decoration: none"> + 977 9841325698 <br> + 977 9812457896</a></p>
                    </div>
                </div>

                <div class="addressrow">
                    <i class="fa fa-envelope"></i>
                    <div class="addressdesc">
                        <h2>Email</h2><br>
                        <p>balamianahita@gmail.com <br> tamangpurnima596@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28263.05799760903!2d85.19263372672422!3d27.690033999123706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb230e5479efb1%3A0xa28ed7f729030fd3!2sThankot%2C%20Chandragiri!5e0!3m2!1sen!2snp!4v1655801655585!5m2!1sen!2snp" width="100%" height="300" style="border: 1px solid rgb(201, 200, 200); padding: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <?php
        include 'include/footer.php';
        ?>
    </div>

</html>