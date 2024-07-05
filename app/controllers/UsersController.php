<?php 
class UsersController{
    public $Users;

    public function __construct() {
        $this->Users = new users();
    }
    public function users() {
        $list_account = $this->Users->getAll();
        require_once '../../views/admin/users.php';
    }
}