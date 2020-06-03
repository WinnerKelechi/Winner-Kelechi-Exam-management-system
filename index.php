<?php
include 'lib/Session.php';
 Session::init();
include('includes/header.php');
include('includes/header_slider.php');

?>
<div style="background:white">
    <div class="container bg-light-gray">
        <div class="main-content" style="background:white">
            <div class="featured-heading">
                <h1>Welcome to Examination Management Information System</h1>
                <h2>A System implemented for b.sc. computer science project.</h2>
            </div>

            <div class="ruler"></div>
            <div class="tabs">
                <ul id="myTabContent" class="nav nav-tabs">
                    <li class="active"><a href="#vestibuluco" data-toggle="tab">Student's login</a></li>
                    <li class=""><a href="#loginadmin" data-toggle="tab">Administrator's login</a></li>
                    <li class=""><a href="#fuscelobin" data-toggle="tab">Student's Registeration</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="vestibuluco">
                        <div class="media">
                            <img src="img/loginy.jpg" class="spacing-r" alt="">
                            <div class="media-body">
                                <h1 class="media-heading ruler-bottom">Student Login</h1>
                                <p style="font-size: 16px;">Students must login in order to take exam</p>
                                <div class="readmore">
                                    <a href="login.php">Login<img src="img/arrow.jpg"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="loginadmin">
                        <div class="media">
                            <img src="img/registery.jpg" class="spacing-r" alt="">
                            <div class="media-body">
                                <h1 class="media-heading ruler-bottom">Log In For Admin and Lecturers</h1>
                                <p style="font-size: 16px;">Admins and lecturers must login here.</p>
                                <div class="readmore">
                                    <a href="login_twice.php">Login<img src="img/arrow.jpg"> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fuscelobin">
                        <div class="media">

                            <img src="img/registery2.jpg" class="spacing-r" alt="">
                            <div class="media-body">
                                <h1 class="media-heading ruler-bottom">Registration Form For Students</h1>
                                <p style="font-size: 16px;">Register here to write exam</p>
                                <div class="readmore">
                                    <a href="register_one.php">Register<img src="img/arrow.jpg"> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<?php
include('includes/footer.php');
?>
