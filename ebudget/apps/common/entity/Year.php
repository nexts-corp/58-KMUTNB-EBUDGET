<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="YEAR")
 */
class Year extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="YEARID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUDGETYEAR") */
    public $year;

    /** @Column(type="string",length=20, name="YEARSTATUS") */
    public $yearStatus;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getYear() {
        return $this->year;
    }

    function getYearStatus() {
        return $this->yearStatus;
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

    function setYearStatus($yearStatus) {
        $this->yearStatus = $yearStatus;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
