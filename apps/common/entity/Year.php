<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="year")
 */
class Year extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $year;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getYear() {
        return $this->year;
    }

    function getIsActive() {
        return $this->isActive;
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

    function setYear($year) {
        $this->year = $year;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
