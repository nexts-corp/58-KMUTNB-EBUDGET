<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Issue")
 */
class AffirmativeIssue extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeIssueId")
     * @GeneratedValue
     */
    public $issueId;

    /** @Column(type="integer",length=11, name="AffirmativeIssueSeq") */
    public $issueSeq;

    /** @Column(type="text", name="AffirmativeIssueName") */
    public $issueName;

    /** @Column(type="integer",length=11, name="AffirmativeTypeId") */
    public $typeId;

    function getIssueId() {
        return $this->issueId;
    }

    function getIssueSeq() {
        return $this->issueSeq;
    }

    function getIssueName() {
        return $this->issueName;
    }

    function getTypeId() {
        return $this->typeId;
    }

    function setIssueId($issueId) {
        $this->issueId = $issueId;
    }

    function setIssueSeq($issueSeq) {
        $this->issueSeq = $issueSeq;
    }

    function setIssueName($issueName) {
        $this->issueName = $issueName;
    }

    function setTypeId($typeId) {
        $this->typeId = $typeId;
    }
}
