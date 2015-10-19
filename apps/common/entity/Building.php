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

    /** @Column(type="integer",length=11, name="TOTALYEAR") */
    public $totalYear;

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

    /** @Column(type="string",length=18, name="COSTVENTILATE") */
    public $costVen;

    /** @Column(type="string",length=18, name="COSTELEVATORS") */
    public $costElev;

    /** @Column(type="string",length=18, name="COSTTOTAL") */
    public $costTotal;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
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

    function getTotalYear() {
        return $this->totalYear;
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

    function setTotalYear($totalYear) {
        $this->totalYear = $totalYear;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
