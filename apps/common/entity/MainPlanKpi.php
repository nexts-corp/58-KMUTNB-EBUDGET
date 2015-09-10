<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="main_plan_kpi")
 */
class MainPlanKpi extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="main_plan_target_id") */
    public $mainPlanTargetId;

    /** @Column(type="text", name="kpi_name") */
    public $kpiName;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getMainPlanTargetId() {
        return $this->mainPlanTargetId;
    }

    function getKpiName() {
        return $this->kpiName;
    }

    function getBudgetYear() {
        return $this->budgetYear;
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

    function setMainPlanTargetId($mainPlanTargetId) {
        $this->mainPlanTargetId = $mainPlanTargetId;
    }

    function setKpiName($kpiName) {
        $this->kpiName = $kpiName;
    }

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
