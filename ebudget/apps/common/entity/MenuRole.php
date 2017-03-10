<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Menu_Role")
 */
class MenuRole extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="MenuId")
     * @GeneratedValue
     */
    public $menuId;

    /** @Column(type="string",length=20,name="ListId") */
    public $listId;

    /** @Column(type="string",length=20,name="Role") */
    public $roleId;

    /** @Column(type="integer",length=11,name="MemberId") */
    public $memberId;
    
    public function getMenuId() {
        return $this->menuId;
    }

    public function getListId() {
        return $this->listId;
    }

    public function getRoleId() {
        return $this->roleId;
    }

    public function getMemberId() {
        return $this->memberId;
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

    public function setMemberId($memberId) {
        $this->memberId = $memberId;
    }
}
