<?php 
 
 require_once "core/init.php";

 $title="Register. Instagram";
 $keywords ="Instagram,share and capture world's moments,share,capture,share,login,signup";
 require "shared/header.php"
?>
        <section class="PageContainer">
            <main class="row">
                <div class="col-1">
                    <div class="heroimg"></div>
                </div>
                <article class="col-2"> 
                    <form action="<?= h($_SERVER["PHP_SELF"]);?>" method="POST" class="form">
                        <div class="SiteLogoContainer">
                            <img src="public/logo/instagram.png" alt="Instagram Logo" class="imgcontainer">
                        </div>
                        <input type="email" placeholder="Email" class="form-input" name="email" autocomplete="off">
                        <input type="text" placeholder="Full Name" class="form-input" name="fullname" autocomplete="off">
                        <input type="text" placeholder="Username" class="form-input" name="username" autocomplete="off">
                        <div class="passwordContainer">
                            <input type="password" placeholder="Password" class="form-input" name="password" id="password" autocomplete="off">
                            <span class="show-hide-text cursor-pointer" id="show_hide_password">Show</span>
                        </div>
                        <button class="button cursor-pointer" type="submit" name="submitbutton">Register</button>
                        <span class="separator">Or</span>
                        <!-- <a href="#" class="password-reset">Forget Password</a> -->
                        <span style="font-size:15px">By signing up, you agree to our Terms,Privacy and Cookies Policy</span>
                    </form>
                    <footer class="form-footer">
                       Have an account? <a href="login.php">Log In</a>
                    </footer>
                    <footer class="form-footer1">
                        <span> Get the app.</span>
                    </footer>
                    <footer class="form-footer2">
                        <div class="form-left">
                            <img src="./public/google.png" alt="">
                        </div>
                        <div class="form-right">
                            <img src="./public/microsoft.png" alt="">
                        </div>
                    </footer>

                </article>
                
                <div class="footer4">
                 
                   <ul class="no-bullet">
                        <li><a href="#">Meta</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Locations</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Threads</a></li>
                        <li><a href="#">Contact Uploading & Non-Users</a></li>
                        <li><a href="#">Meta Verified</a></li>
                   </ul>
                   
                </div>
                 
            </main>
        </section>
        <script src="public/js/common.js"></script>
       
 </body>
</html>