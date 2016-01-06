<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Plan")
 */
class Plan extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="PlanId")
     */
    public $id;

    /** @Column(type="string",length=100, name="PlanName") */
    public $planName;

    /** @Column(type="integer",length=11, name="MasterId") */
    public $masterId;

    function getId() {
        return $this->id;
    }

    function getPlanName() {
        return $this->planName;
    }

    function getMasterId() {
        return $this->masterId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPlanName($planName) {
        $this->planName = $planName;
    }

    function setMasterId($masterId) {
        $this->masterId = $masterId;
    }
}

?>
