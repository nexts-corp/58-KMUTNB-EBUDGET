<?php
namespace apps\bginfo\interfaces;

/**
 * @name EduDevPlanService
 * @uri /EduDevPlan
 * @description ระบบจัดการด้านแผนพัฒนาการศึกษาระดับอุดมศึกษา
 */
interface IEduDevPlanService {
    
    /**
     * @name manage
     * @uri /manage
     * @description หน้าจัดการแผนงาน
     */ 
    public function viewManage();
    
    /**
     * @name fetchType
     * @uri /fetchType
     * @description ดึงข้อมูลแผนกลยุทธ์
     * @return apps\common\entity\MainPlanType dataList
     */ 
    public function fetchType();
    
    /**
     * @name fetchIssueAndTarget
     * @uri /fetchIssueAndTarget
     * @param apps\common\entity\MainPlanIssue pData Description
     * @description ดึงข้อมูลประเด็นยุทธศาสตร์และเป้าประสงค์​
     * @return String[] dataList
     */ 
    public function fetchIssueAndTarget($pData);
    
    
    

}
