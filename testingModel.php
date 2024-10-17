<?php
require_once './model/role_model.php';

// $obj_role = new Role_model();

// $obj_role->addRole("Brilian", "Nganggur", "Active", 1000000);
// $obj_role->addRole("Aril", "Makan", "Active", 1000000);
// $obj_role->addRole("Rizam", "Minum", "Active", 1000000);

foreach($obj_role->getRole() as $role){
    echo "Role ID: ". $role->id_peran. "<br>";
    echo "Role Name: ". $role->nama_peran. "<br>";
    echo "Role Description: ". $role->desc_peran. "<br>";
    echo "Role Status: ". $role->status_peran. "<br>";
    echo "Role Gaji: ". $role->gaji. "<br>";
    echo "<hr>";
}

?>