<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="MEMBER")
 */
class Member extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="MEMBERID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=100, name="USERNAME") */
    public $username;

    /** @Column(type="string",length=100, name="PASSWORD") */
    public $password;

    /** @Column(type="integer",length=11, name="DEPARTMENTID") */
    public $deptId;

    /** @Column(type="string",length=200, name="FIRSTNAME") */
    public $firstname;

    /** @Column(type="string",length=200, name="LASTNAME") */
    public $lastname;

    /** @Column(type="string",length=200, name="EMAIL") */
    public $email;

    /** @Column(type="string",length=200, name="TELEPHONE") */
    public $telephone;

    /** @column(name="LASTLOGIN",type="datetime") */
    public $lastLogin;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;
    
    public $roleId;

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function getLastLogin() {
        return $this->lastLogin;
    }

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDeptId($deptId) {
        $this->deptId = $deptId;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }
    
    public function checkPassword(){
        //echo $this->id."xxxxxxxx";
       // print_r($this);
        if(!empty($this->id)){
            return true;
        }else{
            return false;
        }
    }
    
    function fullname(){
        return $this->firstname." ".$this->lastname;
    }
    
    public function getRoleId() {
        return $this->roleId;
    }

    public function setRoleId($roleId) {
        $this->roleId = $roleId;
    }
    
    //function __consstruct(){
        
    //}
   // function __construct() {
        
   // }
    //public function __call($name, $arguments) {
        
   // }

    
//    function __construct($id=null, $username=null, $password=null, $deptId=null
//            , $firstname=null, $lastname=null, $email=null, $telephone=null) {
//        $this->id = $id;
//        $this->username = $username;
//        $this->password = $password;
//        $this->deptId = $deptId;
//        $this->firstname = $firstname;
//        $this->lastname = $lastname;
//        $this->email = $email;
//        $this->telephone = $telephone;
//    }



}
