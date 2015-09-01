<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_money_durable")
 */
class BudgetMoneyDurable extends EntityBase {

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
    public $formType;

    /** @Column(type="string",length=2, name="money_type_code") */
    public $moneyTypeCode;

    /** @Column(type="integer",length=11, name="money_type_id") */
    public $moneyTypeId;

    /** @Column(type="text", name="durable_name") */
    public $name;

    /** @Column(type="integer",length=11, name="qty") */
    public $qty;

    /** @Column(type="float", name="price") */
    public $price;

    /** @Column(type="float", name="total_price") */
    public $total_price;

    /** @Column(type="integer",length=11, name="total_needed") */
    public $total_needed;

    /** @Column(type="boolean",length=1, name="is_available") */
    public $isAvailable;

    /** @Column(type="integer",length=11, name="qty_workable") */
    public $qtyWorkable;

    /** @Column(type="integer",length=11, name="qty_unworkable") */
    public $qtyUnworkable;

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

    function getFormType() {
        return $this->formType;
    }

    function getMoneyTypeCode() {
        return $this->moneyTypeCode;
    }

    function getMoneyTypeId() {
        return $this->moneyTypeId;
    }

    function getName() {
        return $this->name;
    }

    function getQty() {
        return $this->qty;
    }

    function getPrice() {
        return $this->price;
    }

    function getTotal_price() {
        return $this->total_price;
    }

    function getTotal_needed() {
        return $this->total_needed;
    }

    function getIsAvailable() {
        return $this->isAvailable;
    }

    function getQtyWorkable() {
        return $this->qtyWorkable;
    }

    function getQtyUnworkable() {
        return $this->qtyUnworkable;
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

    function setFormType($formType) {
        $this->formType = $formType;
    }

    function setMoneyTypeCode($moneyTypeCode) {
        $this->moneyTypeCode = $moneyTypeCode;
    }

    function setMoneyTypeId($moneyTypeId) {
        $this->moneyTypeId = $moneyTypeId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setQty($qty) {
        $this->qty = $qty;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setTotal_price($total_price) {
        $this->total_price = $total_price;
    }

    function setTotal_needed($total_needed) {
        $this->total_needed = $total_needed;
    }

    function setIsAvailable($isAvailable) {
        $this->isAvailable = $isAvailable;
    }

    function setQtyWorkable($qtyWorkable) {
        $this->qtyWorkable = $qtyWorkable;
    }

    function setQtyUnworkable($qtyUnworkable) {
        $this->qtyUnworkable = $qtyUnworkable;
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
