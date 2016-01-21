<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Building")
 */
class Building extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BuildingId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="Budget145Id") */
    public $bg145Id;

    /** @Column(type="integer",length=11, name="BuildingType") */
    public $typeId;

    /** @Column(type="integer",length=11, name="TotalYear") */
    public $totalYear;

    /** @Column(type="string",length=1000, name="Name") */
    public $name;

    /** @Column(type="string",length=500, name="Place") */
    public $place;

    /** @Column(type="text", name="Rationale") */
    public $rationale;

    /** @Column(type="text", name="Objective") */
    public $objective;

    /** @Column(type="text", name="Goal") */
    public $goal;

    /** @Column(type="string",length=500, name="Area") */
    public $area;

    /** @Column(type="string",length=300, name="TimeDesign") */
    public $timeDesign;

    /** @Column(type="string",length=300, name="TimeBid") */
    public $timeBid;

    /** @Column(type="string",length=300, name="TimeSignContract") */
    public $timeContract;

    /** @Column(type="string",length=300, name="TimeOperating") */
    public $timeOperate;

    /** @Column(type="string",length=18, name="CostArchitecture") */
    public $costAchitec;

    /** @Column(type="string",length=18, name="CostStructural") */
    public $costStruct;

    /** @Column(type="string",length=18, name="CostElectrical") */
    public $costElec;

    /** @Column(type="string",length=18, name="CostSanitation") */
    public $costSanit;

    /** @Column(type="string",length=18, name="CostVentilate") */
    public $costVen;

    /** @Column(type="string",length=18, name="CostElevators") */
    public $costElev;

    /** @Column(type="string",length=18, name="CostTotal") */
    public $costTotal;

    /** @Column(type="string",length=20, name="GeoType") */
    public $geoType;

    /** @Column(type="integer",length=11, name="AttachmentId") */
    public $attachmentId;

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

    public function getCostVen()
    {
        return $this->costVen;
    }


    public function setCostVen($costVen)
    {
        $this->costVen = $costVen;
    }


    public function getGeoType()
    {
        return $this->geoType;
    }


    public function setGeoType($geoType)
    {
        $this->geoType = $geoType;
    }


    public function getAttachmentId()
    {
        return $this->attachmentId;
    }

    public function setAttachmentId($attachmentId)
    {
        $this->attachmentId = $attachmentId;
    }


}
