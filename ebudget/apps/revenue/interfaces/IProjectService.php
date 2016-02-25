<?php

namespace apps\revenue\interfaces;

/**
 * @name IProjectService
 * @uri /project
 * @description ประมูล
 */
interface IProjectService {
    /**
     * @name getLayouts
     * @uri /getLayouts
     * @description ดึงโครงสร้างโครงการ
     * @param int facultyId รหัสหน่วยงาน
     * @return String[] layouts
     */
    public function getLayouts($facultyId);
    
    /**
     * @name getAllProject
     * @uri /getAllProject
     * @description ดึงโครงสร้างโครงการ
     * @param int facultyId รหัสหน่วยงาน
     * @return String[] lists
     */
    public function getAllProject($facultyId);
    
    /**
     * @name getData
     * @uri /getData
     * @description ดึงโครงสร้างโครงการ
     * @param int budgetHeadId รหัสหน่วยงาน
     * @param int facultyId รหัสหน่วยงาน
     * @return String[] lists
     */
    public function getData($budgetHeadId, $facultyId);

    /**
     * @name save
     * @uri /save
     * @description ดึงโครงสร้างโครงการ
     * @param String[] project รหัสหน่วยงาน
     * @return doolean save
     */
    public function save($project);
}
