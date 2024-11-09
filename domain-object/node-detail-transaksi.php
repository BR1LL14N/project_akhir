<?php

class detailTransaksi{
    public $detailID;
    public $barang;
    public $detailJumlah;
    public $detailSubtotal;

    public function __construct($detailID, Barang $barang, $detailJumlah, $detailSubtotal){
        $this->detailID = $detailID;
        $this->barang = $barang;
        $this->detailJumlah = $detailJumlah;
        $this->detailSubtotal = $detailSubtotal;
    }

}

?>