<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Attachment")
 */
class Attachment extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AttachmentId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="text", name="Description") */
    public $desc;

    /** @Column(type="string",length=10, name="Path") */
    public $path;

    function getId() {
        return $this->id;
    }

    function getDesc() {
        return $this->desc;
    }

    function getPath() {
        return $this->path;
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
}
