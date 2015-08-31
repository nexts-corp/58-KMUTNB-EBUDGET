<?php

namespace apps\report\interfaces;

/**
 * @name ViewService
 * @uri /view
 * @description ViewService
 */
interface IViewService {

    /**
     * @name report3D
     * @uri /report3D
     * @description รายงานงบประมาณเงินรายได้จากงบประมาณแผ่นดิน 3 มิติ
     */
    public function report3D();

    /**
     * @name reportBudget
     * @uri /reportBudget
     * @description รายงานการจัดทำงบประมาณรายจ่ายเงินรายได้ประจำปี
     */
    public function reportBudget();
    
    /**
     * @name reports
     * @uri /reports
     * @description หน้าออกรายงาน
     */
    public function reports();
}
