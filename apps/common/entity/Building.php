<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUILDING")
 */
class Building extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BUILDINGID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUDGET145ID") */
    public $bg145Id;

    /** @Column(type="integer",length=11, name="BUILDINGTYPE") */
    public $typeId;

    /** @Column(type="string",length=1000, name="NAME") */
    public $name;

    /** @Column(type="string",length=500, name="PLACE") */
    public $place;

    /** @Column(type="text", name="RATIONALE") */
    public $rationale;

    /** @Column(type="text", name="OBJECTIVE") */
    public $objective;

    /** @Column(type="text", name="GOAL") */
    public $goal;

    /** @Column(type="string",length=500, name="AREA") */
    public $area;

    /** @Column(type="string",length=300, name="TIMEDESIGN") */
    public $timeDesign;

    /** @Column(type="string",length=300, name="TIMEBID") */
    public $timeBid;

    /** @Column(type="string",length=300, name="TIMESIGNCONTRACT") */
    public $timeContract;

    /** @Column(type="string",length=300, name="TIMEOPERATING") */
    public $timeOperate;

    /** @Column(type="string",length=18, name="COSTARCHITECTURE") */
    public $costAchitec;

    /** @Column(type="string",length=18, name="COSTSTRUCTURAL") */
    public $costStruct;

    /** @Column(type="string",length=18, name="COSTELECTRICAL") */
    public $costElec;

    /** @Column(type="string",length=18, name="COSTSANITATION") */
    public $costSanit;

    /** @Column(type="string",length=18, name="COSTELEVATORS") */
    public $costElev;

    /** @Column(type="string",length=18, name="COSTTOTAL") */
    public $costTotal;

    /** @Column(type="integer",length=11, name="PH1BUDGETYEAR") */
    public $ph1BudgetYear;

    /** @Column(type="integer",length=11, name="PH1BUDGETWORK") */
    public $ph1BudgetWork;

    /** @Column(type="string",length=18, name="PH1BUDGETAMOUNT") */
    public $ph1BudgetAmount;

    /** @Column(type="integer",length=11, name="PH2BUDGETYEAR") */
    public $ph2BudgetYear;

    /** @Column(type="integer",length=11, name="PH2BUDGETWORK") */
    public $ph2BudgetWork;

    /** @Column(type="string",length=18, name="PH2BUDGETAMOUNT") */
    public $ph2BudgetAmount;

    /** @Column(type="integer",length=11, name="PH3BUDGETYEAR") */
    public $ph3BudgetYear;

    /** @Column(type="integer",length=11, name="PH3BUDGETWORK") */
    public $ph3BudgetWork;

    /** @Column(type="string",length=18, name="PH3BUDGETAMOUNT") */
    public $ph3BudgetAmount;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBg145Id() {
        return $this->bg145Id;
    }

    function getTypeId() {
        return $this->typeId;
    }

    function getName() {
        return $this->name;
    }

    function getPlace() {
        return $this->place;
    }

    function getRationale() {
        return $this->rationale;
    }

    function getObjective() {
        return $this->objective;
    }

    function getGoal() {
        return $this->goal;
    }

    function getArea() {
        return $this->area;
    }

    function getTimeDesign() {
        return $this->timeDesign;
    }

    function getTimeBid() {
        return $this->timeBid;
    }

    function getTimeContract() {
        return $this->timeContract;
    }

    function getTimeOperate() {
        return $this->timeOperate;
    }

    function getCostAchitec() {
        return $this->costAchitec;
    }

    function getCostStruct() {
        return $this->costStruct;
    }

    function getCostElec() {
        return $this->costElec;
    }

    function getCostSanit() {
        return $this->costSanit;
    }

    function getCostElev() {
        return $this->costElev;
    }

    function getCostTotal() {
        return $this->costTotal;
    }

    function getPh1BudgetYear() {
        return $this->ph1BudgetYear;
    }

    function getPh1BudgetWork() {
        return $this->ph1BudgetWork;
    }

    function getPh1BudgetAmount() {
        return $this->ph1BudgetAmount;
    }

    function getPh2BudgetYear() {
        return $this->ph2BudgetYear;
    }

    function getPh2BudgetWork() {
        return $this->ph2BudgetWork;
    }

    function getPh2BudgetAmount() {
        return $this->ph2BudgetAmount;
    }

    function getPh3BudgetYear() {
        return $this->ph3BudgetYear;
    }

    function getPh3BudgetWork() {
        return $this->ph3BudgetWork;
    }

    function getPh3BudgetAmount() {
        return $this->ph3BudgetAmount;
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

    function setBg145Id($bg145Id) {
        $this->bg145Id = $bg145Id;
    }

    function setTypeId($typeId) {
        $this->typeId = $typeId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPlace($place) {
        $this->place = $place;
    }

    function setRationale($rationale) {
        $this->rationale = $rationale;
    }

    function setObjective($objective) {
        $this->objective = $objective;
    }

    function setGoal($goal) {
        $this->goal = $goal;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setTimeDesign($timeDesign) {
        $this->timeDesign = $timeDesign;
    }

    function setTimeBid($timeBid) {
        $this->timeBid = $timeBid;
    }

    function setTimeContract($timeContract) {
        $this->timeContract = $timeContract;
    }

    function setTimeOperate($timeOperate) {
        $this->timeOperate = $timeOperate;
    }

    function setCostAchitec($costAchitec) {
        $this->costAchitec = $costAchitec;
    }

    function setCostStruct($costStruct) {
        $this->costStruct = $costStruct;
    }

    function setCostElec($costElec) {
        $this->costElec = $costElec;
    }

    function setCostSanit($costSanit) {
        $this->costSanit = $costSanit;
    }

    function setCostElev($costElev) {
        $this->costElev = $costElev;
    }

    function setCostTotal($costTotal) {
        $this->costTotal = $costTotal;
    }

    function setPh1BudgetYear($ph1BudgetYear) {
        $this->ph1BudgetYear = $ph1BudgetYear;
    }

    function setPh1BudgetWork($ph1BudgetWork) {
        $this->ph1BudgetWork = $ph1BudgetWork;
    }

    function setPh1BudgetAmount($ph1BudgetAmount) {
        $this->ph1BudgetAmount = $ph1BudgetAmount;
    }

    function setPh2BudgetYear($ph2BudgetYear) {
        $this->ph2BudgetYear = $ph2BudgetYear;
    }

    function setPh2BudgetWork($ph2BudgetWork) {
        $this->ph2BudgetWork = $ph2BudgetWork;
    }

    function setPh2BudgetAmount($ph2BudgetAmount) {
        $this->ph2BudgetAmount = $ph2BudgetAmount;
    }

    function setPh3BudgetYear($ph3BudgetYear) {
        $this->ph3BudgetYear = $ph3BudgetYear;
    }

    function setPh3BudgetWork($ph3BudgetWork) {
        $this->ph3BudgetWork = $ph3BudgetWork;
    }

    function setPh3BudgetAmount($ph3BudgetAmount) {
        $this->ph3BudgetAmount = $ph3BudgetAmount;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
