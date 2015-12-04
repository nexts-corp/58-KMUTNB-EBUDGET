<?php

namespace apps\budget\interfaces;

/**
 * @name IDraftService
 * @uri /draft
 * @description DraftService
 */
interface IDraftService{
    /**
     * @name getAllBudgetRequest
     * @uri /getAllBudgetRequest
     * @param int deptId หน่วยงาน
     * @return string[] result
     * @description แสดงข้อมูลประเภทตามแหล่งเงิน
     */
    public function getAllBudgetRequest($deptId);
}
