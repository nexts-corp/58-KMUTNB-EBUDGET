<?php

namespace apps\budget\interfaces;

/**
 * @name IFinal143Service
 * @uri /final143
 * @description Final143Service
 */
interface IFinal143Service{
    /**
     * @name view
     * @uri /view
     * @param apps\budget\model\BudgetFilter param Description
     * @return apps\common\entity\Final143[] budget Description
     * @description แสดงข้อมูลฟอร์ม 143
     */
    public function view($param);

    /**
     * @name insert
     * @uri /insert
     * @param String[] budget Description
     * @param file file Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.143
     */
    public function insert($budget, $file);

    /**
     * @name update
     * @uri /update
     * @param String[] budget Description
     * @param file file Description
     * @param String fileUpload Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.143
     */
    public function update($budget, $file, $fileUpload);

    /**
     * @name delete
     * @uri /delete
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.143
     */
    public function delete($budgetId);

}
