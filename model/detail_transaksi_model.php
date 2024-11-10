<?php
require_once 'domain-object/node-detail-transaksi.php';
require_once 'model/barang_model.php';

class DetailTransaksiModel {
    public $detailTransaksi = [];
    private $nextId = 1;
    public $barangModel;

    public function __construct() {
        $this->barangModel = new ModelBarang();
    } 

    public function getSubtotal($barang_id, $jumlah) {
        $barang = $this->barangModel->getBarangById($barang_id);
        return $barang ? $barang->harga_barang * $jumlah : 0;
    }

    public function addDetailTransaksi($barang_id, $detail_jumlah) {
        $barang = $this->barangModel->getBarangById($barang_id);
        if (!$barang) {
            echo "Barang tidak ditemukan untuk ID: $barang_id";
            return;
        }
        $detail_subtotal = $this->getSubtotal($barang_id, $detail_jumlah);
        $detail = new DetailTransaksi($this->nextId++, $barang, $detail_jumlah, $detail_subtotal);
        $this->detailTransaksi[] = $detail;
        $this->saveToSession();
    }

    private function saveToSession() {
        $_SESSION['DetailTransaksi'] = serialize($this->detailTransaksi);
    }

    public function getAllDetailTransaksi() {
        return $this->detailTransaksi;
    }
}
?>