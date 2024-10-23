<?php
include './model/role_model.php';

$obj_role = new Role_model();


if(isset($_GET['modul'])){
    $modul = $_GET['modul'];
} else{
    $modul = 'dashboard';
}

switch($modul){
    case 'dashboard':
        include 'views/kosong.php';
        break;
    
    case 'role':
        $roles = $obj_role->getRole();
        include 'views/role_list.php';
        break;
}
?>
