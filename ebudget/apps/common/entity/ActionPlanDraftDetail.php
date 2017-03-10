<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="ActionPlan_Draft_Detail")
 */
class ActionPlanDraftDetail extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ActionPlanDraftDetailId")
     * @GeneratedValue
     */
    public $detailId;

    /** @Column(type="integer",length=11, name="ActionPlanDraftDetailSeq") */
    public $detailSeq;

    /** @Column(type="text", name="ActionPlanDraftDetailName") */
    public $detailName;

    /**
     * @Column(type="integer",length=11,name="ActionPlanDraftId")
     */
    public $draftId;

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

    function getDetailSeq() {
        return $this->detailSeq;
    }

    function getDetailName() {
        return $this->detailName;
    }

    function getDraftId() {
        return $this->draftId;
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

    function setDetailSeq($detailSeq) {
        $this->detailSeq = $detailSeq;
    }

    function setDetailName($detailName) {
        $this->detailName = $detailName;
    }

    function setDraftId($draftId) {
        $this->draftId = $draftId;
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
