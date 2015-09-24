<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="INTEGRATION")
 */
class Integration extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="INTEGRATIONID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=500, name="INTEGRATIONNAME") */
    public $name;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
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

?>
