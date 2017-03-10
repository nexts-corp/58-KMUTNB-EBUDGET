<?php

namespace apps\affirmative\model;

/**
 * @Entity
 * @Table(name="View_Affirmative_Center")
 */
class ViewAffirmativeCenter {

    /**
     * @Id 
     * @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeMainId")
     */
    public $mainId;

    /** @Column(type="text", name="AffirmativeMainName") */
    public $mainName;

    /** @Column(type="integer",length=11, name="AffirmativeMainSeq") */
    public $mainSeq;

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeTypeId")
     */
    public $typeId;

    /** @Column(type="integer",length=11, name="AffirmativeTypeSeq") */
    public $typeSeq;

    /** @Column(type="text", name="AffirmativeTypeName") */
    public $typeName;

    /** @Column(type="string",length=1, name="HasIssue") */
    public $hasIssue;

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeIssueId")
     */
    public $issueId;

    /** @Column(type="integer",length=11, name="AffirmativeIssueSeq") */
    public $issueSeq;

    /** @Column(type="text", name="AffirmativeIssueName") */
    public $issueName;

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeTargetId")
     */
    public $targetId;

    /** @Column(type="integer",length=11, name="AffirmativeTargetSeq") */
    public $targetSeq;

    /** @Column(type="text", name="AffirmativeTargetName") */
    public $targetName;

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeCenterId")
     */
    public $centerId;

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeKpiId")
     */
    public $kpiId;

    /** @Column(type="integer",length=11, name="AffirmativeKpiSeq") */
    public $kpiSeq;

    /** @Column(type="text", name="AffirmativeKpiName") */
    public $kpiName;

    /**
     * @Column(type="integer",length=11,name="AffirmativeUnitId")
     */
    public $unitId;

    /** @Column(type="string",length=255, name="AffirmativeUnitName") */
    public $unitName;

    /** @Column(type="string",length=255, name="KpiGoal") */
    public $kpiGoal;

    /** @Column(type="string",length=255, name="Score1") */
    public $score1;

    /** @Column(type="string",length=255, name="Score2") */
    public $score2;

    /** @Column(type="string",length=255, name="Score3") */
    public $score3;

    /** @Column(type="string",length=255, name="Score4") */
    public $score4;

    /** @Column(type="string",length=255, name="Score5") */
    public $score5;

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeCenterGroupId")
     */
    public $centerGroupId;

    /**
     * @Column(type="integer",length=11,name="ActivityTypeId")
     */
    public $groupId;

    /** @Column(type="string",length=255, name="ActivityTypeCode") */
    public $groupCode;

    /** @Column(type="string",length=255, name="ActivityTypeName") */
    public $groupName;

    /** @Column(type="string",length=255, name="Remark") */
    public $remark;

}
