<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Role")
 */
class Role extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="RoleId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=50, name="RoleName") */
    public $role;

    function getId() {
        return $this->id;
    }

    function getRole() {
        return $this->role;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRole($role) {
        $this->role = $role;
    }

}
