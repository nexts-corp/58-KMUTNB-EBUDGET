<?php

namespace apps\budget\model;

/**
 * @Entity
 * @Table(name="View_Affirmative_Level")
 */
class ViewAffirmativeLevel {

    /**
     * @Id
     * @Column(type="integer",length=11,name="AFFIRMATIVETYPEID") 
     */
    public $typeId;

    /**
     * @Column(type="string",length=255,name="AFFIRMATIVETYPENAME")
     */
    public $typeName;
    
    /**
     * @Id
     * @Column(type="integer",length=11,name="AFFIRMATIVEISSUEID") 
     */
    public $issueId;

    /**
     * @Column(type="string",length=255,name="AFFIRMATIVEISSUENAME")
     */
    public $issueName;
    
    /**
     * @Id
     * @Column(type="integer",length=11,name="AFFIRMATIVETARGETID") 
     */
    public $targetId;

    /**
     * @Column(type="string",length=255,name="AFFIRMATIVETARGETNAME")
     */
    public $targetName;
    
    /**
     * @Id
     * @Column(type="integer",length=11,name="AFFIRMATIVESTRATEGYID") 
     */
    public $strategyId;

    /**
     * @Column(type="string",length=255,name="AFFIRMATIVESTRATEGYNAME")
     */
    public $strategyName;
    
    /**
     * @Column(type="integer",length=11,name="BUDGETPERIODID") 
     */
    public $budgetPeriodId;

}
