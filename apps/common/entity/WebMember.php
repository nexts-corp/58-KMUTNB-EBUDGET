<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="web_member")
 */
class WebMember extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=200, name="username") */
    public $username;

    /** @Column(type="string",length=200, name="password") */
    public $password;

    /** @Column(type="string",length=200, name="firstname") */
    public $firstname;

    /** @Column(type="string",length=200, name="lastname") */
    public $lastname;

    /** @Column(type="string",length=200, name="email") */
    public $email;

    /** @Column(type="string",length=200, name="telephone") */
    public $telephone;

    /** @Column(type="integer",length=11, name="web_role_id") */
    public $webRoleId;

    /** @Column(type="integer",length=11, name="lk_faculty_id") */
    public $facultyId;

    /** @Column(type="integer",length=11, name="lk_department_id") */
    public $departmentId;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
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

    function getFacultyId() {
        return $this->facultyId;
    }

    function getDepartmentId() {
        return $this->departmentId;
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

    function setFacultyId($facultyId) {
        $this->facultyId = $facultyId;
    }

    function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
