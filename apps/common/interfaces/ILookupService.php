<?php

namespace apps\common\interfaces;

/**
 * @name LookupService
 * @uri /lookup
 * @description Lookup
 */
interface ILookupService {

    /**
     * @name listCampus
     * @uri /listCampus
     * @return String[] lists Description
     * @description วิทยาเขต
     */
    public function listCampus();

    /**
     * @name listFaculty
     * @uri /listFaculty
     * @param String campusId
     * @return String[] lists Description
     * @description รายชื่อภาควิชา
     */
    public function listFaculty($campusId);

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
     * @name listBudgetPlan
     * @uri /listBudgetPlan
     * @param int budgetYear 
     * @return String[] lists Description
     * @description รายชื่อแผน
     */
    public function listBudgetPlan($budgetYear);

    /**
     * @name listBudgetProject
     * @uri /listBudgetProject
     * @param int planId 
     * @return String[] lists Description
     * @description รายชื่อผลผลิต/โครงการ
     */
    public function listBudgetProject($planId);

    /**
     * @name listYear
     * @uri /listYear
     * @return String[] lists Description
     * @description รายการปีงบประมาณ
     */
    public function listYear();
}
