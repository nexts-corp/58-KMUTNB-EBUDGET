<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Draft")
 */
class AffirmativeDraft extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeDraftId")
     * @GeneratedValue
     */
    public $draftId;

    /** @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /** @Column(type="integer",length=11,name="DepartmentId") */
    public $departmentId;

    /** @Column(type="integer",length=11,name="AffirmativeMainId") */
    public $mainId;

    /** @Column(type="integer",length=11, name="AffirmativeMainSeq") */
    public $mainSeq;

    /** @Column(type="integer",length=11,name="AffirmativeTypeId") */
    public $typeId;

    /** @Column(type="integer",length=11, name="AffirmativeTypeSeq") */
    public $typeSeq;

    /** @Column(type="string",length=1, name="HasIssue") */
    public $hasIssue;

    /** @Column(type="integer",length=11,name="AffirmativeIssueId") */
    public $issueId;

    /** @Column(type="integer",length=11, name="AffirmativeIssueSeq") */
    public $issueSeq;

    /** @Column(type="integer",length=11, name="AffirmativeTargetId") */
    public $targetId;

    /** @Column(type="integer",length=11, name="AffirmativeTargetSeq") */
    public $targetSeq;

    /** @Column(type="integer",length=11, name="AffirmativeKpiId") */
    public $kpiId;

    /** @Column(type="integer",length=11, name="AffirmativeKpiSeq") */
    public $kpiSeq;

    /** @Column(type="string",length=255, name="AffirmativeKpiName") */
    public $kpiName;

    /** @Column(type="integer",length=11, name="AffirmativeUnitId") */
    public $unitId;

    /** @Column(type="string",length=255, name="AffirmativeUnitName") */
    public $unitName;

    /** @Column(type="string",length=255, name="KpiGoal") */
    public $kpiGoal;

    /** @Column(type="string",length=255, name="Score1") */
    public $score1;

    /** @Column(type="string",length=255, name="Score2") */
    public $score2;

    /** @Column(type="string",length=255, name="Score3") */
    public $score3;

    /** @Column(type="string",length=255, name="Score4") */
    public $score4;

    /** @Column(type="string",length=255, name="Score5") */
    public $score5;

    /** @Column(type="string",length=255, name="Remark") */
    public $remark;

    /** @Column(type="string",length=10, name="IsApprove") */
    public $isApprove;

    /** @Column(type="string",length=10, name="IsCenter") */
    public $isCenter;

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

    function getMainId() {
        return $this->mainId;
    }

    function getMainSeq() {
        return $this->mainSeq;
    }

    function getTypeId() {
        return $this->typeId;
    }

    function getTypeSeq() {
        return $this->typeSeq;
    }

    function getHasIssue() {
        return $this->hasIssue;
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

    function getKpiId() {
        return $this->kpiId;
    }

    function getKpiSeq() {
        return $this->kpiSeq;
    }

    function getKpiName() {
        return $this->kpiName;
    }

    function getUnitId() {
        return $this->unitId;
    }

    function getUnitName() {
        return $this->unitName;
    }

    function getKpiGoal() {
        return $this->kpiGoal;
    }

    function getScore1() {
        return $this->score1;
    }

    function getScore2() {
        return $this->score2;
    }

    function getScore3() {
        return $this->score3;
    }

    function getScore4() {
        return $this->score4;
    }

    function getScore5() {
        return $this->score5;
    }

    function getRemark() {
        return $this->remark;
    }

    function getIsApprove() {
        return $this->isApprove;
    }

    function getIsCenter() {
        return $this->isCenter;
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

    function setMainId($mainId) {
        $this->mainId = $mainId;
    }

    function setMainSeq($mainSeq) {
        $this->mainSeq = $mainSeq;
    }

    function setTypeId($typeId) {
        $this->typeId = $typeId;
    }

    function setTypeSeq($typeSeq) {
        $this->typeSeq = $typeSeq;
    }

    function setHasIssue($hasIssue) {
        $this->hasIssue = $hasIssue;
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

    function setKpiId($kpiId) {
        $this->kpiId = $kpiId;
    }

    function setKpiSeq($kpiSeq) {
        $this->kpiSeq = $kpiSeq;
    }

    function setKpiName($kpiName) {
        $this->kpiName = $kpiName;
    }

    function setUnitId($unitId) {
        $this->unitId = $unitId;
    }

    function setUnitName($unitName) {
        $this->unitName = $unitName;
    }

    function setKpiGoal($kpiGoal) {
        $this->kpiGoal = $kpiGoal;
    }

    function setScore1($score1) {
        $this->score1 = $score1;
    }

    function setScore2($score2) {
        $this->score2 = $score2;
    }

    function setScore3($score3) {
        $this->score3 = $score3;
    }

    function setScore4($score4) {
        $this->score4 = $score4;
    }

    function setScore5($score5) {
        $this->score5 = $score5;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setIsApprove($isApprove) {
        $this->isApprove = $isApprove;
    }

    function setIsCenter($isCenter) {
        $this->isCenter = $isCenter;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

}
