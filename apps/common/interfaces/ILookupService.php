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
     * @description ข้อมูลปีงบประมาณ
     */
    public function listYear();
    
    /**
     * @name listBudgetSource
     * @uri /listBudgetSource
     * @return String[] lists Description
     * @description แหล่งเงิน
     */
    public function listBudgetSource();
    
    
    /**
     * @name listProjectType
     * @uri /listProjectType
     * @return String[] lists Description
     * @description ประเภทโปรเจค
     */
    public function listProjectType();
    
    /**
     * @name list3DPlan
     * @uri /list3DPlan
     * @return String[] lists Description
     * @description รายชื่อแผนงานใน 3 มิติ
     */
    public function list3DPlan();
    
    /**
     * @name list3DPproject
     * @uri /list3DPproject
     * @param int planId
     * @return String[] lists Description
     * @description รายชื่อแผนงานใน 3 มิติ
     */
    public function list3DPproject($planId);
    
    
    
    
    
    /**
     * @name listAffirmativeType
     * @uri /listAffirmativeType
     * @return String[] lists Description
     * @description ข้อมูลแผนกลยุทธ์
     */
    public function listAffirmativeType();
    
    /**
     * @name listAffirmativeIssue
     * @uri /listAffirmativeIssue
     * @param int id
     * @return String[] lists Description
     * @description ข้อมูลประเด็นยุทธศาสตร์
     */
    public function listAffirmativeIssue($id);
    
    /**
     * @name listAffirmativeTarget
     * @uri /listAffirmativeTarget
     * @param int id
     * @return String[] lists Description
     * @description ข้อมูลแผนเป้าประสงค์
     */
    public function listAffirmativeTarget($id);
    
    /**
     * @name listAffirmativeStrategy
     * @uri /listAffirmativeStrategy
     * @param int id
     * @return String[] lists Description
     * @description ข้อมูลกลยุทธ์
     */
    public function listAffirmativeStrategy($id);
    
    
    
    
    
    
    /**
     * @name listIntegration
     * @uri /listIntegration
     * @return String[] lists Description
     * @description ข้อมูลบูรณาการโครงการ
     */
    public function listIntegration();
    
    
    
    
    
    
}
