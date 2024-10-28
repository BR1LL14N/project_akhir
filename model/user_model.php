<?php
require_once './domain-object/node-user.php';
require_once './role_model.php';

class User_model{
    // MENYIMPAN SEMUA DATA USER
    private $users = [];

    // SEPERTI BIASA AUTO INCREMENT
    private $nextID = 1;

    // SEMUA METHOD MODEL BISA KITA MANFAATKAN
    private $roleModel;

    public function __construct(){
        // CEK APAKAH SESSION TERSEDIA
        if(isset($_SESSION['users'])){
            $this->roleModel = new role_model();
            $this->users = unserialize($_SESSION['users']);
        }
    }

    public function addUser($user, $roleName){
        $role = $this->roleModel->getRoleByName($roleName);

        if(!$role){
            echo "<script>
            alert('Role Tidak Ditemukan Kocak!');
            </script>";
            return false;
        }
        $this->users[] = new User($user, $roleName);
        
    }

}


?>