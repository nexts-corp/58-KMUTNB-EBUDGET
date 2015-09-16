<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="3D_PLAN")
 */
class Period extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="PLANID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=100, name="PLANNAME") */
    public $planName;

    /** @Column(type="integer",length=11, name="MASTERID") */
    public $masterId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getPlanName() {
        return $this->planName;
    }

    function getMasterId() {
        return $this->masterId;
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

    function setPlanName($planName) {
        $this->planName = $planName;
    }

    function setMasterId($masterId) {
        $this->masterId = $masterId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
