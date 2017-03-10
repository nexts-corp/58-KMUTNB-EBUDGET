<?php

namespace apps\revenue\interfaces;

/**
 * @name ViewService
 * @uri /view
 * @description ViewService
 */
interface IViewService {

    /**
     * @name planning
     * @uri /planning
     * @description จัดสรรงบประมาณเงินรายได้
     */
    public function planning();

    /**
     * @name manageAll
     * @uri /manageAll
     * @description จัดสรรงบประมาณเงินรายได้
     */
    public function manageAll();

    /**
     * @name manage
     * @uri /manage
     * @param string formId
     * @param string budgetHeadId
     * @param string deptId
     * @description จัดทำคำของบประมาณแผ่นดิน
     */
    public function manage($formId, $budgetHeadId, $deptId);

    /**
     * @name progressRevenuePlanAll
     * @uri /progressRevenuePlanAll
     * @description จัดทำรายงานแผนการใช้เงินงบประมาณเงินรายได้
     */
    public function progressRevenuePlanAll();

    /**
     * @name progressRevenuePlan
     * @uri /progressRevenuePlan
     * @param int facultyId หน่วยงานระดับคณะ
     * @param int fundgroupId กองทุน
     * @param int planId แผนงาน 3 มิติ
     * @param string catId แหล่งเงิน
     * @description แสดงรายงานแผนการใช้เงินงบประมาณเงินรายได้
     */
    public function progressRevenuePlan($facultyId, $fundgroupId, $planId, $catId);
    
      /**
     * @name progressRevenueAll
     * @uri /progressRevenueAll
     * @description จัดทำรายงานผลการใช้เงินงบประมาณเงินรายได้
     */
    public function progressRevenueAll();

    /**
     * @name progressRevenue
     * @uri /progressRevenue
     * @param int facultyId หน่วยงานระดับคณะ
     * @param int fundgroupId กองทุน
     * @param int planId แผนงาน 3 มิติ
     * @param string catId แหล่งเงิน
     * @description แสดงรายงานผลการใช้เงินงบประมาณเงินรายได้
     */
    public function progressRevenue($facultyId, $fundgroupId, $planId, $catId);
}
