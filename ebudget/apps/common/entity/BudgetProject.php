<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Project")
 */
class BudgetProject extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetProjectId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BudgetPlanId") */
    public $planId;

    /** @Column(type="string",length=500, name="BudgetProjectName") */
    public $projectName;

    /** @Column(type="string",length=1, name="BudgetProjectType") */
    public $projectType;

    function getId() {
        return $this->id;
    }

    function getPlanId() {
        return $this->planId;
    }

    function getProjectName() {
        return $this->projectName;
    }

    function getProjectType() {
        return $this->projectType;
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

    function setProjectType($projectType) {
        $this->projectType = $projectType;
    }

}
