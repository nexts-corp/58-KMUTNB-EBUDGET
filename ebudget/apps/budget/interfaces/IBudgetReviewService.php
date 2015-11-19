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
}
