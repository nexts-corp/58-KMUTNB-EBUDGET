<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="ROLE")
 */
class Role extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ROLEID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=50, name="ROLENAME") */
    public $role;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getRole() {
        return $this->role;
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

    function setRole($role) {
        $this->role = $role;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
