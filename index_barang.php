<?php
    require_once 'domain-object/node-barang.php';

    $obj_barang = [];
    $obj_barang[] = new barang(1, 'kopi',2000,1, 100);
    $obj_barang[] = new barang(2, 'susu',10000 ,0,200);
    $obj_barang[] = new barang(3, 'teh',3000,1, 300);

    include 'views/list_barang.php';
?>