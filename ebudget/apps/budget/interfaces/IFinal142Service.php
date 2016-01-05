<?php

namespace apps\budget\interfaces;

/**
 * @name IFinal142Service
 * @uri /final142
 * @description Final142Service
 */
interface IFinal142Service{
    /**
     * @name view
     * @uri /view
     * @param apps\budget\model\BudgetFilter param Description
     * @return apps\common\entity\Final142[] budget Description
     * @description แสดงข้อมูลฟอร์ม 142
     */
    public function view($param);

    /**
     * @name insert
     * @uri /insert
     * @param String[] budget Description
     * @param file file Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.142
     */
    public function insert($budget, $file);

    /**
     * @name update
     * @uri /update
     * @param String[] budget Description
     * @param file file Description
     * @param String fileUpload Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.142
     */
    public function update($budget, $file, $fileUpload);

    /**
     * @name delete
     * @uri /delete
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.142
     */
    public function delete($budgetId);

}
