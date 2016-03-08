<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="ActionPlan_Final_Detail")
 */
class ActionPlanFinalDetail extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ActionPlanFinalDetailId")
     * @GeneratedValue
     */
    public $detailId;

    /**
     * @Column(type="integer",length=11,name="ActionPlanDraftDetailId")
     */
    public $draftDetailId;

    /** @Column(type="integer",length=11, name="ActionPlanFinalDetailSeq") */
    public $detailSeq;

    /** @Column(type="text", name="ActionPlanFinalDetailName") */
    public $detailName;

    /**
     * @Column(type="integer",length=11,name="ActionPlanFinalId")
     */
    public $finalId;

    /** @Column(type="string",length=255, name="Unit") */
    public $unit;

    /** @Column(type="string",length=255, name="Remark") */
    public $remark;

    /** @Column(type="string",length=10, name="IsApprove") */
    public $isApprove;

    /** @Column(type="string",length=10, name="IsActive") */
    public $isActive;

    function getDetailId() {
        return $this->detailId;
    }

    function getDraftDetailId() {
        return $this->draftDetailId;
    }

    function getDetailSeq() {
        return $this->detailSeq;
    }

    function getDetailName() {
        return $this->detailName;
    }

    function getFinalId() {
        return $this->finalId;
    }

    function getUnit() {
        return $this->unit;
    }

    function getRemark() {
        return $this->remark;
    }

    function getIsApprove() {
        return $this->isApprove;
    }

    function getIsActive() {
        return $this->isActive;
    }

    function setDetailId($detailId) {
        $this->detailId = $detailId;
    }

    function setDraftDetailId($draftDetailId) {
        $this->draftDetailId = $draftDetailId;
    }

    function setDetailSeq($detailSeq) {
        $this->detailSeq = $detailSeq;
    }

    function setDetailName($detailName) {
        $this->detailName = $detailName;
    }

    function setFinalId($finalId) {
        $this->finalId = $finalId;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setIsApprove($isApprove) {
        $this->isApprove = $isApprove;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

}
