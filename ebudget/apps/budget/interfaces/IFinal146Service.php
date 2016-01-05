<?php

namespace apps\budget\interfaces;

/**
 * @name IFinal146Service
 * @uri /final146
 * @description Final146Service
 */
interface IFinal146Service{
    /**
     * @name view
     * @uri /view
     * @param apps\budget\model\BudgetFilter param Description
     * @return apps\common\entity\Final146[] budget Description
     * @description แสดงข้อมูลฟอร์ม 146
     */
    public function view($param);

    /**
     * @name insert
     * @uri /insert
     * @param String[] budget Description
     * @param file file Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.146
     */
    public function insert($budget, $file);

    /**
     * @name update
     * @uri /update
     * @param String[] budget Description
     * @param file file Description
     * @param String fileUpload Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.146
     */
    public function update($budget, $file, $fileUpload);

    /**
     * @name delete
     * @uri /delete
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.146
     */
    public function delete($budgetId);

}
