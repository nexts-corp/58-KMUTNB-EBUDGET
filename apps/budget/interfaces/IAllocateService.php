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
    
    
    

}
