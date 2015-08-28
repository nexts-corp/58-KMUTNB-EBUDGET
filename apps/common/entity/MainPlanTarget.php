<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="main_plan_target")
 */
class MainPlanTarget extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="main_plan_issue_id") */
    public $mainPlanIssueId;

    /** @Column(type="string",length=10, name="target_seq") */
    public $targetSeq;

    /** @Column(type="text", name="target_name") */
    public $targetName;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getMainPlanIssueId() {
        return $this->mainPlanIssueId;
    }

    function getTargetSeq() {
        return $this->targetSeq;
    }

    function getTargetName() {
        return $this->targetName;
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

    function setMainPlanIssueId($mainPlanIssueId) {
        $this->mainPlanIssueId = $mainPlanIssueId;
    }

    function setTargetSeq($targetSeq) {
        $this->targetSeq = $targetSeq;
    }

    function setTargetName($targetName) {
        $this->targetName = $targetName;
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
