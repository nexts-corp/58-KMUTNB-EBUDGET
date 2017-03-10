<?php
namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Round")
 */
class AffirmativeRound extends EntityBase{

    /**
     * @Id
     * @Column(type="integer",length=11,name="AffirmativeRoundId")
     * @GeneratedValue
     */
    public $roundId;

    /** @Column(type="string",length=255,name="AffirmativeRoundName") */
    public $roundName;

    /** @Column(type="string",length=255,name="PeriodCode") */
    public $periodCode;

    /** @Column(type="datetime",name="DateFrom") */
    public $dateFrom;

    /** @Column(type="datetime",name="DateTo") */
    public $dateTo;

    /** @Column(type="string",length=1,name="IsActive") */
    public $isActive;

    function getRoundId(){
        return $this->roundId;
    }

    function getRoundName(){
        return $this->roundName;
    }

    function getPeriodCode(){
        return $this->periodCode;
    }

    function getDateFrom(){
        return $this->dateFrom;
    }

    function getDateTo(){
        return $this->dateTo;
    }

    function getIsActive(){
        return $this->isActive;
    }

    function setRoundId($roundId){
        $this->roundId = $roundId;
    }

    function setRoundName($roundName){
        $this->roundName = $roundName;
    }

    function setPeriodCode($periodCode){
        $this->periodCode = $periodCode;
    }

    function setDateFrom($dateFrom){
        $this->dateFrom = $dateFrom;
    }

    function setDateTo($dateTo){
        $this->dateTo = $dateTo;
    }

    function setIsActive($isActive){
        $this->isActive = $isActive;
    }
}

?>