<?php
require_once 'node-detail-transaksi.php';
require_once 'node-user.php';
class Transaksi{
    public $detail_transaksi;
    public $transaksi_id;
    public $user;
    public $transaksi_total;
    public $kasir;

    public function __construct($transaksi_id, User $user, $transaksi_total, $kasir,$detail_transaksis = [])
    {
        $this->transaksi_id = $transaksi_id;
        $this->user = $user;
        $this->transaksi_total = $transaksi_total;
        $this->kasir = $kasir;

        $this->detail_transaksi = $detail_transaksis;
    }
}
?>