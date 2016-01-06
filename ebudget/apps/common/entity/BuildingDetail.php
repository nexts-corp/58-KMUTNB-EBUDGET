<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Building_Detail")
 */
class BuildingDetail extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11,name="BuildingDetailId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BuildingId") */
    public $buildingId;

    /** @Column(type="string",length=200, name="BuildingDesc") */
    public $desc;

    /** @Column(type="string",length=50, name="Unit") */
    public $unit;

    /** @Column(type="string",length=18, name="Quantity") */
    public $quantity;

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

    function getDesc() {
        return $this->desc;
    }

    function getUnit() {
        return $this->unit;
    }

    function getQuantity() {
        return $this->quantity;
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

    function setDesc($desc) {
        $this->desc = $desc;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function setCostUnit($costUnit) {
        $this->costUnit = $costUnit;
    }

    function setCostTotal($costTotal) {
        $this->costTotal = $costTotal;
    }
}
