<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="lk_tracking_interval")
 */
class LKTrackingInterval extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="interval") */
    public $interval;

    /** @Column(type="string",length=100, name="description") */
    public $description;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getInterval() {
        return $this->interval;
    }

    function getDescription() {
        return $this->description;
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

    function setInterval($interval) {
        $this->interval = $interval;
    }

    function setDescription($description) {
        $this->description = $description;
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
