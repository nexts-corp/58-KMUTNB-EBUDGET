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
     * @param String quater Description �����
     * @param String year Description �� ��.
     * @return String[] listTracking
     * @description �ʴ������Ż�������������Թ
     */
    public function getInfoTracking($budgetType, $quater, $year);


    /**
     * @name saveTracking
     * @uri /saveTracking
     * @param String[] objBudget Description �����š�õԴ��� jsonArrOBJECT
     * @return boolean status
     * @description �ѹ�֡�����š�õԴ���
     */
    public function saveTracking($objBudget);

}