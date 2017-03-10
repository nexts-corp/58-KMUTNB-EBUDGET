<?php
namespace apps\bginfo\interfaces;

/**
 * @name MappingPlan
 * @uri /mappingPlan
 * @description ระบบจับคู่
 */
interface IMappingPlanService {
    
    /**
     * @name manage
     * @uri /manage
     * @description หน้าจับคู่
     */ 
    public function manage();
    
    /**
     * @name fetchPlan
     * @uri /fetchPlan
     * @param int year ปีงบประมาณ
     * @return String[] dataList
     * @description ดึงข้อมูลแผนงานผลผลิต
     */ 
    public function fetchPlan($year);
    
    /**
     * @name fetchDataFG
     * @uri /fetchDataFG
     * @param int budgetPeriodId Description
     * @param int budgetProjectId Description
     * @param int planId Description
     * @return String[] dataList
     * @description ดึงข้อมูลกองทุนของแผนสามมิติ
     */ 
    public function fetchDataFG($budgetPeriodId,$budgetProjectId,$planId);
    
    /**
     * @name saveMappingPlan
     * @uri /saveMappingPlan
     * @param int budgetPeriodId Description
     * @param int budgetProjectId Description
     * @param int planId Description
     * @param int[] fundgroupId Description
     * @description บันทึกข้อมูลความสัมพันธ์
     * @return boolean result
     */ 
    public function saveMappingPlan($budgetPeriodId,$budgetProjectId,$planId,$fundgroupId);

}
