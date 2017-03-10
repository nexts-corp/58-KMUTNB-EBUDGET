<?php

namespace apps\actionplan\model;

/**
 * @Entity
 * @Table(name="View_Activity_Department")
 */
class ViewActivityDepartment {

    /**
     * @Id 
     * @Column(type="integer",length=11, name="DepartmentId") */
    public $departmentId;

    /**
     * @Column(type="string",length=255,name="DepartmentName")
     */
    public $departmentName;

    /**
     * @Id 
     * @Column(type="integer",length=11, name="ActivityId") */
    public $activityId;

    /**
     * @Column(type="string",length=255,name="ActivityName")
     */
    public $activityName;

    /**
     * @Column(type="string",length=255,name="ActivityCode")
     */
    public $activityCode;

}
