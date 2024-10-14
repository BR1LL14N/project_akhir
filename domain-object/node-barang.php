<?php
    class barang{
        public $id_barang;
        public $nama_barang;
        public $harga_barang;
        public $status_barang;
        public $jumlah_barang;
        

        function __construct($id_barang, $nama_barang,$harga_barang, $status_barang, $jumlah_barang){
            $this->id_barang = $id_barang;
            $this->nama_barang = $nama_barang;
            $this->harga_barang = $harga_barang;
            $this->status_barang = $status_barang;
            $this->jumlah_barang = $jumlah_barang;
        
        }

    }
?>