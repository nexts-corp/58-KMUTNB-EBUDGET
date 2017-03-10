<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Year")
 */
class Year extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="YearId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BudgetYear") */
    public $year;

    /** @Column(type="string",length=20, name="YearStatus") */
    public $yearStatus;

    function getId() {
        return $this->id;
    }

    function getYear() {
        return $this->year;
    }

    function getYearStatus() {
        return $this->yearStatus;
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
}
