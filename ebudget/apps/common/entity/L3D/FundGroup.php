<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Fund_Group")
 */
class FundGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="FundGroupId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=255, name="FundGroupName") */
    public $fundgroupName;

    function getId() {
        return $this->id;
    }

    function getFundgroupName() {
        return $this->fundgroupName;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFundgroupName($fundgroupName) {
        $this->fundgroupName = $fundgroupName;
    }
}
