<?php
class AuthController {
    public $user;

    public function __construct() {
        $this->user = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $data = $this->user->auth($email, $password);
            // var_dump($data);    die();
            if ($data) {
                if ($data['role'] == 'Admin') {
                    session_start();
                    $_SESSION['user_id'] = $data['id'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['role'] = $data['role'];
                    header("Location: ?act=/");
                    exit();
                } else {
                    $error = "Ban khong co quyen truy cap";
                }
            } else {
                $error = "Tai khoan hoac mat khau khong chinh xac";
            }
        }
        require '../admin/views/auth/login.php';
    }
    
    public function check_login() {
        session_start();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
            header("Location: ?act=login");
            exit();
        }
    }
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ?act=login");
        exit();
    }    
}
?>
