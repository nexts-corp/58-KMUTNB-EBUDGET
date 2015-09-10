<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_money_utility")
 */
class BudgetMoneyUtility extends EntityBase {

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

    /** @Column(type="string",length=500, name="utility_name") */
    public $name;

    /** @Column(type="integer",length=11, name="budget_request") */
    public $budgetRequest;

    /** @Column(type="integer",length=11, name="budget_history") */
    public $budgetHistory;

    /** @Column(type="integer",length=11, name="nonbudget_request") */
    public $nonbudgetRequest;

    /** @Column(type="integer",length=11, name="nonbudget_history") */
    public $nonbudgetHistory;

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

    function getName() {
        return $this->name;
    }

    function getBudgetRequest() {
        return $this->budgetRequest;
    }

    function getBudgetHistory() {
        return $this->budgetHistory;
    }

    function getNonbudgetRequest() {
        return $this->nonbudgetRequest;
    }

    function getNonbudgetHistory() {
        return $this->nonbudgetHistory;
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

    function setName($name) {
        $this->name = $name;
    }

    function setBudgetRequest($budgetRequest) {
        $this->budgetRequest = $budgetRequest;
    }

    function setBudgetHistory($budgetHistory) {
        $this->budgetHistory = $budgetHistory;
    }

    function setNonbudgetRequest($nonbudgetRequest) {
        $this->nonbudgetRequest = $nonbudgetRequest;
    }

    function setNonbudgetHistory($nonbudgetHistory) {
        $this->nonbudgetHistory = $nonbudgetHistory;
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
