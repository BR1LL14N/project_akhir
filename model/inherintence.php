<?php
require_once 'domain-object/node-testing.php';

class User extends role{
    // public $hobiModel;

    // public function __construct($hobi){
    //     $this->hobiModel = $hobi;
    // }
    public function Cetak(){
        $this->cetakRole();
        // echo "Hobi: ".$this->hobiModel. "<br/>";
    }
}



?>