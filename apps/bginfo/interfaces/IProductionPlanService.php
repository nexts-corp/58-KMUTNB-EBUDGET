<?php
namespace apps\bginfo\interfaces;

/**
 * @name ProductionPlanService
 * @uri /ProductionPlan
 * @description ระบบจัดการด้านแผนงาน ผลผลิต
 */
interface IProductionPlanService {
   
    
    /**
     * @name manage
     * @uri /manage
     * @description หน้าจัดการแผนงาน
     */ 
    public function viewManage();
    
    /**
     * @name fetchPlan
     * @uri /fetchPlan
     * @param int year ปีงบประมาณ
     * @return String[] dataList
     * @description ดึงข้อมูลแผนงานผลผลิต
     */ 
    public function fetchPlan($year);
    
    
    /**
     * @name savePlan
     * @uri /savePlan
     * @param apps\common\entity\BudgetPlan dataParam 
     * @description บันทึกข้อมูลแผนงาน
     * @return apps\common\entity\BudgetPlan dataList
     */ 
    public function savePlan($dataParam);
    
    
    /**
     * @name saveBudgetProject
     * @uri /saveBudgetProject
     * @param apps\common\entity\BudgetProject dataParam 
     * @description บันทึกข้อมูลผลผลิตหรือโครงการ
     * @return apps\common\entity\BudgetProject dataList
     */ 
    public function saveBudgetProject($dataParam);
    
    
    /**
     * @name delPlan
     * @uri /delPlan
     * @param apps\common\entity\BudgetPlan dataParam 
     * @description ลบข้อมูลแผนงาน
     * @return apps\common\entity\BudgetPlan dataList
     */ 
    public function delPlan($dataParam);
    
    /**
     * @name delBudgetProject
     * @uri /delBudgetProject
     * @param apps\common\entity\BudgetProject dataParam 
     * @description ลบข้อมูลผลผลิตหรือโครงการ
     * @return apps\common\entity\BudgetProject dataList
     */ 
    public function delBudgetProject($dataParam);
  
    
    
    
    
    
    
    
     /**
     * @name fetchPlan3D
     * @uri /fetchPlan3D
     * @return String[] dataList
     * @description ดึงข้อมูลแผนงานสามมิติ
     */ 
    public function fetchPlan3D();
    
    /**
     * @name savePlan3D
     * @uri /savePlan3D
     * @param apps\common\entity\L3D\Plan dataParam 
     * @param String action 
     * @description บันทึกข้อมูลแผนงานสามมิติ
     * @return apps\common\entity\L3D\Plan dataList
     */ 
    public function savePlan3D($dataParam,$action);
    
    
    /**
     * @name delPlan3D
     * @uri /delPlan3D
     * @param apps\common\entity\L3D\Plan dataParam 
     * @description ลบข้อมูลแผนงานสามมิติ
     * @return apps\common\entity\L3D\Plan dataList
     */ 
    public function delPlan3D($dataParam);
    
}
