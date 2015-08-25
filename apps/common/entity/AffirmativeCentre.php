<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Affirmative_Centre")
 */
class AffirmativeCentre extends EntityBase {
 
    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;
    
    /** @Column(type="integer",length=11, name="Plan_Target_Id") */
    public $planTargetId;
    
    /** @Column(type="integer",length=11, name="Plan_Kpi_Id") */
    public $planKpiId;
    
    /** @Column(type="string",length=100, name="No") */
    public $no;
    
    /** @Column(type="text", name="Name") */
    public $name;

    /** @Column(type="string",length=100, name="Unit") */
    public $unit;  
    
    /** @Column(type="boolean",length=1, name="Is_Education") */
    public $isEducation;
    
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

    /** @Column(type="string",length=100, name="Weight") */
    public $weight;  
    
    /** @Column(type="boolean",length=1, name="Is_Support") */
    public $isSupport;

    /** @Column(type="boolean",length=1, name="Is_Service") */
    public $isService;

    /** @Column(type="text", name="Remark") */
    public $remark;
    
    /** @Column(type="string",length=100, name="Target") */
    public $target;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;
    
    /** @Column(type="string",length=100, name="Updater") */
    public $updater;
    
    
    function getId() {
        return $this->id;
    }

    function getPlanTargetId() {
        return $this->planTargetId;
    }

    function getPlanKpiId() {
        return $this->planKpiId;
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

    function getIsEducation() {
        return $this->isEducation;
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

    function getWeight() {
        return $this->weight;
    }

    function getIsSupport() {
        return $this->isSupport;
    }

    function getIsService() {
        return $this->isService;
    }

    function getRemark() {
        return $this->remark;
    }

    function getTarget() {
        return $this->target;
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

    function setPlanTargetId($planTargetId) {
        $this->planTargetId = $planTargetId;
    }

    function setPlanKpiId($planKpiId) {
        $this->planKpiId = $planKpiId;
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

    function setIsEducation($isEducation) {
        $this->isEducation = $isEducation;
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

    function setWeight($weight) {
        $this->weight = $weight;
    }

    function setIsSupport($isSupport) {
        $this->isSupport = $isSupport;
    }

    function setIsService($isService) {
        $this->isService = $isService;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setTarget($target) {
        $this->target = $target;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }


}
