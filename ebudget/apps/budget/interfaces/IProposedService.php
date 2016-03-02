<?php

namespace apps\budget\interfaces;

/**
 * @name proposeService
 * @uri /proposeService
 * @description proposeService
 */
interface IProposedService
{


    /**
     * @name getData
     * @uri /getData
     * @description ดึงโครงสร้างโครงการ
     * @param int bg146Id รหัส146
     * @return String[] lists
     */
    public function getData($bg146Id);


    /**
     * @name save
     * @uri /save
     * @description ดึงโครงสร้างโครงการ
     * @param String[] project รหัสหน่วยงาน
     * @return doolean save
     */
    public function save($project);


    /**
     * @name getLayouts
     * @uri /getLayouts
     * @description ดึงโครงสร้างโครงการ
     * @param int facultyId รหัสหน่วยงาน
     * @return String[] layouts
     */
    public function getLayouts($facultyId);


}
