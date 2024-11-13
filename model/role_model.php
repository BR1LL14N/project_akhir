<?php
require_once './domain-object/node-role.php';
// require_once 'user_model.php';

class Role_model{
    private $roles = [];
    private $nextId = 1;


    public function __construct(){
        if(isset($_SESSION['roles'])){
            $this->roles = unserialize($_SESSION['roles']);
            $this->nextId = count($this->roles) + 1;    
        }else{
            $this->InitialiazeDefaultRole();
        }
    }  

    public function addRole($role_name, $role_description, $role_status, $role_gaji){
        // DISINI LAHHH NODE ROLE BERGUNA DAN SEBENARNYA DI BAGIAN INI
        // KONSEP AGRREGATION SUDAH BERHASIL DIIMPLEMENTASIKAN
        
        $peran = new role($this->nextId++, $role_name, $role_description, $role_status, $role_gaji);
        $this->roles[] = $peran;
        $this->saveToSesion(); 
    }

    private function saveToSesion(){
        $_SESSION['roles'] = serialize($this->roles);
    }

    public function getRoles(){
        return $this->roles;
    }

    public function InitialiazeDefaultRole(){
        $this->addRole("Admin", "Administrator", 1, 10000000);
        $this->addRole("User", "Customer/member", 1, 20000);
        $this->addRole("Kasir", "Pembayaran", 1,100000);
        $this->addRole("Super Admin", "Owner", 1, 99999);
    }

    public function getRoleById($role_id){
        foreach($this->roles as $role){
            if($role->id_peran == $role_id){
                return $role;
            }
        }

        return false;
    }

    public function updateRole($role_id, $role_name, $role_description, $role_status, $role_gaji){
        $role = $this->getRoleById($role_id);
        if(!$role){
            return false;
        }
        $role->nama_peran = $role_name;
        $role->desc_peran = $role_description;
        $role->status_peran = $role_status;
        $role->gaji = $role_gaji;
        $this->saveToSesion();
        return true;
    }

    public function deleteRole($role_id){
        foreach($this->roles as $key => $role){
            if($role->id_peran == $role_id){
                unset($this->roles[$key]);
                $this->roles = array_values($this->roles);
                $this->saveToSesion();
                return true;
            }
        }

        return false;
    }

    public function getRoleByName($role_name){
        foreach($this->roles as $role){
            if($role->nama_peran == $role_name){
                return $role;
            }
        }

        return false;
    }
}

?>