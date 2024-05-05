<?php

if(!isset($title))
{
    $title ="Instagram";
    $keywords ="Instagram,Share and capture world's moments,share,capture,share,home";
  
}
$desc ="Instagram lets you capture,follow,Like and share world's moments in a better way and tell your story with photos,messages,post and everything in between";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title; ?></title>
    <meta name="kewords" content="<?=$keywords; ?>">
    <meta name="description" content="<?=$desc; ?>">
    <meta name="author" content="Richmon">
    <link rel="shortcut icon" href="<?=url_for('public/favicon/instagram.ico');?>" type="image/x-icon">
    <link rel="stylesheet" href="<?=url_for('public/css/master.css');?>">
</head>
<body>