<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Project")
 */
class Project extends EntityBase {

    /** @Column(type="integer",length=11,name="PlanId") */
    public $planId;

    /**
     * @Id
     * @Column(type="integer",length=11,name="ProjectId") */
    public $projectId;

    /** @Column(type="string",length=250, name="ProjectName") */
    public $projectName;

    /** @column(type="datetime"),name="DateFrom" */
    public $dateFrom;

    /** @column(type="datetime",name="DateTo") */
    public $dateTo;

    /** @Column(type="string",length=1, name="ProjectStatus") */
    public $projectStatus;

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
}

?>
