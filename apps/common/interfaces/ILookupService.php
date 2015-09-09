<?php

namespace apps\common\interfaces;

/**
 * @name LookupService
 * @uri /lookup
 * @description Lookup
 */
interface ILookupService {
    
    
    /**
     * @name listFaculty
     * @uri /listFaculty
     * @return String[] lists Description
     * @description รายชื่อภาควิชา
     */
    public function listFaculty();

    /**
     * @name listDepartment
     * @uri /listDepartment
     * @param String facultyId รหัสภาควิชา
     * @return String[] lists Description
     * @description รายชื่อหน่วยงาน
     */
    public function listDepartment($facultyId);
    
    
    
    /**
     * @name listFundgroup
     * @uri /listFundgroup
     * @return String[] lists Description
     * @description รายชื่อกองทุน
     */
    public function listFundgroup();

    /**
     * @name listRevenuePlan
     * @uri /listRevenuePlan
     * @return String[] lists Description
     * @description รายชื่อแผนงานงบประมาณ
     */
    public function listRevenuePlan();
    
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
     * @name listYear
     * @uri /listYear
     * @return String[] lists Description
     * @description รายการปีงบประมาณ
     */
    public function listYear();

}
