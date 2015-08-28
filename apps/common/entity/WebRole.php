<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="web_role")
 */
class WebRole extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=200, name="role") */
    public $role;

    /** @Column(type="string",length=200, name="description") */
    public $description;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getRole() {
        return $this->role;
    }

    function getDescription() {
        return $this->description;
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

    function setDescription($description) {
        $this->description = $description;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
