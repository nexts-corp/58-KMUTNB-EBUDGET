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
     * @name fetchProduct
     * @uri /fetchProduct
     * @param int planId รหัสแผนงาน
     * @param String budget ประเภทงบประมาณ
     * @return String[] listsProduct
     * @description ดึงข้อมูลแผนงาน
     */ 
    public function fetchProduct($planId,$budget);
    
    
    
    /**
     * @name insertPlan
     * @uri /insertPlan
     * @param String year ปีแผนงาน
     * @param String name ชื่อแผนงาน
     * @param String budget ประเภทงบประมาณ
     * @return String reqInsertPlan
     * @description เพิ่มข้อมูลแผนงาน
     */ 
    public function insertPlan($year,$name,$budget);
    
    /**
     * @name insertProduct
     * @uri /insertProduct
     * @param String year ปีแผนงาน
     * @param String planID รหัสแผนงาน
     * @param String type โครงการหรือแผนงาน
     * @param String name ชื่อผลผลิตโครงการ
     * @param String budget ประเภทงบประมาณ
     * @return String reqInsertProduct
     * @description เพิ่มข้อมูลผลผลิตโครงการ
     */ 
    public function insertProduct($year,$planId,$type,$name,$budget);
    
    
    /**
     * @name updatePlan
     * @uri /updatePlan
     * @param String year ปีแผนงาน
     * @param String id รหัสแผนงาน
     * @param String name ชื่อแผนงาน
     * @param String budget ประเภทงบประมาณ
     * @return String reqUpdatePlan
     * @description แก้ไขข้อมูลแผนงาน
     */ 
    public function updatePlan($year,$id,$name,$budget);
    
    
    /**
     * @name updateProduct
     * @uri /updateProduct
     * @param String year ปีแผนงาน
     * @param String id รหัสผลผลิตและโครงการ
     * @param String name ชื่อผลผลิตและโครงการ
     * @param String type โครงการหรือแผนงาน
     * @param String budget ประเภทงบประมาณ
     * @return String reqUpdateProduct
     * @description แก้ไขข้อมูลผลผลิตและโครงการ
     */ 
    public function updateProduct($year,$id,$name,$type,$budget);
    
    
    
    
    
    /**
     * @name deletePlan
     * @uri /deletePlan
     * @param String id รหัสแผนงาน
     * @param String budget ประเภทงบประมาณ
     * @return String reqDeletePlan
     * @description ลบข้อมูลแผนงาน
     */ 
    public function deletePlan($id,$budget);
    
    /**
     * @name deleteProduct
     * @uri /deleteProduct
     * @param String id รหัสแผนงาน
     * @param String budget ประเภทงบประมาณ
     * @return String reqDeleteProduct
     * @description ลบข้อมูลแผนงาน
     */ 
    public function deleteProduct($id,$budget);
    

}
