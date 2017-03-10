<?php

namespace apps\revenue\interfaces;

/**
 * @name IManageService
 * @uri /manage
 * @description ประมูล
 */
interface IManageService {
    /**
     * @name getAllBudgetRequest
     * @uri /getAllBudgetRequest
     * @return string[] lists
     * @description แสดงข้อมูลประเภทตามแหล่งเงิน
     */
    public function getAllBudgetRequest();
}
