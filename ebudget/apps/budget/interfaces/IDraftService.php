<?php

namespace apps\budget\interfaces;

/**
 * @name IDraftService
 * @uri /draft
 * @description DraftService
 */
interface IDraftService{
    /**
     * @name getAllBudgetRequest
     * @uri /getAllBudgetRequest
     * @param int deptId หน่วยงาน
     * @return string[] result
     * @description แสดงข้อมูลประเภทตามแหล่งเงิน
     */
    public function getAllBudgetRequest($deptId);

    /**
     * @name listForm
     * @uri /listForm
     * @return String[] lists Description
     * @description รายชื่อแบบคำของบประมาณแผ่นดิน
     */
    public function listForm();

    /**
     * @name list3DPlan
     * @uri /list3DPlan
     * @return String[] lists Description
     * @description รายชื่อแผนงานใน 3 มิติ
     */
    public function list3DPlan();

    /**
     * @name listFundgroupWithPlan
     * @uri /listFundgroupWithPlan
     * @param int l3dPlanId
     * @return String[] lists Description
     * @description รายชื่อกองทุน
     */
    public function listFundgroupWithPlan($l3dPlanId);

    /**
     * @name listFaculty
     * @uri /listFaculty
     * @return String[] lists Description
     * @description รายชื่อภาควิชา
     */
    public function listFaculty();

    /**
     * @name listDepartment
     * @uri /listDepartment
     * @param String facultyId รหัสภาควิชา
     * @return String[] lists Description
     * @description รายชื่อหน่วยงาน
     */
    public function listDepartment($facultyId);

}
