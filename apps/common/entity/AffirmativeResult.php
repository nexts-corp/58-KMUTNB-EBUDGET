<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Affirmative_Result")
 */
class AffirmativeResult extends EntityBase {
    
    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;
    
    /** @Column(type="integer",length=11, name="Affirmative_Target_Id") */
    public $affirmativeTargetId;
    
     /** @Column(type="integer",length=11, name="Interval_Id") */
    public $intervalId;
    
    /** @Column(type="text", name="Detail") */
    public $detail;
    
     /** @Column(type="string",length=100, name="Summand") */
    public $summand;
    
    /** @Column(type="string",length=100, name="Divisor") */
    public $divisor;
    
    /** @Column(type="string",length=100, name="Result") */
    public $result;
    
    /** @Column(type="string",length=100, name="Score") */
    public $score;
    
    /** @Column(type="string",length=100, name="Is_Pass") */
    public $isPass;
    
    /** @Column(type="text", name="Remark") */
    public $remark;
    
    /** @Column(type="string",length=255, name="File_Name") */
    public $fileName;
    
     /** @Column(type="string",length=255, name="File_Path") */
    public $filePath;   

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;
    
    /** @Column(type="string",length=100, name="Updater") */
    public $updater;
    
    
    function getId() {
        return $this->id;
    }

    function getAffirmativeTargetId() {
        return $this->affirmativeTargetId;
    }

    function getIntervalId() {
        return $this->intervalId;
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

    function setAffirmativeTargetId($affirmativeTargetId) {
        $this->affirmativeTargetId = $affirmativeTargetId;
    }

    function setIntervalId($intervalId) {
        $this->intervalId = $intervalId;
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
