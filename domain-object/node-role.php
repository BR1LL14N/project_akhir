<?php

class role{

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
}