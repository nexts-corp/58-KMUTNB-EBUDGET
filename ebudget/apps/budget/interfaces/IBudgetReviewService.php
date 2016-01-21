<?php

namespace apps\budget\interfaces;

/**
 * @name IBudgetReviewService
 * @uri /budgetReview
 * @description BudgetReviewService
 */
interface IBudgetReviewService {

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
     * @param int deptId หน่วยงาน
     * @param int budgetTypeCode ประเภทงบ
     * @return string[] result
     * @description แสดงข้อมูลประเภทตามแหล่งเงิน
     */
    public function getAllBudgetRequest($deptId, $budgetTypeCode);

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
     * @name updateScheme
     * @uri /updateScheme
     * @param apps\budget\model\BudgetSchemeResult[] budget
     * @return boolean result Description
     * @description ปรับปรุงข้อมูลแผน/ผล
     */
    public function updateScheme($budget);

    /**
     * @name listAllBudgetExpense
     * @uri /listAllBudgetExpense
     * @param int facultyId คณะ
     * @return String[] list
     * @description รายการโครงการจากเงินรายได้
     */
    public function listAllBudgetExpense($facultyId);

    /**
     * @name viewBudgetExpense
     * @uri /viewBudgetExpense
     * @param int expId
     * @return string[] result
     * @description แบบเสนอโครงการจากเงินรายได้
     */
    public function viewBudgetExpense($expId);

    /**
     * @name addBudgetExpense
     * @uri /addBudgetExpense
     * @param apps\common\entity\BudgetExpense bgExp
     * @param apps\common\entity\BudgetExpenseAffirmative[] bgAff
     * @param apps\common\entity\BudgetExpenseIntegration[] bgInt
     * @param apps\common\entity\BudgetExpenseOperating[] bgOper
     * @param apps\common\entity\BudgetExpensePlan[] bgPlan
     * @return string[] result
     * @description แบบเสนอโครงการจากเงินรายได้
     */
    public function addBudgetExpense($bgExp, $bgAff, $bgInt, $bgOper, $bgPlan);
    
    /**
     * @name updateBudgetExpense
     * @uri /updateBudgetExpense
     * @param apps\common\entity\BudgetExpense bgExp
     * @param apps\common\entity\BudgetExpenseAffirmative[] bgAff
     * @param apps\common\entity\BudgetExpenseIntegration[] bgInt
     * @param apps\common\entity\BudgetExpenseOperating[] bgOper
     * @param apps\common\entity\BudgetExpensePlan[] bgPlan
     * @return string[] result
     * @description แบบเสนอโครงการจากเงินรายได้
     */
    public function updateBudgetExpense($bgExp, $bgAff, $bgInt, $bgOper, $bgPlan);
    
}
