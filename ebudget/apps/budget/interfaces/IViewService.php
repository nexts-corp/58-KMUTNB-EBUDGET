<?php

namespace apps\budget\interfaces;

/**
 * @name ViewService
 * @uri /view
 * @description ViewService
 */
interface IViewService {

    /**
     * @name formBudget
     * @uri /formBudget
     * @description ยื่นคำของบประมาณเงินแผ่นดิน
     * @SiteMap true
     */
    public function formBudget();

    /**
     * @name formBudgetReview
     * @uri /formBudgetReview
     * @description ตรวจสอบคำขอเงินงบประมาณเงินแผ่นดิน
     */
    public function formBudgetReview();

    /**
     * @name formTracking
     * @uri /formTracking
     * @description ติดตามการใช้เงินงบประมาณ
     */
    public function formTracking();

    /**
     * @name formReview
     * @uri /formReview
     * @description แสดงติดตามการใช้เงินงบประมาณทั้งปี
     */
    public function formReview();

    /**
     * @name formTest
     * @uri /formTest
     * @description แสดงติดตามการใช้เงินงบประมาณทั้งปี
     */
    public function formTest();

    /**
     * @name bg140
     * @uri /bg140
     * @description แบบ ง.140
     */
    public function bg140();

    /**
     * @name bg141
     * @uri /bg141
     * @description แบบ ง.141
     */
    public function bg141();

    /**
     * @name bg142
     * @uri /bg142
     * @description แบบ ง.142
     */
    public function bg142();

    /**
     * @name bg143
     * @uri /bg143
     * @description แบบ ง.143
     */
    public function bg143();

    /**
     * @name bg144
     * @uri /bg144
     * @description แบบ ง.144
     */
    public function bg144();

    /**
     * @name bg145
     * @uri /bg145
     * @description แบบ ง.145
     */
    public function bg145();

    /**
     * @name bg146
     * @uri /bg146
     * @description แบบ ง.146
     */
    public function bg146();

    /**
     * @name formRevenue
     * @uri /formRevenue
     * @description ยื่นคำของบประมาณเงินรายได้
     */
    public function formRevenue();
    
    /**
     * @name formScheme
     * @uri /formScheme
     * @description รายวานแผน/ผลของเงินงบประมาณ
     */
    public function formScheme();

    /**
     * @name draftAll
     * @uri /draftAll
     * @description จัดทำคำของบประมาณแผ่นดินทั้งหมด
     */
    public function draftAll();
    /**
     * @name finalAll
     * @uri /finalAll
     * @description จัดทำคำของบประมาณแผ่นดินทั้งหมด
     */
    public function finalAll();

    /**
     * @name approveAll
     * @uri /approveAll
     * @description ตรวจสอบสถานะคำของบประมาณแผ่นดินทั้งหมด
     */
    public function approveAll();
    
    /**
     * @name draft
     * @uri /draft
     * @param string formId
     * @param string l3dPlanId
     * @param string fundgroupId
     * @param string deptId
     * @description จัดทำคำของบประมาณแผ่นดิน
     */
    public function draft($formId, $l3dPlanId, $fundgroupId, $deptId);
    /**
     * @name final
     * @uri /final
     * @param string formId
     * @param string l3dPlanId
     * @param string fundgroupId
     * @param string deptId
     * @description จัดทำคำของบประมาณแผ่นดิน
     */
    public function finalz($formId, $l3dPlanId, $fundgroupId, $deptId);
    
        /**
     * @name approve
     * @uri /approve
     * @param string formId
     * @param string l3dPlanId
     * @param string fundgroupId
     * @param string deptId
     * @description ตรวจสอบคำของบประมาณแผ่นดิน
     */
    public function approve($formId, $l3dPlanId, $fundgroupId, $deptId);

    /**
     * @name buildOne
     * @uri /buildOne
     * @param string bg145Id
     * @param string budget
     * @description คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง 1 ปี
     */
    public function buildOne($bg145Id, $budget);

    /**
     * @name buildMore
     * @uri /buildMore
     * @param string bg145Id
     * @param string budget
     * @description คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง ต่อเนื่อง
     */
    public function buildMore($bg145Id, $budget);
}
