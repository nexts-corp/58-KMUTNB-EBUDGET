<?php
namespace apps\bginfo\interfaces;

/**
 * @name BudgetTypeService
 * @uri /BudgetType
 * @description ระบบจัดการประเภทหมวดรายจ่าย
 */
interface IBudgetTypeService {
    
    /**
     * @name manage
     * @uri /manage
     * @description หน้าจัดการประเภทหมวดรายจ่าย
     */ 
    public function viewManage();
    
    /**
     * @name fetchBudgetType
     * @uri /fetchBudgetType
     * @param apps\common\entity\BudgetType pData Description
     * @description ดึงข้อมูลประเภทหมวดรายจ่าย
     * @return apps\common\entity\BudgetType dataList
     */ 
    public function fetchBudgetType($pData);
    
    
    /**
     * @name saveBudgetType
     * @uri /saveBudgetType
     * @param apps\common\entity\BudgetType pData Description
     * @param Interger editId Description
     * @description บันทึกข้อมูลประเภทหมวดรายจ่าย
     * @return apps\common\entity\BudgetType dataList
     */ 
    public function saveBudgetType($pData,$editId);
    
    /**
     * @name delBudgetType
     * @uri /delBudgetType
     * @param apps\common\entity\BudgetType pData Description
     * @description ลบข้อมูลประเภทหมวดรายจ่าย
     * @return apps\common\entity\BudgetType dataList
     */ 
    public function delBudgetType($pData);
    

}
