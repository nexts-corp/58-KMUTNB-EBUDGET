<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_tracking")
 */
class BudgetTracking extends EntityBase {

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

    /** @Column(type="integer",length=11, name="budget_type_id") */
    public $budgetTypeId;

    /** @Column(type="integer",length=11, name="budget_source") */
    public $budgetSource;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="float", name="budget_quater1_plan") */
    public $budgetQuater1Plan;

    /** @Column(type="float", name="budget_quater1_used") */
    public $budgetQuater1Used;

    /** @Column(type="float", name="budget_quater2_plan") */
    public $budgetQuater2Plan;

    /** @Column(type="float", name="budget_quater2_used") */
    public $budgetQuater2Used;

    /** @Column(type="float", name="budget_quater3_plan") */
    public $budgetQuater3Plan;

    /** @Column(type="float", name="budget_quater3_used") */
    public $budgetQuater3Used;

    /** @Column(type="float", name="budget_quater4_plan") */
    public $budgetQuater4Plan;

    /** @Column(type="float", name="budget_quater4_used") */
    public $budgetQuater4Used;

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

    function getBudgetTypeId() {
        return $this->budgetTypeId;
    }

    function getBudgetSource() {
        return $this->budgetSource;
    }

    function getBudgetYear() {
        return $this->budgetYear;
    }

    function getBudgetQuater1Plan() {
        return $this->budgetQuater1Plan;
    }

    function getBudgetQuater1Used() {
        return $this->budgetQuater1Used;
    }

    function getBudgetQuater2Plan() {
        return $this->budgetQuater2Plan;
    }

    function getBudgetQuater2Used() {
        return $this->budgetQuater2Used;
    }

    function getBudgetQuater3Plan() {
        return $this->budgetQuater3Plan;
    }

    function getBudgetQuater3Used() {
        return $this->budgetQuater3Used;
    }

    function getBudgetQuater4Plan() {
        return $this->budgetQuater4Plan;
    }

    function getBudgetQuater4Used() {
        return $this->budgetQuater4Used;
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

    function setBudgetTypeId($budgetTypeId) {
        $this->budgetTypeId = $budgetTypeId;
    }

    function setBudgetSource($budgetSource) {
        $this->budgetSource = $budgetSource;
    }

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setBudgetQuater1Plan($budgetQuater1Plan) {
        $this->budgetQuater1Plan = $budgetQuater1Plan;
    }

    function setBudgetQuater1Used($budgetQuater1Used) {
        $this->budgetQuater1Used = $budgetQuater1Used;
    }

    function setBudgetQuater2Plan($budgetQuater2Plan) {
        $this->budgetQuater2Plan = $budgetQuater2Plan;
    }

    function setBudgetQuater2Used($budgetQuater2Used) {
        $this->budgetQuater2Used = $budgetQuater2Used;
    }

    function setBudgetQuater3Plan($budgetQuater3Plan) {
        $this->budgetQuater3Plan = $budgetQuater3Plan;
    }

    function setBudgetQuater3Used($budgetQuater3Used) {
        $this->budgetQuater3Used = $budgetQuater3Used;
    }

    function setBudgetQuater4Plan($budgetQuater4Plan) {
        $this->budgetQuater4Plan = $budgetQuater4Plan;
    }

    function setBudgetQuater4Used($budgetQuater4Used) {
        $this->budgetQuater4Used = $budgetQuater4Used;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
