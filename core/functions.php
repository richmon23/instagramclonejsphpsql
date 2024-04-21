<?php

function h($string=""){
    return htmlspecialchars($string);
}

function escape($string){
    return htmlspecialchars($string, ENT_QUOTES);
}
function checked_empty_fields($required_fields){
    $form_errors =array();
    foreach($required_fields as $name_of_field){
        if (!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL) {

            $form_errors[]=$name_of_field." is a required.";
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