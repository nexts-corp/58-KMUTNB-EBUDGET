<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_money_salary")
 */
class BudgetMoneySalary extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=2, name="money_type_code") */
    public $moneyTypeCode;

    /** @Column(type="integer",length=11, name="money_type_id") */
    public $moneyTypeId;

    /** @Column(type="integer",length=11, name="plan_id") */
    public $planId;

    /** @Column(type="integer",length=11, name="product_id") */
    public $productId;

    /** @Column(type="integer",length=11, name="lk_fundgroup_id") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="lk_department_id") */
    public $departmentId;

    /** @Column(type="integer",length=11, name="attachment_id") */
    public $attachmentId;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="integer",length=11, name="form_type") */
    public $formType;

    /** @Column(type="string",length=500, name="position_name") */
    public $positionName;

    /** @Column(type="integer",length=11, name="position_occupy") */
    public $positionOccupy;

    /** @Column(type="integer",length=11, name="position_vacancy") */
    public $positionVacancy;

    /** @Column(type="string",length=500, name="rate_no") */
    public $rateNo;

    /** @Column(type="integer",length=11, name="rate_salary") */
    public $rateSalary;

    /** @Column(type="integer",length=11, name="total_salary") */
    public $totalSalary;

    /** @Column(type="text", name="remark") */
    public $remark;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getMoneyTypeCode() {
        return $this->moneyTypeCode;
    }

    function getMoneyTypeId() {
        return $this->moneyTypeId;
    }

    function getPlanId() {
        return $this->planId;
    }

    function getProductId() {
        return $this->productId;
    }

    function getFundgroupId() {
        return $this->fundgroupId;
    }

    function getDepartmentId() {
        return $this->departmentId;
    }

    function getAttachmentId() {
        return $this->attachmentId;
    }

    function getBudgetYear() {
        return $this->budgetYear;
    }

    function getFormType() {
        return $this->formType;
    }

    function getPositionName() {
        return $this->positionName;
    }

    function getPositionOccupy() {
        return $this->positionOccupy;
    }

    function getPositionVacancy() {
        return $this->positionVacancy;
    }

    function getRateNo() {
        return $this->rateNo;
    }

    function getRateSalary() {
        return $this->rateSalary;
    }

    function getTotalSalary() {
        return $this->totalSalary;
    }

    function getRemark() {
        return $this->remark;
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

    function setMoneyTypeCode($moneyTypeCode) {
        $this->moneyTypeCode = $moneyTypeCode;
    }

    function setMoneyTypeId($moneyTypeId) {
        $this->moneyTypeId = $moneyTypeId;
    }

    function setPlanId($planId) {
        $this->planId = $planId;
    }

    function setProductId($productId) {
        $this->productId = $productId;
    }

    function setFundgroupId($fundgroupId) {
        $this->fundgroupId = $fundgroupId;
    }

    function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }

    function setAttachmentId($attachmentId) {
        $this->attachmentId = $attachmentId;
    }

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setFormType($formType) {
        $this->formType = $formType;
    }

    function setPositionName($positionName) {
        $this->positionName = $positionName;
    }

    function setPositionOccupy($positionOccupy) {
        $this->positionOccupy = $positionOccupy;
    }

    function setPositionVacancy($positionVacancy) {
        $this->positionVacancy = $positionVacancy;
    }

    function setRateNo($rateNo) {
        $this->rateNo = $rateNo;
    }

    function setRateSalary($rateSalary) {
        $this->rateSalary = $rateSalary;
    }

    function setTotalSalary($totalSalary) {
        $this->totalSalary = $totalSalary;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
