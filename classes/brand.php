<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
class Brand{

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    // Insert Brand
    public function brandInsert($brandname)
    {
        $brandname = $this->fm->validation($brandname);
        $brandname = mysqli_real_escape_string($this->db->link, $brandname);
        if ($brandname == '') {

            $msg = "<span class='error'>Brand Field must not be empty !</span>";
            return $msg;
        } else {
            $sql = "INSERT INTO  brands(brandName) VALUES ('$brandname')";
            $data = $this->db->insert($sql);
            if ($data) {
                $msg = "<span class='success'>Brand inserted successfully.</span><a href='brandlist.php'> Go to Brand list</a>";
                return $msg;
            } else {
                $msg = "<span class='error'>Brand not inserted !</span>";
                return $msg;
            }
        }
    }
    // getall Brand
    public function getallBrand()
    {
        $sql = "SELECT * FROM brands ORDER BY brandId DESC";
        $data = $this->db->select($sql);
        return $data;
    }
    // Showing Brand 
    public function getbrandByid($id)
    {
        $sql = "SELECT * FROM brands WHERE brandId='$id' ";
        $data = $this->db->select($sql);
        return $data;
    }

    // Update Brand
    public function brandUpdate($brandnamen,$id)
    {
        $brandname = $this->fm->validation($brandnamen);
        $brandname = mysqli_real_escape_string($this->db->link, $brandname);
        $id = mysqli_real_escape_string($this->db->link, $id);


        if ($brandname == '') {

            $msg = "<span class='error'>Brand Field must not be empty !</span>";
            return $msg;
        } else {
            $sql = "UPDATE  brands SET brandName='$brandname' WHERE brandId='$id'";
            $data = $this->db->update($sql);
            if ($data) {
                $msg = "<span class='success'>Brand updated successfully.</span><a href='brandlist.php'> Go to Brand list</a>";
                return $msg;
            } else {
                $msg = "<span class='error'>Brand not updated !</span>";
                return $msg;
            }
        }
    }
    // Delete Brand
    public function deletebrand($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sql = "DELETE FROM brands WHERE brandId='$id'";
        $deldata = $this->db->delete($sql);
        if ($deldata) {
            $msg = "<span class='error'>Brand Deleted.</span>";
            return $msg;
            
        } else {
            $msg = "<span class='error'>Brand not Deleted.</span>";
            return $msg;
        }
    }
    public function getTitle($getbrand_id){
        $getbrand_id = mysqli_real_escape_string($this->db->link, $getbrand_id);
        $sql = "SELECT brandName FROM  brands WHERE brandId ='$getbrand_id' ";
        $data = $this->db->select($sql);
        return $data;
    }
   
}

?>