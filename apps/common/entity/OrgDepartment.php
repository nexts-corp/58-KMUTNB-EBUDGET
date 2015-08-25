<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Org_Department")
 */
class OrgDepartment extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="Org_Faculty_Id") */
    public $orgFacaltyId;

    /** @Column(type="string",length=200, name="Name") */
    public $name;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getOrgFacaltyId() {
        return $this->orgFacaltyId;
    }

    function getName() {
        return $this->name;
    }

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setOrgFacaltyId($orgFacaltyId) {
        $this->orgFacaltyId = $orgFacaltyId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
