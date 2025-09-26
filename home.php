<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}
include "profile-details.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="facebook-page">
    <!--
    ********************************************************************
    *                           Topbar                                 *
    ******************************************************************** 
    -->

    <div class="container-fluid topbar-container">
        <div class="row topbar">
            <div class="col-4 topbar-col">
                <img src="img/facebook-logo.svg" alt="Facebook" class="facebook-logo" width="40px" height="40px">

                <div class="search">
                    <input type="text" placeholder="Search Facebook">
                    <button class="search-bar">
                        <img src="img/search-bar.svg" alt="Search Facebook" width="20px" height="20px">
                    </button>
                </div>
               
            </div>
            <div class="col-4 topbar-col text-center d-none d-sm-block">
                <button class="topbar-mid-btn">
                    <img src="img/home.svg" alt="Home" width="32px" height="32px">
                </button>
                
                <button class="topbar-mid-btn">
                    <img src="img/friend.svg" alt="Friends" width="32px" height="32px">
                </button>

                <button class="topbar-mid-btn">
                    <img src="img/group.svg" alt="Groups" width="32px" height="32px">
                </button> 
            </div>

            <div class="col-8 topbar-col text-end col-md-4  ">
                <button class="find-friends">Find friends</button>

                <button class="topbar-right-btn">
                    <img src="img/menu.svg" alt="Menu" width="20px" height="20px">
                </button>

                <button class="topbar-right-btn">
                    <img src="img/messenger.svg" alt="Messenger" width="20px" height="20px">
                </button>
                
                <button class="topbar-right-btn">
                    <img src="img/notifications.svg" alt="NOtifications" width="20px" height="20px">
                </button>


                <div class="dropdown d-inline-block">       
                    <button class="btn dropdown-toggle topbar-right-btn topbar-profile"
                            type="button"
                            id="profile-dropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <img src="img/profile.svg" alt="Profile" width="25px" height="25px" >
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end profile-viewer shadow" aria-labelledby="profile-dropdown" >
                        <li class="dropdown-item">
                            <span>
                                <i class="bi bi-person-circle profile-viewer-icon"></i>
                                <strong><?php echo htmlspecialchars($user['name']); ?></strong>
                            </span>
   
                        </li>
                        <li class="dropdown-item">
                            <i class="bi bi-envelope-fill profile-viewer-icon"></i>
                            <?php echo htmlspecialchars($user['email_id']); ?>
                        </li>
                        <li class="dropdown-item">
                            <i class="bi bi-map profile-viewer-icon"></i>
                            <?php echo htmlspecialchars($user['address']); ?>
                        </li>
                        <li class="dropdown-item">
                            <i class="bi bi-telephone profile-viewer-icon"></i>
                            <?php echo htmlspecialchars($user['phone']); ?>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="index.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

        <!--
        ********************************************************************
        *                      Cover Image section                         *
        ******************************************************************** 
        -->
    <div class="container-fluid cover-img-row">
        <div class="row ">
            <div class="col-12">
                <div class="cover-img-col"></div>
            </div>
        </div>
    </div>

        <!-- profile section -->
        <div class="container-fluid profile-row">
            <div class="row">
                <div class="col-12 col-lg-2 profile-pic-col">
                    <img src="img/mark-zuckerberg.jpg" alt="Mark" width="200px" height="200px" class="profile-pic"> 
                </div>
                <div class="col-12 col-lg-6">
                    <div class="profile-details">
                        <h3>
                            Mark Zuckerberg
                            <img src="img/verified-account.svg" alt="Verified account" width="25px" height="25px">
                        </h3>
                        <h5>120M Followers</h5>
                        <div class="followers">
                            <img src="images/img1.jpg" alt="F1" class="followers-img" width="32px" height="32px">
                            <img src="images/img2.jpg" alt="F2" class="followers-img" width="32px" height="32px">
                            <img src="images/img3.jpg" alt="F3" class="followers-img" width="32px" height="32px">
                            <img src="images/img4.jpg" alt="F4" class="followers-img" width="32px" height="32px">
                            <img src="images/img5.png" alt="F5" class="followers-img" width="32px" height="32px">
                            <img src="images/img6.jpg" alt="F6" class="followers-img" width="32px" height="32px">
                            <img src="images/img7.jpg" alt="F7" class="followers-img" width="32px" height="32px">
                            <img src="images/img8.png" alt="F8" class="followers-img" width="32px" height="32px">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 profile-btn">
                    <button class="follow-btn">
                        <img src="img/follow-plus-icon.svg" alt="Follow" width="25px" height="25px">
                        Follow
                    </button>
                    <button>
                        <img src="img/search-bar.svg" alt="Search">
                        Search
                    </button>
                    <button>
                        <img src="img/down-arrow.svg" alt="Down button">
                    </button>
                </div>
            </div>
            <hr>
            <!--page Nav section -->
            <div class="row nav-section-row">
                <div class="col-11 col-lg-8 nav-section-col">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">About</a>
                        </li>
                        <li class="nav-item d-none d-sm-block">
                            <a href="#" class="nav-link">Channels</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link d-none d-sm-block">Reels</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link d-none d-sm-block">Photos</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link d-none d-sm-block">Events</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">More
                                <img src="img/down-arrow.svg" alt="More">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-1 col-lg-4 nav-more-btn">
                    <button>
                        <img src="img/three-dots.svg" alt="More">
                    </button>
                </div> 
            </div>

        </div>

        <!-- Profile Intro section -->

        <div class="container-fluid post-container">
            <div class="row post-row">
                    <div class="col-12 col-lg-5 post-col">
                        <div class="post-section intro-box">
                            <h3>Intro</h3>
                            <p class="text-center">Bring the world closer together.</p><hr>
                        
                            <div class="intro-item">
                                <i class="bi bi-info-circle-fill"></i>
                                <span> <strong>Profile </strong> Public figure</span>
                            </div>
                            <div class="intro-item">
                                <i class="bi bi-briefcase-fill"></i>
                                <span> Founder and CEO at <strong>Meta</strong></span>
                            </div>
                            <div class="intro-item">
                                <i class="bi bi-briefcase-fill"></i>
                                <span> Works at <strong>Chan Zuckerberg Initiative</strong></span>
                            </div>
                            <div class="intro-item">
                                <i class="bi bi-mortarboard-fill"></i>
                                <span> Studied Computer Science and Psychology at <strong>Harvard University</strong></span>
                            </div>
                            <div class="intro-item">
                                <i class="bi bi-house-door-fill"></i>
                                <span> Lives in <strong>Palo Alto, California</strong></span>
                            </div>
                            <div class="intro-item">
                                <i class="bi bi-geo-alt-fill"></i>
                                <span> From <strong>Dobbs Ferry, New York</strong></span>
                            </div>
                            <div class="intro-item">
                                <i class="bi bi-heart-fill"></i>
                                <span> Married to <strong>Priscilla Chan</strong></span>
                            </div>
                        </div>
                    </div>

                    <!-- post section -->

                    <div class="col-12 col-lg-7 post-col">
                    <div class="row">
                        <div class="col-12">
                            <div class="post-section">
                                <div class="post-input">
                                    <h3>Post</h3>
                                    <button class="filter-button">
                                        <i class="bi bi-filter-left"></i>
                                        Filters
                                    </button>
                                </div>
                                <div class="input-box">
                                    <form id="post-form">
                                        <textarea name='post_content' id="post-content" class="postbox-textarea" placeholder="Write something to post...!" rows="3" required></textarea>
                                        <button type="submit" class="postbox-button" name="submit_post">Post</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-12" id="post-container">
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
        crossorigin="anonymous">
    </script>   
    <script src="main.js"></script>
</body>
</html>