<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="AFFIRMATIVETYPE")
 */
class AffirmativeType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AFFIRMATIVETYPEID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=300, name="AFFIRMATIVETYPENAME") */
    public $typeName;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $budgetperiodId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getTypeName() {
        return $this->typeName;
    }

    function getBudgetperiodId() {
        return $this->budgetperiodId;
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

    function setTypeName($typeName) {
        $this->typeName = $typeName;
    }

    function setBudgetperiodId($budgetperiodId) {
        $this->budgetperiodId = $budgetperiodId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
