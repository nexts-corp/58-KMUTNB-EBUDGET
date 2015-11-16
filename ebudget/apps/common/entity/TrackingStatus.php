<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="TRACKINGSTATUS")
 */
class TrackingStatus extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="TRACKINGSTATUSID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=100, name="TRACKINGSTATUSNAME") */
    public $name;

    /** @Column(type="string",length=100, name="TRACKINGSTATUSDESC") */
    public $desc;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDesc() {
        return $this->desc;
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

    function setName($name) {
        $this->name = $name;
    }

    function setDesc($desc) {
        $this->desc = $desc;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
