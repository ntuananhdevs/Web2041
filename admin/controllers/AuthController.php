<?php
class AuthController
{
    public $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function checkLogin()
    {
        $this->startSession();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] == 'admin') {
            header('Location: ?act=home');
        } else {
            header('Location: ?act=login');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $email = isset($_POST['email']) ? trim($_POST['email']) : '';

            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            $user = $this->user->auth($email, $password);


            if ($user) {
                $this->startSession();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                header('Location: ?act=home');
                exit();
            } else {
                return "data user not found. login failed";
            }
        } else {
            include './views/auth/login.php';
        }
    }
    function logout()
    {
        $this->startSession();
        session_unset();
        session_destroy();
        header('Location: ?act=login');
        exit();
    }
}
