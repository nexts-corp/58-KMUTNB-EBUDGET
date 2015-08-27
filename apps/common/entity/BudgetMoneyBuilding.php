<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_money_building")
 */
class BudgetMoneyBuilding extends EntityBase {
 /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;
    
       /** @Column(type="integer",length=11, name="budget_plan_id") */
    public $budgetPlanId;
          /** @Column(type="integer",length=11, name="budget_product_id") */
    public $budgetProductId;
          /** @Column(type="integer",length=11, name="lk_fundgroup_id") */
    public $fundgroupId;
          /** @Column(type="integer",length=11, name="lk_department_id") */
    public $departmentId;
          /** @Column(type="integer",length=11, name="budget_source") */
    public $budgetPlanId;
          /** @Column(type="integer",length=11, name="budget_plan_id") */
    public $budgetPlanId;
}
