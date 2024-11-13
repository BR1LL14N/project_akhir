<?php
require_once './domain-object/node-user.php';
require_once 'role_model.php';
// require_once './user_model.php';

class User_model{
    // MENYIMPAN SEMUA DATA USER
    private $users = [];

    // SEPERTI BIASA AUTO INCREMENT
    private $nextID = 1;

    // SEMUA METHOD MODEL BISA KITA MANFAATKAN
    private $roleModel;

    public function __construct(){
        $this->roleModel = new role_model();
        // CEK APAKAH SESSION TERSEDIA
        if(isset($_SESSION['users'])){
            $this->users = unserialize($_SESSION['users']);
            $this->nextID = $this->countID() + 1;
        }else{
            $this->InitilizedefaultUser();
        }
    }

    public function countID(){
        $maxid = 0;
        foreach($this->users as $user){
            if($user->userId > $maxid){
                $maxid = $user->userId;
            }
        }
        return $maxid;
    }

    public function addUser($user, $nameRole, $password){
        $role = $this->roleModel->getRoleByName($nameRole);


        if(!$role){
            echo "<script>
            alert('Role Tidak Ditemukan Kocak!');
            </script>";
            return false;
        }

        if($role->status_peran == 0){
            echo "<script>
            alert('Role Tidak Aktif Kocak!');
            </script>";
            return false;
        }

        // $ID = count($this->users) + 1;
        $this->users[] = new User($this->nextID++,$user, $role, $password);
        $this->saveToSession();
        return true;
        
    }


    public function saveToSession(){
        $_SESSION['users'] = serialize($this->users);
    }


    public function InitilizedefaultUser(){
        $this->addUser("Brillian", "Admin", 1234);
        $this->addUser("Aril", "Kasir", 123);
        $this->addUser("Rizam", "User", 135);
        $this->addUser("Sora", "Super Admin", 5555);
        // $this->addUser("Rizam", "User", 444);

    }

    public function getAllUsers(){
        return $this->users;
    }

    public function updateUser($userID,$username, $nameRole, $password){
        $role = $this->roleModel->getRoleByName($nameRole);
        if(!$role){
            echo "<script>
            alert('Role Tidak Ditemukan Kocak!');
            </script>";
            return false;
        }
        if($role->status_peran == 0){
            echo "<script>
            alert('Role Tidak Aktif Kocak!');
            </script>";
            return false;
        }
        foreach($this->users as $key => $user){
            if($user->userId == $userID){
                $user->username = $username;
                $user->password = $password;
                $user->allDataRole = $role;
                // $this->users[$key] = new User($user->userId, $user->username, $role);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getUserById($id){
        foreach($this->users as $user){
            if($user->userId == $id){
                return $user;
            }
        }
        return false;
    }


    public function deleteUser($id){
        foreach($this->users as $key => $user){
            if($user->userId == $id){
                unset($this->users[$key]);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getUserByUsername($username){
        foreach($this->users as $user){
            if($user->username == $username){
                return $user;
            }
        }
        return false;
    }

}




?>