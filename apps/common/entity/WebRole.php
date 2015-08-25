<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Web_Role")
 */
class WebRole extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=200, name="Role_TH") */
    public $roleTh;

    /** @Column(type="string",length=200, name="Role_EN") */
    public $roleEn;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getRoleTh() {
        return $this->roleTh;
    }

    function getRoleEn() {
        return $this->roleEn;
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

    function setRoleTh($roleTh) {
        $this->roleTh = $roleTh;
    }

    function setRoleEn($roleEn) {
        $this->roleEn = $roleEn;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
