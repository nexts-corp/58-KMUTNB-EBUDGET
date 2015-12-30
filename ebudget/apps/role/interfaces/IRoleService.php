<?php
namespace apps\role\interfaces;

/**
 * @name RoleService
 * @uri /Role
 * @description จัดการสิทธิ์การใช้งาน
 * @Resource 1001
 */
interface IRoleService {
    
    /**
     * @name manage
     * @uri /manage
     * @description จัดการข้อมูลผู้ใช้งานระบบ
     */ 
    public function viewManage();
    
    /**
     * @name listRole
     * @uri /listRole
     * @return String datas
     * @description ดึงข้อมูลการจัดการสิทธิ์
     */ 
    public function viewlistRole();
    
    /**
     * @name checkMenurole
     * @uri /checkMenurole
     * @param String data
     * @return String datas
     * @description ตรวจสอบสิทธิ์
     */ 
    public function checkMenurole($data);
    
    /**
     * @name managerole
     * @uri /managerole
     * @param apps\common\entity\MenuRole data
     * @return String datas
     * @description จัดการสิทธิ์
     */ 
    public function managerole($data);
}
