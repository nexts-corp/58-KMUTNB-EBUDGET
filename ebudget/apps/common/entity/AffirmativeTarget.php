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
    public $id;

    /** @Column(type="integer",length=11, name="AffirmativeTargetSeq") */
    public $targetSeq;

    /** @Column(type="text", name="AffirmativeTargetName") */
    public $targetName;

    /** @Column(type="integer",length=11, name="AffirmativeIssueId") */
    public $issueId;

    function getId() {
        return $this->id;
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

    function setId($id) {
        $this->id = $id;
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
