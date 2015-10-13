<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUILDING_BOQ")
 */
class BuildingBOQ extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11,name="BUILDINGBOQID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUILDINGID") */
    public $buildingId;

    /** @Column(type="string",length=300, name="NAME") */
    public $name;

    /** @Column(type="string",length=18, name="QUANTITY") */
    public $quantity;

    /** @Column(type="string",length=50, name="UNIT") */
    public $unit;

    /** @Column(type="string",length=18, name="MATERIALPERUNIT") */
    public $materialUnit;

    /** @Column(type="string",length=18, name="MATERIALTOTAL") */
    public $materialTotal;

    /** @Column(type="string",length=18, name="WAGEPERUNIT") */
    public $wageUnit;

    /** @Column(type="string",length=18, name="WAGETOTAL") */
    public $wageTotal;

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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
