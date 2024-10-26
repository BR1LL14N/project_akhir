<?php
require_once 'domain-object/node-role.php';
$roles = [];
$roles[] = new role(1,$_POST['nama_peran'],$_POST['desc_peran'],$_POST['status_peran'],$_POST['gaji']);
include 'views/role_list.php';

?>