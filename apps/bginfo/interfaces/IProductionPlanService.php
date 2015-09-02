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
     * @param int year ปีงบประมาณ
     * @param String budget ประเภทงบประมาณ
     * @return String[] listsPlan
     * @description ดึงข้อมูลแผนงาน
     */ 
    public function fetchPlan($year,$budget);
    
    
    
    /**
     * @name insertPlan
     * @uri /insertPlan
     * @param String data ข้อมูลที่กรอกเข้ามา
     * @param String budget ประเภทงบประมาณ
     * @return String reqInsertPlan
     * @description เพิ่มข้อมูลแผนงาน
     */ 
    public function insertPlan($data,$budget);
    
    
    
    /**
     * @name updatePlan
     * @uri /updatePlan
     * @param String data ข้อมูลที่กรอกเข้ามา
     * @param String budget ประเภทงบประมาณ
     * @return String reqUpdatePlan
     * @description แก้ไขข้อมูลแผนงาน
     */ 
    public function updatePlan($data,$budget);
    
    /**
     * @name deletePlan
     * @uri /deletePlan
     * @param String data ข้อมูลที่กรอกเข้ามา
     * @param String budget ประเภทงบประมาณ
     * @return String reqDeletePlan
     * @description ลบข้อมูลแผนงาน
     */ 
    public function deletePlan($data,$budget);

}
