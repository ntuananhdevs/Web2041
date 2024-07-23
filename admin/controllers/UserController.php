<?php 

class UserController {
    public $user;

    public function __construct() {
        $this-> user = new User();
    }

    public function view_users() {
        $users = $this->user->getUsers();
        require_once './views/user.php';
    }
    public function form_add_user() {
        require_once './views/form/add_users.php';
    }
    public function add_users() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $img = $_FILES['avatar'];
            $password = $_POST['password'];
            if($this->user->add($username, $email, $phone,  uploadFile($img, './uploads/'), $password)){ 
                header('location: ?act=users');
                exit();
            } else {
                echo "Loi";
            }
        }
    }
    public function form_update_user($id) {
        $user_value = $this->user->get_userbyid($id);
        if($user_value) {
            $user_value = $user_value[0];
            require_once './views/form/update_users.php';
        } else {
            echo "Khong tim thay user";
        }
    }
    public function update_users() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $img = $_FILES['avatar'];
            $password = $_POST['password'];         
            $new_img = $_POST['old_avatar'];

            if(isset($_FILES['avatar']) && $_FILES['avatar'] ['error'] == UPLOAD_ERR_OK){
                if(!empty($new_img)){
                    deleteFile($new_img);
                }
                $new_img =  uploadFile($img, './uploads/');
            }
            if($this->user->update($id, $username, $email, $phone, $new_img, $password)){
                header('location: ?act=users');
                exit();
            }else{
                echo "loi";
            }
        }
    }

    public function delete_users() {
        $id = $_GET['id'];
        if($this->user->delete($id)) {
            header('location: ?act=users');
        } else {
            echo "Loi";
        }
    }
}