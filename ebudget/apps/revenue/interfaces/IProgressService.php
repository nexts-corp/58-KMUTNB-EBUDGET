<?php

namespace apps\revenue\interfaces;

/**
 * @name IProgressService
 * @uri /progress
 * @description ProgressService
 */
interface IProgressService {

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
     * @param string catId แหล่งเงิน
     * @return boolean result Description
     * @description ปรับปรุงข้อมูลแผน/ผลเงินงบประมาณเงินรายได้
     */
    public function updateRevenueScheme($budget, $catId);

    /**
     * @name updateRevenuePlan
     * @uri /updateRevenuePlan
     * @param apps\budget\model\BudgetSchemePlan[] budget
     * @param string catId แหล่งเงิน
     * @return boolean result Description
     * @description ปรับปรุงข้อมูลแผนเงินงบประมาณเงินรายได้
     */
    public function updateRevenuePlan($budget, $catId);
}
