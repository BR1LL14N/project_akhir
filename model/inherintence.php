<?php
require_once 'domain-object/node-testing-inheritance.php';

class UserInheritance extends roleInheritance{
    public $hobiModel;
    public static $id = 1;


    public function __construct($name, $desc, $status, $gaji, $hobi){
        parent::__construct(self::$id++, $name, $desc, $status, $gaji);
        $this->hobiModel = $hobi;
        
    }

    public function CetakPenggunaInheritance(){
        echo "Nama: ". $this->nama_peran. "<br>";
        echo "ID: ". $this->id_peran. "<br>";
        echo "Deskripsi Peran: ". $this->desc_peran. "<br>";
        echo "Status: ". $this->status_peran. "<br>";
        echo "Gaji: ". $this->gaji. "<br>";
        echo "Hobi: ".$this->hobiModel. "<br/>";
        echo "<br>";


    }

    public function updateUserInheritanceByID($id, $name, $description, $status, $gaji, $hobi){
        $this->id = $id;
        $this->nama_peran = $name;
        $this->desc_peran = $description;
        $this->status_peran = $status;
        $this->gaji = $gaji;
        $this->hobiModel = $hobi;
    }


}



    




?>