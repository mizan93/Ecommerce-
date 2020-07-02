<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
class Customer{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    //Insert customer
  public function CustomerInsert($value,$files){
        $username = $this->fm->validation($value['username']);
        $password = $this->fm->validation($value['password']);
        $email = $this->fm->validation($value['email']);
        $phone = $this->fm->validation($value['phone']);
        $address = $this->fm->validation($value['address']);
        $city = $this->fm->validation($value['city']);
        $zipcode = $this->fm->validation($value['zipcode']);
        $country = $this->fm->validation($value['country']);

        $username = mysqli_real_escape_string($this->db->link, $username);
        $password = mysqli_real_escape_string($this->db->link, $password);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $address = mysqli_real_escape_string($this->db->link, $address);
        $city = mysqli_real_escape_string($this->db->link, $city);
        $zipcode = mysqli_real_escape_string($this->db->link, $zipcode);
        $country = mysqli_real_escape_string($this->db->link, $country);
        if ($username == '' || $password == '' || $email == '' ||  $phone == '' || $address == '' || $city == '' || $zipcode == '' || $country == '') {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        } 

        $sql= "SELECT * FROM customer WHERE email='$email' LIMIT 1";
        $mailchk=$this->db->select($sql);
        if ($mailchk) {
            $msg = "<span class='error'>Email already exist!</span>";
            return $msg; 
        }
        
        else{
            $sql = "INSERT INTO  customer(username,password,email,phone,address,city,zipcode,country)
                  VALUES('$username','$password','$email','$phone','$address','$city','$zipcode','$country')";
            $data = $this->db->insert($sql);
            if ($data) {
                $msg = "<span'><script>alert('Welcome !! You are registered.')</script></span>";
                return $msg;
            } else {
                $msg = "<span><script>alert('Somthing went wrong !')</script></span>";
                return $msg;
            }
       
        }
     }
    public function CustomerLogin($data){
        $email = $this->fm->validation($data['email']);
        $password = $this->fm->validation($data['password']);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $password = mysqli_real_escape_string($this->db->link, $password);
        if ($password == '' || $email == '') {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        }
        else{
            $sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
            $getdata=$this->db->select($sql);
            if($getdata){
                $value=$getdata->fetch_assoc();
                Session::set('cmrLogin',true);
                Session::set('cmrId',$value['id']);
                Session::set('cmrUsername',$value['username']);
                Session::set('cmrname',$value['name']);
                header('Location:index.php');           
            }else{
                $msg = "<span class='error'>Email or password not match !</span>";
                return $msg;
            }
       }
    }

    public function getCustomerData($id){
       $sql= "SELECT * FROM customer WHERE id='$id'"; 
       $data=$this->db->select($sql);
       return $data;
    }
    public function CustomerUpdate($value,$cmrId){
        $username = $this->fm->validation($value['username']);
        $email = $this->fm->validation($value['email']);
        $phone = $this->fm->validation($value['phone']);
        $address = $this->fm->validation($value['address']);
        $city = $this->fm->validation($value['city']);
        $zipcode = $this->fm->validation($value['zipcode']);
        $country = $this->fm->validation($value['country']);

        $username = mysqli_real_escape_string($this->db->link, $username);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $address = mysqli_real_escape_string($this->db->link, $address);
        $city = mysqli_real_escape_string($this->db->link, $city);
        $zipcode = mysqli_real_escape_string($this->db->link, $zipcode);
        $country = mysqli_real_escape_string($this->db->link, $country);
        if ($username == '' || $phone == '' || $email == '' || $address == '' || $city == '' || $zipcode == '' || $country == '') {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        } else {
            $sql = "UPDATE  customer 
            SET
              username='$username',
              phone='$phone',
              email='$email',
              address='$address',
              city='$city',
              zipcode='$zipcode',
              country='$country'
              WHERE id='$cmrId';
            ";
            $data = $this->db->update($sql);
            if ($data) {
               header('Location:profile.php');
            } else {
                $msg = "<span><script>alert('Somthing went wrong !')</script></span>";
                return $msg;
            }
        }
    }
    public function getCustomerAddress($cus_id)
    {
        $cus_id = $this->fm->validation($cus_id);
        $cus_id = mysqli_real_escape_string($this->db->link, $cus_id);
        $sql = "SELECT * FROM customer WHERE id='$cus_id'";
        $result = $this->db->select($sql);
        return $result;
    }
    public  function sendContactInfo($value){
        $sessionId=session_id();
       
        


        $name = $this->fm->validation($value['name']);
        $email = $this->fm->validation($_POST['email']);
        $mobile = $this->fm->validation($_POST['mobile']);
        $comment = $this->fm->validation($_POST['comment']);
        $gender = $this->fm->validation($_POST['gender']);
        $address = $this->fm->validation($_POST['address']);

        $name = mysqli_real_escape_string($this->db->link, $name);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $mobile = mysqli_real_escape_string($this->db->link, $mobile);
        $comment = mysqli_real_escape_string($this->db->link, $comment);
        $gender = mysqli_real_escape_string($this->db->link, $gender);
        $address = mysqli_real_escape_string($this->db->link, $address);

        $sql = "INSERT INTO  contact(sessionId,name,email,mobile,gender,address,comment)
                  VALUES('$sessionId','$name','$email','$mobile','$gender','$address','$comment')";
        $inserted_data = $this->db->insert($sql);
        if ($inserted_data == true) {
            $msg = "<span style='color:green;'>Data sent successfully. Auothority will contact you soon.</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Data not sent !! Somthing went wrong.</span>";
            return $msg;
        }
    }
    
}

    ?>