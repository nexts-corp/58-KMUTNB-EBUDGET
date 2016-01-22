<?php

namespace apps\budget\interfaces;

/**
 * @name BudgetInfoService
 * @uri /projectUniver
 * @description BudgetInfoService
 */
interface IProjectUniverService {

    
    /**
     * @name getLayouts
     * @uri /getLayouts
     * @description ดึงโครงสร้างโครงการ
     * @param int facultyId รหัสหน่วยงาน
     * @return String[] layouts
     */ 
    public function getLayouts($facultyId);

    
    /**
     * @name fetchProject
     * @uri /fetchProject
     * @description ดึงข้อมูลโปรแจค
     * @param Int id expenseId
     * @return String[] dataList
     */ 
    public function fetchProject($id);
   

    
    /**
     * @name fetchSubsidies
     * @uri /fetchSubsidies
     * @return apps\common\entity\BudgetType[] dataList Description
     * @description ดึงข้อมูลเงินอุดหนุน
     */
    public function fetchSubsidies();
    
    /**
     * @name fetchPlan
     * @uri /fetchPlan
     * @return apps\common\entity\L3D\Plan[] dataList Description
     * @description ดึงข้อมูลแผนงาน
     */
    public function fetchPlan();
    
    
    /**
     * @name fetchBudgetType
     * @uri /fetchBudgetType
     * @description ดึงข้อมูลสำหรับใช้ในช่องงบแระมาณและแผนการใช้จ่ายงบประมาณ
     * @return String[] dataList
     */ 
    public function fetchBudgetType();

    
    
    /**
     * @name saveProject
     * @uri /saveProject
     * @description บันทึกโครงการ
     * @param String[] seriesData ปีงบประมาณ
     * @return String[] dataList
     */ 
    public function saveProject($seriesData);
}
