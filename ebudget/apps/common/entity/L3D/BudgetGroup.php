<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Budget_Group")
 */
class BudgetGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetGroupId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=100, name="BudgetGroupName") */
    public $budgetgroupName;

    /** @Column(type="string",length=1, name="BudgetGroupStatus") */
    public $budgetgroupStatus;

    /** @Column(type="string",length=1, name="BudgetGroupType") */
    public $budgetgroupType;

    /** @Column(type="string",length=1, name="BudgetSource") */
    public $budgetgroupSource;

    function getId() {
        return $this->id;
    }

    function getBudgetgroupName() {
        return $this->budgetgroupName;
    }

    function getBudgetgroupStatus() {
        return $this->budgetgroupStatus;
    }

    function getBudgetgroupType() {
        return $this->budgetgroupType;
    }

    function getBudgetgroupSource() {
        return $this->budgetgroupSource;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBudgetgroupName($budgetgroupName) {
        $this->budgetgroupName = $budgetgroupName;
    }

    function setBudgetgroupStatus($budgetgroupStatus) {
        $this->budgetgroupStatus = $budgetgroupStatus;
    }

    function setBudgetgroupType($budgetgroupType) {
        $this->budgetgroupType = $budgetgroupType;
    }

    function setBudgetgroupSource($budgetgroupSource) {
        $this->budgetgroupSource = $budgetgroupSource;
    }
}
