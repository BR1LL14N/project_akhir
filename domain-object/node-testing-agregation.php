<?php

class roleAgregation{

    public $id_peran;
    public $nama_peran;
    public $desc_peran;
    public $status_peran;
    public $gaji;

    function __construct($id_peran, $nama_peran, $desc_peran, $status_peran, $gaji){
        $this->id_peran = $id_peran;
        $this->nama_peran = $nama_peran;
        $this->desc_peran = $desc_peran;
        $this->status_peran = $status_peran;
        $this->gaji = $gaji;
    }

    // METHOD DIDALAM CLASS YANG DIGUNAKAN UNTUK MENCETAK 
    // SEMUA ATRIBUT DARI CLASS ROLE
    public function cetakRole(){
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