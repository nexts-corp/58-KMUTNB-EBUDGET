<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="AFFIRMATIVEPRODUCTKPI")
 */
class AffirmativeProductKpi extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AFFIRMATIVEPRODUCTKPIID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $budgetPeriodId;

    /** @Column(type="integer",length=11, name="AFFIRMATIVETARGETID") */
    public $affTargetId;

    /** @Column(type="integer",length=11, name="TRACKINGINTERVAL") */
    public $trackingInterval;

    /** @Column(type="text", name="DETAIL") */
    public $detail;

    /** @Column(type="string",length=100, name="SUMMAND") */
    public $summand;

    /** @Column(type="string",length=100, name="DIVISOR") */
    public $divisor;

    /** @Column(type="string",length=100, name="RESULT") */
    public $result;

    /** @Column(type="string",length=100, name="SCORE") */
    public $score;

    /** @Column(type="boolean", name="ISPASS") */
    public $isPass;

    /** @Column(type="text", name="REMARK") */
    public $remark;

    /** @Column(type="string",length=300, name="FILENAME") */
    public $fileName;

    /** @Column(type="string",length=300, name="FILEPATH") */
    public $filePath;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBudgetPeriodId() {
        return $this->budgetPeriodId;
    }

    function getAffTargetId() {
        return $this->affTargetId;
    }

    function getTrackingInterval() {
        return $this->trackingInterval;
    }

    function getDetail() {
        return $this->detail;
    }

    function getSummand() {
        return $this->summand;
    }

    function getDivisor() {
        return $this->divisor;
    }

    function getResult() {
        return $this->result;
    }

    function getScore() {
        return $this->score;
    }

    function getIsPass() {
        return $this->isPass;
    }

    function getRemark() {
        return $this->remark;
    }

    function getFileName() {
        return $this->fileName;
    }

    function getFilePath() {
        return $this->filePath;
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

    function setBudgetPeriodId($budgetPeriodId) {
        $this->budgetPeriodId = $budgetPeriodId;
    }

    function setAffTargetId($affTargetId) {
        $this->affTargetId = $affTargetId;
    }

    function setTrackingInterval($trackingInterval) {
        $this->trackingInterval = $trackingInterval;
    }

    function setDetail($detail) {
        $this->detail = $detail;
    }

    function setSummand($summand) {
        $this->summand = $summand;
    }

    function setDivisor($divisor) {
        $this->divisor = $divisor;
    }

    function setResult($result) {
        $this->result = $result;
    }

    function setScore($score) {
        $this->score = $score;
    }

    function setIsPass($isPass) {
        $this->isPass = $isPass;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    function setFilePath($filePath) {
        $this->filePath = $filePath;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
