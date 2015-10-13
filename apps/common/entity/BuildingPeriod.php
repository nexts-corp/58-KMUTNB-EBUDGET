<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUILDING_PERIOD")
 */
class BuildingPeriod extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11,name="BUILDINGFLOORPLANID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUILDINGID") */
    public $buildingId;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $budgetPeriodId;

    /** @Column(type="integer",length=11, name="PHASENO") */
    public $phaseNo;

    /** @Column(type="string",length=18, name="COSTTOTAL") */
    public $costTotal;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBuildingId() {
        return $this->buildingId;
    }

    function getBudgetPeriodId() {
        return $this->budgetPeriodId;
    }

    function getPhaseNo() {
        return $this->phaseNo;
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

    function setBuildingId($buildingId) {
        $this->buildingId = $buildingId;
    }

    function setBudgetPeriodId($budgetPeriodId) {
        $this->budgetPeriodId = $budgetPeriodId;
    }

    function setPhaseNo($phaseNo) {
        $this->phaseNo = $phaseNo;
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
