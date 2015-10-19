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

    /** @Column(type="string",length=300, name="ATTACHMENTDESCRIPTION") */
    public $desc;

    /** @Column(type="string",length=10, name="PATH") */
    public $path;

    /** @Column(type="text", name="remark") */
    public $remark;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getPath() {
        return $this->path;
    }

    function getExt() {
        return $this->ext;
    }

    function getRemark() {
        return $this->remark;
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

    function setPath($path) {
        $this->path = $path;
    }

    function setExt($ext) {
        $this->ext = $ext;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
