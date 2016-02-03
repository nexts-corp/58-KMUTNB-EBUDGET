<?php

namespace apps\budget\interfaces;

/**
 * @name IProgressService
 * @uri /progress
 * @description ProgressService
 */
interface IProgressService {

    /**
     * @name getAllBudgetScheme
     * @uri /getAllBudgetScheme
     * @return string[] result
     * @description แสดงแผน/ผลการใช้งบประมาณแผ่นดิน
     */
    public function getAllBudgetScheme();

    /**
     * @name viewProgressBudget
     * @uri /viewProgressBudget
     * @param int facultyId หน่วยงานระดับคณะ
     * @param int fundgroupId กองทุน
     * @param int planId แผนงาน 3 มิติ
     * @return string[] result
     * @description เรียกดูรายงานแผน/ผลการใช้เงินงบประมาณแผ่นดิน
     */
    public function viewProgressBudget($facultyId, $fundgroupId, $planId);

    /**
     * @name updateBudgetScheme
     * @uri /updateBudgetScheme
     * @param apps\budget\model\BudgetSchemeResult[] budget
     * @return boolean result Description
     * @description ปรับปรุงข้อมูลแผน/ผลเงินงบประมาณแผ่นดิน
     */
    public function updateBudgetScheme($budget);

    /**
     * @name getAllRevenueScheme
     * @uri /getAllRevenueScheme
     * @return string[] result
     * @description แสดงแผน/ผลการใช้งบประมาณเงินรายได้
     */
    public function getAllRevenueScheme();

    /**
     * @name viewProgressRevenue
     * @uri /viewProgressRevenue
     * @param int facultyId หน่วยงานระดับคณะ
     * @param int fundgroupId กองทุน
     * @param int planId แผนงาน 3 มิติ
     * @param string catId แหล่งเงิน
     * @return string[] result
     * @description เรียกดูรายงานแผน/ผลการใช้เงินงบประมาณเงินรายได้
     */
    public function viewProgressRevenue($facultyId, $fundgroupId, $planId, $catId);

    /**
     * @name updateRevenueScheme
     * @uri /updateRevenueScheme
     * @param apps\budget\model\BudgetSchemeResult[] budget
     * @return boolean result Description
     * @description ปรับปรุงข้อมูลแผน/ผลเงินงบประมาณเงินรายได้
     */
    public function updateRevenueScheme($budget);
    
    /**
     * @name updateBudgetPlan
     * @uri /updateBudgetPlan
     * @param apps\budget\model\BudgetSchemePlan[] budget
     * @return boolean result Description
     * @description ปรับปรุงข้อมูลแผน/ผลเงินงบประมาณแผ่นดิน
     */
    public function updateBudgetPlan($budget);
}
