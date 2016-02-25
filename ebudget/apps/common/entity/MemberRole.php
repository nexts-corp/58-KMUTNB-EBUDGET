<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Member_Role")
 */
class MemberRole extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="MemberId")
     */
    public $memberId;

    /** @Column(type="integer",length=11,name="RoleId") */
    public $roleId;

    function getMemberId() {
        return $this->memberId;
    }

    function getRoleId() {
        return $this->roleId;
    }

    function setMemberId($memberId) {
        $this->memberId = $memberId;
    }

    function setRoleId($roleId) {
        $this->roleId = $roleId;
    }

}
