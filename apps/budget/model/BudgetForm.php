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
class BudgetForm {

    public $planId;
    public $productId;
    public $fundgroupId;
    public $departmentId;
    public $budgetSource;
    public $budgetYear;
    public $moneyTypeCode;
    public $moneyTypeId;

    function getBudgetPlanId() {
        return $this->planId;
    }

    function getBudgetProductId() {
        return $this->productId;
    }

    function getFundgroupId() {
        return $this->fundgroupId;
    }

    function getDepartmentId() {
        return $this->departmentId;
    }

    function getBudgetSource() {
        return $this->budgetSource;
    }

    function getBudgetYear() {
        return $this->budgetYear;
    }

    function getMoneyTypeCode() {
        return $this->moneyTypeCode;
    }

    function getMoneyTypeId() {
        return $this->moneyTypeId;
    }

    function setBudgetPlanId($budgetPlanId) {
        $this->planId = $budgetPlanId;
    }

    function setBudgetProductId($budgetProductId) {
        $this->productId = $budgetProductId;
    }

    function setFundgroupId($fundgroupId) {
        $this->fundgroupId = $fundgroupId;
    }

    function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }

    function setBudgetSource($budgetSource) {
        $this->budgetSource = $budgetSource;
    }

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setMoneyTypeCode($moneyTypeCode) {
        $this->moneyTypeCode = $moneyTypeCode;
    }

    function setMoneyTypeId($moneyTypeId) {
        $this->moneyTypeId = $moneyTypeId;
    }

}
