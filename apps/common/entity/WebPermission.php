<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Web_Permission")
 */
class WebPermission extends EntityBase {

    /** @Column(type="integer",length=11, name="Web_Menu_Id") */
    public $webMenuId;

    /** @Column(type="integer",length=11, name="Web_Role_Id") */
    public $webRoleId;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getWebMenuId() {
        return $this->webMenuId;
    }

    function getWebRoleId() {
        return $this->webRoleId;
    }

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
    }

    function setWebMenuId($webMenuId) {
        $this->webMenuId = $webMenuId;
    }

    function setWebRoleId($webRoleId) {
        $this->webRoleId = $webRoleId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
