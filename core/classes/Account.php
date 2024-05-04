<?php

class Account{
    private $errors = array();
    private $passed = false;
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }
    
    // register user
    public function register_user($username,$fullname,$email,$password){
        $encryptedPassword = $this->hash_password($password);
        $ip=$this->getIP();
        $os=$this->getOS();
        $browser=$this->getBrowser();

        $stmt = $this->pdo->prepare("INSERT INTO users (username, fullname, password, email, pri_ip, pri_os, pri_browser) VALUES (:username, :fullname, :password, :email, :ip, :os, :browser)");
        $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':password', $encryptedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
        $stmt->bindParam(':os', $os, PDO::PARAM_STR);
        $stmt->bindParam(':browser', $browser, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->execute();
        // return $this->pdo->lastInsertedId();
        return $this->pdo->lastInsertId();



    }
    


    
    // hasing password
    public function hash_password($password){
        return password_hash($password,PASSWORD_DEFAULT);
    }

    // get ip of user
    public function getIP() {
        // Check for shared internet/ISP IP
        if (!empty($_SERVER['HTTP_CLIENT_IP']) && $this->validIP($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
    
        // Check for IP behind a proxy
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Check if multiple IP addresses exist in var
            $ip_list = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($ip_list as $ip) {
                if ($this->validIP($ip)) {
                    return $ip;
                }
            }
        }
    
        // Use remote address if all else fails
        return $_SERVER['REMOTE_ADDR'];
    }

    
    
    private function validIP($ip) {
        return filter_var($ip, FILTER_VALIDATE_IP) !== false;
    }


    // get user os

    public function getOS() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
        $os_platform = "Unknown OS Platform";
    
        $os_array = array(
            '/windows nt 10/i'      =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );
    
        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }
    
        return $os_platform;
    }
    
    
    // get user browser

    public function getBrowser() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
        $browser = "Unknown Browser";
    
        $browser_array = array(
            '/msie/i'      => 'Internet Explorer',
            '/firefox/i'   => 'Firefox',
            '/safari/i'    => 'Safari',
            '/chrome/i'    => 'Chrome',
            '/edge/i'      => 'Edge',
            '/opera/i'     => 'Opera',
            '/netscape/i'  => 'Netscape',
            '/maxthon/i'   => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i'    => 'Handheld Browser'
        );
    
        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }
    
        return $browser;
    }
    
    
    // checking the data or information already exist in database

    public function check($source, $items=array()) {
        
        foreach($items as $item => $rules){
            foreach($rules as $rule => $rule_value){
                $value = $source[$item];
                $item = escape($item);

                if(!empty($value)){
                    switch($rule){
                        case 'max' :
                            if(strlen(trim($value)) > $rule_value){
                                $this->addError("($item) must be a maximum of ($rule_value) characters.");
                            }
                            break;
                        case 'unique' :

                            if ($this->userExist($item,$value)){
                                
                                $this->addError("($item) already exist");
                            }
                            break;
                    }
                }
            }
        }

        if(empty($this->errors)){
            $this->passed = true;
        }
    }

    private function userExist($item,$value){
        $stmt=$this->pdo->prepare("SELECT * FROM users WHERE $item=:$item");
        $stmt->bindParam(":$item",$value,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->rowCount();
        if($stmt->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

    public function addError($error){
        $this->errors[] = $error;
    }

    public function errors(){
        return $this->errors;
    }

    public function passed(){
        return $this->passed;
    }

    // checking the email and password are in the database 
    public function login_user($email_username, $password){

       if(!empty($email_username) && !empty ($password)){
         
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=:username OR username=:username");
        $stmt->bindParam(':username', $email_username, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        if($stmt->rowCount() != 0){
            if(password_verify($password, $row->password)){
                if(empty($this->errors)){
                    $this->passed = true;
                    return $row->user_id;
                }
                
            } else {
                $this->addError("Username and Password Incorrect");
                return false;
            }
        } else {
            $this->addError("Username and Password Incorrect"); // <-- semicolon added here
            return false;
        }
       }
        
       
    }
    
}
