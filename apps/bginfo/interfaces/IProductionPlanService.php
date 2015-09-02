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
     * @param String budget Description
     * @return String[] listsPlan
     * @description ดึงข้อมูลแผนงาน
     */ 
    public function fetchPlan($year,$budget);
    
    /**
     * @name savePlan
     * @uri /savePlan
     * @param apps\common\entity\BudgetPlan data Description
     * @param String com Description
     * @return String reqSavePlan
     * @description เพิ่มหรือแก้ไขข้อมูลแผนงาน
     */ 
    public function savePlan($data,$com);
    
    /**
     * @name delPlan
     * @uri /delPlan
     * @param apps\common\entity\BudgetPlan data Description
     * @return String reqDelPlan
     * @description ลบข้อมูลแผนงาน
     */ 
    public function delPlan($data);

}
