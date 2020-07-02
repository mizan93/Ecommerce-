<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
class Cart{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function addTocart($quantity, $id){
      $quantity=$this->fm->validation($quantity);
      $quantity=mysqli_real_escape_string($this->db->link,$quantity);
      $productId=mysqli_real_escape_string($this->db->link,$id);
      $sessionId=session_id();

      $sql="SELECT * FROM product WHERE productId='$productId'";
      $value=$this->db->select($sql);
      $data=$value->fetch_assoc();
      
      $productName=$data['productName'];
      $price=$data['price'];
      $image=$data['image'];
//check duplicate product
      $chquery="SELECT * FROM cart WHERE productId='$productId' AND sessionId='$sessionId'";
      $getproduct=$this->db->select($chquery);
    if ($getproduct) {
      $msg = "Product already added !! ";
      return $msg;
    } else {
    //Inseert product insto cart
    $sql = "INSERT INTO  cart(sessionId,productId,productName,price,quantity,image)
                  VALUES('$sessionId','$productId','$productName','$price','$quantity','$image')";
    $inserted_data = $this->db->insert($sql);
    if ($inserted_data==true) {
     header('Location:cart.php');
    } else {
      header('Location:404.php');
    }
  }
    }
    //showing product show to the cart pagge
    public function getCartProduct(){
      $sessionId=session_id();
    $sql = "SELECT * FROM cart WHERE sessionId='$sessionId'";
    $data = $this->db->select($sql);
    return $data;
    }
    //Update Quantity
    public function updateCart($cartId, $quantity){
      $quantity=$this->fm->validation($quantity);
      $cartId=$this->fm->validation($cartId);
    $quantity = mysqli_real_escape_string($this->db->link, $quantity);
    $cartId = mysqli_real_escape_string($this->db->link, $cartId);

    $sql = "UPDATE  cart
             SET 
             quantity	='$quantity'
           WHERE cartId ='$cartId'
            ";
    $data_update = $this->db->update($sql);
    if ($data_update) {
     header('Location:cart.php');
    } else {
      $msg = "<span ><script>alert('Cart not updated !')</script></span>";
      return $msg;
    }
    }

  //Delete product from list
  public function deletePordcut($id)
  {
    $id=$this->fm->validation($id);
    $id = mysqli_real_escape_string($this->db->link, $id);
    $sql = "DELETE FROM cart WHERE cartId='$id'";
    $deldata = $this->db->delete($sql);
    if ($deldata) {
     header('Location:cart.php');
    } else {
      $msg = "<span class='error'>Product not Deleted.</span>";
      return $msg;
    }
  }
  //check  product 
  public function checkCartproduct(){
    $sessionId = session_id();
    $sql = "SELECT * FROM cart WHERE sessionId='$sessionId'";
    $result=$this->db->select($sql);
    return $result;
  }
   public function delCustomerCart(){
    $sessionId=session_id();
    $query="DELETE  FROM cart WHERE sessionId='$sessionId'";
    $data=$this->db->delete($query);
    return $data;
   }
  public function orderProduct($cmrId){
    $cmrId = $this->fm->validation($cmrId);
    $cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
    $sessionId = session_id();
    $sql = "SELECT * FROM cart WHERE sessionId='$sessionId'";
    $getproduct = $this->db->select($sql);
    if ($getproduct) {
     while ($data=$getproduct->fetch_assoc()) {
      $productId=$data['productId'];
        $productName=$data['productName'];
        $quantity=$data['quantity'];
        $price=$data['price']*$quantity;
        $image=$data['image'];
        $sql = "INSERT INTO  order_tbl(cmrId,productId,productName,quantity,price,image)
                  VALUES('$cmrId','$productId','$productName','$quantity','$price','$image')";
         $this->db->insert($sql);
     
     }
    }
    
  }
  public function payableAmount($cmrId){
    $cmrId = $this->fm->validation($cmrId);
    $cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
    $sql = "SELECT price FROM order_tbl WHERE cmrId='$cmrId'";
    $getpay = $this->db->select($sql);
    return $getpay;
  }
  public function getOrderedProduct($cmrId){
    $cmrId = $this->fm->validation($cmrId);
    $cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
    $sql = "SELECT * FROM order_tbl WHERE cmrId='$cmrId' ORDER BY datetime DESC";
    $getproduct = $this->db->select($sql);
    return $getproduct;
  }
  public  function checkOrder($cmrId){
    $cmrId = $this->fm->validation($cmrId);
    $cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
    $sql = "SELECT * FROM order_tbl WHERE cmrId='$cmrId'";
    $result = $this->db->select($sql);
    return $result;
  }
  public function getAllOrder(){
    $sql = "SELECT * FROM order_tbl ORDER BY datetime DESC";
    $result = $this->db->select($sql);
    return $result;
  }
  public function productShift($shift_id, $price, $datetime){
    $shift_id=mysqli_real_escape_string($this->db->link,$shift_id);
    $price=mysqli_real_escape_string($this->db->link, $price);
    $datetime=mysqli_real_escape_string($this->db->link, $datetime);

    $sql = "UPDATE  order_tbl
             SET 
             status	='1'
           WHERE cmrId ='$shift_id ' AND
            datetime ='$datetime ' AND
            price ='$price ' 
            ";
    $data_update = $this->db->update($sql);
    if ($data_update) {
      echo "<script>window.location = 'inbox.php'; </script>";
    } else {
      $msg = "<span ><script>alert('Product not shifted ! Somthing went wrong.')</script></span>";
      return $msg;
    }
  }
  public function getImage($cust_id){
    $cust_id = mysqli_real_escape_string($this->db->link, $cust_id);
    $sql = "SELECT image FROM order_tbl WHERE  cmrId='$cust_id'";
    $result = $this->db->select($sql);
    return $result;
  }
  public function productDelete($del_id, $price, $datetime){
    $del_id = mysqli_real_escape_string($this->db->link, $del_id);
    $price = mysqli_real_escape_string($this->db->link, $price);
    $datetime = mysqli_real_escape_string($this->db->link, $datetime);
    $sql = "DELETE  FROM order_tbl WHERE cmrId='$del_id'
    AND price='$price' AND datetime='$datetime'";

    $data_del = $this->db->update($sql);
    if ($data_del) {
      echo "<script>window.location = 'inbox.php'; </script>";
    } else {
      $msg = "<span ><script>alert('Order not Dleleted ! Somthing went wrong.')</script></span>";
      return $msg;
    }
  }
  public function productConfirm($cust_id, $price, $datetime){

    $cust_id = mysqli_real_escape_string($this->db->link, $cust_id);
    $price = mysqli_real_escape_string($this->db->link, $price);
    $datetime = mysqli_real_escape_string($this->db->link, $datetime);
    $sql = "UPDATE  order_tbl
             SET 
             status	='2'
           WHERE cmrId ='$cust_id ' AND
            datetime ='$datetime ' AND
            price ='$price' ";

    $data_del = $this->db->update($sql);
    if ($data_del) {
      $msg = "<span class='success'>You have confirmed order.</span>";
      return $msg;
    } else {
      $msg = "<span class='error'> Somthing went wrong.</span>";
      return $msg;
    }
  }
  
}

?>