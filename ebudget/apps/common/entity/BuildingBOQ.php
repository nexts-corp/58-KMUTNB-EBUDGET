<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Building_BOQ")
 */
class BuildingBOQ extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11,name="BuildingBOQId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BuildingId") */
    public $buildingId;

    /** @Column(type="string",length=300, name="Name") */
    public $name;

    /** @Column(type="string",length=18, name="Quantity") */
    public $quantity;

    /** @Column(type="string",length=50, name="Unit") */
    public $unit;

    /** @Column(type="string",length=18, name="MaterialPerUnit") */
    public $materialUnit;

    /** @Column(type="string",length=18, name="MaterialTotal") */
    public $materialTotal;

    /** @Column(type="string",length=18, name="WagePerUnit") */
    public $wageUnit;

    /** @Column(type="string",length=18, name="WageTotal") */
    public $wageTotal;

    function getId() {
        return $this->id;
    }

    function getBuildingId() {
        return $this->buildingId;
    }

    function getName() {
        return $this->name;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function getUnit() {
        return $this->unit;
    }

    function getMaterialUnit() {
        return $this->materialUnit;
    }

    function getMaterialTotal() {
        return $this->materialTotal;
    }

    function getWageUnit() {
        return $this->wageUnit;
    }

    function getWageTotal() {
        return $this->wageTotal;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBuildingId($buildingId) {
        $this->buildingId = $buildingId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setMaterialUnit($materialUnit) {
        $this->materialUnit = $materialUnit;
    }

    function setMaterialTotal($materialTotal) {
        $this->materialTotal = $materialTotal;
    }

    function setWageUnit($wageUnit) {
        $this->wageUnit = $wageUnit;
    }

    function setWageTotal($wageTotal) {
        $this->wageTotal = $wageTotal;
    }
}
