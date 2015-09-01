<?php
namespace apps\bginfo\interfaces;

/**
 * @name ProductionPlanService
 * @uri /ProductionPlan
 * @description ระบบจัดการด้านแผนงาน ผลผลิต
 */
interface IProductionPlanService {
   
    
    /**
     * @name viewPlan
     * @uri /viewPlan
     * @description หน้าจัดการแผนงาน
     */ 
    public function viewPlan();
    
    /**
     * @name fetchPlan
     * @uri /fetchPlan
     * @param int year Description
     * @return String[] listsPlan
     * @description ดึงข้อมูลแผนงาน
     */ 
    public function fetchPlan($year);
    
    /**
     * @name savePlan
     * @uri /savePlan
     * @param apps\common\entity\BudgetPlan data Description
     * @return String reqSavePlan
     * @description ดึงข้อมูลแผนงาน
     */ 
    public function savePlan($data);
    
    
   
}
