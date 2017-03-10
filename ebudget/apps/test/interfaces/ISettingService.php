<?php

namespace apps\budget\interfaces;

/**
 * @name ISettingService
 * @uri /setting
 * @description ตั้งค่าการจัดทำคำขอ งปม.
 */
interface ISettingService {

    /**
     * @name listsYear
     * @uri /listsYear
     * @return String[] year
     * @description ปี งปม.
     */
    public function listsYear();
    
    /**
     * @name save
     * @uri /save
     * @param int bgPeriodId ปีงบประมาณ
     * @param string activeYear ปี งปม. ปัจจุบัน
     * @param string setClose ปิดระบบรับคำขอ
     * @param date dateClose วันที่ปิดระบบรับคำขอ
     * @return boolean save
     * @description บันทึกการตั้งค่าการใช้งานระบบคำขอ
     */
    public function saveSetting($bgPeriodId, $activeYear, $setClose, $dateClose);
}
