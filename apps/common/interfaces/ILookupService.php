<?php

namespace apps\common\interfaces;

/**
 * @name LookupService
 * @uri /lookup
 * @description Lookup
 */
interface ILookupService {

    /**
     * @name listDepartment
     * @uri /listDepartment
     * @return String[] lists Description
     * @description รายชื่อหน่วยงาน
     */
    public function listDepartment();

    /**
     * @name listBudgetPlan
     * @uri /listBudgetPlan
     * @return String[] lists Description
     * @description รายชื่อแผน
     */
    public function listBudgetPlan();

    /**
     * @name listBudgetProduct
     * @uri /listBudgetProduct
     * @return String[] lists Description
     * @description รายชื่อผลผลิต
     */
    public function listBudgetProduct();
    
    
    /**
     * @name listBudgetYear
     * @uri /listBudgetYear
     * @param String table Description
     * @return String[] lists Description
     * @description ช่วงปีงบประมาณของตารางต่างๆ
     */
    public function listBudgetYear($table);

}
