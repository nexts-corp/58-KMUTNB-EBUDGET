<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="affirmative_target")
 */
class AffirmativeTarget extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="integer",length=11, name="lk_faculty_id") */
    public $facultyId;

    /** @Column(type="integer",length=11, name="main_plan_target_id") */
    public $mainPlanTargetId;

    /** @Column(type="integer",length=11, name="main_plan_kpi_id") */
    public $mainPlanKpiId;

    /** @Column(type="boolean",length=1, name="is_work") */
    public $isWork;

    /** @Column(type="string",length=100, name="no") */
    public $no;

    /** @Column(type="text", name="name") */
    public $name;

    /** @Column(type="string",length=100, name="unit") */
    public $unit;

    /** @Column(type="string",length=100, name="eeight") */
    public $weight;

    /** @Column(type="string",length=100, name="target") */
    public $target;

    /** @Column(type="string",length=100, name="score1") */
    public $score1;

    /** @Column(type="string",length=100, name="score2") */
    public $score2;

    /** @Column(type="string",length=100, name="score3") */
    public $score3;

    /** @Column(type="string",length=100, name="score4") */
    public $score4;

    /** @Column(type="string",length=100, name="score5") */
    public $score5;

    /** @Column(type="text", name="remark") */
    public $remark;

    /** @Column(type="boolean",length=1, name="is_approve") */
    public $isApprove;

    /** @Column(type="boolean",length=1, name="is_cancel") */
    public $isCancel;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBudgetYear() {
        return $this->budgetYear;
    }

    function getFacultyId() {
        return $this->facultyId;
    }

    function getMainPlanTargetId() {
        return $this->mainPlanTargetId;
    }

    function getMainPlanKpiId() {
        return $this->mainPlanKpiId;
    }

    function getIsWork() {
        return $this->isWork;
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

    function getWeight() {
        return $this->weight;
    }

    function getTarget() {
        return $this->target;
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

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setFacultyId($facultyId) {
        $this->facultyId = $facultyId;
    }

    function setMainPlanTargetId($mainPlanTargetId) {
        $this->mainPlanTargetId = $mainPlanTargetId;
    }

    function setMainPlanKpiId($mainPlanKpiId) {
        $this->mainPlanKpiId = $mainPlanKpiId;
    }

    function setIsWork($isWork) {
        $this->isWork = $isWork;
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

    function setWeight($weight) {
        $this->weight = $weight;
    }

    function setTarget($target) {
        $this->target = $target;
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
