<?php

namespace apps\budget\interfaces;

/**
 * @name IApproveService
 * @uri /approve
 * @description ApproveService
 */
interface IApproveService{
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

    /**
     * @name updateStatus
     * @uri /updateStatus
     * @param string bgType Description
     * @param object listBg Description listID Budget
     * @param string status Description
     * @return boolean results Description
     * @description เปลี่ยนแปลงสถานะทั้งหมด
     */
    public function updateStatusBG($bgType, $listBg, $status);

     /**
     * @name updateComment
     * @uri /updateComment
     * @param apps\common\entity\Budget data
     * @param apps\common\entity\Budget bgType
     * @return boolean result Description
     * @description อัพเดทหมายเหตุ
     */
    public function updateComment($data,$bgType);
}
