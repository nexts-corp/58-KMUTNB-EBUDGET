<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Tracking_Step")
 */
class TrackingStep extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="Tracking_Group_Id") */
    public $trackingGroupId;

    /** @Column(type="string",length=255, name="Step") */
    public $step;

    /** @Column(type="string",length=100, name="Before_Step_Id") */
    public $beforeStepId;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
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
