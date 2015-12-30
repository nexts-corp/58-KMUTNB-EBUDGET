<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="AFFIRMATIVEISSUE")
 */
class AffirmativeIssue extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AFFIRMATIVEISSUEID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="SEQ") */
    public $issueSeq;

    /** @Column(type="text", name="AFFIRMATIVEISSUENAME") */
    public $issueName;

    /** @Column(type="integer",length=11, name="AFFIRMATIVETYPEID") */
    public $typeId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getIssueName() {
        return $this->issueName;
    }

    function getTypeId() {
        return $this->typeId;
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

    function setIssueName($issueName) {
        $this->issueName = $issueName;
    }

    function setTypeId($typeId) {
        $this->typeId = $typeId;
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
