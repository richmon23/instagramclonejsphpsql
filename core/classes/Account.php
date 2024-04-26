<?php

class Account{
    private $errors = array();
    private $passed = false;
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

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
}
