<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_money_building_continue_list")
 */
class BudgetMoneyBuildingContinueList extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="budget_money_building_id") */
    public $buildingId;

    /** @Column(type="integer",length=11, name="floor_no") */
    public $floorNo;

    /** @Column(type="string",length=500, name="floor_desc") */
    public $floorDesc;

    /** @Column(type="integer",length=11, name="order") */
    public $order;

    /** @Column(type="string",length=500, name="area") */
    public $area;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBudgetMoneyBuildingId() {
        return $this->buildingId;
    }

    function getFloorNo() {
        return $this->floorNo;
    }

    function getFloorDesc() {
        return $this->floorDesc;
    }

    function getOrder() {
        return $this->order;
    }

    function getArea() {
        return $this->area;
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

    function setBudgetMoneyBuildingId($budgetMoneyBuildingId) {
        $this->buildingId = $budgetMoneyBuildingId;
    }

    function setFloorNo($floorNo) {
        $this->floorNo = $floorNo;
    }

    function setFloorDesc($floorDesc) {
        $this->floorDesc = $floorDesc;
    }

    function setOrder($order) {
        $this->order = $order;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
