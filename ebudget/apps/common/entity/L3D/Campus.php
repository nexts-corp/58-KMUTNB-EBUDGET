<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Campus")
 */
class Campus extends EntityBase
{

    /**
     * @Id
     * @Column(type="integer",length=11,name="CampusId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=255, name="CampusName") */
    public $campusName;

    /** @Column(type="string",length=1, name="CampusStatus") */
    public $campusStatus;

    function getId(){
        return $this->id;
    }

    function getCampusName(){
        return $this->campusName;
    }

    function getCampusStatus(){
        return $this->campusStatus;
    }

    function setId($id){
        $this->id = $id;
    }

    function setCampusName($campusName){
        $this->campusName = $campusName;
    }

    function setCampusStatus($campusStatus){
        $this->campusStatus = $campusStatus;
    }
}
