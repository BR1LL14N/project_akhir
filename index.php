<?php
// MENG-START SESI
session_start();
include './model/role_model.php';

// MENG-HANDLE REQUEST DARI 
if(isset($_GET['modul'])){
    $modul = $_GET['modul'];
} else{
    $modul = 'dashboard';
}

// HANDLE SWITCH BERDASARKAN $_GET[MODUL]
// YANG SUDAH DIKIRIMKAN
switch($modul){
    case 'dashboard':
        include 'views/kosong.php';
        break;
    
    case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_roles = new Role_model();

        switch($fitur){
            case 'add':

                $role_name = $_POST['nama_peran'];
                $role_description = $_POST['desc_peran'];
                $role_status = $_POST['status_peran'];
                $gaji = $_POST['gaji'];

                $obj_roles->addRole($role_name, $role_description, $role_status, $gaji);

                header("Location: index.php?modul=role");
                break;
            
                case 'edit':
                    $role_id = $_GET['id'];
                    $obj_roles = new Role_model();
                    $role = $obj_roles->getRoleById($role_id);
                    include './views/role_update.php';
                    break;

                case 'update':
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $role_id = $_POST['id_peran'];
                        $role_name = $_POST['nama_peran'];
                        $role_description = $_POST['desc_peran'];
                        $role_status = $_POST['status_peran'];
                        $gaji = $_POST['gaji'];
                        $obj_roles->updateRole($role_id, $role_name, $role_description, $role_status, $gaji);
                        header("Location: index.php?modul=role");
                    }
                    break;

                case 'delete':
                    $role_id = $_GET['id'];
                    $obj_roles->deleteRole($role_id);
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
