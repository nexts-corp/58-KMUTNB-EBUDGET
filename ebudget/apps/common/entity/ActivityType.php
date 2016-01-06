<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Activity_Type")
 */
class ActivityType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ActivityTypeId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=50, name="ActivityTypeName") */
    public $actTypeName;

    /** @Column(type="string",length=50, name="ActivityTypeCode") */
    public $actTypeCode;

    /** @Column(type="string",length=1, name="ActivityTypeStatus") */
    public $actTypeStatus;


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
}
