<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Main")
 */
class AffirmativeMain extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeMainId")
     * @GeneratedValue
     */
    public $mainId;

    /** @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /** @Column(type="integer",length=11, name="AffirmativeMainSeq") */
    public $mainSeq;

    /** @Column(type="text", name="AffirmativeMainName") */
    public $mainName;

    public $type;

    function getMainId() {
        return $this->mainId;
    }

    function getPeriodCode() {
        return $this->periodCode;
    }

    function getMainSeq() {
        return $this->mainSeq;
    }

    function getMainName() {
        return $this->mainName;
    }

    function getType() {
        return $this->type;
    }

    function setMainId($mainId) {
        $this->mainId = $mainId;
    }

    function setPeriodCode($periodCode) {
        $this->periodCode = $periodCode;
    }

    function setMainSeq($mainSeq) {
        $this->mainSeq = $mainSeq;
    }

    function setMainName($mainName) {
        $this->mainName = $mainName;
    }

    function setType($type) {
        $this->type = $type;
    }

}
