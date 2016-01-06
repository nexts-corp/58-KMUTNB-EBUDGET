<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Unit")
 */
class AffirmativeUnit extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeUnitId")
     * @GeneratedValue
     */
    public $unitId;

    /** @Column(type="string",length=255, name="AffirmativeUnitName") */
    public $unitName;

    /** @Column(type="string",length=255, name="KpiGoal") */
    public $kpiGoal;

    /** @Column(type="string",length=255, name="Score1") */
    public $score1;

    /** @Column(type="string",length=255, name="Score2") */
    public $score2;

    /** @Column(type="string",length=255, name="Score3") */
    public $score3;

    /** @Column(type="string",length=255, name="Score4") */
    public $score4;

    /** @Column(type="string",length=255, name="Score5") */
    public $score5;

    function getUnitId() {
        return $this->unitId;
    }

    function getUnitName() {
        return $this->unitName;
    }

    function getKpiGoal() {
        return $this->kpiGoal;
    }

    function getScore1() {
        return $this->score1;
    }

    function getScore2() {
        return $this->score2;
    }

    function getScore3() {
        return $this->score3;
    }

    function getScore4() {
        return $this->score4;
    }

    function getScore5() {
        return $this->score5;
    }

    function setUnitId($unitId) {
        $this->unitId = $unitId;
    }

    function setUnitName($unitName) {
        $this->unitName = $unitName;
    }

    function setKpiGoal($kpiGoal) {
        $this->kpiGoal = $kpiGoal;
    }

    function setScore1($score1) {
        $this->score1 = $score1;
    }

    function setScore2($score2) {
        $this->score2 = $score2;
    }

    function setScore3($score3) {
        $this->score3 = $score3;
    }

    function setScore4($score4) {
        $this->score4 = $score4;
    }

    function setScore5($score5) {
        $this->score5 = $score5;
    }
}
