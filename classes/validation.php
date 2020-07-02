<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
$fm=new Format();
$db=new Database();
class UserValidator{

    private $data;
    private $errors=[];
    private static $fields=['name','email','mobile','comment'];

    public function __construct($post_data){
$this->data=$post_data;
    }
    public function validation($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function validateForm(){
        foreach(self::$fields as $field) {
            if(!array_key_exists($field,$this->data)){
                trigger_error('$field is not prosent in data');
                return true;
            }
        }
        //$this->validateUsername();
        $this->validateName();
        $this->validateEmail();
        $this->validatePhoneNO();
        $this->validatetextfield();
        return $this->errors;

    }
    // public function validateUsername(){
    //   $val=$this->validation(($this->data['username']));
    //   if (empty($val)) {
    //      $this->addError('username','Username cannot be empty');
    //   }
    //   else{if (!preg_match('/^[a-zA-Z0-9$]{6,12}/', $val)) {
    //             $this->addError('username', 'Username must be 6-12 chars & alphpanumeric');
    //       }elseif (str_replace(' ', '', $val)|| preg_replace('/\s+/', '', $val)) {
    //         $this->addError('username', 'White space is not allowed');
    //       }
    //     }
    // }
    public function validateName(){
        $val = $this->validation(($this->data['name']));
        if (empty($val)) {
            $this->addError('name', 'Name cannot be empty');
        } 
    }
    public function validateEmail(){
        $val = $this->validation(($this->data['email']));
        $val = filter_var($val, FILTER_SANITIZE_EMAIL); 
        if (empty($val)) {
            $this->addError('email', 'Email cannot be empty');
        } else{
        if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'Invalid email address');
        } 
    }
}
    public function validatePhoneNO(){
        $val = $this->validation(($this->data['mobile']));
        $val = filter_var($val, FILTER_VALIDATE_INT); 

        if (empty($val)) {
            $this->addError('mobile', 'Mobile No. cannot be empty');
        } 
        elseif (!strlen($val)==11) {
            $this->addError('mobile', 'Mobile No. must be 11 digit.');
        }
        
    
}
    public function validatetextfield(){
        $val = $this->validation(($this->data['comment']));
        $val = filter_var($val, FILTER_VALIDATE_INT); 

        if (empty($val)) {
            $this->addError('comment', 'Field cannot be empty');
        } 
    
}
    private function addError($key,$val){
        $this->errors[$key]=$val;

    }
}
?>