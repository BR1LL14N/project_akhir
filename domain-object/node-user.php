<?php
class User{
    public $userId;
    public $username;
    public $allDataRole;
    // public $peranId;
    public $password;

    public function __construct($userId,$username,role $allDataRole, $password){
        $this->userId = $userId;
        $this->username = $username;
        $this->allDataRole = $allDataRole;
        $this->password = $password;
    }

    // public function __construct($userId,$username,$password,$peranId){
    //     $this->userId = $userId;
    //     $this->username = $username;
    //     $this->peranId = $peranId;
    //     $this->password = $password;
    // }
}

?>