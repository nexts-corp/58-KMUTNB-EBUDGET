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
    public $id;

    /** @Column(type="integer",length=11, name="AffirmativeIssueSeq") */
    public $issueSeq;

    /** @Column(type="text", name="AffirmativeIssueName") */
    public $issueName;

    /** @Column(type="integer",length=11, name="AffirmativeTypeId") */
    public $typeId;

    function getId() {
        return $this->id;
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

    function setId($id) {
        $this->id = $id;
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
