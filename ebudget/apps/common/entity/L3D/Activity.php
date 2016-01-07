<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Activity")
 */
class Activity extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ActivityId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="ProjectId") */
    public $projectId;

    /** @Column(type="string", length=100, name="ActivityName") */
    public $actName;

    /** @Column(type="integer",length=11, name="DepartmentId") */
    public $departmentId;

    /** @Column(type="string",length=1, name="ActivityStatus") */
    public $actStatus;

    /** @Column(type="string",length=1, name="ActivityType") */
    public $actType;

    /** @Column(type="integer",length=11, name="ActivityLevel") */
    public $actLevel;

    /** @Column(type="string",length=1, name="ReceiveAct") */
    public $receiveAct;

    /** @Column(type="string", length=100, name="ActivityNameENG") */
    public $actNameENG;

    function getId(){
        return $this->id;
    }

    function getProjectId(){
        return $this->projectId;
    }

    function getActName(){
        return $this->actName;
    }

    function getDepartmentId(){
        return $this->departmentId;
    }

    function getActStatus(){
        return $this->actStatus;
    }

    function getActType(){
        return $this->actType;
    }

    function getActLevel(){
        return $this->actLevel;
    }

    function getReceiveAct(){
        return $this->receiveAct;
    }

    function getActNameENG(){
        return $this->actNameENG;
    }

    function setId($id){
        $this->id = $id;
    }

    function setProjectId($projectId){
        $this->projectId = $projectId;
    }

    function setActName($actName){
        $this->actName = $actName;
    }

    function setDepartmentId($departmentId){
        $this->departmentId = $departmentId;
    }

    function setActStatus($actStatus){
        $this->actStatus = $actStatus;
    }

    function setActType($actType){
        $this->actType = $actType;
    }

    function setActLevel($actLevel){
        $this->actLevel = $actLevel;
    }

    function setReceiveAct($receiveAct){
        $this->receiveAct = $receiveAct;
    }

    function setActNameENG($actNameENG){
        $this->actNameENG = $actNameENG;
    }
}
