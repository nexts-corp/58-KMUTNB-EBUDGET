<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Affirmative_Result")
 */
class AffirmativeTarget extends EntityBase {

     /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;
    
    /** @Column(type="integer",length=11, name="Org_Faculty_Id") */
    public $orgFacultyId;
    
    /** @Column(type="integer",length=11, name="Plan_Target_Id") */
    public $planTargetId;
    
    /** @Column(type="integer",length=11, name="Plan_Kpi_Id") */
    public $planKpiId;
    
    /** @Column(type="boolean",length=1, name="Is_Work") */
    public $isWork;
    
    /** @Column(type="string",length=100, name="No") */
    public $no;
    
    /** @Column(type="text", name="Name") */
    public $name;
    
    /** @Column(type="string",length=100, name="Unit") */
    public $unit;
    
    /** @Column(type="string",length=100, name="Weight") */
    public $weight;
    
    /** @Column(type="string",length=100, name="Target") */
    public $target;
    
    /** @Column(type="string",length=100, name="Score1") */
    public $score1;
    
    /** @Column(type="string",length=100, name="Score2") */
    public $score2;  
    
    /** @Column(type="string",length=100, name="Score3") */
    public $score3;    
    
    /** @Column(type="string",length=100, name="Score4") */
    public $score4;     
    
    /** @Column(type="string",length=100, name="Score5") */
    public $score5;
    
    /** @Column(type="text", name="Remark") */
    public $remark;
    
    /** @Column(type="boolean",length=1, name="Is_Approve") */
    public $isApprove;
    
    /** @Column(type="boolean",length=1, name="Ic_Cancel") */
    public $isCancel;
    
    /** @Column(type="string",length=100, name="Creator") */
    public $creator;
    
    /** @Column(type="string",length=100, name="Updater") */
    public $updater;
    
    function getId() {
        return $this->id;
    }

    function getOrgFacultyId() {
        return $this->orgFacultyId;
    }

    function getPlanTargetId() {
        return $this->planTargetId;
    }

    function getPlanKpiId() {
        return $this->planKpiId;
    }

    function getIsWork() {
        return $this->isWork;
    }

    function getNo() {
        return $this->no;
    }

    function getName() {
        return $this->name;
    }

    function getUnit() {
        return $this->unit;
    }

    function getWeight() {
        return $this->weight;
    }

    function getTarget() {
        return $this->target;
    }

    function getScore1() {
        return $this->score1;
    }

    function getScore2() {
        return $this->score2;
    }

    function getScore3() {
        return $this->score3;
    }

    function getScore4() {
        return $this->score4;
    }

    function getScore5() {
        return $this->score5;
    }

    function getRemark() {
        return $this->remark;
    }

    function getIsApprove() {
        return $this->isApprove;
    }

    function getIsCancel() {
        return $this->isCancel;
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

    function setOrgFacultyId($orgFacultyId) {
        $this->orgFacultyId = $orgFacultyId;
    }

    function setPlanTargetId($planTargetId) {
        $this->planTargetId = $planTargetId;
    }

    function setPlanKpiId($planKpiId) {
        $this->planKpiId = $planKpiId;
    }

    function setIsWork($isWork) {
        $this->isWork = $isWork;
    }

    function setNo($no) {
        $this->no = $no;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setWeight($weight) {
        $this->weight = $weight;
    }

    function setTarget($target) {
        $this->target = $target;
    }

    function setScore1($score1) {
        $this->score1 = $score1;
    }

    function setScore2($score2) {
        $this->score2 = $score2;
    }

    function setScore3($score3) {
        $this->score3 = $score3;
    }

    function setScore4($score4) {
        $this->score4 = $score4;
    }

    function setScore5($score5) {
        $this->score5 = $score5;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setIsApprove($isApprove) {
        $this->isApprove = $isApprove;
    }

    function setIsCancel($isCancel) {
        $this->isCancel = $isCancel;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }


    
}
