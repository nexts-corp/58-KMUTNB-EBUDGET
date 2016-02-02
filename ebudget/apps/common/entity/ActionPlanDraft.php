<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="ActionPlan_Draft")
 */
class ActionPlanDraft extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ActionPlanDraftId")
     * @GeneratedValue
     */
    public $draftId;

    /** @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /** @Column(type="integer",length=11,name="DepartmentId") */
    public $departmentId;

    /** @Column(type="integer",length=11,name="ActionPlanTypeId") */
    public $typeId;

    /** @Column(type="integer",length=11,name="ActionPlanIssueId") */
    public $issueId;

    /** @Column(type="integer",length=11, name="ActionPlanIssueSeq") */
    public $issueSeq;

    /** @Column(type="integer",length=11, name="ActionPlanTargetId") */
    public $targetId;

    /** @Column(type="integer",length=11, name="ActionPlanTargetSeq") */
    public $targetSeq;

    /** @Column(type="integer",length=11, name="ActionPlanStrategyId") */
    public $strategyId;

    /** @Column(type="integer",length=11, name="ActionPlanStrategySeq") */
    public $strategySeq;

    /** @Column(type="string",length=255, name="ActionPlanStrategyName") */
    public $strategyName;

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

    function getDraftId() {
        return $this->draftId;
    }

    function getPeriodCode() {
        return $this->periodCode;
    }

    function getDepartmentId() {
        return $this->departmentId;
    }

    function getTypeId() {
        return $this->typeId;
    }

    function getIssueId() {
        return $this->issueId;
    }

    function getIssueSeq() {
        return $this->issueSeq;
    }

    function getTargetId() {
        return $this->targetId;
    }

    function getTargetSeq() {
        return $this->targetSeq;
    }

    function getStrategyId() {
        return $this->strategyId;
    }

    function getStrategySeq() {
        return $this->strategySeq;
    }

    function getStrategyName() {
        return $this->strategyName;
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

    function setDraftId($draftId) {
        $this->draftId = $draftId;
    }

    function setPeriodCode($periodCode) {
        $this->periodCode = $periodCode;
    }

    function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }

    function setTypeId($typeId) {
        $this->typeId = $typeId;
    }

    function setIssueId($issueId) {
        $this->issueId = $issueId;
    }

    function setIssueSeq($issueSeq) {
        $this->issueSeq = $issueSeq;
    }

    function setTargetId($targetId) {
        $this->targetId = $targetId;
    }

    function setTargetSeq($targetSeq) {
        $this->targetSeq = $targetSeq;
    }

    function setStrategyId($strategyId) {
        $this->strategyId = $strategyId;
    }

    function setStrategySeq($strategySeq) {
        $this->strategySeq = $strategySeq;
    }

    function setStrategyName($strategyName) {
        $this->strategyName = $strategyName;
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
