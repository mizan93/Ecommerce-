<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>
<?php 
class Admin{

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function adminTitleSlogan(){
        $sql = "SELECT * FROM admin_title WHeRE id='1' ";
        $data = $this->db->select($sql);
        return $data;
    }
    public function UpdatetittleSlogan($value, $files){
       
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;
        
        $tittle = $this->fm->validation($value['tittle']);
        $slogan = $this->fm->validation($value['slogan']);

        $tittle = mysqli_real_escape_string($this->db->link, $tittle);
        $slogan = mysqli_real_escape_string($this->db->link, $slogan);

        if ($tittle == '' || $slogan == '') {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        } else {
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

                    $sql = "UPDATE  admin_title SET 
            tittle='$tittle',
            slogan='$slogan',
             image='$uploaded_image'
        WHeRE id='1'
            ";
                    $data = $this->db->update($sql);
                    if ($data) {
                        $msg = "<span class='success'>Data Updated successfully.</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>data not Updated !</span>";
                        return $msg;
                    }
                }
            } else {
                $sql = "UPDATE  admin_title SET 
              tittle='$tittle',
            slogan='$slogan'
            WHeRE id='1'
            
            ";
                $data = $this->db->update($sql);
                if ($data) {
                    $msg = "<span class='success'>Data Updated successfully.</span>";
                    return $msg;
                } else {
                    $msg = "<span class='error'>data not Updated !</span>";
                    return $msg;
                }
            }
        }
    }
    public function TitleSlogan()
    {
        $sql = "SELECT * FROM website_logo WHeRE id='1' ";
        $data = $this->db->select($sql);
        return $data;
    }
public function UpdateClienttittleSlogan($files){
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;
        
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

                    $sql = "UPDATE  website_logo SET 
             image='$uploaded_image'
        WHeRE id='1'
            ";
                    $data = $this->db->update($sql);
                    if ($data) {
                        $msg = "<span class='success'>Data Updated successfully.</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>data not Updated !</span>";
                        return $msg;
                    }
                }
            }        
     }
     public function AddSlider($value, $files){
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/slider/" . $unique_image;

        $title = $this->fm->validation($value['title']);
        $title = mysqli_real_escape_string($this->db->link, $title);

        if ($title == '' ||  $file_name == '' ) {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        } elseif ($file_size > 1048567) {
            $msg = "<span class='error'>Image Size should be less then 1MB !</span>";
            return $msg;
        } elseif (in_array($file_ext, $permited) === false) {
            $msg = "<span class='error'>You can upload only:-"
                . implode(', ', $permited) . "</span>";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);

            $sql = "INSERT INTO  slider(image,title)
                  VALUES('$uploaded_image','$title')";
            $data = $this->db->insert($sql);
            if ($data) {
                $msg = "<span class='success'>Slider inserted successfully.</span><a href='sliderlist.php'> Go to Sliderlist</a>";
                return $msg;
            } else {
                $msg = "<span class='error'>Slider not inserted !</span>";
                return $msg;
            }}
     }
     public function GetSlider(){
        $sql = "SELECT * FROM slider ORDER BY id DESC  ";
        $data = $this->db->select($sql);
        return $data;
     }
     
     public function GetSliderByID($edit_id){
        $edit_id = mysqli_real_escape_string($this->db->link, $edit_id);

        $sql = "SELECT * FROM slider WHERE  id='$edit_id'";
        $data = $this->db->select($sql);
        return $data;
     }
    public function UpdateSlider($value, $files, $edit_id){

        $title = $this->fm->validation($value['title']);
        $title = mysqli_real_escape_string($this->db->link, $title);
        $edit_id = mysqli_real_escape_string($this->db->link, $edit_id);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/slider/" . $unique_image;

        if ($title == '' ) {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        } else {
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

                    $sql = "UPDATE  slider SET 
            title='$title',
             image='$uploaded_image'
            WHERE id='$edit_id'
            ";
                    $data = $this->db->update($sql);
                    if ($data) {
                        $msg = "<span class='success'>Slider Updated successfully.</span><a href='sliderlist.php'> Go to Slider list</a>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Slider not Updated !</span>";
                        return $msg;
                    }
                }
            } else {
                $sql = "UPDATE  slider SET 
            title='$title'
            WHERE id='$edit_id'
            ";
                $data = $this->db->update($sql);
                if ($data) {
                    $msg = "<span class='success'>Slider Updated successfully.</span><a href='sliderlist.php'> Go to Slider list</a>";
                    return $msg;
                } else {
                    $msg = "<span class='error'>Slider not Updated !</span>";
                    return $msg;
                }
            }
        }

    }
    public function deleteSlider($id){
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sql = "SELECT * FROM slider WHERE id='$id'";
        $getdata = $this->db->select($sql);
        if ($getdata) {
            while ($delimage = $getdata->fetch_assoc()) {
                $dellink = $delimage['image'];
                unlink($dellink);
            }
        }
        $delsql = "DELETE FROM slider WHERE id='$id'";
        $deldata = $this->db->delete($delsql);
        if ($deldata) {
            $msg = "<span class='error'>Slider deleted Successfully.</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Slider not deleted !</span>";
            return $msg;
        }
    }
    public function getAllcompanyInfo(){
        $sql = "SELECT * FROM companyinfo WHeRE id='1' ";
        $data = $this->db->select($sql);
        return $data; 
    }
    public function UpdateCompanyInfo($value){
       
        $phone= $this->fm->validation($value['phone']);
        $fax = $this->fm->validation($value['fax']);
        $email = $this->fm->validation($value['email']);
        $fb = $this->fm->validation($value['fb']);
        $tw = $this->fm->validation($value['tw']);
        $glplus = $this->fm->validation($value['glplus']);
        $linkdin = $this->fm->validation($value['linkdin']);

        $address = mysqli_real_escape_string($this->db->link, $value['address']);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $fax = mysqli_real_escape_string($this->db->link, $fax);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $fb = mysqli_real_escape_string($this->db->link, $fb);
        $tw = mysqli_real_escape_string($this->db->link, $tw);
        $glplus = mysqli_real_escape_string($this->db->link, $glplus);
        $linkdin = mysqli_real_escape_string($this->db->link, $linkdin);

        $sql = "UPDATE  companyinfo SET 
            address='$address',
            phone='$phone',
            fax='$fax',
            email='$email',
            fb='$fb',
            tw='$tw',
            glplus='$glplus',
            linkdin='$linkdin'
            WHERE id='1'
            ";
        $data = $this->db->update($sql);
        if ($data) {
            $msg = "<span class='success'>Data Updated successfully.</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Data not Updated !</span>";
            return $msg;
        }
    }
    public function getallMessage(){
        $sql = "SELECT * FROM contact ORDER BY datetime DESC";
        $result = $this->db->select($sql);
        return $result;
    }
    public function deleteMessage($id){
        $sql = "DELETE FROM contact WHERE cmrId='$id'";
        $dlt =$this->db->delete($sql);
        if (!$dlt) {
        
            $msg = "<span class='error'>Message not Deleted !</span>";
            return $msg;
        }
    }
    public function adminInsert($value){
        $name = $this->fm->validation($value['name']);
        $username = $this->fm->validation($value['username']);
        $email = $this->fm->validation($value['email']);
        $password = $this->fm->validation (md5($value['password']));
        $level = $this->fm->validation($value['level']);
        

        $name = mysqli_real_escape_string($this->db->link, $name);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $password = mysqli_real_escape_string($this->db->link, $password);
        $level = mysqli_real_escape_string($this->db->link, $level);
       
        if ($name == '' || $username == '' || $email == '' || $password == '' || $level=='') {
            echo '<span class="error">Field Must not be empty!</span>';
        } else{
            $checkusername = "SELECT username FROM admin  WHERE username='$username' LIMIT 1";
            $usercheck = $this->db->select($checkusername);
            if ($usercheck) {
                echo '<span class="error">username already exist !</span>';
            }
               else{
                    $mailquery = "SELECT email FROM admin  WHERE email='$email' LIMIT 1";
                $mailcheck = $this->db->select($mailquery);
                if ($mailcheck) {
                    echo '<span class="error">Email already exist !</span>';
                }else{
                    $sql = "INSERT INTO admin (name,username,email,password,level) VALUES ('$name','$username',
                    '$email','$password','$level') ";
                    $insert_data = $this->db->insert($sql);
                    if ($insert_data) {
                        echo '<span class="success">Admin added succesfully!</span><a href=adminlist.php>Go to Adminlist</a>';
                    } else {
                        echo '<span class="error">Admin not created !</span>';
                    }
                       }}} }

public function adminByIdnRole($adminRole, $adminId){
        $adminId = mysqli_real_escape_string($this->db->link, $adminId);
        $adminRole = mysqli_real_escape_string($this->db->link, $adminRole);
        $query = "SELECT * FROM admin WHERE id='$adminId' AND  level='$adminRole'";
        $getuser = $this->db->select($query);
        return $getuser;
}
public function adminByIdnRoleEdit($id, $role){
        $id = mysqli_real_escape_string($this->db->link, $id);
        $role = mysqli_real_escape_string($this->db->link, $role);
        $query = "SELECT * FROM admin WHERE id='$id' AND  level='$role'";
        $getuser = $this->db->select($query);
        return $getuser;
}
public function UpdateAdmin($id, $role,$value){
    
        $name = $this->fm->validation($value['name']);
        $username = $this->fm->validation($value['username']);
        $email = mysqli_real_escape_string($this->db->link, $value['email']);
        $name = mysqli_real_escape_string($this->db->link, $name);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $role = mysqli_real_escape_string($this->db->link, $role);

        if ($name == ''  || $email == '' ) {
            echo '<span class="error">Field Must not be empty!</span>';
        }
        $sql = "UPDATE  admin SET 
            name='$name',
            email='$email'
            WHERE id='$id'
            AND level='$role'
            ";
        $data = $this->db->update($sql);
        if ($data) {
            $msg = "<span class='success'>Data Updated successfully.</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Data not Updated !</span>";
            return $msg;
        } 
}}

?>