<?php
class AuthController
{
    public $auth;
    public function __construct()
    {
        $this->auth = new Auth();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $data = $this->auth->login($email, $password);
            // var_dump($data);    die();
            if ($data) {
                if ($data['role'] == 'Customer') {
                    // session_start();
                    $_SESSION['user_id'] = $data['id'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['role'] = $data['role'];
                    header("Location: ?act=/");
                    exit();
                }
            } else {
                $error = "Tai khoan hoac mat khau khong chinh xac";
            }
        }
        require '../clients/views/auth/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];

            // Validate inputs
            $errors = [];
            if (empty($username)) {
                $errors['username'] = "Hãy Nhập Username";
            } else if (strlen($username) > 14) {
                $errors['username'] = "Username chỉ 14 ký tự";
            }
            if (empty($email)) {
                $errors['email'] = "Email không được bỏ trống";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email không hop le";
            }
            if (empty($phone)) {
                $errors['phone'] = "Hãy nhập số diện thoại";
            } else if (!is_numeric($phone)) {
                $errors['phone'] = "Số diện thoại phải là số";
            } else if (strlen($phone) != 10) {
                $errors['phone'] = "Số diện thoại phải 10 chuỗi";
            }
            if (empty($password)) {
                $errors['password'] = "Hãy nhập password";
            } else if (strlen($password) < 8) {
                $errors['password'] = "Password phải bao gồm chữ hoa và từ 8 ký tự";
            } else if (!preg_match('/[A-Z]/', $password)) {
                $errors['password'] = "Password phải bao gồm chữ hoa và từ 8 ký tự";
            }
            if ($password !== $repassword) {
                $errors['repassword'] = "Password không trùng nhau";
            }
            if (empty($errors)) {
                try {
                    if (!$this->auth->register($username, $email, $phone, $password)) {
                        $_SESSION['errors']['general'] = "Đã xảy ra lỗi. Vui lòng thử lại.";
                    } else {
                        header('Location: ?act=login');
                        exit();
                    }
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) {
                        $errorInfo = $e->errorInfo;
                        if (strpos($errorInfo[2], 'users.email') !== false) {
                            $_SESSION['errors']['email'] = "Email đã được sử dụng";
                        } elseif (strpos($errorInfo[2], 'users.username') !== false) {
                            $_SESSION['errors']['username'] = "Username đã tồn tại";
                        } elseif (strpos($errorInfo[2], 'users.phone') !== false) {
                            $_SESSION['errors']['phone'] = "Số điện thoại này đã được sử dụng";
                        }
                    } else {
                        $_SESSION['errors']['general'] = "An error occurred: " . $e->getMessage();
                    }
                    header('Location: ?act=register');
                    exit();
                }
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=register');
                exit();
            }
        }
        require_once '../clients/views/auth/register.php';
    }


    public function check_login()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
            header("Location: ?act=login");
            exit();
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: ?act=login");
        exit();
    }
}
