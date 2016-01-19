<?php

namespace apps\common\model;

class VMember extends \apps\common\entity\Member {

//    public $id;
//    public $username;
//    public $password;
//    public $deptId;
//    public $firstname;
//    public $lastname;
//    public $email;
//    public $telephone;
//    
//    public $roleId;
//    public $role;
    public $roleId;
    function __construct($id = null, $username = null, $password = null, $deptId = null
    , $firstname = null, $lastname = null, $email = null, $telephone = null) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->deptId = $deptId;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->telephone = $telephone;
    }
    
//    public function checkPassword(){
//        //echo $this->id."xxxxxxxx";
//       // print_r($this);
//        if(!empty($this->id)){
//            return true;
//        }else{
//            return false;
//        }
//    }
    

}
