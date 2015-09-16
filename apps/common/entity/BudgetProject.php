<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETPROJECT")
 */
class BudgetProduct extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BUDGETPROJECTID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUDGETPLANID") */
    public $planId;

    /** @Column(type="string",length=500, name="BUDGETPROJECTNAME") */
    public $projectName;

    /** @Column(type="string",length=1, name="BUDGETPROJECTTYPE") */
    public $projecttype;

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

    function getProjectName() {
        return $this->projectName;
    }

    function getProjecttype() {
        return $this->projecttype;
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

    function setProjectName($projectName) {
        $this->projectName = $projectName;
    }

    function setProjecttype($projecttype) {
        $this->projecttype = $projecttype;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
