<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="lk_activity_type")
 */
class LKActivityType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=255, name="activity_type_name") */
    public $activityTypeName;

    /** @Column(type="string",length=100, name="field_name") */
    public $fieldName;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getActivityTypeName() {
        return $this->activityTypeName;
    }

    function getFieldName() {
        return $this->fieldName;
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

    function setActivityTypeName($activityTypeName) {
        $this->activityTypeName = $activityTypeName;
    }

    function setFieldName($fieldName) {
        $this->fieldName = $fieldName;
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
