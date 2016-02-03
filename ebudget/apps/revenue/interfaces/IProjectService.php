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

}
