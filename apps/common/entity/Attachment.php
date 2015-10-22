<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="ATTACHMENT")
 */
class Attachment extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ATTACHMENTID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="text", name="ATTACHMENTDESCRIPTION") */
    public $desc;

    /** @Column(type="string",length=10, name="PATH") */
    public $path;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getDesc() {
        return $this->desc;
    }

    function getPath() {
        return $this->path;
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

    function setDesc($desc) {
        $this->desc = $desc;
    }

    function setPath($path) {
        $this->path = $path;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
