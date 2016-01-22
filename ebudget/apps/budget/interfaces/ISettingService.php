<?php

namespace apps\budget\interfaces;

/**
 * @name ISettingService
 * @uri /setting
 * @description ตั้งค่าการจัดทำคำขอ งปม.
 */
interface ISettingService {

    /**
     * @name view
     * @uri /view
     * @return String[] view
     * @description หน้าแรกของการตั้งค่า
     */
    public function view();
    
    /**
     * @name listsYear
     * @uri /listsYear
     * @return String[] year
     * @description ปี งปม.
     */
    public function listsYear();
}
