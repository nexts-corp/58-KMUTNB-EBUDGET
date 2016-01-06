<?php

namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Target")
 */
class AffirmativeTarget extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="TargetId")
     * @GeneratedValue
     */
    public $targetId;

    /** @Column(type="integer",length=11, name="IssueId") */
    public $issueId;

    /** @Column(type="integer",length=11, name="TargetSeq") */
    public $targetSeq;

    /** @Column(type="text", name="TargetName") */
    public $targetName;
    public $kpi;

    function getTargetId() {
        return $this->targetId;
    }

    function getIssueId() {
        return $this->issueId;
    }

    function getTargetSeq() {
        return $this->targetSeq;
    }

    function getTargetName() {
        return $this->targetName;
    }

    function getKpi() {
        return $this->kpi;
    }

    function setTargetId($targetId) {
        $this->targetId = $targetId;
    }

    function setIssueId($issueId) {
        $this->issueId = $issueId;
    }

    function setTargetSeq($targetSeq) {
        $this->targetSeq = $targetSeq;
    }

    function setTargetName($targetName) {
        $this->targetName = $targetName;
    }

    function setKpi($kpi) {
        $this->kpi = $kpi;
    }

}
