<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Account")
 */
class Account extends EntityBase {

    /**
     * @Id 
     * @Column(type="string",length=10,name="AccountId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string", length=100, name="AccountName") */
    public $accName;

    /** @Column(type="string",length=1, name="AccountStatus") */
    public $accStatus;

    /** @Column(type="string",length=20, name="BankAccount") */
    public $bankAccount;

    /** @Column(type="string",length=20, name="BankCode") */
    public $bankCode;

    /** @Column(type="string",length=100, name="BankBranch") */
    public $bankBranch;

    /** @Column(type="string",length=1, name="NatureType") */
    public $natureType;

    /** @Column(type="string", length=10, name="AccountTypeId") */
    public $accTypeId;

    /** @Column(type="string", length=10, name="MasterId") */
    public $masterId;

    /** @Column(type="integer",length=11, name="DefaultFundGroupId") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="DefaultProjectId") */
    public $projectId;

    /** @Column(type="integer",length=11, name="DefaultDepartmentId") */
    public $departmentId;

    /** @Column(type="integer",length=11, name="AccountGroup") */
    public $accGroup;

    /** @Column(type="integer",length=11, name="DefaultReferId") */
    public $referId;

    /** @Column(type="integer",length=11, name="DefaultBudgetGroupId") */
    public $budgetgroupId;

    /** @Column(type="integer",length=11, name="AccountLevel") */
    public $accLevel;

    /** @Column(type="string",length=1, name="CashFlow") */
    public $cashFlow;

    /** @Column(type="integer",length=11, name="DefaultActivityId") */
    public $activityId;

    /** @Column(type="string",length=1, name="AccountOwner") */
    public $accOwner;

    /** @Column(type="string",length=100, name="AccountNameENG") */
    public $accNameENG;

    /** @Column(type="string",length=255, name="Description") */
    public $desc;

    /** @Column(type="string",length=255, name="BankName") */
    public $bankName;

    /** @Column(type="string",length=1, name="PayDebit") */
    public $payDebit;

    /** @Column(type="string",length=255, name="CutOffType") */
    public $cutOffType;

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

    function getAccNameENG(){
        return $this->accNameENG;
    }

    function getDesc(){
        return $this->desc;
    }

    function getBankName(){
        return $this->bankName;
    }

    function getPayDebit(){
        return $this->payDebit;
    }

    function getCutOffType(){
        return $this->cutOffType;
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

    function setAccNameENG($accNameENG){
        $this->accNameENG = $accNameENG;
    }

    function setDesc($desc){
        $this->desc = $desc;
    }

    function setBankName($bankName){
        $this->bankName = $bankName;
    }

    function setPayDebit($payDebit){
        $this->payDebit = $payDebit;
    }

    function setCutOffType($cutOffType){
        $this->cutOffType = $cutOffType;
    }
}
