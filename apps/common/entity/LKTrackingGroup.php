<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="lk_tracking_group")
 */
class LKTrackingGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=255, name="group_name") */
    public $group;

    /** @Column(type="string",length=255, name="group_description") */
    public $description;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getGroup() {
        return $this->group;
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

    function setGroup($group) {
        $this->group = $group;
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