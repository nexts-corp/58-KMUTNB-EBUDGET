<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Building_Floor_Plan")
 */
class BuildingFloorPlan extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11,name="BuildingFloorPlanId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BuildingId") */
    public $buildingId;

    /** @Column(type="string",length=50, name="FloorNo") */
    public $floorNo;

    /** @Column(type="text", name="FloorDesc") */
    public $floorDesc;

    /** @Column(type="string",length=100, name="Area") */
    public $area;

    /** @Column(type="string",length=18, name="CostPerUnit") */
    public $costUnit;

    /** @Column(type="string",length=18, name="CostTotal") */
    public $costTotal;

    function getId() {
        return $this->id;
    }

    function getBuildingId() {
        return $this->buildingId;
    }

    function getFloorNo() {
        return $this->floorNo;
    }

    function getFloorDesc() {
        return $this->floorDesc;
    }

    function getArea() {
        return $this->area;
    }

    function getCostUnit() {
        return $this->costUnit;
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

    function setFloorNo($floorNo) {
        $this->floorNo = $floorNo;
    }

    function setFloorDesc($floorDesc) {
        $this->floorDesc = $floorDesc;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setCostUnit($costUnit) {
        $this->costUnit = $costUnit;
    }

    function setCostTotal($costTotal) {
        $this->costTotal = $costTotal;
    }
}
