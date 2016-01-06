<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Integration")
 */
class Integration extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="IntegrationId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=500, name="IntegrationName") */
    public $name;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }
}
