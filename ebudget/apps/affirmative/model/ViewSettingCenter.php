<?php

namespace apps\affirmative\model;

/**
 * @Entity
 * @Table(name="View_Setting_Center")
 */
class ViewSettingCenter {

    /**
     * @Id 
     * @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /**
     * @Id
     * @Column(type="integer",length=11,name="DepartmentId")
     */
    public $departmentId;

    /**
     * @Column(type="string",length=255, name="DepartmentName") */
    public $departmentName;

    /** @Column(type="string",length=255, name="GroupCode") */
    public $groupCode;

    /** @Column(type="string",length=255, name="GroupName") */
    public $groupName;

    /** @Column(type="text", name="Title") */
    public $title;

    /** @Column(type="string",length=255, name="Remark") */
    public $remark;

    /**
     * @Id
     * @Column(type="integer",length=11,name="MainId")
     */
    public $mainId;

    /** @Column(type="integer",length=11, name="MainSeq") */
    public $mainSeq;

    /** @Column(type="text", name="MainName") */
    public $mainName;

    /**
     * @Id
     * @Column(type="integer",length=11,name="TypeId")
     */
    public $typeId;

    /** @Column(type="integer",length=11, name="TypeSeq") */
    public $typeSeq;

    /** @Column(type="text", name="TypeName") */
    public $typeName;

    /** @Column(type="string",length=1, name="HasIssue") */
    public $hasIssue;

    /**
     * @Column(type="integer",length=11,name="IssueId")
     */
    public $issueId;

    /** @Column(type="integer",length=11, name="IssueSeq") */
    public $issueSeq;

    /** @Column(type="text", name="IssueName") */
    public $issueName;

    /**
     * @Column(type="integer",length=11, name="TargetId") */
    public $targetId;

    /** @Column(type="integer",length=11, name="TargetSeq") */
    public $targetSeq;

    /** @Column(type="text", name="TargetName") */
    public $targetName;

    /**
     * @Id
     * @Column(type="integer",length=11, name="KpiId") */
    public $kpiId;

    /**
     * @Id
     * @Column(type="integer",length=11, name="KpiSeq") */
    public $kpiSeq;

    /** @Column(type="string",length=255, name="KpiName") */
    public $kpiName;

    /** @Column(type="integer",length=11, name="UnitId") */
    public $unitId;

    /** @Column(type="string",length=255, name="UnitName") */
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

}
