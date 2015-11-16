<?php
namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Result")
 */
class AffirmativeResult extends EntityBase{

    /**
     * @Id
     * @Column(type="integer",length=11,name="ResultId")
     * @GeneratedValue
     */
    public $resultId;

    /**
     * @Column(type="integer",length=11,name="FinalId")
     */
    public $finalId;

    /**
     * @Column(type="integer",length=11,name="RoundId")
     */
    public $roundId;

    /**
     * @Column(type="string",name="Detail")
     */
    public $detail;

    /**
     * @Column(type="float",name="Dividend")
     */
    public $dividend;

    /**
     * @Column(type="float",name="Divisor")
     */
    public $divisor;

    /**
     * @Column(type="float",name="Result")
     */
    public $result;

    /**
     * @Column(type="float",name="Score")
     */
    public $score;

    /**
     * @Column(type="string",length=1,name="IsSuccess")
     */
    public $isSuccess;

    /**
     * @Column(type="string",name="Remark")
     */
    public $remark;

    /**
     * @Column(type="string",length=255,name="Attachment")
     */
    public $attachment;

    function getResultId(){
        return $this->resultId;
    }

    function getFinalId(){
        return $this->finalId;
    }

    function getRoundId(){
        return $this->roundId;
    }

    function getDetail(){
        return $this->detail;
    }

    function getDividend(){
        return $this->dividend;
    }

    function getDivisor(){
        return $this->divisor;
    }

    function getResult(){
        return $this->result;
    }

    function getScore(){
        return $this->score;
    }

    function getIsSuccess(){
        return $this->isSuccess;
    }

    function getRemark(){
        return $this->remark;
    }

    function getAttachment(){
        return $this->attachment;
    }

    function setResultId($resultId){
        $this->resultId = $resultId;
    }

    function setFinalId($finalId){
        $this->finalId = $finalId;
    }

    function setRoundId($roundId){
        $this->roundId = $roundId;
    }

    function setDetail($detail){
        $this->detail = $detail;
    }

    function setDividend($dividend){
        $this->dividend = $dividend;
    }

    function setDivisor($divisor){
        $this->divisor = $divisor;
    }

    function setResult($result){
        $this->result = $result;
    }

    function setScore($score){
        $this->score = $score;
    }

    function setIsSuccess($isSuccess){
        $this->isSuccess = $isSuccess;
    }

    function setRemark($remark){
        $this->remark = $remark;
    }

    function setAttachment($attachment){
        $this->attachment = $attachment;
    }
}

?>