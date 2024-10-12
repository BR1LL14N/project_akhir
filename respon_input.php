<?php

require_once 'init.php';
require_once 'domain-object/node-role.php';
$role_name = $_POST['role_name'];
$role_description = $_POST['role_description'];
$role_status = $_POST['role_status'];

$obj_role[] = new Role(6,$role_name ,$role_description,$role_status, 10000);
include_once 'views/role/role_list.php';


?>