<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="AFFIRMATIVETARGET")
 */
class AffirmativeTarget extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AFFIRMATIVETARGETID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="SEQ") */
    public $targetSeq;

    /** @Column(type="text", name="AFFIRMATIVETARGETNAME") */
    public $targetName;

    /** @Column(type="integer",length=11, name="AFFIRMATIVEISSUEID") */
    public $issueId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getTargetName() {
        return $this->targetName;
    }

    function getIssueId() {
        return $this->issueId;
    }

    function getSeq() {
        return $this->seq;
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

    function setTargetName($targetName) {
        $this->targetName = $targetName;
    }

    function setIssueId($issueId) {
        $this->issueId = $issueId;
    }

    function setSeq($seq) {
        $this->seq = $seq;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
