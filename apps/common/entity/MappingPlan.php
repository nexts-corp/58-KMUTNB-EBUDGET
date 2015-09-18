<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="MAPPINGPLAN")
 */
class MappingPlan extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="MAPPINGPLANID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="PLANID") */
    public $planId;

    /** @Column(type="integer",length=11, name="BUDGETPROJECTID") */
    public $budgetProjectId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getPlanId() {
        return $this->planId;
    }

    function getBudgetProjectId() {
        return $this->budgetProjectId;
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

    function setPlanId($planId) {
        $this->planId = $planId;
    }

    function setBudgetProjectId($budgetProjectId) {
        $this->budgetProjectId = $budgetProjectId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
