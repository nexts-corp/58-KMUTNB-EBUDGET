<?php

namespace apps\affirmative\entity;
use apps\common\entity\EntityBase;
/**
 * @Entity
 * @Table(name="Affirmative_Group")
 */
class AffirmativeGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="GroupId")
     * @GeneratedValue
     */
    public $groupId;

    /** @Column(type="string",length=255, name="GroupCode") */
    public $groupCode;

    /** @Column(type="string",length=255, name="GroupName") */
    public $groupName;

    function getGroupId() {
        return $this->groupId;
    }

    function getGroupCode() {
        return $this->groupCode;
    }

    function getGroupName() {
        return $this->groupName;
    }

    function setGroupId($groupId) {
        $this->groupId = $groupId;
    }

    function setGroupCode($groupCode) {
        $this->groupCode = $groupCode;
    }

    function setGroupName($groupName) {
        $this->groupName = $groupName;
    }

}
