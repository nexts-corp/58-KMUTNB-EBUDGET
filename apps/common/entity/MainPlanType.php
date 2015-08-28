<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="main_plan_type")
 */
class MainPlanType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=255, name="plan_type_name") */
    public $planTypeName;

    /** @Column(type="string",length=255, name="plan_type_code") */
    public $planTypeCode;

    /** @Column(type="boolean",length=1, name="is_normal") */
    public $isNormal;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getPlanTypeName() {
        return $this->planTypeName;
    }

    function getPlanTypeCode() {
        return $this->planTypeCode;
    }

    function getIsNormal() {
        return $this->isNormal;
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

    function setPlanTypeName($planTypeName) {
        $this->planTypeName = $planTypeName;
    }

    function setPlanTypeCode($planTypeCode) {
        $this->planTypeCode = $planTypeCode;
    }

    function setIsNormal($isNormal) {
        $this->isNormal = $isNormal;
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
