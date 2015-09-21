<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_FUNDGROUP")
 */
class FundGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="FUNDGROUPID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=255, name="FUNDGROUPNAME") */
    public $fundgroupName;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;


    function getId() {
        return $this->id;
    }

    function getFundgroupName() {
        return $this->fundgroupName;
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

    function setMasterId($masterId) {
        $this->masterId = $masterId;
    }

    function setFundgroupName($fundgroupName) {
        $this->fundgroupName = $fundgroupName;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
