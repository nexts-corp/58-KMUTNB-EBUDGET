<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_money_building")
 */
class BudgetMoneyBuilding extends EntityBase {

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

    /** @Column(type="integer",length=11, name="budget_money_durable_id") */
    public $budgetMoneyDurableId;

    /** @Column(type="text", name="name") */
    public $name;

    /** @Column(type="text", name="place") */
    public $place;

    /** @Column(type="text", name="reason") */
    public $reason;

    /** @Column(type="float", name="budget_architecture") */
    public $budgetArchitecture;

    /** @Column(type="float", name="budget_structural") */
    public $budgetStructural;

    /** @Column(type="float", name="budget_electrical_communication") */
    public $budgetElectricalCommunication;

    /** @Column(type="float", name="budget_sanitation") */
    public $budgetSanitation;

    /** @Column(type="float", name="budget_ventilate") */
    public $budgetVentilate;

    /** @Column(type="float", name="budget_elevators") */
    public $budgetElevators;

    /** @Column(type="float", name="total_budget") */
    public $totalBudget;

    /** @Column(type="text", name="area") */
    public $area;

    /** @Column(type="text", name="expected_result") */
    public $expectedResult;

    /** @Column(type="text", name="objective") */
    public $objective;

    /** @Column(type="text", name="goal") */
    public $goal;

    /** @Column(type="string",length=500, name="time_design") */
    public $timeDesign;

    /** @Column(type="string",length=500, name="time_compare_prices") */
    public $timeComparePrices;

    /** @Column(type="string",length=500, name="time_sign_contract") */
    public $timeSignContract;

    /** @Column(type="string",length=500, name="time_operating") */
    public $timeOperating;

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

    function getBudgetMoneyDurableId() {
        return $this->budgetMoneyDurableId;
    }

    function getName() {
        return $this->name;
    }

    function getPlace() {
        return $this->place;
    }

    function getReason() {
        return $this->reason;
    }

    function getBudgetArchitecture() {
        return $this->budgetArchitecture;
    }

    function getBudgetStructural() {
        return $this->budgetStructural;
    }

    function getBudgetElectricalCommunication() {
        return $this->budgetElectricalCommunication;
    }

    function getBudgetSanitation() {
        return $this->budgetSanitation;
    }

    function getBudgetVentilate() {
        return $this->budgetVentilate;
    }

    function getBudgetElevators() {
        return $this->budgetElevators;
    }

    function getTotalBudget() {
        return $this->totalBudget;
    }

    function getArea() {
        return $this->area;
    }

    function getExpectedResult() {
        return $this->expectedResult;
    }

    function getObjective() {
        return $this->objective;
    }

    function getGoal() {
        return $this->goal;
    }

    function getTimeDesign() {
        return $this->timeDesign;
    }

    function getTimeComparePrices() {
        return $this->timeComparePrices;
    }

    function getTimeSignContract() {
        return $this->timeSignContract;
    }

    function getTimeOperating() {
        return $this->timeOperating;
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

    function setBudgetMoneyDurableId($budgetMoneyDurableId) {
        $this->budgetMoneyDurableId = $budgetMoneyDurableId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPlace($place) {
        $this->place = $place;
    }

    function setReason($reason) {
        $this->reason = $reason;
    }

    function setBudgetArchitecture($budgetArchitecture) {
        $this->budgetArchitecture = $budgetArchitecture;
    }

    function setBudgetStructural($budgetStructural) {
        $this->budgetStructural = $budgetStructural;
    }

    function setBudgetElectricalCommunication($budgetElectricalCommunication) {
        $this->budgetElectricalCommunication = $budgetElectricalCommunication;
    }

    function setBudgetSanitation($budgetSanitation) {
        $this->budgetSanitation = $budgetSanitation;
    }

    function setBudgetVentilate($budgetVentilate) {
        $this->budgetVentilate = $budgetVentilate;
    }

    function setBudgetElevators($budgetElevators) {
        $this->budgetElevators = $budgetElevators;
    }

    function setTotalBudget($totalBudget) {
        $this->totalBudget = $totalBudget;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setExpectedResult($expectedResult) {
        $this->expectedResult = $expectedResult;
    }

    function setObjective($objective) {
        $this->objective = $objective;
    }

    function setGoal($goal) {
        $this->goal = $goal;
    }

    function setTimeDesign($timeDesign) {
        $this->timeDesign = $timeDesign;
    }

    function setTimeComparePrices($timeComparePrices) {
        $this->timeComparePrices = $timeComparePrices;
    }

    function setTimeSignContract($timeSignContract) {
        $this->timeSignContract = $timeSignContract;
    }

    function setTimeOperating($timeOperating) {
        $this->timeOperating = $timeOperating;
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
