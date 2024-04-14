<?php

function h($string=""){
    return htmlspecialchars($string);
}

function escape($string){
    return htmlentities($string,ENT_QOUTES);
}