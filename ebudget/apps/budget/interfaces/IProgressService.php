<?php

namespace apps\budget\interfaces;

/**
 * @name IProgressService
 * @uri /progress
 * @description ProgressService
 */
interface IProgressService {

    /**
     * @name getAllScheme
     * @uri /getAllScheme
     * @return string[] result
     * @description แสดงแผน/ผลการใช้งบประมาณ
     */
    public function getAllScheme();

    /**
     * @name viewProgressBudget
     * @uri /viewProgressBudget
     * @param int bgPeriodId ปีงบประมาณ
     * @param int facultyId หน่วยงานระดับคณะ
     * @param int fundgroupId กองทุน
     * @param int planId แผนงาน 3 มิติ
     * @return string[] result
     * @description แสดงแผน/ผลการใช้งบประมาณ
     * @description เรียกดูรายงานแผน/ผลการใช้เงินงบประมาณ
     */
    public function viewProgressBudget($bgPeriodId, $facultyId, $fundgroupId, $planId);
}
