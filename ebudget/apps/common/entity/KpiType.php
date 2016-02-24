<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Kpi_Type")
 */
class KpiType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="KpiTypeId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=100, name="KpiTypeDesc") */
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
