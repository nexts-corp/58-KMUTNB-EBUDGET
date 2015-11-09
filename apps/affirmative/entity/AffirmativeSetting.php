<?php

namespace apps\affirmative\entity;
use apps\common\entity\EntityBase;
/**
 * @Entity
 * @Table(name="Affirmative_Setting")
 */
class AffirmativeSetting extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="SettingId")
     * @GeneratedValue
     */
    public $settingId;

    /** @Column(type="integer",length=11, name="MainId") */
    public $mainId;

    /** @Column(type="integer",length=11, name="TypeId") */
    public $typeId;

    /** @Column(type="string",length=255, name="GroupCode") */
    public $GroupCode;

    /** @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /** @Column(type="string",length=255, name="Remark") */
    public $remark;

    /** @Column(type="text", name="Title") */
    public $title;

    function getSettingId() {
        return $this->settingId;
    }

    function getMainId() {
        return $this->mainId;
    }

    function getTypeId() {
        return $this->typeId;
    }

    function getGroupCode() {
        return $this->GroupCode;
    }

    function getPeriodCode() {
        return $this->periodCode;
    }

    function getRemark() {
        return $this->remark;
    }

    function getTitle() {
        return $this->title;
    }

    function setSettingId($settingId) {
        $this->settingId = $settingId;
    }

    function setMainId($mainId) {
        $this->mainId = $mainId;
    }

    function setTypeId($typeId) {
        $this->typeId = $typeId;
    }

    function setGroupCode($GroupCode) {
        $this->GroupCode = $GroupCode;
    }

    function setPeriodCode($periodCode) {
        $this->periodCode = $periodCode;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setTitle($title) {
        $this->title = $title;
    }

}
