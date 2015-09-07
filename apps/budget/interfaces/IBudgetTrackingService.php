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
     * @param String budgetType Description ������������ҳ
     * @return String[] listTracking
     * @description �ʴ������Ż�������������Թ
     */
    public function getInfoTracking($budgetType);


}