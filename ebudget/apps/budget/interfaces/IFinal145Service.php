<?php

namespace apps\budget\interfaces;

/**
 * @name IFinal145Service
 * @uri /final145
 * @description Final145Service
 */
interface IFinal145Service{
    /**
     * @name view
     * @uri /view
     * @param apps\budget\model\BudgetFilter param Description
     * @return apps\common\entity\Budget145[] budget Description
     * @description แสดงข้อมูลฟอร์ม 145
     */
    public function view($param);

    /**
     * @name insert
     * @uri /insert
     * @param String[] budget Description
     * @param file file Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.145
     */
    public function insert($budget, $file);

    /**
     * @name update
     * @uri /update
     * @param String[] budget Description
     * @param file file Description
     * @param String fileUpload Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.145
     */
    public function update($budget, $file, $fileUpload);

    /**
     * @name delete
     * @uri /delete
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.145
     */
    public function delete($budgetId);

}
