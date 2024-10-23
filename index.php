<?php
session_start();
include './model/role_model.php';



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
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_roles = new Role_model();

        // require_once './model/role_model.php';

        // $roles = $obj_roles->getRoles();
        // include_once 'views/role_list.php';


        switch($fitur){
            case 'add':

                $role_name = $_POST['nama_peran'];
                $role_description = $_POST['desc_peran'];
                $role_status = $_POST['status_peran'];
                $gaji = $_POST['gaji'];

                $obj_roles->addRole($role_name, $role_description, $role_status, $gaji);

                header("Location: index.php?modul=role");
                break;
            
            default:
                // $obj_role = new Role_model();
                $roles = $obj_roles->getRoles();
                include 'views/role_list.php';
                break;
            }
            break;
        
}
?>
