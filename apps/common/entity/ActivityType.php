<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="ACTIVITYTYPE")
 */
class ActivityType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ACTIVITYTYPEID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=50, name="ACTIVITYTYPENAME") */
    public $actTypeName;

    /** @Column(type="string",length=50, name="ACTIVITYTYPECODE") */
    public $actTypeCode;

    /** @Column(type="string",length=1, name="ACTIVITYTYPESTATUS") */
    public $actTypeStatus;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getActTypeName() {
        return $this->actTypeName;
    }

    function getActTypeCode() {
        return $this->actTypeCode;
    }

    function getActTypeStatus() {
        return $this->actTypeStatus;
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

    function setActTypeName($actTypeName) {
        $this->actTypeName = $actTypeName;
    }

    function setActTypeCode($actTypeCode) {
        $this->actTypeCode = $actTypeCode;
    }

    function setActTypeStatus($actTypeStatus) {
        $this->actTypeStatus = $actTypeStatus;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
