<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/session.php');
Session::checkLogin();
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>
<?php  
class Adminlogin{

    private $db;
    private $fm;
public function __construct()
{
    $this->db=new Database();
    $this->fm=new Format();
}
public function adminLogin($username, $password){
    $username=$this->fm->validation($username);
    $password=$this->fm->validation(($password));

    $username=mysqli_real_escape_string($this->db->link,$username);
    $password=mysqli_real_escape_string($this->db->link,$password);
 
    if ($username=='' || $password=='') {
       $msg='Username or password must not be empty !!';
       return $msg;
    }else{
        $sql= "SELECT * FROM admin WHERE username='$username' AND password='$password' ";
        $getdata=$this->db->select($sql);
        if ($getdata!=false) {
            $data=$getdata->fetch_assoc();
            Session::set('login',true);
            Session::set('adminId',$data['id']);
            Session::set('username',$data['username']);
            Session::set('q',$data['level']);
            Session::set('password',$data['password']);
            Session::set('adminName',$data['name']);
            header('Location:dasboard.php');
        }else{
                $msg = 'Username or password not match !!';
                return $msg;

        }
    }
   
}
}
?>