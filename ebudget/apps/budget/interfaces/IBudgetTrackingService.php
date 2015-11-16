<?php

namespace apps\budget\interfaces;

/**
 * @name BudgetTrackingService
 * @uri /budgetTracking
 * @description BudgetTrackingService
 */
interface IBudgetTrackingService {

    
    
    /**
     * @name getInfoTracking
     * @uri /getInfoTracking
     * @param String budgetType Description ประเภทงบประมาณ
     * @param String quater Description ไตรมาศ
     * @param String year Description ปี พศ.
     * @return String[] listTracking
     * @description แสดงข้อมูลประเภทตามแหล่งเงิน
     */
    public function getInfoTracking($budgetType, $quater, $year);

    /**
     * @name saveTracking
     * @uri /saveTracking
     * @param String[] objBudget Description ข้อมูลการติดตาม jsonArrOBJECT
     * @return boolean status
     * @description บันทึกข้อมูลการติดตาม
     */
    public function saveTracking($objBudget);

    /**
     * @name getQuarter
     * @uri /getQuarter
     * @param date date Description fotmat yyyy-mm-dd
     * @return int quarter
     * @description ไตรมาสที่
     */
    public function getQuarter($date);

    /**
     * @name updateBudgetExpense
     * @uri /updateBudgetExpense
     * @param int expenseId
     * @param float expenseUsed
     * @return boolean result
     * @description รายงานผลการใช้เงินรายไตรมาสของหน่วยงาน
     */
    public function updateBudgetExpense($expenseId, $expenseUsed);

    /**
     * @name updateStatus
     * @uri /updateStatus
     * @param int formId
     * @param int id
     * @param int status
     * @param string comment
     * @return boolean result
     * @description อัพเดตสถานะของข้อมูล
     */
    public function updateStatus($formId, $id, $status, $comment);
 
    
    
    
    
    
    
    
    
  
}
