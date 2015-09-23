<?php

namespace apps\budget\model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BudgetForm
 *
 * @author Palida
 */
class BudgetFilter {

    public $budgetPeriodId;
    public $budgetTypeCode;
    public $planId;
    public $projectId;
    public $fundgroupId;
    public $deptId;

    function getBudgetPeriodId() {
        return $this->budgetPeriodId;
    }

    function getBudgetTypeCode() {
        return $this->budgetTypeCode;
    }

    function getPlanId() {
        return $this->planId;
    }

    function getProjectId() {
        return $this->projectId;
    }

    function getFundgroupId() {
        return $this->fundgroupId;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function setBudgetPeriodId($budgetPeriodId) {
        $this->budgetPeriodId = $budgetPeriodId;
    }

    function setBudgetTypeCode($budgetTypeCode) {
        $this->budgetTypeCode = $budgetTypeCode;
    }

    function setPlanId($planId) {
        $this->planId = $planId;
    }

    function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    function setFundgroupId($fundgroupId) {
        $this->fundgroupId = $fundgroupId;
    }

    function setDeptId($deptId) {
        $this->deptId = $deptId;
    }

}
