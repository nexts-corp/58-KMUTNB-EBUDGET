<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Target")
 */
class AffirmativeTarget extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeTargetId")
     * @GeneratedValue
     */
    public $targetId;

    /** @Column(type="integer",length=11, name="AffirmativeTargetSeq") */
    public $targetSeq;

    /** @Column(type="text", name="AffirmativeTargetName") */
    public $targetName;

    /** @Column(type="integer",length=11, name="AffirmativeIssueId") */
    public $issueId;

    function getTargetId() {
        return $this->targetId;
    }

    function getTargetSeq() {
        return $this->targetSeq;
    }

    function getTargetName() {
        return $this->targetName;
    }

    function getIssueId() {
        return $this->issueId;
    }

    function setTargetId($targetId) {
        $this->targetId = $targetId;
    }

    function setTargetSeq($targetSeq) {
        $this->targetSeq = $targetSeq;
    }

    function setTargetName($targetName) {
        $this->targetName = $targetName;
    }

    function setIssueId($issueId) {
        $this->issueId = $issueId;
    }
}
