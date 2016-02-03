<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="ActionPlan_Detail")
 */
class ActionPlanDetail extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ActionPlanDetailId")
     * @GeneratedValue
     */
    public $detailId;

    /** @Column(type="integer",length=11, name="ActionPlanDetailSeq") */
    public $detailSeq;

    /** @Column(type="text", name="ActionPlanDetailName") */
    public $detailName;

    /**
     * @Column(type="integer",length=11,name="ActionPlanDraftId")
     */
    public $draftId;

    /** @Column(type="string",length=255, name="Value1") */
    public $value1;

    /** @Column(type="string",length=255, name="Value2") */
    public $value2;

    /** @Column(type="string",length=255, name="Value3") */
    public $value3;

    /** @Column(type="string",length=255, name="Value4") */
    public $value4;

    /** @Column(type="string",length=255, name="Value5") */
    public $value5;

    /** @Column(type="string",length=255, name="Value6") */
    public $value6;

    /** @Column(type="string",length=255, name="Value7") */
    public $value7;

    /** @Column(type="string",length=255, name="Remark") */
    public $remark;

    /** @Column(type="string",length=10, name="IsApprove") */
    public $isApprove;

    /** @Column(type="string",length=10, name="IsActive") */
    public $isActive;

    function getDetailId() {
        return $this->detailId;
    }

    function getDetailSeq() {
        return $this->detailSeq;
    }

    function getDetailName() {
        return $this->detailName;
    }

    function getDraftId() {
        return $this->draftId;
    }

    function getValue1() {
        return $this->value1;
    }

    function getValue2() {
        return $this->value2;
    }

    function getValue3() {
        return $this->value3;
    }

    function getValue4() {
        return $this->value4;
    }

    function getValue5() {
        return $this->value5;
    }

    function getValue6() {
        return $this->value6;
    }

    function getValue7() {
        return $this->value7;
    }

    function getRemark() {
        return $this->remark;
    }

    function getIsApprove() {
        return $this->isApprove;
    }

    function getIsActive() {
        return $this->isActive;
    }

    function setDetailId($detailId) {
        $this->detailId = $detailId;
    }

    function setDetailSeq($detailSeq) {
        $this->detailSeq = $detailSeq;
    }

    function setDetailName($detailName) {
        $this->detailName = $detailName;
    }

    function setDraftId($draftId) {
        $this->draftId = $draftId;
    }

    function setValue1($value1) {
        $this->value1 = $value1;
    }

    function setValue2($value2) {
        $this->value2 = $value2;
    }

    function setValue3($value3) {
        $this->value3 = $value3;
    }

    function setValue4($value4) {
        $this->value4 = $value4;
    }

    function setValue5($value5) {
        $this->value5 = $value5;
    }

    function setValue6($value6) {
        $this->value6 = $value6;
    }

    function setValue7($value7) {
        $this->value7 = $value7;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setIsApprove($isApprove) {
        $this->isApprove = $isApprove;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

}
