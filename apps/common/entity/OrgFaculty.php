<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Org_Faculty")
 */
class OrgFaculty extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;
    
     /** @Column(type="string",length=200, name="Name") */
    public $name;
    
    /** @Column(type="integer",length=11, name="Work_Type_Id") */
    public $workTypeId;    
    
    /** @Column(type="string",length=100, name="Creator") */
    public $creator;
    
    /** @Column(type="string",length=100, name="Updater") */
    public $updater;    
    
    
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getWorkTypeId() {
        return $this->workTypeId;
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

    function setName($name) {
        $this->name = $name;
    }

    function setWorkTypeId($workTypeId) {
        $this->workTypeId = $workTypeId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }


    
    
    
    
    
}
