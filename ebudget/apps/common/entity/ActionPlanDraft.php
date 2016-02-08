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

    /** @Column(type="integer",length=11, name="ActionPlanProjectSeq") */
    public $projectSeq;

    /** @Column(type="string",length=255, name="ActionPlanProjectName") */
    public $projectName;

    /** @Column(type="string",length=255, name="TimeDuration") */
    public $timeDuration;

    /** @Column(type="string",length=255, name="Budget") */
    public $budget;

    /** @Column(type="string",length=255, name="Revenue") */
    public $revenue;

    /** @Column(type="string",length=255, name="Other") */
    public $other;

    /** @Column(type="string",length=255, name="NoBudget") */
    public $noBudget;
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

    function getProjectSeq() {
        return $this->projectSeq;
    }

    function getProjectName() {
        return $this->projectName;
    }

    function getTimeDuration() {
        return $this->timeDuration;
    }

    function getBudget() {
        return $this->budget;
    }

    function getRevenue() {
        return $this->revenue;
    }

    function getOther() {
        return $this->other;
    }

    function getNoBudget() {
        return $this->noBudget;
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

    function setProjectSeq($projectSeq) {
        $this->projectSeq = $projectSeq;
    }

    function setProjectName($projectName) {
        $this->projectName = $projectName;
    }

    function setTimeDuration($timeDuration) {
        $this->timeDuration = $timeDuration;
    }

    function setBudget($budget) {
        $this->budget = $budget;
    }

    function setRevenue($revenue) {
        $this->revenue = $revenue;
    }

    function setOther($other) {
        $this->other = $other;
    }

    function setNoBudget($noBudget) {
        $this->noBudget = $noBudget;
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
