<?php
require_once 'domain-object/node-role.php';

$obj_role = [];
$obj_role[] = new role(1, "kasir", "kasir",1, 1000000);
$obj_role[] = new role(2, "admin", 'admin', 1, 2000000);
$obj_role[] = new role(3, "manager", 'manager',0, 3000000);

include 'views/role_list.php';

// foreach($obj_role as $role){
//     echo "id role : ".$role->id_peran;
//     echo "<br>";
//     echo "role name : ".$role->nama_peran;
//     echo "<br>";
//     echo "role description : ".$role->desc_peran;
//     echo "<br>";
//     echo "role status : ".$role->status_peran;
//     echo "<br>";
//     echo "role gaji : ".$role->gaji;
//     echo "<br>";
    
// }
?>
