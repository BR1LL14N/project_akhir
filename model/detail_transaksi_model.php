<?php
require_once 'domain-object/node-detail-transaksi.php';
require_once 'model/barang_model.php';

class detailTransaksiModel{
    public $detailTransaksi = [];
    private $nextId = 1;
    public $barangModel;

    public function __construct(){
        $this->barangModel = new modelBarang();
    } 

    function getSubtotal($barang_id, $jumlah){
        // Assuming you have a method in your model to get the price of the item
        $barang = $this->barangModel->getBarangById($barang_id);
        return $barang ? $barang->harga_barang * $jumlah : 0;
    }


    public function addDetailTransaksi($barang_id, $detail_jumlah){
        $barang = $this->barangModel->getBarangById($barang_id);
        $detail_subtotal = $detail_jumlah * $barang->harga_barang;
        $detail = new DetailTransaksi($this->nextId++, $barang, $detail_jumlah, $detail_subtotal);
        $this->detailTransaksi[] = $detail;
        $this->saveToSession();
    }

    public function saveToSession()
    {
        $_SESSION['DetailTransaksi'] = serialize($this->detailTransaksi);
    }



    public function getMaxDetailTransaksiId()
    {
        $maxId = 0;
        foreach ($this->detailTransaksi as $DetailTransaksi) {
            if ($DetailTransaksi->detail_id > $maxId) {
                $maxId = $DetailTransaksi->detail_id;
            }
        }
        return $maxId;
    }

    public function getAllDetailTransaksi()
    {
        return $this->detailTransaksi;
    }

    public function getDetailTransaksiById($detail_id)
    {
        foreach ($this->detailTransaksi as $DetailTransaksi) {
            if ($DetailTransaksi->detail_id == $detail_id) {
                return $DetailTransaksi;
            }
        }
        return null;
    }
}


?>