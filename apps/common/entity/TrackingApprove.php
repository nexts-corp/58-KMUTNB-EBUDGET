<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Tracking_Approve")
 */
class TrackingApprove extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="Tracking_Step_Id") */
    public $trackingStepId;

    /** @Column(type="integer",length=11, name="Org_Faculty_Id") */
    public $orgFacultyId;

    /** @Column(type="integer",length=11, name="Interval_Id") */
    public $intervalId;

    /** @Column(type="boolean",length=1, name="Tracking_Status_Id") */
    public $trackingStatusId;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getTrackingStepId() {
        return $this->trackingStepId;
    }

    function getOrgFacultyId() {
        return $this->orgFacultyId;
    }

    function getIntervalId() {
        return $this->intervalId;
    }

    function getTrackingStatusId() {
        return $this->trackingStatusId;
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

    function setTrackingStepId($trackingStepId) {
        $this->trackingStepId = $trackingStepId;
    }

    function setOrgFacultyId($orgFacultyId) {
        $this->orgFacultyId = $orgFacultyId;
    }

    function setIntervalId($intervalId) {
        $this->intervalId = $intervalId;
    }

    function setTrackingStatusId($trackingStatusId) {
        $this->trackingStatusId = $trackingStatusId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
