<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="MENUROLE")
 */
class MenuRole extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="MENUID")
     * @GeneratedValue
     */
    public $menuId;

    /**
     * @Column(type="string",length=20,name="LISTID")
     */
    public $listId;

    /**
     * @Column(type="string",length=20,name="ROLE")
     */
    public $roleId;

    /**
     * @Column(type="integer",length=11,name="MEMBERID")
     */
    public $memberId;
    
    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    public function getMenuId() {
        return $this->menuId;
    }

    public function getListId() {
        return $this->listId;
    }

    public function getRoleId() {
        return $this->roleId;
    }

    public function getCreator() {
        return $this->creator;
    }

    public function getUpdater() {
        return $this->updater;
    }

    public function setMenuId($menuId) {
        $this->menuId = $menuId;
    }

    public function setListId($listId) {
        $this->listId = $listId;
    }

    public function setRoleId($roleId) {
        $this->roleId = $roleId;
    }

    public function setCreator($creator) {
        $this->creator = $creator;
    }

    public function setUpdater($updater) {
        $this->updater = $updater;
    }
    public function getMemberId() {
        return $this->memberId;
    }
    public function setMemberId($memberId) {
        $this->memberId = $memberId;
    }


    
}
