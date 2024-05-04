<?php


require_once "core/init.php";
if(!loggedIn()){
    Redirect::to('login.php');
}
$userid=$_SESSION['user_id'];
echo $userid;
?>