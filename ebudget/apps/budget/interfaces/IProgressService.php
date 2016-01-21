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
     * @description แสดงแผน/ผลการใช้งบประมาณ
     */
    public function getAllBudgetScheme();

    /**
     * @name viewProgressBudget
     * @uri /viewProgressBudget
     * @param int facultyId หน่วยงานระดับคณะ
     * @param int fundgroupId กองทุน
     * @param int planId แผนงาน 3 มิติ
     * @return string[] result
     * @description แสดงแผน/ผลการใช้งบประมาณ
     * @description เรียกดูรายงานแผน/ผลการใช้เงินงบประมาณ
     */
    public function viewProgressBudget($facultyId, $fundgroupId, $planId);

    /**
     * @name updateScheme
     * @uri /updateScheme
     * @param apps\budget\model\BudgetSchemeResult[] budget
     * @return boolean result Description
     * @description ปรับปรุงข้อมูลแผน/ผล
     */
    public function updateScheme($budget);
}
