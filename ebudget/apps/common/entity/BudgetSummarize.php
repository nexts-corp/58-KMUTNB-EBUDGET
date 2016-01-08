<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Summarize")
 */
class BudgetSummarize extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BudgetPeriodId") */
    public $bgPeriodId;

    /** @Column(type="integer",length=11, name="BudgetTypeId") */
    public $bgTypeId;

    /** @Column(type="integer",length=11, name="DepartmentId") */
    public $deptId;

    /** @Column(type="string",length=1, name="BudgetTypeCode") */
    public $bgTypeCode;

    /** @Column(type="string",length=18, name="BudgetBeforeReview") */
    public $bgBeforeReview;

    /** @Column(type="string",length=18, name="BudgetAfterReview") */
    public $bgAfterReview;

    /** @Column(type="string",length=18, name="BudgetFinal") */
    public $bgFinal;

    public $budget;
    function getId() {
        return $this->id;
    }

    function getBgPeriodId() {
        return $this->bgPeriodId;
    }

    function getBgTypeId() {
        return $this->bgTypeId;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function getBgTypeCode() {
        return $this->bgTypeCode;
    }

    function getBgBeforeReview() {
        return $this->bgBeforeReview;
    }

    function getBgAfterReview() {
        return $this->bgAfterReview;
    }

    function getBgFinal() {
        return $this->bgFinal;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBgPeriodId($bgPeriodId) {
        $this->bgPeriodId = $bgPeriodId;
    }

    function setBgTypeId($bgTypeId) {
        $this->bgTypeId = $bgTypeId;
    }

    function setDeptId($deptId) {
        $this->deptId = $deptId;
    }

    function setBgTypeCode($bgTypeCode) {
        $this->bgTypeCode = $bgTypeCode;
    }

    function setBgBeforeReview($bgBeforeReview) {
        $this->bgBeforeReview = $bgBeforeReview;
    }

    function setBgAfterReview($bgAfterReview) {
        $this->bgAfterReview = $bgAfterReview;
    }

    function setBgFinal($bgFinal) {
        $this->bgFinal = $bgFinal;
    }
}
