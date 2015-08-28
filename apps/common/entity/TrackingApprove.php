<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="tracking_approve")
 */
class TrackingApprove extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="tracking_step_id") */
    public $trackingStepId;

    /** @Column(type="integer",length=11, name="lk_faculty_id") */
    public $facultyId;

    /** @Column(type="integer",length=11, name="lk_tracking_interval_id") */
    public $trackingIntervalId;

    /** @Column(type="boolean",length=1, name="lk_tracking_status_id") */
    public $trackingStatusId;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getTrackingStepId() {
        return $this->trackingStepId;
    }

    function getFacultyId() {
        return $this->facultyId;
    }

    function getTrackingIntervalId() {
        return $this->trackingIntervalId;
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

    function setFacultyId($facultyId) {
        $this->facultyId = $facultyId;
    }

    function setTrackingIntervalId($trackingIntervalId) {
        $this->trackingIntervalId = $trackingIntervalId;
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
