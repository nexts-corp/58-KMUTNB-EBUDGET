<?php
namespace apps\budget\interfaces;

/**
 * @name ViewService
 * @uri /view
 * @description ViewService
 */
interface IViewService {
   
    /**
     * @name formBudget
     * @uri /formBudget
     * @description ยื่นคำของบประมาณ
     */ 
    public function formBudget();
    
     /**
     * @name formTracking
     * @uri /formTracking
     * @description ติดตามการใช้เงินงบประมาณ
     */ 
    public function formTracking();
    
    /**
     * @name bg140
     * @uri /bg140
     * @description แบบ ง.140
     */ 
    public function bg140();
    
    /**
     * @name bg141
     * @uri /bg141
     * @description แบบ ง.141
     */ 
    public function bg141();
    
    /**
     * @name bg142
     * @uri /bg142
     * @description แบบ ง.142
     */ 
    public function bg142();
    
    /**
     * @name bg143
     * @uri /bg143
     * @description แบบ ง.143
     */ 
    public function bg143();
    
    /**
     * @name bg144
     * @uri /bg144
     * @description แบบ ง.144
     */ 
    public function bg144();
    
    /**
     * @name bg145
     * @uri /bg145
     * @description แบบ ง.145
     */ 
    public function bg145();
    
    /**
     * @name bg146
     * @uri /bg146
     * @description แบบ ง.146
     */ 
    public function bg146();
    

    
}
