<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Center_Group")
 */
class AffirmativeCenterGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeCenterGroupId")
     * @GeneratedValue
     */
    public $centerGroupId;

    /** @Column(type="integer",length=11, name="AffirmativeCenterId") */
    public $centerId;

    /** @Column(type="string",length=255, name="ActivityTypeCode") */
    public $groupCode;

    public $groupName;

    function getCenterGroupId() {
        return $this->centerGroupId;
    }

    function getGroupCode() {
        return $this->groupCode;
    }

    function getCenterId() {
        return $this->centerId;
    }

    function setCenterGroupId($centerGroupId) {
        $this->centerGroupId = $centerGroupId;
    }

    function setGroupCode($groupCode) {
        $this->groupCode = $groupCode;
    }

    function setCenterId($centerId) {
        $this->centerId = $centerId;
    }

}
