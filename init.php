<?php
require_once 'domain-object/node-role.php';
require_once 'domain-object/node-barang.php';


$obj_role = [];
$obj_role[] = new Role(1, "Kasir", "Dibuat Untuk Kasir", 1, 10000);
$obj_role[] = new Role(2, "Admin", "Dibuat Untuk Admin", 1, 20000);
$obj_role[] = new Role(3, "Owner", "Dibuat Untuk Yang Punya", 0, 30000);
$obj_role[] = new Role(4, "Costumer", "Dibuat Untuk Pelanggan", 1, 40000);

$obj_barang = [];
$obj_barang[] = new Barang("Mie Ayam", 10, 5000);
$obj_barang[] = new Barang("Mie Telor", 10, 2000);
$obj_barang[] = new Barang("Ayam Goreng", 10, 10000);



?>