<?php
ob_start();

date_default_timezone_set("Asia/Manila");

session_start();

define("WWW_ROOT","http://localhost/MIDTERMJSINSTAGRAM/");

require_once "functions.php";
require_once "core/classes/config.php";

spl_autoload_register(function ($className)
{
    require_once "classes/".$className.".php";
});

$account = new Account();

