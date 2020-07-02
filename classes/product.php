<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/format.php');

 class Product{

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    // INsert Porduct
    public function productInsert($value, $files)
    {
        $productName = $this->fm->validation($value['productName']);
        $catId = $this->fm->validation($value['catId']);
        $brandId = $this->fm->validation($value['brandId']);
        $price = $this->fm->validation($value['price']);
        $type = $this->fm->validation($value['type']);

        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $catId = mysqli_real_escape_string($this->db->link, $catId);
        $brandId = mysqli_real_escape_string($this->db->link, $brandId);
        $body = mysqli_real_escape_string($this->db->link, $value['body']);
        $price = mysqli_real_escape_string($this->db->link, $price);
        $type = mysqli_real_escape_string($this->db->link, $type);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;

        if ($productName == '' || $catId== '' || $brandId == '' || $body == ''|| $file_name=='' || $price == '' || $type=='') {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        } 
        elseif ($file_size > 1048567) {
            $msg = "<span class='error'>Image Size should be less then 1MB !</span>";
            return $msg;
        }
         elseif (in_array($file_ext, $permited) === false) {
            $msg = "<span class='error'>You can upload only:-"
                . implode(', ', $permited) . "</span>";
            return $msg;
        }
        else {
            move_uploaded_file($file_temp, $uploaded_image);

            $sql = "INSERT INTO  product(productName,catId,brandId,body,price,image,type)
                  VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";
            $data = $this->db->insert($sql);
            if ($data) {
                $msg = "<span class='success'>Product inserted successfully.</span><a href='productlist.php'> Go to Product list</a>";
                return $msg;
            }
             else {
                $msg = "<span class='error'>Product not inserted !</span>";
                return $msg;
            }
        }
    }
    // get all Product
    public function getallProduct()
    {
        $sql= "SELECT P.*, C.catName, b.brandName
        FROM product AS P , category AS C, brands AS b
        WHERE P.catId=C.catId AND P.brandId=B.brandId
        ORDER BY P.productId DESC
        ";
        // $sql = "SELECT product.*, category.catName , brands.brandName FROM product 
        //  INNER JOIN  category
        //  ON product.catId=category.catId
        //  INNER JOIN brands
        //  ON product.brandId==brands.brandId
        //  ORDER BY product.productId  DESC";
        $data = $this->db->select($sql);
        return $data;
    }
    
    //Showing data to update
    public function getProductById($id){
        $sql = "SELECT * FROM product WHERE productId='$id' ";
        $data = $this->db->select($sql);
        return $data;
    }
    //Update product
    public function productUpdate($value, $files, $id)
    {
        $productName = $this->fm->validation($value['productName']);
        $catId = $this->fm->validation($value['catId']);
        $brandId = $this->fm->validation($value['brandId']);
        $price = $this->fm->validation($value['price']);
        $type = $this->fm->validation($value['type']);

        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $catId = mysqli_real_escape_string($this->db->link, $catId);
        $brandId = mysqli_real_escape_string($this->db->link, $brandId);
        $body = mysqli_real_escape_string($this->db->link, $value['body']);
        $price = mysqli_real_escape_string($this->db->link, $price);
        $type = mysqli_real_escape_string($this->db->link, $type);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;

        if ($productName == '' || $catId == '' || $brandId == '' || $body == ''  || $price == '' || $type == '') {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        } else{
            if ($file_name) {
           
        if ($file_size > 1048567) {
            $msg = "<span class='error'>Image Size should be less then 1MB !</span>";
            return $msg;
        } elseif (in_array($file_ext, $permited) === false) {
            $msg = "<span class='error'>You can upload only:-"
                . implode(', ', $permited) . "</span>";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);

            $sql = "UPDATE  product SET 
            productName='$productName',
            catId='$catId',
            brandId='$brandId',
             image='$uploaded_image',
            price='$price',
            body='$body',
            type='$type'
            WHERE productId='$id'
            ";
            $data = $this->db->update($sql);
            if ($data) {
                $msg = "<span class='success'>Product Updated successfully.</span><a href='productlist.php'> Go to Product list</a>";
                return $msg;
            } else {
                $msg = "<span class='error'>Product not Updated !</span>";
                return $msg;
            }
        }
    }
    else{
                $sql = "UPDATE  product SET 
             productName='$productName',
            catId='$catId',
            brandId='$brandId',
            price='$price',
            body='$body',
            type='$type'
            WHERE productId='$id'
            ";
                $data = $this->db->update($sql);
                if ($data) {
                    $msg = "<span class='success'>Product Updated successfully.</span><a href='productlist.php'> Go to Product list</a>";
                    return $msg;
                } else {
                    $msg = "<span class='error'>Product not Updated !</span>";
                    return $msg;        }
          }
       }
   
    }
    //Delete produact
    public function delete_Product($id){
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sql = "SELECT * FROM product WHERE productId='$id'";
        $getdata =$this->db->select($sql);
        if ($getdata) {
            while ($delimage = $getdata->fetch_assoc()) {
                $dellink = $delimage['image'];
                unlink($dellink);
            }
        }
        $delsql = "DELETE FROM product WHERE productId='$id'";
        $deldata =$this->db->delete($delsql);
        if ($deldata) {
            $msg = "<span class='error'>Product deleted Successfully.</span>";
            return $msg;
            
        } else {
            $msg = "<span class='error'>Product not deleted !</span>";
            return $msg;
        }
    }
    // Showing featured product
    public function getFeatured_Product(){
        $sql = "SELECT * FROM product WHERE type='0' ORDER BY productId DESC LIMIT 4";
        $getdata = $this->db->select($sql);
        return $getdata;
    }
    // Showing general product
    public function getGenearel_Product(){
        $sql = "SELECT * FROM product WHERE type='1' ORDER BY productId DESC LIMIT 4";
        $getdata = $this->db->select($sql);
        return $getdata;
    }
    public function getSingle_product($id){

        $sql = "SELECT P.*, C.catName, b.brandName
        FROM product AS P , category AS C, brands AS b
        WHERE P.catId=C.catId AND P.brandId=B.brandId
        AND p.productId='$id'
        ";
        // $sql = "SELECT product.*, category.catName , brands.brandName FROM product 
        //  INNER JOIN  category
        //  ON product.catId=category.catId
        //  INNER JOIN brands
        //  ON product.brandId==brands.brandId
        //  ORDER BY product.productId  DESC";
        $data = $this->db->select($sql);
        return $data;
    }
    public function getLatestIphone(){
        $sql = "SELECT * FROM product WHERE brandId='5' ORDER BY productId DESC LIMIT 1";
        $getdata = $this->db->select($sql);
        return $getdata;
    }
    public function getLatestSumsang(){
        $sql = "SELECT * FROM product WHERE brandId='1' ORDER BY productId DESC LIMIT 1";
        $getdata = $this->db->select($sql);
        return $getdata;
    }
    public function getLatestAsus(){
        $sql = "SELECT * FROM product WHERE brandId='3' ORDER BY productId DESC LIMIT 1";
        $getdata = $this->db->select($sql);
        return $getdata;
    }
    public function getLatestHp(){
        $sql = "SELECT * FROM product WHERE brandId='2' ORDER BY productId DESC LIMIT 1";
        $getdata = $this->db->select($sql);
        return $getdata;
    }
    public function getProductBYcatId($id)
    {
        $id=$this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sql = "SELECT * FROM product WHERE  catId='$id'";
        $getdata = $this->db->select($sql);
        return $getdata;
    }
    public function getProductBYbrandId($id)
    {
        $id=$this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sql = "SELECT * FROM product WHERE  brandId='$id'";
        $getdata = $this->db->select($sql);
        return $getdata;
    }
    public function getcatName($id)
    {
        $id=$this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sql = "SELECT * FROM category WHERE  catId='$id'";
        $getdata = $this->db->select($sql);
        return $getdata;
    } 
    public function getbrandName($id)
    {
        $id=$this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sql = "SELECT * FROM brands WHERE  brandId='$id'";
        $getdata = $this->db->select($sql);
        return $getdata;
    } 
    public function inserttoCompare($productId, $cmrId){
        $cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
        $productId = mysqli_real_escape_string($this->db->link, $productId);
        $checkpro = "SELECT * FROM compare WHERE cmrId='$cmrId' AND  productId='$productId'";
        $check_data = $this->db->select($checkpro);

        if ($check_data) {

            $msg = "<span class='success'>Already added to compare !!</span><a href='compare.php'> Go to compare.</a>";
            return $msg;
        }
        $sql = "SELECT P.*, b.brandName
        FROM product AS P , brands AS b
        WHERE P.brandId=B.brandId
        AND p.productId='$productId'";
        $getdata = $this->db->select($sql);
        if ($getdata) {
            while ($data=$getdata->fetch_assoc()) {
              
                $productId=$data['productId'];
                $productName=$data['productName'];
                $brandName=$data['brandName'];
                $price=$data['price'];
                $image=$data['image'];
           
        $sql = "INSERT INTO  compare(cmrId,productId,productName,brandName,price,image)
                  VALUES('$cmrId','$productId','$productName','$brandName','$price','$image') ";
        $ins_data = $this->db->insert($sql);
        if ($ins_data) {
            $msg = "<span class='success'> Added to compare.</span><a href='compare.php'> Go to wishlist.</a>";
            return $msg;
        } else {
            $msg = "<span class='error'>Product not added !</span>";
            return $msg;
        }
            }
        }

    }
    public function inserttoWishlist($productId, $cmrId){
        $cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
        $productId = mysqli_real_escape_string($this->db->link, $productId);
        $checkpro = "SELECT * FROM wishlist WHERE cmrId='$cmrId' AND  productId='$productId'";
        $check_data = $this->db->select($checkpro);

        if ($check_data) {
 $cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
        $productId = mysqli_real_escape_string($this->db->link, $productId);
        $checkpro = "SELECT * FROM wishlist WHERE cmrId='$cmrId' AND  productId='$productId'";
        $check_data = $this->db->select($checkpro);

        if ($check_data) {

            $msg = "<span class='success'>Already added to wislist !!</span><a href='wishlist.php'> Go to wishlist.</a>";
            return $msg;
        }
        $sql = "SELECT P.*, b.brandName
        FROM product AS P , brands AS b
        WHERE P.brandId=B.brandId
        AND p.productId='$productId'";
        $getdata = $this->db->select($sql);
        if ($getdata) {
            while ($data=$getdata->fetch_assoc()) {
              
                $productId=$data['productId'];
                $productName=$data['productName'];
                $brandName=$data['brandName'];
                $price=$data['price'];
                $image=$data['image'];
           
        $sql = "INSERT INTO  wishlist(cmrId,productId,productName,brandName,price,image)
                  VALUES('$cmrId','$productId','$productName','$brandName','$price','$image') ";
        $ins_data = $this->db->insert($sql);
        if ($ins_data) {
            $msg = "<span class='success'> Added to wishlist.</span><a href='wishlist.php'> Go to wishlist.</a>";
            return $msg;
        } else {
            $msg = "<span class='error'>Product not added !</span>";
            return $msg;
        }
            }
        }

            $msg = "<span class='success'>Already added to wislist!!</span>";
            return $msg;
        }
        $sql = "SELECT P.*, b.brandName
        FROM product AS P , brands AS b
        WHERE P.brandId=B.brandId
        AND p.productId='$productId'";
        $getdata = $this->db->select($sql);
        if ($getdata) {
            while ($data=$getdata->fetch_assoc()) {
              
                $productId=$data['productId'];
                $productName=$data['productName'];
                $brandName=$data['brandName'];
                $price=$data['price'];
                $image=$data['image'];
           
        $sql = "INSERT INTO  wishlist(cmrId,productId,productName,brandName,price,image)
                  VALUES('$cmrId','$productId','$productName','$brandName','$price','$image') ";
        $ins_data = $this->db->insert($sql);
        if ($ins_data) {
            $msg = "<span class='success'> Added to wishlist.</span><a href='wishlist.php'> Go to wishlist.</a>";
            return $msg;
        } else {
            $msg = "<span class='error'>Product not added !</span>";
            return $msg;
        }
            }
        }

    }
    public function getProductToCompare($cmrId){
        $sql = "SELECT * FROM compare WHERE cmrId='$cmrId' ORDER BY id DESC ";
        $getdata = $this->db->select($sql);
        return $getdata;
    }
    public function getProductToWishlist($cmrId){
        $sql = "SELECT * FROM wishlist WHERE cmrId='$cmrId' ORDER BY id DESC ";
        $getdata = $this->db->select($sql);
        return $getdata;
    }
    public function delCustomerCompareData($cmrId){
        $sql="DELETE FROM compare WHERE cmrId='$cmrId'";
        $deldata=$this->db->delete($sql);
        return $deldata;
    }
    public function delCustomerWishlistData($cmrId){
        $sql="DELETE FROM wishlist WHERE cmrId='$cmrId'";
        $deldata=$this->db->delete($sql);
        return $deldata;
    }
    public function DeleteWisllistdata($cmrId, $del_product){
        $del_product = mysqli_real_escape_string($this->db->link, $del_product);
        $cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
        $sql = "DELETE FROM wishlist WHERE cmrId='$cmrId' AND   productId='$del_product'";
        $deldata = $this->db->delete($sql);
        return $deldata; 
    }
    public function Deletecomparedata($cmrId, $del_product){
        $del_product = mysqli_real_escape_string($this->db->link, $del_product);
        $cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
        $sql = "DELETE FROM compare WHERE cmrId='$cmrId' AND productId='$del_product'";
        $deldata = $this->db->delete($sql);
        return $deldata; 
    }
    public function Search_Product($search){
        $search = mysqli_real_escape_string($this->db->link, $search);
        $sql = "SELECT * FROM product WHERE productName LIKE '%$search%'  OR body LIKE '%$search%'
        ";
        $getdata = $this->db->select($sql);
        return $getdata;
        
    }
    public function getMeteaKeywords($keyword){
        $keyword = mysqli_real_escape_string($this->db->link, $keyword);
        $query = "SELECT productName FROM product WHERE productId ='$keyword'";
        $keywords =$this->db->select($query);
        return $keywords;
    }
    public function getTitle($productId){
    $productId = mysqli_real_escape_string($this->db->link, $productId);
        $query = "SELECT productName FROM product WHERE productId ='$productId'";
        $data =$this->db->select($query);
        return $data;
    }
    public function GetSliderToShow()
    {
        $sql = "SELECT * FROM slider ORDER BY id LIMIT 4  ";
        $data = $this->db->select($sql);
        return $data;
    }
    }

?>