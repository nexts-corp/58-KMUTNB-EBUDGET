<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_money_building_oneyear")
 */
class BudgetMoneyBuildingOneyear extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="budget_money_building_id") */
    public $budgetMoneyBuildingId;

    /** @Column(type="integer",length=11, name="order") */
    public $order;

    /** @Column(type="text", name="name") */
    public $name;

    /** @Column(type="string",length=100, name="area") */
    public $area;

    /** @Column(type="float", name="unit_price") */
    public $unit_price;

    /** @Column(type="float", name="total_price") */
    public $total_price;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBudgetMoneyBuildingId() {
        return $this->budgetMoneyBuildingId;
    }

    function getOrder() {
        return $this->order;
    }

    function getName() {
        return $this->name;
    }

    function getArea() {
        return $this->area;
    }

    function getUnit_price() {
        return $this->unit_price;
    }

    function getTotal_price() {
        return $this->total_price;
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
        $this->budgetMoneyBuildingId = $budgetMoneyBuildingId;
    }

    function setOrder($order) {
        $this->order = $order;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setUnit_price($unit_price) {
        $this->unit_price = $unit_price;
    }

    function setTotal_price($total_price) {
        $this->total_price = $total_price;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
