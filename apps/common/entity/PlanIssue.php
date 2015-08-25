<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Plan_Issue")
 */
class PlanIssue extends EntityBase {

     /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;
    
     /** @Column(type="integer",length=11, name="Plan_Type_Id") */
    public $planTypeId;
    
     /** @Column(type="text", name="Name") */
    public $name;
    
    /** @Column(type="string",length=100, name="Creator") */
    public $creator;
    
    /** @Column(type="string",length=100, name="Updater") */
    public $updater;    
    
    
    
    
    
    function getId() {
        return $this->id;
    }

    function getPlanTypeId() {
        return $this->planTypeId;
    }

    function getName() {
        return $this->name;
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

    function setPlanTypeId($planTypeId) {
        $this->planTypeId = $planTypeId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
