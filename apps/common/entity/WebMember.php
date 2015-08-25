<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Web_Member")
 */
class WebMember extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=200, name="Username") */
    public $username;

    /** @Column(type="string",length=200, name="Password") */
    public $password;

    /** @Column(type="string",length=200, name="Firstname") */
    public $firstname;

    /** @Column(type="string",length=200, name="Lastname") */
    public $lastname;

    /** @Column(type="string",length=200, name="Email") */
    public $email;

    /** @Column(type="string",length=200, name="Telephone") */
    public $telephone;

    /** @Column(type="integer",length=11, name="Web_Role_Id") */
    public $webRoleId;

    /** @Column(type="integer",length=11, name="Org_Faculty_Id") */
    public $orgFacultyId;

    /** @Column(type="integer",length=11, name="Org_Department_Id") */
    public $orgDepartmentId;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
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

    function getWebRoleId() {
        return $this->webRoleId;
    }

    function getOrgFacultyId() {
        return $this->orgFacultyId;
    }

    function getOrgDepartmentId() {
        return $this->orgDepartmentId;
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

    function setWebRoleId($webRoleId) {
        $this->webRoleId = $webRoleId;
    }

    function setOrgFacultyId($orgFacultyId) {
        $this->orgFacultyId = $orgFacultyId;
    }

    function setOrgDepartmentId($orgDepartmentId) {
        $this->orgDepartmentId = $orgDepartmentId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
