<?php
// MENG-START SESI
session_start();
include './model/role_model.php';
include './model/user_model.php';


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
            case 'input':
                $users = $obj_roles->getRoles();
                include './views/role_input.php';
                break;
            
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
                        $result = $obj_roles->updateRole($role_id, $role_name, $role_description, $role_status, $gaji);

                        if($result){
                            echo "<script>
                                alert('Data berhasil diupdate!');
                                window.location.href = 'index.php?modul=role';
                            </script>";
                        }else{
                            echo "<script>
                                alert('Data gagal diupdate!');
                                window.location.href = 'index.php?modul=role';
                            </script>";
                        }
                        
                    }
                    break;

                case 'delete':
                    $role_id = $_GET['id'];
                    $obj_roles->deleteRole($role_id);
                    echo "<script>
                                alert('Data berhasil di delete');
                                window.location.href = 'index.php?modul=role';
                            </script>";
                    break;

            default:
                // $obj_role = new Role_model();
                $roles = $obj_roles->getRoles();
                include 'views/role_list.php';
                break;
            }
            break;

    case 'user':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;

        $users = new User_model();
        $roles = new Role_model();
        switch($fitur){
            case 'input':
                $users = $users->getAllUsers();
                $listRole = $roles->getRoles();
                include './views/user_input.php';
                break;

            case 'add':
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $user = $_POST['name'];
                    $nameRole = $_POST['role_status'];
                    $result = $users->addUser($user, $nameRole);
                    if($result){
                        echo "<script>
                            alert('Data berhasil ditambahkan!');
                            window.location.href = 'index.php?modul=user';
                        </script>";
                    }else{
                        echo "<script>
                            alert('Data gagal ditambahkan!');
                            window.location.href = 'index.php?modul=user';
                        </script>";
                    }
                }
                include './views/user_input.php';
                break;
            case 'edit':
                $userID = $_GET['id'];
                $user = $users->getUserById($userID);
                $listRole = $roles->getRoles();
                include './views/user_update.php';
                break;
            default:

                $users = $users->getAllUsers();
                include './views/user_list.php';
                break;
        }
}
?>
