<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_ACCOUNT")
 */
class Account extends EntityBase {

    /**
     * @Id 
     * @Column(type="string",length=10,name="ACCOUNTID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string", length=100, name="ACCOUNTNAME") */
    public $accName;

    /** @Column(type="string",length=1, name="ACCOUNTSTATUS") */
    public $accStatus;

    /** @Column(type="string",length=20, name="BANKACCOUNT") */
    public $bankAccount;

    /** @Column(type="string",length=20, name="BANKCODE") */
    public $bankCode;

    /** @Column(type="string",length=100, name="BANKBRANCH") */
    public $bankBranch;

    /** @Column(type="string",length=1, name="NATURETYPE") */
    public $natureType;

    /** @Column(type="string", length=10, name="ACCOUNTTYPEID") */
    public $accTypeId;

    /** @Column(type="string", length=10, name="MASTERID") */
    public $masterId;

    /** @Column(type="integer",length=11, name="DEFAULTFUNDGROUPID") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="DEFAULTPROJECTID") */
    public $projectId;

    /** @Column(type="integer",length=11, name="DEFAULTDEPARTMENTID") */
    public $departmentId;

    /** @Column(type="integer",length=11, name="ACCOUNTGROUP") */
    public $accGroup;

    /** @Column(type="integer",length=11, name="DEFAULTREFERID") */
    public $referId;

    /** @Column(type="integer",length=11, name="DEFAULTBUDGETGROUPID") */
    public $budgetgroupId;

    /** @Column(type="integer",length=11, name="ACCOUNTLEVEL") */
    public $accLevel;

    /** @Column(type="string",length=1, name="CASHFLOW") */
    public $cashFlow;

    /** @Column(type="integer",length=11, name="DEFAULTACTIVITYID") */
    public $activityId;

    /** @Column(type="string",length=1, name="ACCOUNTOWNER") */
    public $accOwner;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;



    function getId() {
        return $this->id;
    }

    function getAccName() {
        return $this->accName;
    }

    function getAccStatus() {
        return $this->accStatus;
    }

    function getBankAccount() {
        return $this->bankAccount;
    }

    function getBankCode() {
        return $this->bankCode;
    }

    function getBankBranch() {
        return $this->bankBranch;
    }

    function getNatureType() {
        return $this->natureType;
    }

    function getAccTypeId() {
        return $this->accTypeId;
    }

    function getMasterId() {
        return $this->masterId;
    }

    function getFundgroupId() {
        return $this->fundgroupId;
    }

    function getProjectId() {
        return $this->projectId;
    }

    function getDepartmentId() {
        return $this->departmentId;
    }

    function getAccGroup() {
        return $this->accGroup;
    }

    function getReferId() {
        return $this->referId;
    }

    function getBudgetgroupId() {
        return $this->budgetgroupId;
    }

    function getAccLevel() {
        return $this->accLevel;
    }

    function getCashFlow() {
        return $this->cashFlow;
    }

    function getActivityId() {
        return $this->activityId;
    }

    function getAccOwner() {
        return $this->accOwner;
    }


    function setId($id) {
        $this->id = $id;
    }

    function setAccName($accName) {
        $this->accName = $accName;
    }

    function setAccStatus($accStatus) {
        $this->accStatus = $accStatus;
    }

    function setBankAccount($bankAccount) {
        $this->bankAccount = $bankAccount;
    }

    function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }

    function setBankBranch($bankBranch) {
        $this->bankBranch = $bankBranch;
    }

    function setNatureType($natureType) {
        $this->natureType = $natureType;
    }

    function setAccTypeId($accTypeId) {
        $this->accTypeId = $accTypeId;
    }

    function setMasterId($masterId) {
        $this->masterId = $masterId;
    }

    function setFundgroupId($fundgroupId) {
        $this->fundgroupId = $fundgroupId;
    }

    function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }

    function setAccGroup($accGroup) {
        $this->accGroup = $accGroup;
    }

    function setReferId($referId) {
        $this->referId = $referId;
    }

    function setBudgetgroupId($budgetgroupId) {
        $this->budgetgroupId = $budgetgroupId;
    }

    function setAccLevel($accLevel) {
        $this->accLevel = $accLevel;
    }

    function setCashFlow($cashFlow) {
        $this->cashFlow = $cashFlow;
    }

    function setActivityId($activityId) {
        $this->activityId = $activityId;
    }

    function setAccOwner($accOwner) {
        $this->accOwner = $accOwner;
    }

    public function getCreator()
    {
        return $this->creator;
    }


    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    public function getUpdater()
    {
        return $this->updater;
    }


    public function setUpdater($updater)
    {
        $this->updater = $updater;
    }

}
