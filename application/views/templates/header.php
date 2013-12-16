<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>::: My Hotels :::</title>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/jquery.fancybox.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.fancybox.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    </head>
    <body>
        <div id="main">

            <!-- Header -->
            <div id="header">
                <div class="right-header">
                    <div class="right">
                        <div class="language">
                            <a href="#"><img src="./assets/images/flag-1.gif" alt="" /></a> &nbsp;
                            <a href="#"><img src="./assets/images/flag-2.gif" alt="" /></a> &nbsp;
                            <a href="#"><img src="./assets/images/flag-3.gif" alt="" /></a>
                        </div>
                        <div class="login-link">
                            <a class="loginlink" href="#login" ><img src="./assets/images/login-icn.gif" alt="" class="v-mid" /> Login</a>
                        </div>
                        <div style="display:none" id="login">
                            <form id="login_form" method="post" action="hotel/login">
                                <p>
                                    <input type="email" id="login_name" name="login_name" size="30" placeholder="Email Address" required/>
                                </p>
                                <p>
                                    <input type="password" id="login_pass" name="login_pass" size="30" placeholder="Password" required/>
                                </p>
                                <p>
                                    <a class="loginlink" href="#forgotPassword">Forgot your password?</a><input type="submit" name="login" value="Login" />
                                </p>
                            </form>
                        </div>
                        <div style="display:none" id="forgotPassword">
                            <form id="login_form" method="post" action="hotel/login">
                                <p>
                                    <input type="email" id="login_name" name="login_name" size="30" placeholder="Email Address" required/>
                                </p>
                                <p>
                                    <a class="loginlink" href="#login">Suddenly remebered? Log in here</a><input type="submit" name="forgot" value="Send" />
                                </p>
                            </form>
                        </div>
                        <div class="srch-top">
                            <form action="" method="post">
                                <input type="text" name="" value="Search" />
                                <input type="submit" name="" value="" />
                            </form>
                        </div>
                    </div>
                    <div class="nav">
                        <ul>
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Rooms</a></li>
                            <li><a href="#">Restaurant</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Booking</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="logo">
                    <a href="#"><h1><img src="./assets/images/logo.png" alt="Wealth Booking" /><span>Hey, Where are you going? </span></h1></a>
                </div>
                <div class="clear"></div>