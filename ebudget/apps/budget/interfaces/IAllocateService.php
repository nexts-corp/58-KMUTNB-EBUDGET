<?php

namespace apps\budget\interfaces;

/**
 * @name AllocateService
 * @uri /allocate
 * @description AllocateService
 */
interface IAllocateService {

    /**
     * @name budgetTypeTree
     * @uri /budgetTypeTree
     * @return String[] dataList
     * @description ข้อมูลประเภทงบประมาณแบบเค้าโครงต้นไม้
     */
    public function budgetTypeTree();

    /**
     * @name managePlan
     * @uri /managePlanning
     * @description หน้าจัดสรรงบประมาณของกองแผนงาน
     */
    public function managePlanning();

    /**
     * @name manageDepartment
     * @uri /manageDepartment
     * @description หน้าจัดสรรงบประมาณของหน่วยงาน
     */
    public function manageDepartment();

    /**
     * @name testJS
     * @uri /test/js
     * @description ทดสอบ
     */
    public function testJS();

    /**
     * @name fetchExpenseProject
     * @uri /fetchExpenseProject
     * @param int budgetPeriodId ปีงบประมาณ
     * @param int depId รหัสหน่วยงาน
     * @return string[] dataList Description
     * @description หน้าเพิ่มเงินจัดสรรเงินรายได้
     */
    public function fetchExpenseProject($budgetPeriodId, $depId);

    /**
     * @name addExpenseProject
     * @uri /addExpenseProject
     * @param string projectName ชื่อโครงการ
     * @param int budgetPeriodId ปีงบประมาณ
     * @param float[] budgetTotal
     * @param int[] deptId
     * @return boolean result Description
     * @description หน้าเพิ่มเงินจัดสรรสำหรับโครงการพัฒนามหาวิทยาลัย
     */
    public function addExpenseProject($projectName, $budgetPeriodId, $budgetTotal, $deptId);

    /**
     * @name updateExpenseProject
     * @uri /updateExpenseProject
     * @param int bgHeadId
     * @param string projectName ชื่อโครงการ
     * @param int budgetPeriodId ปีงบประมาณ
     * @param float[] budgetTotal
     * @param int[] deptId
     * @return boolean result Description
     * @description หน้าบันทึกเงินจัดสรรสำหรับโครงการพัฒนามหาวิทยาลัย
     */
    public function updateExpenseProject($bgHeadId, $projectName, $budgetPeriodId, $budgetTotal, $deptId);

    /**
     * @name deleteExpenseProject
     * @uri /deleteExpenseProject
     * @param int bgHeadId
     * @return boolean result Description
     * @description หน้าเพิ่มเงินจัดสรรสำหรับโครงการพัฒนามหาวิทยาลัย
     */
    public function deleteExpenseProject($bgHeadId);

    /**
     * @name fetchRevenue
     * @uri /fetchRevenue
     * @param int budgetPeriodId ปีงบประมาณ
     * @return string[] dataList Description
     * @description หน้าเพิ่มเงินจัดสรรเงินรายได้
     */
    public function fetchRevenue($budgetPeriodId);

    /**
     * @name addRevenue
     * @uri /addRevenue
     * @param int deptId หน่วยงานระดับคณะ
     * @param int budgetPeriodId
     * @param float bgEducation เงินจัดสรรจากค่าธรรมเนียมการศึกษา
     * @param float bgService เงินจัดสรรจากงานบริการวิชาการ
     * @return int result Description
     * @description หน้าเพิ่มเงินจัดสรรเงินรายได้
     */
    public function addRevenue($deptId, $budgetPeriodId, $bgEducation, $bgService);

    /**
     * @name updateRevenue
     * @uri /updateRevenue
     * @param int id 
     * @param float bgEducation เงินจัดสรรจากค่าธรรมเนียมการศึกษา
     * @param float bgService เงินจัดสรรจากงานบริการวิชาการ
     * @return boolean result Description
     * @description หน้าเพิ่มเงินจัดสรรเงินรายได้
     */
    public function updateRevenue($id, $bgEducation, $bgService);

    /**
     * @name deleteRevenue
     * @uri /deleteRevenue
     * @param int id 
     * @return boolean result Description
     * @description หน้าเพิ่มเงินจัดสรรเงินรายได้
     */
    public function deleteRevenue($id);

    /**
     * @name insertRevenueItem
     * @uri /insertRevenueItem
     * @param apps\common\entity\BudgetRevenue budget 
     * @return boolean result 
     * @description เพิ่มรายการรายจ่ายจากเงินรายได้
     */
    public function insertRevenueItem($budget);

    /**
     * @name updateRevenueItem
     * @uri /updateRevenueItem
     * @param apps\common\entity\BudgetRevenue budget 
     * @return boolean result 
     * @description แก้ไขรายการรายจ่ายจากเงินรายได้
     */
    public function updateRevenueItem($budget);

    /**
     * @name deleteRevenueItem
     * @uri /deleteRevenueItem
     * @param int budgetId 
     * @return boolean result 
     * @description ลบรายการรายจ่ายจากเงินรายได้
     */
    public function deleteRevenueItem($budgetId);

    /**
     * @name getRevenueItemList
     * @uri /getRevenueItemList
     * @param int budgetPeriodId 
     * @param int deptId 
     * @param int l3dPlanId 
     * @param int fundgroupId 
     * @return string[] dataList Description
     * @description โหลดรายการรายละเอียดเงินรายได้
     */
    public function getRevenueItemList($budgetPeriodId, $deptId, $l3dPlanId, $fundgroupId);
}