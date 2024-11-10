<?php

require_once './domain-object/node-transaksi.php';

class ModelTransaksi {
    public $modelBarang;
    public $modelUser;
    public $modelTransaksi;
    private $nextId = 1;

    public function __construct() {
        $this->modelBarang = new ModelBarang();
        $this->modelUser = new User_model();
        $this->modelTransaksi = isset($_SESSION['transaksi']) ? unserialize($_SESSION['transaksi']) : [];
        $this->nextId = $this->getMaxTransaksiId() + 1;
    }

    public function addTransaksi($user_id, $detail_transaksis) {
        $user = $this->modelUser->getUserById($user_id);

        $transaksi_total = 0;
        foreach ($detail_transaksis as $detail) {
            $transaksi_total += $detail->detailSubtotal;
        }

        $transaksi = new Transaksi($this->nextId++, $user, $transaksi_total, $detail_transaksis);
        $this->modelTransaksi[] = $transaksi;
        $this->saveToSession();
    }

    private function saveToSession() {
        $_SESSION['transaksi'] = serialize($this->modelTransaksi);
    }

    public function getMaxTransaksiId() {
        $maxId = 0;
        foreach ($this->modelTransaksi as $transaksi) {
            if ($transaksi->transaksi_id > $maxId) {
                $maxId = $transaksi->transaksi_id;
            }
        }
        return $maxId;
    }

    public function getAllTransaksi() {
        return $this->modelTransaksi;
    }
}
?>