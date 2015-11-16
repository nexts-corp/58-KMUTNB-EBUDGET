<?php

namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Type")
 */
class AffirmativeType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="TypeId")
     * @GeneratedValue
     */
    public $typeId;

    /** @Column(type="integer",length=11, name="TypeSeq") */
    public $typeSeq;

    /** @Column(type="integer",length=11, name="MainId") */
    public $mainId;

   

    /** @Column(type="text", name="TypeName") */
    public $typeName;

    /** @Column(type="string",length=1, name="HasIssue") */
    public $hasIssue;
    public $issue;
    public $kpi;

    function getTypeId() {
        return $this->typeId;
    }

    function getMainId() {
        return $this->mainId;
    }

    function getTypeSeq() {
        return $this->typeSeq;
    }

    function getTypeName() {
        return $this->typeName;
    }

    function getHasIssue() {
        return $this->hasIssue;
    }

    function getIssue() {
        return $this->issue;
    }

    function setTypeId($typeId) {
        $this->typeId = $typeId;
    }

    function setMainId($mainId) {
        $this->mainId = $mainId;
    }

    function setTypeSeq($typeSeq) {
        $this->typeSeq = $typeSeq;
    }

    function setTypeName($typeName) {
        $this->typeName = $typeName;
    }

    function setHasIssue($hasIssue) {
        $this->hasIssue = $hasIssue;
    }

    function setIssue($issue) {
        $this->issue = $issue;
    }

}
