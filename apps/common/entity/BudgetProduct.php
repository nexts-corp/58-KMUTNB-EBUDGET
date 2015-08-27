<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_product")
 */
class BudgetProduct extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="budget_plan_id") */
    public $budgetPlanId;

    /** @Column(type="string",length=255, name="product_name") */
    public $productName;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

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

    function getProductName() {
        return $this->productName;
    }

    function getBudgetYear() {
        return $this->budgetYear;
    }

    function getIsActive() {
        return $this->isActive;
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

    function setProductName($productName) {
        $this->productName = $productName;
    }

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
