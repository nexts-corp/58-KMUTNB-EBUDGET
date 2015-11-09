<?php

namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Main")
 */
class AffirmativeMain extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="MainId")
     * @GeneratedValue
     */
    public $mainId;

    /** @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /** @Column(type="integer",length=11, name="MainSeq") */
    public $mainSeq;

    /** @Column(type="text", name="MainName") */
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
