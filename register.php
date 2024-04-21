<?php
require_once "core/init.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check if form is submitted
if (Input::exist()) {
    // Form is submitted, process the data
    if(isset($_POST['submitbutton'])){
        $form_errors=array();
        $required_fields=array("email","password","username","fullname");
        // checked_empty_fields($required_fields);
        
         $form_errors=array_merge($form_errors,checked_empty_fields($required_fields));
        //var_dump($form_errors);

        $fields_to_check_lenght=array("fullname"=>3,"username"=>3,"password"=>6);
       
        $form_errors=array_merge($form_errors,check_min_lenght($fields_to_check_lenght));




   
  }
}

$title = "Register. Instagram";
$keywords = "Instagram, share and capture world's moments, share, capture, share, login, signup";
require "shared/header.php";
?>

<section class="PageContainer">
    <main class="row">
        <div class="col-1">
            <div class="heroimg"></div>
        </div>
        <article class="col-2">
            <?php
                if(!empty($form_errors)){
                    echo show_errors($form_errors);
                }
            ?>
            <form action="<?= h($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">
                <div class="SiteLogoContainer">
                    <img src="public/logo/instagram.png" alt="Instagram Logo" class="imgcontainer">
                </div>
                <input type="email" placeholder="Email" class="form-input" name="email" autocomplete="off" value="<?= escape(Input::get('email')); ?>">
                <input type="text" placeholder="Full Name" class="form-input" name="fullname" autocomplete="off" value="<?= escape(Input::get('fullname')); ?>">
                <input type="text" placeholder="Username" class="form-input" name="username" autocomplete="off" value="<?= escape(Input::get('username')); ?>">
                <div class="passwordContainer">
                    <input type="password" placeholder="Password" class="form-input" name="password" id="password" autocomplete="new password">
                    <span class="show-hide-text cursor-pointer" id="show_hide_password">Show</span>
                </div>
                <button class="button cursor-pointer" type="submit" name="submitbutton">Register</button>
                <span class="separator">Or</span>
                <footer class="form-footer">
                    Have an account? <a href="login.php">Log In</a>
                </footer>
            </form>

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


            <div class="footer5">
                <div class="div1">
                    <select name="" id="">
                        <option value="">English</option>
                        <option value="">Español</option>
                        <option value="">Deutsch</option>
                        <option value="">한국어</option>
                        <option value="">Português</option>
                        <option value="">Italiano</option>
                        <option value="">Русский</option>
                        <option value="">日本語</option>
                        <option value="">简体中文</option>
                        <option value="">العربية</option>
                        <option value="">हिन्दी</option>
                        <option value="">Türkçe</option>
                        <option value="">Nederlands</option>
                        <option value="">Svenska</option>
                        <option value="">Polski</option>
                        <option value="">ไทย</option>
                        <option value="">Bahasa Indonesia</option>
                        <option value="">Tiếng Việt</option>
                        <option value="">Ελληνικά</option>
                        <option value="">עִברִית</option>
                        <option value="">Suomi</option>
                        <option value="">Norsk</option>
                        <option value="">Dansk</option>
                        <option value="">Filipino</option>
                        <option value="">Français</option>
                    </select>
                </div>

                <div class="div2">
                    ©️ 2024 Instagram from Meta
                </div>
            </div>

        </div>
    </main>
</section>
<script src="public/js/common.js"></script>

</body>
</html>
