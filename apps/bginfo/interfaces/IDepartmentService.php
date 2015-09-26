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


    /**
     * @name fetchDepartmentMain
     * @uri /fetchDepartmentMain
     * @param String campusID Description
     * @return String[] listsDepartment
     * @description ข้อมูลหน่วยงานหลัก
     */
    public function fetchDepartmentMain($campusID);


    /**
     * @name fetchActivityType
     * @uri /fetchActivityType
     * @return String[] listsActivityType
     * @description รายการประเภทส่วนงาน
     */
    public function fetchActivityType();


    /**
     * @name saveDept
     * @uri /saveDept
     * @param apps\common\entity\L3D\Department dataDept Description
     * @param apps\common\entity\MappingDepartmentType dataMaping Description
     * @return String mapid
     * @description บันทึกหน่วยงาน
     */
    public function saveDepartment($dataDept, $dataMaping);

    /**
     * @name editDept
     * @uri /editDept
     * @param apps\common\entity\L3D\Department dataDept Description
     * @param apps\common\entity\MappingDepartmentType dataMaping Description
     * @return boolean status
     * @description แก้ไขหน่วยงาน
     */
    public function editDepartment($dataDept, $dataMaping);


    /**
     * @name removeDept
     * @uri /removeDept
     * @param string idDept Description
     * @param string mapid Description
     * @return boolean status
     * @description ลบหน่วยงาน
     */
    public function removeDepartment($idDept, $mapid);

}
