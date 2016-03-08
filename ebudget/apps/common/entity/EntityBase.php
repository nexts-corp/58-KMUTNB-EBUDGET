<?php

namespace apps\common\entity;

/**
 * @MappedSuperclass
 * @HasLifecycleCallbacks
 */
class EntityBase {
    /** @Column(type="string",length=20, name="CreateUserId") */
    public $creator;

    /** @Column(type="string",length=20, name="LastUpdateUserId") */
    public $updater;

    /** @column(type="datetime", name="CreateDatetime") */
    public $dateCreated;

    /** @column(type="datetime", name="LastUpdateDatetime") */
    public $dateUpdated;

    /**
     * @PrePersist
     */
    function prePersist() {
        $this->dateCreated = new \DateTime("now");
    }

    /**
     * @PreUpdate
     */
    function preUpdate() {
        $this->dateUpdated = new \DateTime("now");
    }

    public function getCreator() {
        return $this->creator;
    }

    public function getUpdater() {
        return $this->updater;
    }

    public function getDateCreated() {
        return $this->dateCreated;
    }

    public function getDateUpdated() {
        return $this->dateUpdated;
    }

    public function setCreator($creator) {
        $this->creator = $creator;
    }

    public function setUpdater($updater) {
        $this->updater = $updater;
    }

    public function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
    }

    public function setDateUpdated($dateUpdated) {
        $this->dateUpdated = $dateUpdated;
    }
    
    public    function _clone() {
        $refs=new \ReflectionClass($this);
        $obj=$refs->newInstance();
        $ppros=$refs->getProperties();
        foreach ($ppros as $p){
            $name=$p->getName();
            $obj->{$name}=(Object)$this->{$name};
        }
        return $obj;
    }
    public function __clone() {
        //$this->;
    }
}
