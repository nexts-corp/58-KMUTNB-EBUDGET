<?php

namespace apps\bginfo\interfaces;

use th\co\bpg\cde\core\CServiceBase;

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
     * @name fetchFaculty
     * @uri /fetchFaculty
     * @param String idCampus Description
     * @return String[] listsFaculty
     * @description ข้อมูลคณะทั้งหมด
     */
    public function fetchFaculty($idCampus);

    /**
     * @name fetchDepartment
     * @uri /fetchDepartment
     * @param String idFaculty Description
     * @return String[] listsDepartment
     * @description ข้อมูลหน่วยงานทั้งหมด
     */
    public function fetchDepartment($idFaculty);

    /**
     * @name fetchActivityType
     * @uri /fetchActivityType
     * @return String[] listsActivityType
     * @description ข้อมูลชนิดกิจกรรม
     */
    public function fetchActivityType();

    /**
     * @name insertCampus
     * @uri /insertCampus
     * @param apps\common\entity\LKCampus campus Description
     * @return boolean rsp
     * @description เพิ่มวิทยาเขต
     */
    public function insertCampus($campus);

    /**
     * @name editCampus
     * @uri /editCampus
     * @param apps\common\entity\LKCampus campus Description
     * @return boolean rsp
     * @description แก้ไขวิทยาเขต
     */
    public function editCampus($campus);

    /**
     * @name removeCampus
     * @uri /removeCampus
     * @param apps\common\entity\LKCampus campus Description
     * @return boolean rsp
     * @description เปลี่ยนสถานะวิทยาเขต
     */
    public function removeCampus($campus);

    /**
     * @name insertFaculty
     * @uri /insertFaculty
     * @param apps\common\entity\LKFaculty faculty Description
     * @return boolean rsp
     * @description เพิ่มคณะ
     */
    public function insertFaculty($faculty);

    /**
     * @name editFaculty
     * @uri /editFaculty
     * @param apps\common\entity\LKFaculty faculty Description
     * @return boolean rsp
     * @description แก้ไขคณะ
     */
    public function editFaculty($faculty);

    /**
     * @name removeFaculty
     * @uri /removeFaculty
     * @param apps\common\entity\LKFaculty faculty Description
     * @return boolean rsp
     * @description เปลี่ยนสถานะคณะ
     */
    public function removeFaculty($faculty);

    /**
     * @name insertDeaprtment
     * @uri /insertDeaprtment
     * @param apps\common\entity\LKDepartment department Description
     * @return boolean rsp
     * @description เพิ่มหน่วยงาน
     */
    public function insertDeaprtment($department);

    /**
     * @name editDeaprtment
     * @uri /editDeaprtment
     * @param apps\common\entity\LKDepartment department Description
     * @return boolean rsp
     * @description แก้ไขหน่วยงาน
     */
    public function editDeaprtment($department);

    /**
     * @name removeDeaprtment
     * @uri /removeDeaprtment
     * @param apps\common\entity\LKDepartment department Description
     * @return boolean rsp
     * @description เปลี่ยนสถานะหน่วยงาน
     */
    public function removeDeaprtment($department);
}
