<?php

namespace apps\bginfo\interfaces;

/**
 * @name ViewService
 * @uri /view
 * @description ViewService
 */
interface IViewService {

    /**
     * @name manageEduPlan
     * @uri /manageEduPlan
     * @description จัดการด้านแผนกลยุทธ์
     */
    public function manageEduPlan();
    
    /**
     * @name manageUnit
     * @uri /manageUnit
     * @description จัดการหน่วยนับ
     */
    public function manageUnit();
}
