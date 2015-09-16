<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="affirmative_result")
 */
class AffirmativeResult extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="integer",length=11, name="affirmative_target_id") */
    public $affirmativeTargetId;

    /** @Column(type="integer",length=11, name="lk_tracking_interval_id") */
    public $trackingIntervalId;

    /** @Column(type="text", name="detail") */
    public $detail;

    /** @Column(type="string",length=100, name="summand") */
    public $summand;

    /** @Column(type="string",length=100, name="divisor") */
    public $divisor;

    /** @Column(type="string",length=100, name="result") */
    public $result;

    /** @Column(type="string",length=100, name="score") */
    public $score;

    /** @Column(type="string",length=100, name="is_pass") */
    public $isPass;

    /** @Column(type="text", name="remark") */
    public $remark;

    /** @Column(type="string",length=255, name="file_name") */
    public $fileName;

    /** @Column(type="string",length=255, name="file_path") */
    public $filePath;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBudgetYear() {
        return $this->budgetYear;
    }

    function getAffirmativeTargetId() {
        return $this->affirmativeTargetId;
    }

    function getTrackingIntervalId() {
        return $this->trackingIntervalId;
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

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setAffirmativeTargetId($affirmativeTargetId) {
        $this->affirmativeTargetId = $affirmativeTargetId;
    }

    function setTrackingIntervalId($trackingIntervalId) {
        $this->trackingIntervalId = $trackingIntervalId;
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
