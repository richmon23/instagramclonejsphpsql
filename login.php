<?php 
 

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
                    <form action="" class="form">
                        <div class="SiteLogoContainer">
                            <img src="public/logo/instagram.png" alt="Instagram Logo" class="imgcontainer">
                        </div>
                        <input type="text" placeholder="Email or Username" class="form-input" name="email_username" autocomplete="off">
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
                </article>
                 
            </main>
        </section>
        <script src="public/js/common.js"></script>
</body>
</html>