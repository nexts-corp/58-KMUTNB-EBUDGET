<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="tracking_step")
 */
class TrackingStep extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="lk_tracking_group_id") */
    public $trackingGroupId;

    /** @Column(type="string",length=255, name="step") */
    public $step;

    /** @Column(type="string",length=100, name="before_step_id") */
    public $beforeStepId;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getTrackingGroupId() {
        return $this->trackingGroupId;
    }

    function getStep() {
        return $this->step;
    }

    function getBeforeStepId() {
        return $this->beforeStepId;
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

    function setTrackingGroupId($trackingGroupId) {
        $this->trackingGroupId = $trackingGroupId;
    }

    function setStep($step) {
        $this->step = $step;
    }

    function setBeforeStepId($beforeStepId) {
        $this->beforeStepId = $beforeStepId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
