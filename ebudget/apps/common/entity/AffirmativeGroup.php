<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Group")
 */
class AffirmativeGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeGroupId")
     * @GeneratedValue
     */
    public $groupId;

    /** @Column(type="string",length=255, name="AffirmativeGroupCode") */
    public $groupCode;

    /** @Column(type="string",length=255, name="AffirmativeGroupName") */
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
