<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Web_Menu")
 */
class WebMenu extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=255, name="Menu_TH") */
    public $menuTh;

    /** @Column(type="string",length=255, name="Menu_EN") */
    public $menuEn;

    /** @Column(type="boolean",length=1, name="Is_Tracking") */
    public $isTracking;

    /** @Column(type="integer",length=11, name="Tracking_Step_Id") */
    public $trackingStepId;

    /** @Column(type="integer",length=11, name="Web_Menu_Type_Id") */
    public $webMenuTypeId;

    /** @Column(type="string",length=255, name="Link") */
    public $link;

    /** @Column(type="string",length=255, name="On_Click") */
    public $onClick;

    /** @Column(type="integer",length=11, name="Parent_Id") */
    public $parentId;

    /** @Column(type="integer",length=11, name="Order") */
    public $order;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getMenuTh() {
        return $this->menuTh;
    }

    function getMenuEn() {
        return $this->menuEn;
    }

    function getIsTracking() {
        return $this->isTracking;
    }

    function getTrackingStepId() {
        return $this->trackingStepId;
    }

    function getWebMenuTypeId() {
        return $this->webMenuTypeId;
    }

    function getLink() {
        return $this->link;
    }

    function getOnClick() {
        return $this->onClick;
    }

    function getParentId() {
        return $this->parentId;
    }

    function getOrder() {
        return $this->order;
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

    function setMenuTh($menuTh) {
        $this->menuTh = $menuTh;
    }

    function setMenuEn($menuEn) {
        $this->menuEn = $menuEn;
    }

    function setIsTracking($isTracking) {
        $this->isTracking = $isTracking;
    }

    function setTrackingStepId($trackingStepId) {
        $this->trackingStepId = $trackingStepId;
    }

    function setWebMenuTypeId($webMenuTypeId) {
        $this->webMenuTypeId = $webMenuTypeId;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setOnClick($onClick) {
        $this->onClick = $onClick;
    }

    function setParentId($parentId) {
        $this->parentId = $parentId;
    }

    function setOrder($order) {
        $this->order = $order;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
