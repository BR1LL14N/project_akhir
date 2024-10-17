<?php
// require_once './model/role_model.php';
require_once './model/agregation.php';
// require_once './model/inherintence.php';

// $obj_role = new Role_model();

// // $obj_role->addRole("Brilian", "Nganggur", "Active", 1000000);
// // $obj_role->addRole("Aril", "Makan", "Active", 1000000);
// // $obj_role->addRole("Rizam", "Minum", "Active", 1000000);

// foreach($obj_role->getRole() as $role){
//     echo "Role ID: ". $role->id_peran. "<br>";
//     echo "Role Name: ". $role->nama_peran. "<br>";
//     echo "Role Description: ". $role->desc_peran. "<br>";
//     echo "Role Status: ". $role->status_peran. "<br>";
//     echo "Role Gaji: ". $role->gaji. "<br>";
//     echo "<hr>";
// }

echo "============ AREA TESTING AGRIGATION ==============";
echo "<br>";

// TESTING BIASA DENGAN DATA STATIS
echo "TESTING BIASA DATA STATIS";
echo "<br>";
$obj_user = new UserModel();
$obj_user->addUser("Brilian", "Admin", "Inactive", 1000000, "makan");
$obj_user->addUser("Aril", "User", "Active", 1000000, "Minum");
$obj_user->addUser("Rizam", "Suoer Admin", "Active", 1000000, "Ngegame");

$obj_user->cetakModel();

echo "<hr>";
echo "TESTING DATA SETELAH UPDATE";
echo "<br>";
$obj_user->updateUserModelByID(2, "Mahfud", "super admin", "Active", 1000000, "baca Doujin");
$obj_user->cetakModel();


// echo "<br>";
// echo "============= AREA TESTING INHAROTANCE ==============";
// echo "<br>";

// $obj_user = new User("Brilian", "Nganggur", "Active", 1000000);
// $obj_user->Cetak();

?>