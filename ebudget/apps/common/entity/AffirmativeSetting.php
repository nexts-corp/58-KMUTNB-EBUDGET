<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Setting")
 */
class AffirmativeSetting extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeSettingId")
     * @GeneratedValue
     */
    public $settingId;

    /** @Column(type="integer",length=11, name="AffirmativeMainId") */
    public $mainId;

    /** @Column(type="integer",length=11, name="AffirmativeMainSeq") */
    public $mainSeq;

    /** @Column(type="integer",length=11, name="AffirmativeTypeId") */
    public $typeId;

    /** @Column(type="integer",length=11, name="AffirmativeTypeSeq") */
    public $typeSeq;

    /** @Column(type="string",length=255, name="GroupCode") */
    public $groupCode;

    /** @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /** @Column(type="text", name="Title") */
    public $title;

    /** @Column(type="string",length=255, name="Remark") */
    public $remark;

    function getSettingId(){
        return $this->settingId;
    }

    function getMainId(){
        return $this->mainId;
    }

    function getMainSeq(){
        return $this->mainSeq;
    }

    function getTypeId(){
        return $this->typeId;
    }

    function getTypeSeq(){
        return $this->typeSeq;
    }

    function getGroupCode(){
        return $this->groupCode;
    }

    function getPeriodCode(){
        return $this->periodCode;
    }

    function getTitle(){
        return $this->title;
    }

    function getRemark(){
        return $this->remark;
    }

    function setSettingId($settingId){
        $this->settingId = $settingId;
    }

    function setMainId($mainId){
        $this->mainId = $mainId;
    }

    function setMainSeq($mainSeq){
        $this->mainSeq = $mainSeq;
    }

    function setTypeId($typeId){
        $this->typeId = $typeId;
    }

    function setTypeSeq($typeSeq){
        $this->typeSeq = $typeSeq;
    }

    function setGroupCode($groupCode){
        $this->groupCode = $groupCode;
    }

    function setPeriodCode($periodCode){
        $this->periodCode = $periodCode;
    }

    function setTitle($title){
        $this->title = $title;
    }

    function setRemark($remark){
        $this->remark = $remark;
    }
}
