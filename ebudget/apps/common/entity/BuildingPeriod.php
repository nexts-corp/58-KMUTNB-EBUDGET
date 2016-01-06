<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Building_Period")
 */
class BuildingPeriod extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11,name="BuildingPeriodId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BuildingId") */
    public $buildingId;

    /** @Column(type="integer",length=11, name="BudgetPeriodId") */
    public $budgetPeriodId;

    /** @Column(type="integer",length=11, name="PhaseNo") */
    public $phaseNo;

    /** @Column(type="string",length=18, name="CostTotal") */
    public $costTotal;

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
}
