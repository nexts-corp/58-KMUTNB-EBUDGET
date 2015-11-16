<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUILDING_DETAIL")
 */
class BuildingDetail extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11,name="BUILDINGDETAILID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUILDINGID") */
    public $buildingId;

    /** @Column(type="string",length=200, name="BUILDINGDESC") */
    public $desc;

    /** @Column(type="string",length=50, name="UNIT") */
    public $unit;

    /** @Column(type="string",length=18, name="QUANTITY") */
    public $quantity;

    /** @Column(type="string",length=18, name="COSTPERUNIT") */
    public $costUnit;

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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
