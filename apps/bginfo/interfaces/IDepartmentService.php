<?php

namespace apps\bginfo\interfaces;


/**
 * @name DepartmentService
 * @uri /Department
 * @description ระบบจัดการข้อมูลด้านหน่วยงาน
 */
interface IDepartmentService
{

    /**
     * @name viewDepartment
     * @uri /viewDepartment
     * @description หน้าจัดการหน่วยงาน
     */
    public function viewDepartment();

    /**
     * @name fetchCampus
     * @uri /fetchCampus
     * @return String[] listsCampus
     * @description ข้อมูลวิทยาเขตทั้งหมด
     */
    public function fetchCampus();

    /**
     * @name fetchDepartment
     * @uri /fetchDepartment
     * @param String campusID Description
     * @return String[] listsDepartment
     * @description ข้อมูลหน่วยงานทั้งหมด
     */
    public function fetchDepartment($campusID);

}
