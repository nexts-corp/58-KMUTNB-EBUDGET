<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="MEMBERROLE")
 */
class MemberRole extends EntityBase {

    /** @Column(type="integer",length=11, name="MEMBERID") */
    public $memberId;

    /** @Column(type="integer",length=11, name="ROLEID") */
    public $roleId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getMemberId() {
        return $this->memberId;
    }

    function getRoleId() {
        return $this->roleId;
    }

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
    }

    function setMemberId($memberId) {
        $this->memberId = $memberId;
    }

    function setRoleId($roleId) {
        $this->roleId = $roleId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
