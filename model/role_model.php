<?php
require_once './domain-object/node-role.php';

class Role_model{
    private $roles = [];
    private $nextId = 1;


    public function addRole($role_name, $role_description, $role_status, $role_gaji){
        $peran = new role($this->nextId++, $role_name, $role_description, $role_status, $role_gaji);
        $this->roles[] = $peran;
        $this->saveToSesion(); 
    }

    private function saveToSesion(){
        $_SESSION['roles'] = serialize($this->roles);
    }

    public function getRole(){
        return $this->roles;
    }

    public function InitialiazeDefaultRole(){
        $this->addRole("Admin", "Administrator", "active", 10000000);
        $this->addRole("User", "Customer/member", "active", 0);
        $this->addRole("Kasir", "Pembayaran", "inactive", 0);
    }


    
}

?>