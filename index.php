<?php
// MENG-START SESI
session_start();
include './model/role_model.php';
include './model/user_model.php';
include './model/barang_model.php';
include './model/detail_transaksi_model.php';
include './model/transaksi_model.php';

// MENG-HANDLE REQUEST DARI 
if(isset($_GET['modul'])){
    $modul = $_GET['modul'];
} else{
    $modul = 'dashboard';
}

$obj_roles = new Role_model();
$obj_transaksi = new ModelTransaksi();
$obj_barang = new modelBarang();
$obj_user = new User_model();
$obj_detail = new detailTransaksiModel();



// HANDLE SWITCH BERDASARKAN $_GET[MODUL]
// YANG SUDAH DIKIRIMKAN
switch($modul){
    case 'dashboard':
        include 'views/kosong.php';
        break;
    
    case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;

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

            case 'update':
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $userID = $_POST['id_user'];
                    $user = $_POST['name'];
                    $nameRole = $_POST['role_status'];
                    $result = $users->updateUser($userID,$user, $nameRole);
                    if($result){
                        echo "<script>
                            alert('Data berhasil diupdate!');
                            window.location.href = 'index.php?modul=user';
                        </script>";
                    }else{
                        echo "<script>
                            alert('Data gagal diupdate!');
                            window.location.href = 'index.php?modul=user';
                        </script>";
                    }
                }

            case 'delete':
                $userID = $_GET['id']; // Ambil ID pengguna dari URL
                if ($users->deleteUser ($userID)) { // Panggil method deleteUser 
                    echo "<script>
                        alert('Pengguna berhasil dihapus!');
                        window.location.href = 'index.php?modul=user';
                    </script>";
                } else {
                    echo "<script>
                        alert('Pengguna tidak ditemukan atau gagal dihapus!');
                        window.location.href = 'index.php?modul=user';
                    </script>";
                }
                break;
            default:

                $users = $users->getAllUsers();
                include './views/user_list.php';
                break;
            }
            break;
    
    case 'barang':
            $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
    
            switch ($fitur) {
                case 'add':
                    $nama = $_POST['nama_barang'];
                    $harga = $_POST['harga_barang'];
                    $stok = $_POST['jumlah_barang'];
                    $obj_barang->addBarang($nama, $harga, $stok);
    
                    header("Location: index.php?modul=barang");
                    break;
    
                case 'edit':
                    $id = $_GET['id'];
                    $barang = $obj_barang->getBarangById($id);
                    include 'views/barang_update.php';
                    break;
    
                case 'update':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $id = $_POST['id'];
                        $nama = $_POST['nama'];
                        $harga = $_POST['harga'];
                        $stok = $_POST['stok'];
    
                        $obj_barang->updateBarang($id, $nama, $harga, $stok);
                        header("Location: index.php?modul=barang");
                    }
                    break;
    
                case 'delete':
                    $id = $_GET['id'];
                    $obj_barang->deleteBarang($id);
                    header("Location: index.php?modul=barang");
                    break;
    
                default:
                    $barangs = $obj_barang->getAllBarangs();
                    include "./views/list_barang.php";
                    break;
            }
            break;
    case 'transaksi':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
            switch ($fitur) {
                case 'input':
                        $transaksis = $obj_transaksi->getAllTransaksi();
                        $customers = $obj_user->getAllUsers();
                        $barangs = $obj_barang->getAllBarangs();
                        include './views/transaksi_input.php';
                        break;
        
                case 'add':
                    $user_id = $_POST['customer'];
                    $barang_ids = $_POST['barang'];
                    $jumlahs = $_POST['jumlah'];
                    $detail_transaksis = [];
                    $nextId = 1; // Mulai ID dari 1 atau gunakan nilai yang sesuai untuk inisialisasi

                    foreach ($barang_ids as $key => $barang_id) {
                        $barang = $obj_barang->getBarangById($barang_id);
                        $subtotal = $obj_detail->getSubtotal($barang_id, $jumlahs[$key]);

                        $detail_transaksi = new DetailTransaksi(
                            $nextId++, // Menambahkan ID secara increment
                            $barang,
                            $jumlahs[$key],
                            $subtotal
                        );
                        $detail_transaksis[] = $detail_transaksi;
                    }

                    if (!empty($detail_transaksis)) {
                        $obj_transaksi->addTransaksi($user_id, $detail_transaksis);
                        header("Location: index.php?modul=transaksi&fitur=list");
                    } else {
                        echo "Detail transaksi tidak lengkap!";
                        exit;
                    }
                    break;
                case 'list':
                    $transaksis = $obj_transaksi->getAllTransaksi();
                    // echo "<pre>";
                    //     print_r($transaksis);
                    //     echo "</pre>";
                    include 'views/transaksi_list.php';
                    break;
                    default:
                        $transaksis = $obj_transaksi->getAllTransaksi();
                        // echo "<pre>";
                        // print_r($transaksis);
                        // echo "</pre>";
                        include 'views/transaksi_list.php';
                        break;
                }
        }

?>
