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
}