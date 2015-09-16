<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="3D_CAMPUS")
 */
class Campus extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="CAMPUSID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=255, name="CAMPUSNAME") */
    public $campusName;

    /** @Column(type="string",length=1, name="CAMPUSSTATUS") */
    public $campusStatus;

    /** @Column(type="string",length=20, name="creator") */
    public $creator;

    /** @Column(type="string",length=20, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getCampusName() {
        return $this->campusName;
    }

    function getCampusStatus() {
        return $this->campusStatus;
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

    function setCampusName($campusName) {
        $this->campusName = $campusName;
    }

    function setCampusStatus($campusStatus) {
        $this->campusStatus = $campusStatus;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
