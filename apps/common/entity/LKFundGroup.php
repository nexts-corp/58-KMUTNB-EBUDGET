<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="lk_fundgroup")
 */
class LKFundGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="master_id") */
    public $masterId;

    /** @Column(type="string",length=255, name="fundgroup_name") */
    public $fundgroupName;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
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

    function getIsActive() {
        return $this->isActive;
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

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
