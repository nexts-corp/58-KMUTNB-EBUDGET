<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="main_plan_issue")
 */
class MainPlanIssue extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="main_plan_type_id") */
    public $mainPlanTypeId;

    /** @Column(type="string",length=10, name="issue_seq") */
    public $issueSeq;

    /** @Column(type="text", name="issue_name") */
    public $issueName;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getMainPlanTypeId() {
        return $this->mainPlanTypeId;
    }

    function getIssueSeq() {
        return $this->issueSeq;
    }

    function getIssueName() {
        return $this->issueName;
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

    function setMainPlanTypeId($mainPlanTypeId) {
        $this->mainPlanTypeId = $mainPlanTypeId;
    }

    function setIssueSeq($issueSeq) {
        $this->issueSeq = $issueSeq;
    }

    function setIssueName($issueName) {
        $this->issueName = $issueName;
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
