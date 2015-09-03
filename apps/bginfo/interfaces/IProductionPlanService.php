<?php
namespace apps\bginfo\interfaces;

/**
 * @name ProductionPlanService
 * @uri /ProductionPlan
 * @description ระบบจัดการด้านแผนงาน ผลผลิต
 */
interface IProductionPlanService {
   
    /**
     * @name testView
     * @uri /testView
     * @description testView
     */ 
    public function testView();
    
    
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
     * @param String year ปีแผนงาน
     * @param String data ชื่อแผนงาน
     * @param String budget ประเภทงบประมาณ
     * @return String reqInsertPlan
     * @description เพิ่มข้อมูลแผนงาน
     */ 
    public function insertPlan($year,$data,$budget);
    
    
    
    /**
     * @name updatePlan
     * @uri /updatePlan
     * @param String name ชื่อแผนงาน
     * @param String budget ประเภทงบประมาณ
     * @return String reqUpdatePlan
     * @description แก้ไขข้อมูลแผนงาน
     */ 
    public function updatePlan($name,$budget);
    
    /**
     * @name deletePlan
     * @uri /deletePlan
     * @param String id รหัสแผนงาน
     * @param String budget ประเภทงบประมาณ
     * @return String reqDeletePlan
     * @description ลบข้อมูลแผนงาน
     */ 
    public function deletePlan($id,$budget);

}
