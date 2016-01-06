<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Type")
 */
class AffirmativeType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeTypeId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="AffirmativeTypeSeq") */
    public $typeSeq;

    /** @Column(type="string",length=300, name="AffirmativeTypeName") */
    public $typeName;

    /** @Column(type="integer",length=11, name="AffirmativeMainId") */
    public $mainId;

    /** @Column(type="integer",length=11, name="IsCommon") */
    public $isCommon;

    /** @Column(type="string",length=1, name="HasIssue") */
    public $hasIssue;

    function getId() {
        return $this->id;
    }

    function getTypeSeq(){
        return $this->typeSeq;
    }

    function getTypeName() {
        return $this->typeName;
    }

    function getIsCommon(){
        return $this->isCommon;
    }

    function getMainId(){
        return $this->mainId;
    }

    function getHasIssue(){
        return $this->hasIssue;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTypeSeq($typeSeq){
        $this->typeSeq = $typeSeq;
    }

    function setTypeName($typeName) {
        $this->typeName = $typeName;
    }

    function setIsCommon($isCommon){
        $this->isCommon = $isCommon;
    }

    function setMainId($mainId){
        $this->mainId = $mainId;
    }

    function setHasIssue($hasIssue){
        $this->hasIssue = $hasIssue;
    }
}
