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
     * @name addExpenseProject
     * @uri /addExpenseProject
     * @param string projectName
     * @param int budgetPeriodId
     * @param string[] budgetTotal
     * @param int[] departmentId
     * @return boolean result Description
     * @description หน้าเพิ่มเงินจัดสรรสำหรับโครงการพัฒนามหาวิทยาลัย
     */
    public function addExpenseProject($projectName,$budgetPeriodId,$budgetTotal,$departmentId);
    
    /**
     * @name updateExpenseProject
     * @uri /updateExpenseProject
     * @param int projectId
     * @param string projectName
     * @param int budgetPeriodId
     * @param string[] budgetTotal
     * @param int[] departmentId
     * @return boolean result Description
     * @description หน้าบันทึกเงินจัดสรรสำหรับโครงการพัฒนามหาวิทยาลัย
     */
    public function updateExpenseProject($projectId,$projectName,$budgetPeriodId,$budgetTotal,$departmentId);
    
    /**
     * @name deleteExpenseProject
     * @uri /deleteExpenseProject
     * @param int projectId
     * @return boolean result Description
     * @description หน้าเพิ่มเงินจัดสรรสำหรับโครงการพัฒนามหาวิทยาลัย
     */
    public function deleteExpenseProject($projectId);
}
