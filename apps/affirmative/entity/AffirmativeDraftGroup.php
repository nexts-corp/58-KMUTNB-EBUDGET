<?php

namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Draft_Group")
 */
class AffirmativeDraftGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="DraftGroupId")
     * @GeneratedValue
     */
    public $draftGroupId;

    /** @Column(type="integer",length=11, name="DraftId") */
    public $draftId;

    /** @Column(type="string",length=255, name="GroupCode") */
    public $groupCode;
    public $groupName;

    function getDraftGroupId() {
        return $this->draftGroupId;
    }

    function getGroupCode() {
        return $this->groupCode;
    }

    function getDraftId() {
        return $this->draftId;
    }

    function setDraftGroupId($draftGroupId) {
        $this->draftGroupId = $draftGroupId;
    }

    function setGroupCode($groupCode) {
        $this->groupCode = $groupCode;
    }

    function setDraftId($draftId) {
        $this->draftId = $draftId;
    }

}
