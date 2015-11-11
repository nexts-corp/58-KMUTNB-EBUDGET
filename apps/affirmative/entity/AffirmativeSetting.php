<?php

namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Setting")
 */
class AffirmativeSetting extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="SettingId")
     * @GeneratedValue
     */
    public $settingId;

    /** @Column(type="integer",length=11, name="MainId") */
    public $mainId;

    /** @Column(type="integer",length=11, name="MainSeq") */
    public $mainSeq;

    /** @Column(type="integer",length=11, name="TypeId") */
    public $typeId;

    /** @Column(type="integer",length=11, name="TypeSeq") */
    public $typeSeq;

    /** @Column(type="string",length=255, name="GroupCode") */
    public $groupCode;

    /** @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /** @Column(type="text", name="Title") */
    public $title;

    /** @Column(type="string",length=255, name="Remark") */
    public $remark;

}
