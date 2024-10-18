<?php
require_once 'domain-object/node-testing-composite.php';

class UserComposite{
    public $hobiModel;
    public $role;

    public function __construct($id,$nama, $desc_peran, $status_peran, $gaji, $hobi){
        $this->role = new roleComposite();
        // BAGIAN COMPOSITE DIDALAMAN CLASS INI
        $this->role->id_peran = $id;
        $this->role->nama_peran = $nama;
        $this->role->desc_peran = $desc_peran;
        $this->role->status_peran = $status_peran;
        $this->role->gaji = $gaji;
        $this->hobiModel= $hobi;
    }

    public function CetakPenggunaComposite(){
        $this->role->cetakRoleComposite();
        echo "Hobi: ".$this->hobiModel. "<br/>";
    }
}

class userPengguna{

    public $listPengguna = [];
    public $id = 1;

    public function addUser($role_name, $role_description, $role_status, $role_gaji, $hobi){
        $this->listPengguna[] = new UserComposite($this->id++, $role_name, $role_description, $role_status, $role_gaji, $hobi);
        $this->saveToSesion();
    }

    public function cetakPengguna(){
        foreach($this->listPengguna as $user){
            $user->CetakPenggunaComposite();
            echo "<br>";
        }
    }

    public function getUserById($id){
        foreach($this->listPengguna as $user){
            if($user->role->id_peran == $id){
                return $user;
            }
        }
        return false;
    }

    public function updateUserModelByID($id, $nama, $description, $status, $gaji, $hobi){
        $hasil = $this->getUserById($id);
        if($hasil){
            $hasil->role->nama_peran = $nama;
            $hasil->role->desc_peran = $description;
            $hasil->role->status_peran = $status;
            $hasil->role->gaji= $gaji;
            $hasil->hobiModel = $hobi;
            $this->saveToSesion();
        }else{
            echo "Data Dengan ID ". $id. " Tidak Ditemukan";
        }
        
    }

    public function initializeDefault(){
        $this->addUser("Ferguso", "Admin", "Active", 1000000, "Membaca");
        $this->addUser("Aripin", "User", "Inactive", 2000000, "Berenang");
    }

    private function saveToSesion(){
        $_SESSION['roles'] = serialize($this->listPengguna);
    }
}





?>