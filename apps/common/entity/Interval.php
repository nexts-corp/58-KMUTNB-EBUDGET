<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Interval")
 */
class Interval extends EntityBase {

     /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;
    
    /** @Column(type="string",length=100, name="Name") */
    public $name;
    
     /** @Column(type="integer",length=11, name="Interval") */
    public $interval;   
    
    /** @Column(type="boolean",length=1, name="Is_Affirmative") */
    public $isAffirmative;
    
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

    function getInterval() {
        return $this->interval;
    }

    function getIsAffirmative() {
        return $this->isAffirmative;
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

    function setInterval($interval) {
        $this->interval = $interval;
    }

    function setIsAffirmative($isAffirmative) {
        $this->isAffirmative = $isAffirmative;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }


}
