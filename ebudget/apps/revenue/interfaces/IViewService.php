<?php

namespace apps\revenue\interfaces;

/**
 * @name ViewService
 * @uri /view
 * @description ViewService
 */
interface IViewService {

    /**
     * @name allocateAll
     * @uri /allocateAll
     * @description จัดสรรเงินรายได้
     */    
    public function allocateAll();
 
    /**
     * @name doRevenue
     * @uri /doRevenue
     * @param string budgetYear
     * @param string deptId
     * @description จัดทำรายละเอียดเงินรายได้
     */ 
    public function doRevenue($budgetYear, $deptId);
}
