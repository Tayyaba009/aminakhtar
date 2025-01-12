<?php 
include_once('config.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$msg = "";

if(isset($_POST['signupform'])){

    $db->where('Email', $_POST['email']);
    $user = $db->get('consumer');
    if ($user != NULL) {
      
        $msg = "Email Already Exist.";
        exit (0);
    }
    
    $data = Array(
        'ConsumerUserName'=> $_POST['name'],
        'Email'=> $_POST['email'],
        'Phone_Number'=> $_POST['phone_number'],
        
        'ZipCode'=> $_POST['zip_code'],
        'ConsumerPassword'=> md5($_POST['password'])
        );
        
    $user = $db->insert('consumer', $data);
  if($user){

 header('Location: login.php');
    
  } else
  {
     $msg = "Some thing went Wrong.";
    exit (0);
  }
        
}
        



?>


<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="assets/css/aos.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/boxicons.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/responsive.css">

        <title>Canyon - College University HTML Template</title>
        <link rel="icon" type="image/png" href="assets/img/all-img/favicon.png">
    </head>
    <body>

        <!-- preloader -->
        <div class="preloader-container" id="preloader">
            <div class="preloader-dot"></div>
            <div class="preloader-dot"></div>
            <div class="preloader-dot"></div>
            <div class="preloader-dot"></div>
            <div class="preloader-dot"></div>
        </div>
        <!-- preloader -->

       
        <div id="scrollsmoother-container"> 
            <!-- Start Top Navbar Area -->
        <?php include_once('navbar.php'); ?>
            <!-- End Top Navbar Area -->

            <!-- Start Navbar Area Start -->
            <div class="navbar-area" id="navbar">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img class="logo-light" src="assets/img/logo/logo.png" alt="logo">
                        </a>
                           <?php if(isset($_SESSION['USERID'])) {?>
                        <div class="other-option d-lg-none">
                            <div class="option-item">
                                <button type="button" class="search-btn" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
                                    <i class='bx bx-search'></i>
                                </button>
                            </div>
                        </div>
                           <?php }?>
                        <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
                            <i class='bx bx-menu'></i>
                        </a>
                        <div class="collapse navbar-collapse justify-content-between">
                            <ul class="navbar-nav ms-auto">
                                          <?php if(isset($_SESSION['USERID'])) {?>
                            <li class="nav-item"><a href="index.php" class="nav-link active">Dashboard</a></li>
                           
                             
                           
                            </ul>
                            <div class="others-option d-flex align-items-center">
                                <div class="option-item">
                                    <div class="nav-btn">
                                        <a href="LogOut.php" class="default-btn">Log Out</a>
                                    </div>
                                </div>
                                <div class="option-item">
                                    <div class="nav-search">
                                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" class="search-button"><i class='bx bx-search'></i></a>
                                    </div>
                                </div>
                            </div>
                                    <?php } else { ?>

                                         <li class="nav-item"><a href="Login.php" class="nav-link">Login</a></li>
                                          <li class="nav-item"><a href="signup.php" class="nav-link ">SignUp</a></li>
                                                 <li class="nav-item"><a href="admin/index.php" class="nav-link ">Admin Login</a>
                                            <?php } ?>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Navbar Area Start -->

            <!-- Start Responsive Navbar Area -->
            <div class="responsive-navbar offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="navbarOffcanvas">
                <div class="offcanvas-header">
                    <a href="index.html" class="logo d-inline-block">
                        <img class="logo-light" src="assets/img/logo/logo.png" alt="logo">
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="accordion" id="navbarAccordion">
                        <div class="accordion-item">
                           <div class="accordion-body">
                                    <div class="accordion" id="navbarAccordion7">
                                             <?php if(isset($_SESSION['USERID'])) {?>
                                        <div class="accordion-item">
                                            <a href="index.php" class="accordion-link active">
                                                Dashboard
                                            </a>
                                        </div>
                                        <div class="accordion-item">
                                            <a href="LogOut.php" class="accordion-link">
                                              Log Out
                                            </a>
                                        </div>
                                                <?php } else { ?>
                                        <div class="accordion-item">
                                            <a href="Login.php" class="accordion-link">
                                                Login
                                            </a>
                                        </div>
                                            <div class="accordion-item">
                                            <a href="signup.php" class="accordion-link">
                                                SignUp
                                            </a>
                                        </div>
                                          <?php } ?>
                                    </div>
                                </div>
                        </div>
            
                    </div>
                    <div class="offcanvas-contact-info">
                        <h4>Contact Info</h4>
                        <ul class="contact-info list-style">
                            <li>
                                <i class="bx bxs-envelope"></i>
                                <a href="contact@Clgunme.edu">contact@Ulster.edu</a>
                            </li>
                            <li>
                                <i class="bx bxs-time"></i>
                                <p>Mon - Fri: 9:00 - 18:00</p>
                            </li>
                        </ul>
                        <ul class="social-profile list-style">
                            <li><a href="https://www.fb.com" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                            <li><a href="https://www.instagram.com" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                            <li><a href="https://www.linkedin.com" target="_blank"><i class='bx bxl-linkedin' ></i></a></li>
                        </ul>
                    </div>
                 
                </div>
            </div>
            <!-- End Responsive Navbar Area -->

            <!-- Start Clgun Searchbar Area -->
            <div class="clgun offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop">
                <div class="offcanvas-header">
                    <a href="index.html" class="logo">
                        <img src="assets/img/logo/logo.png" alt="image">
                    </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="search-box">
                        <div class="searchwrapper"> 
                            <div class="searchbox"> 
                                <div class="row align-items-center"> 
                                    <div class="col-md-9"><input type="text" class="form-control" placeholder="Fiend Your Course Here!"></div> 
                                    <div class="col-lg-3"> 
                                        <a class="btn" href="#">Search</a> 
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="offcanvas-contact-info">
                        <h4>Contact Info</h4>
                        <ul class="contact-info list-style">
                            <li>
                                <i class="bx bxs-time"></i>
                                <p>Mon - Fri: 9:00 - 18:00</p>
                            </li>
                            <li><i class="bx bxs-phone-call"></i> General Inquiries - <a href="tel:+8495160885">(849) 516-0885</a></li>
                            <li>
                                <i class="bx bxs-envelope"></i>
                                <a href="contact@Clgunme.edu">contact@Ulster.edu</a>
                            </li>
                            <li>
                                <i class="bx bxs-map"></i>
                                <p>404 Camino Del Rio S, Suite 102San Diego, CA 92108</p>
                            </li>
                        </ul>
                        <ul class="social-profile list-style">
                            <li><a href="https://www.fb.com" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                            <li><a href="https://www.instagram.com" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                            <li><a href="https://www.twitter.com" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                            <li><a href="https://www.dribbble.com" target="_blank"><i class='bx bxl-dribbble'></i></a></li>
                            <li><a href="https://www.linkedin.com" target="_blank"><i class='bx bxl-linkedin' ></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- End Clgun Searchbar Area -->


        <!-- Start Academics Section Area -->
        <div class="academics-section ptb-100">
            <div class="container">
                <div class="row">
                        <div class = "text-center"><?php echo $msg ?></div>
                    <div class="col-lg-2">
                
                    </div>
                    <div class="col-lg-8">
                        <div class="ac-overview">
                            <div class="pera-dec">
                                <div class="applicant-from">
                                    <form id="scheduletourfrom" action="signup.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="name">First Name</label>
                                                    <input type="text" name="name" class="form-control" id="name" required="required" data-error="Please enter your name" placeholder="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" class="form-control" id="password" required="required" data-error="Please enter your password" placeholder="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                                
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Email Address</label>
                                                    <input type="email" name="email" class="form-control" id="email" required="required" data-error="Please enter your email" placeholder="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Post Code</label>
                                                    <input type="number" name="zip_code" class="form-control" id="zip_code" required="" data-error="Please enter your zip code" placeholder="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Phone Number</label>
                                                    <input type="text" name="phone_number" class="form-control" id="phone_number" required="" data-error="Please enter your phone number" placeholder="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                       
        
                                      

                                            <p class="form-cookies-consent">
                                                <input type="checkbox" value="yes" name="wp-cookies-consent" id="wp-cookies-consent" required>
                                                <label for="wp-cookies-consent">By submitting this form, you agree to the Terms & Condition.</label>
                                            </p>
        
                                            <div class="col-lg-12 col-md-12">
                                                <button type="submit" name = "signupform" value = "submit" class="default-btn">Submit Now</button>
                                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Academics Section Area -->

        <!-- Start Footer Area -->
        <div class="footer-area">
            <div class="footer-top-info pb-100">
                <div class="content">
                    <div class="image">
                        <img src="assets/img/logo/footer-Logo.png" alt="image">
                    </div>
                    <p>University Life Nurtures an Inclusive Campus Life Environment Where Students Grow Intellectually and Engage in Meaningful Experiential Opportunities.</p>
                    <ul>
                        <li><a href="https://www.fb.com" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                        <li><a href="https://www.instagram.com" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                        <li><a href="https://www.twitter.com"><i class='bx bxl-twitter'></i></a></li>
                        <li><a href="https://www.linkedin.com" target="_blank"><i class='bx bxl-linkedin-square'></i></a></li>
                    </ul>
                </div>
            </div>
     
        </div>
        <!-- End Footer Area -->

        <div class="go-top active">
            <i class="bx bx-up-arrow-alt"></i>
        </div>

        <!-- Links of JS files -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/aos.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/magnific-popup.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>