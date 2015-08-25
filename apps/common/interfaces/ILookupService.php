<?php

namespace apps\common\interfaces;

/**
 * @name LookupService
 * @uri /lookup
 * @description Lookup
 */
interface ILookupService {

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
     * @name listBudgetDepartment
     * @uri /listBudgetDepartment
     * @return String[] lists Description
     * @description รายชื่อหน่วยงาน
     */
    public function listBudgetDepartment();
}
