<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="public/css/index.css">
    </head>
    <body>
        <header class="global-header">
            <nav class="global-header__content">
                <div class="global-header__content__button">
                    <a href="<?php echo url_for('index.php'); ?>" class="header__home">
                        <img src="public/logo/instagram.png" alt="">  
                    </a>
                </div>
                <div class="global-search">
                    <nav class="navbar navbar-light justify-content-between">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn bg-info button my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                </div>
                <div id="search-show" style="position:relative;">
                    <div class="class-result" style="position:absolute;top:26px;left:-253px;"></div>
                </div>
                <div class="global-header-logo">
                    <a href="<?php echo url_for('index'); ?>" class="nav-link ">
                        <?php if(strpos($_SERVER['REQUEST_URI'], '/index')): ?>
                            <i class="fas fa-home"> </i>
                        <?php else: ?>
                            <i class="fas fa-home"> </i>
                        <?php endif; ?>
                    </a>
                   <a href="<?php  echo url_for('direct/inbox')?>" class="nav-link">
                        <?php if(strpos($_SERVER['REQUEST_URI'], 'direct/inbox')): ?>
                            <i class="fas fa-paper-plane"> </i>
                        <?php else: ?>
                            <i class="fas fa-paper-plane"> </i>
                        <?php endif; ?>
                    </a>
                    <a href="<?php  echo url_for('explore')?>" class="nav-link">
                        <?php if(strpos($_SERVER['REQUEST_URI'], '/explore')): ?>
                            <i class="fas fa-compass"> </i>
                        <?php else: ?>
                            <i class="fas fa-compass"> </i>
                        <?php endif; ?>
                    </a>
                    <div class="icon_container" style="padding-top:4px;padding-left:3px;">
                        <i class="fas fa-plus-square"></i> 
                    </div>
                    
                    <button class="profile-button" style="position:relative;">
                        <div class="profile--container">
                           <img src="<?php echo url_for('public\profileImage\profile.png'); ?>" style="width:35%;" alt="">
                        </div>
                    </button>




                    
                 </div>
                    <!-- <a href="#" class="nav-link"><i class="fas fa-search"></i></a>
                    <a href="#" class="nav-link"><i class="fas fa-compass"></i></a>
                    <a href="#" class="nav-link"><i class="fas fa-film"></i></a>
                    <a href="#" class="nav-link"><i class="fas fa-paper-plane"></i></a>
                    <a href="#" class="nav-link"><i class="fas fa-bell"></i></a>
                    <a href="#" class="nav-link"><i class="fas fa-plus-square"></i></a>
                    <a href="#" class="nav-link"><i class="fas fa-user"></i></a> -->
                    <!-- </div> -->
            </nav>
        </header>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>



<!-- <i class="fas fa-home"> -->

