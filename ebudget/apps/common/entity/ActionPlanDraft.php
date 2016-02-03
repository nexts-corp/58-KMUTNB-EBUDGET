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

    /** @Column(type="integer",length=11, name="ActionPlanStrategyId") */
    public $strategyId;

    /** @Column(type="integer",length=11, name="ActionPlanStrategySeq") */
    public $strategySeq;

    /** @Column(type="integer",length=11, name="ActionPlanProjectSeq") */
    public $projectSeq;

    /** @Column(type="string",length=255, name="ActionPlanProjectName") */
    public $projectName;
    public $detail;

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

    function getStrategyId() {
        return $this->strategyId;
    }

    function getStrategySeq() {
        return $this->strategySeq;
    }

    function getProjectSeq() {
        return $this->projectSeq;
    }

    function getProjectName() {
        return $this->projectName;
    }

    function getDetail() {
        return $this->detail;
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

    function setStrategyId($strategyId) {
        $this->strategyId = $strategyId;
    }

    function setStrategySeq($strategySeq) {
        $this->strategySeq = $strategySeq;
    }

    function setProjectSeq($projectSeq) {
        $this->projectSeq = $projectSeq;
    }

    function setProjectName($projectName) {
        $this->projectName = $projectName;
    }

    function setDetail($detail) {
        $this->detail = $detail;
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