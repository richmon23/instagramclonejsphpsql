<?php

function h($string=""){
    return htmlspecialchars($string);
}

function escape($string){
    return htmlspecialchars($string, ENT_QUOTES);
}
function checked_empty_fields($required_fields){
    //initialize an array to store error message
    $form_errors =array();
    foreach($required_fields as $name_of_field){
        if (!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL) {

            $form_errors[]=$name_of_field." is a required.";
        }
    }
    return $form_errors;
}

// function check_min_lenght($fields_to_check_lenght){
//     //initialize an array to store error message
//     $form_errors = array();
//     foreach($fields_to_check_lenght as $name_of_field => $minimum_lenght){
//             if(strlen(trim($_POST[$name_of_field])) < $minimum_lenght){
//                 $form_errors[]=$name_of_field."is to short,must be {$minimum_lenght}characters long";
//          }
//     }
//     return $form_errors;

// }


function check_min_length($fields) {
    $errors = array();
    foreach ($fields as $field => $min_length) {
        if (strlen($_POST[$field]) < $min_length) {
            $errors[] = ucfirst($field) . " must be at least $min_length characters long.";
        }
    }
    return $errors;
}


  

function check_email($data){
    //initialize an array to store error message
    $form_errors = array();
    $key = "email";
    if(array_key_exists($key, $data)){
        if($_POST[$key] != NULL){
            $key = filter_var($key, FILTER_SANITIZE_EMAIL);
            if(filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false){
                $form_errors[] = $key . " is not a valid email address";
            }
        }
    }
    return $form_errors;
}



function show_errors($form_errors_array){

	$errors="<ul class='form_errors'> ";
	foreach ($form_errors_array as $the_error){
	    $errors .= "<li> {$the_error}</li>";

    }
    $errors .="</ul>";
    return $errors;
}

