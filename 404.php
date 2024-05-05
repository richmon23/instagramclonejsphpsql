<?php 
 
require_once "core/init.php";
$title ="Page Not Found . Instagram";
$keywords ="error,404,document not found,webpage not found,instagram,share and capture world's moments";

require "shared/header.php";

?>

<header class="error--header">
    <nav class="error--header-content">
        <div class="error--header-left">
            <a href="<?php echo url_for('index'); ?>" class="header_home--error" >
            <img src="<?php echo url_for('public/logo/instagram.png'); ?>" alt="site logo">
            </a>
        </div>
        <div class="error--header-right">
            <?php if(loggedIn()){?>
                <a href="<?php  echo url_for('profile');?>" class="profile_button">
                Profile Page
                </a>
                <a href="<?php  echo url_for('index');?>" class="error--link">
                Try Going to Home Page
                </a>
            <?php } else { ?>
                <a href="<?php echo url_for('login');?>" class="error--link">
                    Login
                </a>
                <a href="<?php echo url_for('register');?>" class="error--link">
                    Register
                </a>
            <?php } ?>
            
        </div>
    </nav>
</header>

<div class="error--container">
    <div class="error-content">
            <h1> Sorry This Page isn't available </h1>
            <p> The Link you follow may broken or the page may have been remove <a href="<?php echo url_for('index'); ?>"> Go back to instagram</a></p>
            <img src="<?php echo url_for('public/404.png'); ?>" alt="404">
    </div>
</div>