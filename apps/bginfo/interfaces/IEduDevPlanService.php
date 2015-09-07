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
    
    /**
     * @name fetchKpi
     * @uri /fetchKpi
     * @param apps\common\entity\MainPlanKpi pData Description
     * @description ดึงข้อมูลตัวชี้วัด
     * @return apps\common\entity\MainPlanKpi dataList
     */ 
    public function fetchKpi($pData);
    
    
    /**
     * @name fetchStrategy
     * @uri /fetchStrategy
     * @param apps\common\entity\MainPlanStrategy pData Description
     * @description ดึงข้อมูลตัวชี้วัด
     * @return apps\common\entity\MainPlanStrategy dataList
     */ 
    public function fetchStrategy($pData);
    
    
    
    
    /**
     * @name saveKpi
     * @uri /saveKpi
     * @param apps\common\entity\MainPlanKpi pData Description
     * @description บันทึกข้อมูลตัวชี้วัด
     * @return apps\common\entity\MainPlanKpi dataList
     */ 
    public function saveKpi($pData);
    
    /**
     * @name saveStrategy
     * @uri /saveStrategy
     * @param apps\common\entity\MainPlanStrategy pData Description
     * @description บันทึกข้อมูลกลยุทธ์
     * @return apps\common\entity\MainPlanStrategy dataList
     */ 
    public function saveStrategy($pData);
    
    /**
     * @name saveTarget
     * @uri /saveTarget
     * @param apps\common\entity\MainPlanTarget pData Description
     * @description บันทึกข้อมูลเป้าประสงค์
     * @return apps\common\entity\MainPlanTarget dataList
     */ 
    public function saveTarget($pData);
    
    /**
     * @name saveIssue
     * @uri /saveIssue
     * @param apps\common\entity\MainPlanIssue pData Description
     * @description บันทึกข้อมูลประเด็นยุทธศาสตร์
     * @return apps\common\entity\MainPlanIssue dataList
     */ 
    public function saveIssue($pData);
    
    
    /**
     * @name delKpi
     * @uri /delKpi
     * @param apps\common\entity\MainPlanKpi pData Description
     * @description ลบข้อมูลตัวชี้วัด
     * @return apps\common\entity\MainPlanKpi dataList
     */ 
    public function delKpi($pData);
    
    /**
     * @name delStrategy
     * @uri /delStrategy
     * @param apps\common\entity\MainPlanStrategy pData Description
     * @description ลบข้อมูลกลยุทธ
     * @return apps\common\entity\MainPlanStrategy dataList
     */ 
    public function delStrategy($pData);
    
    /**
     * @name delTarget
     * @uri /delTarget
     * @param apps\common\entity\MainPlanTarget pData Description
     * @description ลบข้อมูลเป้าประสงค์
     * @return apps\common\entity\MainPlanTarget dataList
     */ 
    public function delTarget($pData);
    
    /**
     * @name delIssue
     * @uri /delIssue
     * @param apps\common\entity\MainPlanIssue pData Description
     * @description ลบข้อมูลประเด็นยุทธศาสตร์
     * @return apps\common\entity\MainPlanIssue dataList
     */ 
    public function delIssue($pData);
    

}
