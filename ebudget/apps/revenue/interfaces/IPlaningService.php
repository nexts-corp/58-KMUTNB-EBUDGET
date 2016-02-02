<?php

namespace apps\revenue\interfaces;

/**
 * @name IPlaningService
 * @uri /planning
 * @description ประมูล
 */
interface IPlaningService {
    /**
     * @name listsDepartment
     * @uri /listsDepartment
     * @return String[] lists Description
     * @description รายชื่อหน่วยงาน
     */
    public function listsDepartment();

    /**
     * @name fetchRevenue
     * @uri /fetchRevenue
     * @return String[] lists Description
     * @description หน้าเพิ่มเงินจัดสรรเงินรายได้
     */
    public function fetchRevenue();

    /**
     * @name addRevenue
     * @uri /addRevenue
     * @param apps\common\entity\BudgetRevenuePlan revenuePlan Description
     * @return boolean add Description
     * @description เพิ่มเงินจัดสรรเงินรายได้
     */
    public function addRevenue($revenuePlan);

    /**
     * @name updateRevenue
     * @uri /updateRevenue
     * @param apps\common\entity\BudgetRevenuePlan revenuePlan Description
     * @return boolean update Description
     * @description อัพเดทเงินจัดสรรเงินรายได้
     */
    public function updateRevenue($revenuePlan);

    /**
     * @name deleteRevenue
     * @uri /deleteRevenue
     * @param int id
     * @return boolean delete Description
     * @description ลบเงินจัดสรรเงินรายได้
     */
    public function deleteRevenue($id);

    /**
     * @name fetchProject
     * @uri /fetchProject
     * @return string[] lists Description
     * @description หน้าเพิ่มเงินจัดสรรเงินรายได้
     */
    public function fetchProject();

    /**
     * @name addProject
     * @uri /addProject
     * @param string projectName ชื่อโครงการ
     * @param float[] budgetTotal
     * @param int[] deptId
     * @return boolean add Description
     * @description หน้าเพิ่มเงินจัดสรรสำหรับโครงการพัฒนามหาวิทยาลัย
     */
    public function addProject($projectName, $budgetTotal, $deptId);

    /**
     * @name updateProject
     * @uri /updateProject
     * @param int bgHeadId
     * @param string projectName ชื่อโครงการ
     * @param int budgetPeriodId ปีงบประมาณ
     * @param float[] budgetTotal
     * @param int[] deptId
     * @return boolean update Description
     * @description หน้าบันทึกเงินจัดสรรสำหรับโครงการพัฒนามหาวิทยาลัย
     */
    public function updateProject($bgHeadId, $projectName, $budgetTotal, $deptId);

    /**
     * @name deleteProject
     * @uri /deleteProject
     * @param int bgHeadId
     * @return boolean delete Description
     * @description หน้าเพิ่มเงินจัดสรรสำหรับโครงการพัฒนามหาวิทยาลัย
     */
    public function deleteProject($bgHeadId);
}
