<?php 
include_once('config.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


 $searchTerm = isset($_POST['search']) ? trim($_POST['search']) : '';



if (!empty($searchTerm)) {
    $searchTerm = '%'. $_POST['search']. '%';

    $db->where('VideoTitle', $searchTerm, 'LIKE');
     $db->orwhere('VideoTags', $searchTerm, 'LIKE');
 
    $_POST['search'] = "";
    unset($_POST['search']);
}

$db->orderBy('UploadDate', 'DESC');
$listdata = $db->get("videos");


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
                           <?php if(isset($_SESSION['ConsumerId'] )) {?>
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
                                          <?php if(isset($_SESSION['ConsumerId'])) {?>
                            <li class="nav-item"><a href="index.php" class="nav-link active">    Dashboard</a></li>
                           
                             
                           
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
                                           <li class="nav-item"><a href="admin/index.php" class="nav-link ">Admin Login</a></li>
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
                                             <?php if(isset($_SESSION['ConsumerId'] )) {?>
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
                          <form  action="index.php" method="post" >
                    <div class="search-box">
                        <div class="searchwrapper"> 
                            <div class="searchbox"> 
                                <div class="row align-items-center"> 
                                    <div class="col-md-9"><input type="text" name = "search" class="form-control" placeholder="Fiend Your Video Here!"></div> 
                                    <div class="col-lg-3"> 
                                         <button type="submit" class="btn btn-primary btn-form">Search</button>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </form>
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

  

            <!-- Start Activities Area -->
            <div class="activities-area ptb-100">
                <div class="container">
              
      <?php if(isset($_SESSION['ConsumerId'] )) {?>
              <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                        <div class="sub-title">
                            <i class='bx bxs-graduation'></i> <p>Dashboard</p>
                        </div>
                         <h2 class="title-anim">Updated Videos List</h2>
                    </div>

                    <div class="row justify-content-center">
                        <?php
                            $i=0;
                            
                            foreach($listdata as $row) {
                                $i = $i+1;
                            ?>

                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="activities-card" data-aos="fade-up" data-aos-delay="100">
                                <div class="image">
                                   <video  controls style = "width:100%;display:block !important;height:400px;">
                                      <source src="Videos/<?=$row['VideosSource'] ?>" type="video/mp4">
                                      Your browser does not support HTML video.
                                    </video>
                                </div>
                                <div class="content title-anim">
                                     <h2 class="title-anim"><a href="support-guidance.html"><?=$row['VideoTitle'] ?></a></h2>
                                    <p><?=$row['VideoTags'] ?></p>
                                </div>

                                                                       <div id = "item-content-<?php echo $row['VideosId']; ?>" class="item-content">
                                        <?php
    $db->where('VideoId', $row['VideosId']);

    $listdata1 = $db->get("comentswdetail");
    foreach($listdata1 as $row1) {   
        echo '<h6  id="cm-'. $row1['CommentId']. '">'.$row1['ConsumerUserName'].' &nbsp;&nbsp;<small>Posted On: '. $row1['Create_at']. '</small></h6>';
         echo '<p>'. htmlspecialchars($row1['Comment']). '</p>';
        
           }
    ?>

  

                                    </div>

                                      <input type = "hidden" id = "ConsumerId" name = "ConsumerId" value  = "<?php echo $_SESSION['ConsumerId']?>" />
     <textarea style = "display:block;width:100%;margin-bottom:2px;" id="input-comm-<?php echo $row['VideosId'];?>" placeholder="Write your comment..."></textarea>
      <button onclick="AddNewComment(<?php echo $row['VideosId'];?>)"> Submit</button>


                            </div>
                        </div>

                        <?php }?>

            
                    </div>
      <?php } else {?>

            <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                        <div class="sub-title">
                            <i class='bx bxs-graduation'></i> <p>Login First To View Videos</p>
                        </div>
                    </div>
      <?php } ?>
                </div>
            </div>
            <!-- End Activities Area -->

            <!-- Start Footer Area -->
            <div class="footer-area">
                <div class="footer-top-info pb-100">
                    <div class="content title-anim">
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
        </div>

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




<script>
function AddNewComment(videoId) {

    var comment = document.getElementById('input-comm-' + videoId).value;
    var userid = document.getElementById('ConsumerId').value;
    if (comment === '') {
    alert('Please write a comment.');
    return;
    }
    
    // Send the comment to the server via AJAX
     var xhr = new XMLHttpRequest(); 
     xhr.open('POST', 'new_comment.php', true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {

    if (xhr.readyState== 4 && xhr.status == 200) {
    
    // Comment submitted successfully, clear the input field 
    document.getElementById('input-comm-' + videoId).value = '';
    // Reload the comments for this video
    LoadNewComment(videoId);
    }
};
    var data = 'video_id=' + videoId + '&comment=' + encodeURIComponent(comment)+'&userid='+userid;
    console.log(data);
    xhr.send(data);
    }


    
function LoadNewComment (videoId) {
// Fetch existing comments for the video via AJAX 

 var xhr = new XMLHttpRequest();
xhr.open('GET', 'refresh_comments.php?video_id=' + videoId, true);
xhr.onreadystatechange = function () {
if (xhr.readyState == 4 && xhr.status == 200) {
 
    document.getElementById('item-content-' + videoId).innerHTML = xhr.responseText

}
// Update the comments section with the fetched comments 
};
xhr.send();
}


</script>

    </body>
</html>