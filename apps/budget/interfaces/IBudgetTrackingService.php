<?php


namespace apps\budget\interfaces;

/**
 * @name BudgetTrackingService
 * @uri /budgetTracking
 * @description BudgetTrackingService
 */
interface IBudgetTrackingService
{

    /**
     * @name getInfoTracking
     * @uri /getInfoTracking
     * @param String budgetType Description ประเภทงบประมาณ
     * @return String[] listTracking
     * @description แสดงข้อมูลประเภทตามแหล่งเงิน
     */
    public function getInfoTracking($budgetType);


}