<?php
class Barang{
    public static $counter = 1;
    public $nama_barang;
    public $id;
    public $stok;
    public $harga;

    public function __construct($nama_barang, $stok, $harga){
        $this->nama_barang = $nama_barang;
        $this->id = self::$counter++;
        $this->stok = $stok;
        $this->harga = $harga;
    }

}
?>