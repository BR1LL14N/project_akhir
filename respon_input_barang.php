<?php
require_once 'domain_object/node_barang.php';
$obj_barang = [];
$obj_barang[] = new barang(1,$_POST['nama_barang'],$_POST['harga_barang'],$_POST['status_barang'],$_POST['jumlah_barang']);
include 'views/list_barang.php';

?>