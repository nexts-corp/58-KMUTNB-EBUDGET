<?php

namespace apps\common\entity;

/**
 * @MappedSuperclass
 * @HasLifecycleCallbacks
 */
class EntityBase {

    /**
     * @column(name="CREATEDATETIME",type="datetime")
     */
    public $dateCreated;

    /**
     * @column(name="LASTUPDATEDATETIME",type="datetime")
     */
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

    public function getDateCreated() {
        return $this->dateCreated;
    }

    public function getDateUpdated() {
        return $this->dateUpdated;
    }

    public function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
    }

    public function setDateUpdated($dateUpdated) {
        $this->dateUpdated = $dateUpdated;
    }

}
