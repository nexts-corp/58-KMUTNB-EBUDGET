<?php

namespace apps\revenue\interfaces;

/**
 * @name IBudgetService
 * @uri /budget
 * @description ประมูล
 */
interface IBudgetService {

    /**
     * @name lists3DPlan
     * @uri /lists3DPlan
     * @return String[] lists Description
     * @description รายชื่อแผนงานใน 3 มิติ
     */
    public function lists3DPlan();

    /**
     * @name listsFundgroup
     * @uri /listsFundgroup
     * @return String[] lists Description
     * @description รายชื่อกองทุน
     */
    public function listsFundgroup();

    /**
     * @name listsDepartment
     * @uri /listsDepartment
     * @param String facultyId รหัสภาควิชา
     * @return String[] lists Description
     * @description รายชื่อหน่วยงาน
     */
    public function listsDepartment($facultyId);

    /**
     * @name getRevenueItemList
     * @uri /getRevenueItemList
     * @param int deptId
     * @param int l3dPlanId
     * @param int fundgroupId
     * @param String bgCategory
     * @return String[] lists Description
     * @description โหลดรายการรายละเอียดเงินรายได้
     */
    public function getRevenueItemList($deptId, $l3dPlanId, $fundgroupId, $bgCategory);

    /**
     * @name insertRevenueItem
     * @uri /insertRevenueItem
     * @param apps\common\entity\BudgetRevenue budget
     * @param int facultyId คณะ
     * @return boolean add
     * @description เพิ่มรายการรายจ่ายจากเงินรายได้
     */
    public function insertRevenueItem($budget,$facultyId);

    /**
     * @name updateRevenueItem
     * @uri /updateRevenueItem
     * @param apps\common\entity\BudgetRevenue budget
     * @return boolean update
     * @description แก้ไขรายการรายจ่ายจากเงินรายได้
     */
    public function updateRevenueItem($budget);

    /**
     * @name deleteRevenueItem
     * @uri /deleteRevenueItem
     * @param int budgetId
     * @return boolean delete
     * @description ลบรายการรายจ่ายจากเงินรายได้
     */
    public function deleteRevenueItem($budgetId);

    /**
     * @name getSumRevenue
     * @uri /getSumRevenue
     * @param int facultyId
     * @param String bgCategory
     * @return string[] lists Description
     * @description ดึงเงินรวมของแจกแจง
     */
    public function getSumRevenue($facultyId,$bgCategory);
}
