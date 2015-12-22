<?php
namespace apps\member\interfaces;

/**
 * @name MemberService
 * @uri /Member
 * @description ระบบจัดการประเภทหมวดรายจ่าย
 * @Resource 1001
 */
interface IMemberService {
    
    /**
     * @name manage
     * @uri /manage
     * @description จัดการข้อมูลผู้ใช้งานระบบ
     */ 
    public function viewManage();
    
    /**
     * @name create
     * @uri /create
     * @description เพิ่มผู้ใช้งาน
     */ 
    public function viewCreate();
  
     /**
     * @name form
     * @uri /form
     * @param string data
     * @description ฟอร์มจัดการ
     */ 
    public function viewForm($data);   
    
    
    /**
     * @name listRole
     * @uri /listRole
     * @description แสดงประเภทสิทธิ์การใช้งาน
     */ 
    public function listRole();
    
    /**
     * @name checkUsername
     * @uri /checkUsername
     * @param apps\common\entity\Member data
     * @return string data
     * @description ตรวจสอบ username ซ้ำ
     */ 
    public function checkUsername($data);
    
    /**
     * @name saveMember
     * @uri /saveMember
     * @param apps\common\entity\Member data
     * @return boolean status
     * @description saveMember
     */ 
    public function saveMember($data);
    
    /**
     * @name editMember
     * @uri /editMember
     * @param apps\common\entity\Member data
     * @return boolean status
     * @description editMember
     */ 
    public function editMember($data);    
    
    /**
     * @name edit
     * @uri /edit
     * @param string data
     * @description แก้ไขข้อมูลผู้ใช้งาน
     */ 
    public function viewEdit($data);
    
    /**
     * @name changepassword
     * @uri /changepassword
     * @param string data
     * @description เปลี่ยนรหัสผ่าน
     */ 
    public function viewChangePassword($data);
    
    /**
     * @name savePassword
     * @uri /savePassword
     * @param apps\common\entity\Member data
     * @return boolean status
     * @description เปลี่ยนรหัสผ่าน
     */ 
    public function savePassword($data);
    
    /**
     * @name delete
     * @uri /delete
     * @param apps\common\entity\Member data
     * @return boolean status
     * @description เปลี่ยนรหัสผ่าน
     */ 
    public function delete($data);
    
    
    /**
     * @name listMember
     * @uri /listMember
     * @param apps\common\entity\MemberRole data
     * @return String datas
     * @description ค้นหาผู้ใช้งานตามสิทธิ์
     */ 
    public function listMember($data);
    
    
    /**
     * @name managerole
     * @uri /managerole
     * @param string data
     * @description แก้ไขข้อมูลผู้ใช้งาน
     */ 
    public function viewManageRole($data);
    
    /**
     * @name saverole
     * @uri /saverole
     * @param apps\common\entity\MenuRole data
     * @return String datas
     * @description จัดการสิทธิ์
     */ 
    public function managerole($data);
    
        /**
     * @name checkMenurole
     * @uri /checkMenurole
     * @param String data
     * @param String memberId
     * @return String datas
     * @description ตรวจสอบสิทธิ์
     */ 
    public function checkMenurole($data,$memberId);
}
