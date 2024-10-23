<?php
// echo "ini response input";
// echo "<br>";
// echo "modul = ".$_GET['modul']."<br>";
// echo "fitur = ".$_GET['fitur']."<br>";
// echo "request method = ".$_SERVER['REQUEST_METHOD']."<br>";
// print_r($_POST);
// echo "<br>";
// echo "nama role : ".$_POST['nama_peran']."<br>";
// echo "keterangan  role : ".$_POST['role_description']."<br>";
// echo "status role : ".$_POST['role_status']."<br>";
require_once 'domain-object/node-role.php';
$roles = [];
$roles[] = new role(1,$_POST['nama_peran'],$_POST['desc_peran'],$_POST['status_peran'],$_POST['gaji']);
include 'views/role_list.php';

?>