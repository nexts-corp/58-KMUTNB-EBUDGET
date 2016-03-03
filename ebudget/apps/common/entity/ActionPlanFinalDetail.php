<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="ActionPlan_Final_Detail")
 */
class ActionPlanFinalDetail extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ActionPlanFinalDetailId")
     * @GeneratedValue
     */
    public $detailId;

    /** @Column(type="integer",length=11, name="ActionPlanFinalDetailSeq") */
    public $detailSeq;

    /** @Column(type="text", name="ActionPlanFinalDetailName") */
    public $detailName;

    /**
     * @Column(type="integer",length=11,name="ActionPlanFinalId")
     */
    public $finalId;

    /** @Column(type="string",length=255, name="Unit") */
    public $unit;

    /** @Column(type="string",length=255, name="Remark") */
    public $remark;

    /** @Column(type="string",length=10, name="IsApprove") */
    public $isApprove;

    /** @Column(type="string",length=10, name="IsActive") */
    public $isActive;

   

}
