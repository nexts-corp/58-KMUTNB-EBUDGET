<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="revenue_product")
 */
class RevenueProduct extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="plan_id") */
    public $planId;

    /** @Column(type="string",length=255, name="product_name") */
    public $productName;

    /** @Column(type="integer",length=11, name="type") */
    public $type;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

}

function getId() {
    return $this->id;
}

function getPlanId() {
    return $this->planId;
}

function getProductName() {
    return $this->productName;
}

function getType() {
    return $this->type;
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

function setPlanId($planId) {
    $this->planId = $planId;
}

function setProductName($productName) {
    $this->productName = $productName;
}

function setType($type) {
    $this->type = $type;
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

?>