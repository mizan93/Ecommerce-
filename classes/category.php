<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>
<?php 

class Category{
    private $db;
    private $fm;
    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }
    // Insert Category
public function catInsert($catname){
    $catname=$this->fm->validation($catname);
    $catname=mysqli_real_escape_string($this->db->link,$catname);
    if ($catname=='') {
          
            $msg = "<span class='error'>Category Field must not be empty !</span>";
            return $msg;   
    
    }else{
        $sql= "INSERT INTO category(catName) VALUES ('$catname')";
        $data=$this->db->insert($sql);
        if ($data) {
                $msg = "<span class='success'>Category inserted successfully.</span><a href='catlist.php'> Go to Category list</a>";
                return $msg; 
                
        }else{
                $msg = "<span class='error'>Category not inserted !</span>";
                return $msg;             
        }
    }
}
      // getall Category
        public function getallCategory(){
            $sql="SELECT * FROM category ORDER BY catId DESC";
            $data=$this->db->select($sql);
            return $data;
        }
        // Showing Category 
        public function getcatByid($id){
            $sql="SELECT * FROM category WHERE catId='$id' ";
            $data=$this->db->select($sql);
            return $data;
        }
        // Update Category
    public function catUpdate($catname, $id)
    {
        $catname = $this->fm->validation($catname,$id);
        $catname = mysqli_real_escape_string($this->db->link, $catname);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if ($catname == '') {

            $msg = "<span class='error'>Category Field must not be empty !</span>";
            return $msg;
        } else {
            $sql = "UPDATE  category SET catName='$catname' WHERE catId='$id'";
            $data = $this->db->update($sql);
            if ($data) {
                $msg = "<span class='success'>Category updated successfully.</span><a href='catlist.php'> Go to Category list</a>";
                return $msg;
            } else {
                $msg = "<span class='error'>Category not updated !</span>";
                return $msg;
            }
        }
    } 
    // Delete Category
    public function deletecat($id){
        $id = mysqli_real_escape_string($this->db->link, $id);
     $sql="DELETE FROM category WHERE catId='$id'";
     $deldata=$this->db->delete($sql);
     if ($deldata) {
            $msg = "<span class='error'> Category Deleted.</span>";
            return $msg;
        
     }else{
            $msg = "<span class='error'>Category not Deleted.</span>";
            return $msg;         
                  
     }
    }
    public function getTitle($catId){
        $catId = mysqli_real_escape_string($this->db->link, $catId);
        $sql = "SELECT catName FROM category WHERE catId='$catId' ";
        $data = $this->db->select($sql);
        return $data;
    }
    
}

?>