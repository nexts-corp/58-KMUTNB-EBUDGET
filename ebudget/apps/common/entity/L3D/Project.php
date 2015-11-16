<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_PROJECT")
 */
class Project extends EntityBase {

    /** @Column(type="integer",length=11,name="PLANID") */
    public $planId;

    /**
     * @Id
     * @Column(type="integer",length=11,name="PROJECTID") */
    public $projectId;

    /** @Column(type="string",length=250, name="PROJECTNAME") */
    public $projectName;

    /** @column(type="datetime"),name="DATEFROM" */
    public $dateFrom;

    /** @column(type="datetime",name="DATETO") */
    public $dateTo;

    /** @Column(type="string",length=1, name="PROJECTSTATUS") */
    public $projectStatus;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getPlanId() {
        return $this->planId;
    }

    function getProjectId() {
        return $this->projectId;
    }

    function getProjectName() {
        return $this->projectName;
    }

    function getDateFrom() {
        return $this->dateFrom;
    }

    function getDateTo() {
        return $this->dateTo;
    }

    function getProjectStatus() {
        return $this->projectStatus;
    }

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
    }

    function setPlanId($planId) {
        $this->planId = $planId;
    }

    function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    function setProjectName($projectName) {
        $this->projectName = $projectName;
    }

    function setDateFrom($dateFrom) {
        $this->dateFrom = $dateFrom;
    }

    function setDateTo($dateTo) {
        $this->dateTo = $dateTo;
    }

    function setProjectStatus($projectStatus) {
        $this->projectStatus = $projectStatus;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
