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

    /** @Column(type="integer",length=11, name="budget_plan_id") */
    public $budgetPlanId;

    /** @Column(type="integer",length=11, name="budget_product_id") */
    public $budgetProductId;

    /** @Column(type="integer",length=11, name="lk_fundgroup_id") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="lk_department_id") */
    public $departmentId;

    /** @Column(type="integer",length=11, name="budget_source") */
    public $budgetSource;

    /** @Column(type="integer",length=11, name="attachment_id") */
    public $attachmentId;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="integer",length=11, name="form_type") */
    public $form_type;

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

    function getBudgetPlanId() {
        return $this->budgetPlanId;
    }

    function getBudgetProductId() {
        return $this->budgetProductId;
    }

    function getFundgroupId() {
        return $this->fundgroupId;
    }

    function getDepartmentId() {
        return $this->departmentId;
    }

    function getBudgetSource() {
        return $this->budgetSource;
    }

    function getAttachmentId() {
        return $this->attachmentId;
    }

    function getBudgetYear() {
        return $this->budgetYear;
    }

    function getForm_type() {
        return $this->form_type;
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

    function setBudgetPlanId($budgetPlanId) {
        $this->budgetPlanId = $budgetPlanId;
    }

    function setBudgetProductId($budgetProductId) {
        $this->budgetProductId = $budgetProductId;
    }

    function setFundgroupId($fundgroupId) {
        $this->fundgroupId = $fundgroupId;
    }

    function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }

    function setBudgetSource($budgetSource) {
        $this->budgetSource = $budgetSource;
    }

    function setAttachmentId($attachmentId) {
        $this->attachmentId = $attachmentId;
    }

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setForm_type($form_type) {
        $this->form_type = $form_type;
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
