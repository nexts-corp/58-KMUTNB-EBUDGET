<?php

namespace apps\budget\model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BudgetSchemeResult {

    public $id;
    public $bgPeriodId;
    public $bgTypeCode;
    public $planId;
    public $deptId;
    public $fundgroupId;
    public $bgTypeMasterId;
    public $bgTypeMainId;
    public $bgTypeId;
    public $bgLevel;
    public $planQ1;
    public $planQ2;
    public $planQ3;
    public $planQ4;
    public $planSummary;
    public $bgCategory;

    function getId() {
        return $this->id;
    }

    function getBgPeriodId() {
        return $this->bgPeriodId;
    }

    function getBgTypeCode() {
        return $this->bgTypeCode;
    }

    function getPlanId() {
        return $this->planId;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function getFundgroupId() {
        return $this->fundgroupId;
    }

    function getBgTypeMasterId() {
        return $this->bgTypeMasterId;
    }

    function getBgTypeMainId() {
        return $this->bgTypeMainId;
    }

    function getBgTypeId() {
        return $this->bgTypeId;
    }

    function getBgLevel() {
        return $this->bgLevel;
    }

    function getPlanQ1() {
        return $this->planQ1;
    }

    function getPlanQ2() {
        return $this->planQ2;
    }

    function getPlanQ3() {
        return $this->planQ3;
    }

    function getPlanQ4() {
        return $this->planQ4;
    }

    function getPlanSummary() {
        return $this->planSummary;
    }

    function getBgCategory() {
        return $this->bgCategory;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBgPeriodId($bgPeriodId) {
        $this->bgPeriodId = $bgPeriodId;
    }

    function setBgTypeCode($bgTypeCode) {
        $this->bgTypeCode = $bgTypeCode;
    }

    function setPlanId($planId) {
        $this->planId = $planId;
    }

    function setDeptId($deptId) {
        $this->deptId = $deptId;
    }

    function setFundgroupId($fundgroupId) {
        $this->fundgroupId = $fundgroupId;
    }

    function setBgTypeMasterId($bgTypeMasterId) {
        $this->bgTypeMasterId = $bgTypeMasterId;
    }

    function setBgTypeMainId($bgTypeMainId) {
        $this->bgTypeMainId = $bgTypeMainId;
    }

    function setBgTypeId($bgTypeId) {
        $this->bgTypeId = $bgTypeId;
    }

    function setBgLevel($bgLevel) {
        $this->bgLevel = $bgLevel;
    }

    function setPlanQ1($planQ1) {
        $this->planQ1 = $planQ1;
    }

    function setPlanQ2($planQ2) {
        $this->planQ2 = $planQ2;
    }

    function setPlanQ3($planQ3) {
        $this->planQ3 = $planQ3;
    }

    function setPlanQ4($planQ4) {
        $this->planQ4 = $planQ4;
    }

    function setPlanSummary($planSummary) {
        $this->planSummary = $planSummary;
    }

    function setBgCategory($bgCategory) {
        $this->bgCategory = $bgCategory;
    }

}

?>