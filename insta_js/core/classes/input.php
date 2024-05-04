<?php

class Input{
    public static function exist($type="POST"){
        switch($type){
            case "POST":
                return (!empty($_POST)) ? true : false;
                break;
            case "GET":
                return (!empty($_POST)) ? true : false;
                break;
            default:
            return false;
            break;

        }
    }
}