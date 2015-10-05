<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUILDINGDETAIL")
 */
class BuildingDetail extends EntityBase
{

    /**
     * @Id
     * @Column(type="integer",length=11,name="BUILDINGDETAILID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUILDINGID") */
    public $buildingId;

    /** @Column(type="string",length=1000, name="FLOORNO") */
    public $floorNo;

    /** @Column(type="text", name="FLOOORDESC") */
    public $floorDesc;

    /** @Column(type="string",length=100, name="UNIT") */
    public $unit;

    /** @Column(type="string",length=100, name="MATERIALPERUNIT") */
    public $matUnit;

    /** @Column(type="string",length=100, name="MATERIALTOTAL") */
    public $matTotal;

    /** @Column(type="string",length=100, name="WAGEPERUNIT") */
    public $wegUnit;

    /** @Column(type="string",length=100, name="WAGETOTAL") */
    public $wegTotal;

    /** @Column(type="string",length=100, name="QUANTITY") */
    public $quantity;

    /** @Column(type="string",length=100, name="AREA") */
    public $area;

    /** @Column(type="string",length=18, name="COSTPERUNIT") */
    public $costUnit;

    /** @Column(type="string",length=18, name="COSTTOTAL") */
    public $costTotal;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId()
    {
        return $this->id;
    }

    function getBuildingId()
    {
        return $this->buildingId;
    }

    function getFloorNo()
    {
        return $this->floorNo;
    }

    function getFloorDesc()
    {
        return $this->floorDesc;
    }

    function getArea()
    {
        return $this->area;
    }

    function getCostUnit()
    {
        return $this->costUnit;
    }

    function getCostTotal()
    {
        return $this->costTotal;
    }

    function getCreator()
    {
        return $this->creator;
    }

    function getUpdater()
    {
        return $this->updater;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setBuildingId($buildingId)
    {
        $this->buildingId = $buildingId;
    }

    function setFloorNo($floorNo)
    {
        $this->floorNo = $floorNo;
    }

    function setFloorDesc($floorDesc)
    {
        $this->floorDesc = $floorDesc;
    }

    function setArea($area)
    {
        $this->area = $area;
    }

    function setCostUnit($costUnit)
    {
        $this->costUnit = $costUnit;
    }

    function setCostTotal($costTotal)
    {
        $this->costTotal = $costTotal;
    }

    function setCreator($creator)
    {
        $this->creator = $creator;
    }

    function setUpdater($updater)
    {
        $this->updater = $updater;
    }

}
