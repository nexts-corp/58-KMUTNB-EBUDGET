<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="3D_FUNDGROUP")
 */
class FundGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="FUNDGROUPID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="master_id") */
    public $masterId;

    /** @Column(type="string",length=255, name="FUNDGROUPNAME") */
    public $fundgroupName;

    /** @Column(type="string",length=20, name="Creator") */
    public $creator;

    /** @Column(type="string",length=20, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getMasterId() {
        return $this->masterId;
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
