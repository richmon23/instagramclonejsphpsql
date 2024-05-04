<?php 
 
 require_once "core/init.php";
// if(loggedIn()){
//     Redirect::to('index.php');
// }
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check if form is submitted
if (Input::exist()) {
    // Form is submitted, process the data
    if(isset($_POST['submitbutton'])){

        //initialize an array to store any error message from the form
        $form_errors=array();
        $required_fields=array("email_username","password");
        
        $form_errors=array_merge($form_errors,checked_empty_fields($required_fields));
        
    
        
        if($account ->passed()){
            //check if error array is empty, if yes process form data and insert record
         if(empty($form_errors)){
                
                $email=escape($_POST['email_username']);
                $password=escape($_POST['password']);

                // $user_id=$account->register_user($username,$fullname,$email,$password);
                // if($user_id){
                //     session_regenerate_id();
                //     $_SESSION['user_id']=$user_id;
                //     Redirect::to(url_for('mort.php.php'));
                // }
            }
        }else{
            $form_errors=array_merge($form_errors,$account->errors());
        }
  }
}
 $title="Login . Instagram";
 $keywords ="Instagram,share and capture world's moments,share,capture,share,login,signup";

require "shared/header.php"

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
                        <input type="text" placeholder="Email or Username" class="form-input" name="email_username" valu="<?= escape(Input::get('email_username')); ?>" autocomplete="off">
                        <div class="passwordContainer">
                        <input type="password" placeholder="Password" class="form-input" name="password" id="password" autocomplete="off">
                        <span class="show-hide-text cursor-pointer" id="show_hide_password">Show</span>
                        </div>
                        <button class="button cursor-pointer" type="submit" name="submitbutton">Log in</button>
                        <span class="separator">Or</span>
                        <a href="#" class="password-reset">Forget Password</a>
                    </form>
                    <footer class="form-footer">
                        Don't have an account? <a href="register.php">Sign up</a>
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

                <div class="footer3">
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
                                <option value="">Français</option>
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
                            </select>
                        </div>
                    
                        <div class="div2">
                                ©️  2024 Instagram from Meta
                        </div>
                  </div>
                </div>
                
            </main>
        </section>
        <script src="public/js/common.js"></script>
</body>
</html>