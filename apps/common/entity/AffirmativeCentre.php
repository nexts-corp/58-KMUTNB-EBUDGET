<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="affirmative_centre")
 */
class AffirmativeCentre extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="integer",length=11, name="main_plan_target_id") */
    public $mainPlanTargetId;

    /** @Column(type="integer",length=11, name="main_plan_kpi_id") */
    public $mainPlanKpiId;

    /** @Column(type="string",length=100, name="no") */
    public $no;

    /** @Column(type="text", name="name") */
    public $name;

    /** @Column(type="string",length=100, name="unit") */
    public $unit;

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

    /** @Column(type="string",length=100, name="weight") */
    public $weight;

    /** @Column(type="boolean",length=1, name="is_education") */
    public $isEducation;

    /** @Column(type="boolean",length=1, name="is_support") */
    public $isSupport;

    /** @Column(type="boolean",length=1, name="is_service") */
    public $isService;

    /** @Column(type="text", name="remark") */
    public $remark;

    /** @Column(type="string",length=100, name="target") */
    public $target;

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

    function getMainPlanTargetId() {
        return $this->mainPlanTargetId;
    }

    function getMainPlanKpiId() {
        return $this->mainPlanKpiId;
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

    function setMainPlanTargetId($mainPlanTargetId) {
        $this->mainPlanTargetId = $mainPlanTargetId;
    }

    function setMainPlanKpiId($mainPlanKpiId) {
        $this->mainPlanKpiId = $mainPlanKpiId;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
