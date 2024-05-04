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
            $required_fields=array("email_username","password");
            
            $form_errors=array_merge($form_errors,checked_empty_fields($required_fields));
            
        
            
            

                    //collect form data and store in variable 
                    // $email_username=escape($_POST['email_username']);
                    // $password=escape($_POST['password']);

                    // $user_id=$account->login_user($email_username,$password);
                    // // var_dump($account->errors());
                    // if($account->passed()){
                    //     if(empty($form_errors)){
                    //        session_regenerate_id();
                    //        $_SESSION['user_id']=$user_id;
                    //        Redirect::to(url_for('index.php'));

                    //     }else{
                    //         $form_errors=array_merge($form_errors,$account->errors());
                    //     }
                    // }
                    

                    $form_errors = array();

                    // Collect form data and store in variable
                    $email_username = escape($_POST['email_username']);
                    $password = escape($_POST['password']);

                    // Attempt to log in user
                    $user_id = $account->login_user($email_username, $password);

                    // Check if login was successful
                    if ($user_id !== false) {
                        
                        // If login was successful, regenerate session ID and set user ID in session
                        session_regenerate_id();
                        $_SESSION['user_id'] = $user_id;
                        Redirect::to(url_for('index.php'));
                    } else {
                        // If login failed, merge account errors into form_errors array
                        $form_errors = array_merge($form_errors, $account->errors());
                    }

                    // Display errors
                    // foreach ($form_errors as $error) {
                    //     echo $error . "<br>";
                    // }


                    
        }
    }
    $title="Login . Instagram";
    $keywords ="Instagram,share and capture world's moments,share,capture,share,login,signup";
?> 