<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Tracking_Status")
 */
class TrackingStatus extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="TrackingStatusId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=100, name="TrackingStatusName") */
    public $name;

    /** @Column(type="string",length=100, name="TrackingStatusDesc") */
    public $desc;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDesc() {
        return $this->desc;
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
}
