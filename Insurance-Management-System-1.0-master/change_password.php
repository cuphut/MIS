<!--Copyrights author: Frankline Bwire-->
<!--insurance management system-->
<!--theme copyrights Colorlib-->
<?php
include 'connect.php';
require 'server.php';
session_start();
$password1='';
$password2='';
//variable declaration
$username = $_SESSION['username'];
$errors=array();

    if(isset($_POST['submitchange'])){
        $password1=mysqli_real_escape_string($conn,$_POST['password1']); 
        $password2=mysqli_real_escape_string($conn,$_POST['password2']);
        if ($password1 != $password2) {
            array_push($errors, "The two passwords do not match");
            };
            //post to database
       
        if (count($errors) == 0) {
            
            $sql="UPDATE `users` SET `password` ='$password1' WHERE `username`='$username'";
            $query=mysqli_query($conn,$sql);
            if(!$query){
                die ('error'. mysqli_error($conn));
            }
            header('location: account.php');   
        }
    
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <title>Online Insurance System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <!--================Header Menu Area =================-->
    <header class="header_area" style="background-color: black">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="home.php">Online Insurance</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                             <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registration</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="policyreg.php">Personal</a></li>
                                    <li class="nav-item"><a class="nav-link" href="companyreg.php">Company</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="price.php">Pricing</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Policies</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="auto.php">Auto/Vehicle</a></li>
                                    <li class="nav-item"><a class="nav-link" href="health.php">Health</a></li>
                                    <li class="nav-item"><a class="nav-link" href="life.php">Life</a></li>
                                    <li class="nav-item"><a class="nav-link" href="realestate.php">Real Estate</a></li>
                                    <li class="nav-item"><a class="nav-link" href="cargo.php">Cargo</a></li>
                                    <li class="nav-item"><a class="nav-link" href="incomeprotection.php">Income Protection</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="account.php">User Account</a></li>
                        </ul>
                    </div>
                    <div class="right-button">
                        <ul>
                            <li><a class="sign_up" href="index.php">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->
    <!--================Policy Registration =================-->
    <section class="blog_area single-post-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <form action="change_password.php" method="post">
                        <h1 style="color: black">Change Password
                            <hr style="color: black">
                        </h1>
                        
                        <?php 
                            $query = "SELECT `password` FROM `users` WHERE `username`='$username'";
                            $results = mysqli_query($conn, $query);
                            while ($row = $results->fetch_assoc()) {
                                echo "<p class='fs-5' style='color: black'>User Id: ".$row['password']."</p>";
                            }
                        ?>
                        <div class="mt-10">
                            <input type="text" name="password1" placeholder="New Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'" required class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="text" name="password2" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required class="single-input">
                        </div>
                                
                            <?php include('errors.php'); ?>
                            

                        <br>
                        <div class="mt-10" align ="center">
                            <button type="submit" name="submitchange" class="genric-btn success-border">Apply Policy
                            </button>
                            <button style="margin-left: 50px" type="reset" name="submitchange" class="genric-btn danger-border"><a href="account.php">Cancel</a>
                            </button>

                        </div>
                    </form>
                </div>
                <!--category section-->
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <!--Category Section-->
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="auto.php" class="d-flex">
                                        <p>Auto Insurance</p>

                                    </a>
                                </li>
                                <li>
                                    <a href="cargo.php" class="d-flex">
                                        <p>Cargo Insurance</p>

                                    </a>
                                </li>
                                <li>
                                    <a href="life.php" class="d-flex">
                                        <p>Life Insurance </p>

                                    </a>
                                </li>
                                <li>
                                    <a href="health.php" class="d-flex">
                                        <p>Health Insurance</p>

                                    </a>
                                </li>
                                <li>
                                    <a href="realestate.php" class="d-flex">
                                        <p>Real Estate Insurance</p>

                                    </a>
                                </li>
                                <li>
                                    <a href="incomeprotection.php" class="d-flex">
                                        <p>Income Protection Insurance</p>

                                    </a>
                                </li>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Quick Links</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="companyreg.php" class="d-flex">
                                        <p >Update Company Details</p>

                                    </a>
                                </li>

                                <li>
                                    <a href="policyreg.php" class="d-flex">
                                        <p style="color: #f84b67">User Policy Registration</p>

                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area end =================-->
                    
                <!--End category section-->

    <!-- ================ start footer Area ================= -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Theme:</h4>
                    <p>Assuring you a hopeful future</p>
                    <div class="footer-logo">
                        <h3 style="color: white; font-weight: bolder"> Online Insurance System</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Contact Info</h4>
                    <div class="footer-address">
                        <p>Address : 6789 Street <br> </p>
                        <span>Phone : +123 456789</span>
                        <span>Email : narokims@gmail.com</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>Subscribe to receive our lates news letters</p>

                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
                            <div class="input-group">
                                <input type="email" class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
                                <div class="input-group-append">
                                    <button class="btn click-btn" type="submit">
                                        <i class="fab fa-telegram-plane"></i>
                                    </button>
                                </div>
                            </div>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="footer-bottom row align-items-center text-center text-lg-left no-gutters">
                <p class="footer-text m-0 col-lg-8 col-md-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());

                    </script> All rights reserved 
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-dribbble"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ End footer Area ================= -->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>
