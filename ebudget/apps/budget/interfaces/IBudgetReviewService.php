<?php

namespace apps\budget\interfaces;

/**
 * @name IBudgetReviewService
 * @uri /budgetReview
 * @description BudgetReviewService
 */
interface IBudgetReviewService
{

    /**
     * @name getReview
     * @uri /getReview
     * @param String budgetType Description ประเภทงบประมาณ
     * @param String year Description ปี พศ.
     * @return String[] listTracking
     * @description แสดงข้อมูลประเภทตามแหล่งเงิน
     */
    public function getReview($budgetType, $year);

    /**
     * @name getCatagory
     * @uri /getCatagory
     * @param String budgetType Description ประเภทงบประมาณ
     * @return String[] listCatagory
     * @description ข้อมูลcatagoryหมวดรายจ่าย
     */
    public function getCatagory($budgetType);

    /**
     * @name listBudgetExpense
     * @uri /listBudgetExpense
     * @return String[] list
     * @description ข้อมูลcatagoryหมวดรายจ่ายเงินรายได้
     */
    public function listBudgetExpense();

    /**
     * @name listBudgetExpenseInfo
     * @uri /listBudgetExpenseInfo
     * @param int budgetPeriodId
     * @param int fundgroupId
     * @param int planId
     * @param int deptId
     * @return string[] result
     * @description แบบเสนอโครงการที่ตอบสนองต่อยุทธศาสตร์
     */
    public function listBudgetExpenseInfo($budgetPeriodId, $fundgroupId, $planId, $deptId);


    /**
     * @name getAllBudgetRequest
     * @uri /getAllBudgetRequest
     * @param int budgetPeriodId ปีงบประมาณ
     * @param int deptId หน่วยงาน
     * @return string[] result
     * @description แสดงข้อมูลประเภทตามแหล่งเงิน
     */
    public function getAllBudgetRequest($budgetPeriodId, $deptId);

    /**
     * @name listTracking
     * @uri /listTracking
     * @return String[] lists
     * @description สถานะการติดตาม
     */
    public function listStatusTracking();
    
    
    
    /**
     * @name getBudgetScheme
     * @uri /getBudgetScheme
     * @param int budgetPeriodId ปีงบประมาณ
     * @param int budgetTypeCode ประเภทงบประมาณ
     * @param int deptId หน่วยงาน
     * @param int fundgroupId กองทุน
     * @param int planId แผน 3 มิติ
     * @return string[] result
     * @description แสดงข้อมูลแผนผลตามแหล่งเงิน
     */
    public function getBudgetScheme($budgetPeriodId, $budgetTypeCode, $deptId, $fundgroupId, $planId);
    
    /**
     * @name insertScheme
     * @uri /insertScheme
     * @param apps\common\entity\BudgetScheme budget
     * @return string[] result
     * @description เพิ่มข้อมูลแผนผล
     */
    public function insertScheme($budget);
    
    /**
     * @name updateScheme
     * @uri /updateScheme
     * @param apps\common\entity\BudgetScheme budget
     * @return string[] result
     * @description ปรับปรุงข้อมูลแผนผล
     */
    public function updateScheme($budget);
}
