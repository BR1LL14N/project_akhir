<?php
require_once 'domain-object/node-testing-agregation.php';

// KITA BUAT CLASS ROLE BISA DIBILANG SEBAGAI PERANTARA
// ANTARA CLASS ROLE DAN CLASS CLASS YANG ADA PADA FILE INI
class User{
    public $hobiModel;
    public $role;


    // CONSTRUCT INISIALISASI SEPERTI BIASA NAMUN CLASS INI HANYA MENYIMPAN
    // HOBI DAN ROLE MERUPAKAN KUMPULAN ATRIBUT YANG AKAN DIKIRIMKAN
    // PADA PADA CLASS ROLE
    public function __construct($human, $hobi){
        $this->role= $human;
        $this->hobiModel= $hobi;
    }

    // FUNCTION CETAK NAMUN FUNCTION CETAK INI JUGA MEMANFAATKAN 
    // FUNCTION CETAK YANG ADA PADA CLASS ROLE
    public function cetakUser(){

        // ATRIBUT ROLE MENYIMPAN SEMUA DATA DARI CLASS ROLE
        // MAKANYA FUNCTION CETAKROLE BISA DIGUNAKAN
        $this->role->cetakRole();
        echo "Hobi: ".$this->hobiModel. "<br>";
    }
}

class userModel{
    // KITA BUAT ATRIBUT YANG MEMILIKI BENTUK ARRAY YANG AKAN DIGUNAKAN
    // UNTUK MENYIMPAN DATA 
    public $listUser=[];
    public $id = 1;
    

    public function __construct(){
        if(isset($_SESSION['roles'])){
            $this->listUser = unserialize($_SESSION['roles']);
            $this->id = count($this->listUser) + 1;    
        }
    }


    public function addUser($role_name, $role_description, $role_status, $role_gaji, $hobi){
        // MENGITUNG ID BARU

        // MEMBUAT OBJECT ROLE SERTA MENGINISIALISASI NYA DENGAN VALUE
        $role = new roleAgregation($this->id++, $role_name, $role_description, $role_status, $role_gaji);

        // ATRIBUT ROLE MENYIMPAN SEMUA DATA DARI CLASS ROLE
        // AGRIGATION BERADA DISINI DIKARENAKAN KITA MEMASUKKAN
        // PROPERTI ROLE YANG SUDAH BERISI DATA DARI CLASS ROLE
        $this->listUser[] = new User($role, $hobi);
        $this->saveToSesion();
    }

    // FUNTION CETAK YANG AKAN MENCETAK SEMUA ATRIBUT YANG SALING
    // TERKAIT
    // INI SAMA DENGAN GET ROLE PADA CONTOH NYA BAPAK KURNIAWAN
    public function cetakModel(){
        foreach($this->listUser as $user){
            $user->cetakUser();
            echo "<br>";
        }
    }

    public function getUserById($id){
        foreach($this->listUser as $user){
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
        $_SESSION['roles'] = serialize($this->listUser);
    }
}


?>