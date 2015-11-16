<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="AFFIRMATIVEPLANTARGET")
 */
class AffirmativePlanTarget extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AFFIRMATIVEPLANTARGETID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $budgetPeriodId;

    /** @Column(type="integer",length=11, name="DEPARTMENTID") */
    public $deptId;

    /** @Column(type="integer",length=11, name="AFFIRMATIVETARGETID") */
    public $affTargetId;

    /** @Column(type="integer",length=11, name="AFFIRMATIVEKPIID") */
    public $affKpiId;

    /** @Column(type="string",length=100, name="NO") */
    public $no;

    /** @Column(type="text", name="NAME") */
    public $name;

    /** @Column(type="string",length=100, name="UNIT") */
    public $unit;

    /** @Column(type="string",length=100, name="SCORE1") */
    public $score1;

    /** @Column(type="string",length=100, name="SCORE2") */
    public $score2;

    /** @Column(type="string",length=100, name="SCORE3") */
    public $score3;

    /** @Column(type="string",length=100, name="SCORE4") */
    public $score4;

    /** @Column(type="string",length=100, name="SCORE5") */
    public $score5;

    /** @Column(type="string",length=100, name="WEIGHT") */
    public $weight;

    /** @Column(type="boolean", name="ISEDUCATION") */
    public $isEducation;

    /** @Column(type="boolean", name="ISSUPPORT") */
    public $isSupport;

    /** @Column(type="boolean", name="ISSERVICE") */
    public $isService;

    /** @Column(type="boolean", name="REMARK") */
    public $remark;

    /** @Column(type="string",length=100, name="TARGET") */
    public $target;

    /** @Column(type="boolean", name="ISAPPROVE") */
    public $isApprove;

    /** @Column(type="boolean", name="ISCANCEL") */
    public $isCancel;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBudgetPeriodId() {
        return $this->budgetPeriodId;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function getAffTargetId() {
        return $this->affTargetId;
    }

    function getAffKpiId() {
        return $this->affKpiId;
    }

    function getNo() {
        return $this->no;
    }

    function getName() {
        return $this->name;
    }

    function getUnit() {
        return $this->unit;
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

    function getWeight() {
        return $this->weight;
    }

    function getIsEducation() {
        return $this->isEducation;
    }

    function getIsSupport() {
        return $this->isSupport;
    }

    function getIsService() {
        return $this->isService;
    }

    function getRemark() {
        return $this->remark;
    }

    function getTarget() {
        return $this->target;
    }

    function getIsApprove() {
        return $this->isApprove;
    }

    function getIsCancel() {
        return $this->isCancel;
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

    function setBudgetPeriodId($budgetPeriodId) {
        $this->budgetPeriodId = $budgetPeriodId;
    }

    function setDeptId($deptId) {
        $this->deptId = $deptId;
    }

    function setAffTargetId($affTargetId) {
        $this->affTargetId = $affTargetId;
    }

    function setAffKpiId($affKpiId) {
        $this->affKpiId = $affKpiId;
    }

    function setNo($no) {
        $this->no = $no;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setUnit($unit) {
        $this->unit = $unit;
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

    function setWeight($weight) {
        $this->weight = $weight;
    }

    function setIsEducation($isEducation) {
        $this->isEducation = $isEducation;
    }

    function setIsSupport($isSupport) {
        $this->isSupport = $isSupport;
    }

    function setIsService($isService) {
        $this->isService = $isService;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setTarget($target) {
        $this->target = $target;
    }

    function setIsApprove($isApprove) {
        $this->isApprove = $isApprove;
    }

    function setIsCancel($isCancel) {
        $this->isCancel = $isCancel;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
