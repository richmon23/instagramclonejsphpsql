<?php


if(loggedIn()){
    Redirect::to('index.php');
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check if form is submitted
if (Input::exist()) {
    // Form is submitted, process the data
    if(isset($_POST['submitbutton'])){

        //initialize an array to store any error message from the form
        $form_errors=array();
        $required_fields=array("email","password","username","fullname");
        
        $form_errors=array_merge($form_errors,checked_empty_fields($required_fields));
        
        // fields that require checking the minimum length
        $fields_to_check_length=array("fullname"=>3,"username"=>3,"password"=>6);
       
        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors=array_merge($form_errors,check_min_length($fields_to_check_length));

        // email validation / merge the return data into from_error array
        $form_errors=array_merge($form_errors,check_email($_POST));

        if(empty($form_errors)){
            //TODO: CHECK WHETHER EMAIL OR USERNAME  EXIST
        }

        // uniqueness of email and username
        $rules=[
            'email'=>array('unique'=>'users'),
            'username'=>array('unique'=>'users'),
            'password'=>array('max'=>30)


        ];
        
        // $account = new Account();
         $account->check($_POST, $rules);
        
        
        if($account ->passed()){
            //check if error array is empty, if yes process form data and insert record
         if(empty($form_errors)){
                $username=escape($_POST['username']);
                $fullname=escape($_POST['fullname']);
                $email=escape($_POST['email']);
                $password=escape($_POST['password']);

                $user_id=$account->register_user($username,$fullname,$email,$password);
                if($user_id){
                    session_regenerate_id();
                    $_SESSION['user_id']=$user_id;
                    Redirect::to(url_for('index.php'));
                }
            }
        }else{
            $form_errors=array_merge($form_errors,$account->errors());
        }
  }
}

$title = "Register. Instagram";
$keywords = "Instagram, share and capture world's moments, share, capture, share, login, signup";


?>