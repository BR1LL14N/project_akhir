<?php

class roleComposite{

    public $id_peran;
    public $nama_peran;
    public $desc_peran;
    public $status_peran;
    public $gaji;

    public function __construct(){
        
    }

    // METHOD DIDALAM CLASS YANG DIGUNAKAN UNTUK MENCETAK 
    // SEMUA ATRIBUT DARI CLASS ROLE
    public function cetakRoleComposite(){
        echo "id role : ".$this->id_peran;
        echo "<br>";
        echo "role name : ".$this->nama_peran;
        echo "<br>";
        echo "role description : ".$this->desc_peran;
        echo "<br>";
        echo "role status : ".$this->status_peran;
        echo "<br>";
        echo "role gaji : ".$this->gaji;
        echo "<br>";
    }

}


?>