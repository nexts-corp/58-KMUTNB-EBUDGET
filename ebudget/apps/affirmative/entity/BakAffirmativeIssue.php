<?php

namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Issue")
 */
class AffirmativeIssue extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="IssueId")
     * @GeneratedValue
     */
    public $issueId;

    /** @Column(type="integer",length=11, name="IssueSeq") */
    public $issueSeq;

    /** @Column(type="integer",length=11, name="TypeId") */
    public $typeId;

    /** @Column(type="text", name="IssueName") */
    public $issueName;
    public $target;

    function getIssueId() {
        return $this->issueId;
    }

    function getTypeId() {
        return $this->typeId;
    }

    function getIssueSeq() {
        return $this->issueSeq;
    }

    function getIssueName() {
        return $this->issueName;
    }

    function getTarget() {
        return $this->target;
    }

    function setIssueId($issueId) {
        $this->issueId = $issueId;
    }

    function setTypeId($typeId) {
        $this->typeId = $typeId;
    }

    function setIssueSeq($issueSeq) {
        $this->issueSeq = $issueSeq;
    }

    function setIssueName($issueName) {
        $this->issueName = $issueName;
    }

    function setTarget($target) {
        $this->target = $target;
    }

}
