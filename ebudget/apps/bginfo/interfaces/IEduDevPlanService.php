<?php
namespace apps\bginfo\interfaces;

/**
 * @name EduDevPlanService
 * @uri /EduDevPlan
 * @description ระบบจัดการด้านแผนพัฒนาการศึกษาระดับอุดมศึกษา
 */
interface IEduDevPlanService {
    /**
     * @name listsType
     * @uri /listsType
     * @description แผนกลยุทธ์
     * @return String[] lists Description
     */
    public function listsType();

    /**
     * @name viewPlan
     * @uri /viewPlan
     * @param integer typeId Description
     * @description ข้อมูลประเด็นยุทธศาสตร์/เป้าประสงค์/ตัวชี้วัด/กลยุทธ์​
     * @return String[] lists Description
     */
    public function viewPlan($typeId);

    /**
     * @name insertIssue
     * @uri /insertIssue
     * @param apps\common\entity\AffirmativeIssue pData Description
     * @return boolean add Description
     * @description เพิ่มประเด็นยุทธศาสตร์
     */
    public function insertIssue($pData);

    /**
     * @name updateIssue
     * @uri /updateIssue
     * @param apps\common\entity\AffirmativeIssue pData Description
     * @return boolean update Description
     * @description แก้ไขประเด็นยุทธศาสตร์
     */
    public function updateIssue($pData);

    /**
     * @name deleteIssue
     * @uri /deleteIssue
     * @param integer id Description
     * @return boolean delete Description
     * @description แก้ประเด็นยุทธศาสตร์
     */
    public function deleteIssue($id);

    /**
     * @name insertTarget
     * @uri /insertTarget
     * @param apps\common\entity\AffirmativeTarget pData Description
     * @return boolean add Description
     * @description เพิ่มประเด็นยุทธศาสตร์
     */
    public function insertTarget($pData);

    /**
     * @name updateTarget
     * @uri /updateTarget
     * @param apps\common\entity\AffirmativeTarget pData Description
     * @return boolean update Description
     * @description แก้ไขประเด็นยุทธศาสตร์
     */
    public function updateTarget($pData);

    /**
     * @name deleteTarget
     * @uri /deleteTarget
     * @param integer id Description
     * @return boolean delete Description
     * @description แก้ประเด็นยุทธศาสตร์
     */
    public function deleteTarget($id);

    /**
     * @name insertKpi
     * @uri /insertKpi
     * @param apps\common\entity\AffirmativeKpi pData Description
     * @return boolean add Description
     * @description เพิ่มประเด็นยุทธศาสตร์
     */
    public function insertKpi($pData);

    /**
     * @name updateKpi
     * @uri /updateKpi
     * @param apps\common\entity\AffirmativeKpi pData Description
     * @return boolean update Description
     * @description แก้ไขประเด็นยุทธศาสตร์
     */
    public function updateKpi($pData);

    /**
     * @name deleteKpi
     * @uri /deleteKpi
     * @param integer id Description
     * @return boolean delete Description
     * @description แก้ประเด็นยุทธศาสตร์
     */
    public function deleteKpi($id);

    /**
     * @name insertStrategy
     * @uri /insertStrategy
     * @param apps\common\entity\AffirmativeStrategy pData Description
     * @return boolean add Description
     * @description เพิ่มประเด็นยุทธศาสตร์
     */
    public function insertStrategy($pData);

    /**
     * @name updateStrategy
     * @uri /updateStrategy
     * @param apps\common\entity\AffirmativeStrategy pData Description
     * @return boolean update Description
     * @description แก้ไขประเด็นยุทธศาสตร์
     */
    public function updateStrategy($pData);

    /**
     * @name deleteStrategy
     * @uri /deleteStrategy
     * @param integer id Description
     * @return boolean delete Description
     * @description แก้ประเด็นยุทธศาสตร์
     */
    public function deleteStrategy($id);

    /**
     * @name manage
     * @uri /manage
     * @description หน้าจัดการแผนงาน
     */ 
    //public function viewManage();
    
    /**
     * @name fetchType
     * @uri /fetchType
     * @description ดึงข้อมูลแผนกลยุทธ์
     * @return apps\common\entity\MainPlanType dataList
     */ 
    //public function fetchType();
    
    /**
     * @name fetchIssueAndTarget
     * @uri /fetchIssueAndTarget
     * @param String[] pData Description
     * @description ดึงข้อมูลประเด็นยุทธศาสตร์และเป้าประสงค์​
     * @return String[] dataList
     */ 
    //public function fetchIssueAndTarget($pData);
    
    /**
     * @name fetchKpi
     * @uri /fetchKpi
     * @param apps\common\entity\AffirmativeKpi pData Description
     * @description ดึงข้อมูลตัวชี้วัด
     * @return apps\common\entity\AffirmativeKpi dataList
     */ 
    //public function fetchKpi($pData);

    /**
     * @name fetchStrategy
     * @uri /fetchStrategy
     * @param apps\common\entity\AffirmativeStrategy pData Description
     * @description ดึงข้อมูลกลยุทธ์
     * @return apps\common\entity\AffirmativeStrategy dataList
     */ 
    //public function fetchStrategy($pData);

    /**
     * @name saveKpi
     * @uri /saveKpi
     * @param apps\common\entity\AffirmativeKpi pData Description
     * @description บันทึกข้อมูลตัวชี้วัด
     * @return apps\common\entity\AffirmativeKpi dataList
     */ 
    //public function saveKpi($pData);
    
    /**
     * @name saveStrategy
     * @uri /saveStrategy
     * @param apps\common\entity\AffirmativeStrategy pData Description
     * @description บันทึกข้อมูลกลยุทธ์
     * @return apps\common\entity\AffirmativeStrategy dataList
     */ 
    //public function saveStrategy($pData);
    
    /**
     * @name saveTarget
     * @uri /saveTarget
     * @param apps\common\entity\AffirmativeTarget pData Description
     * @description บันทึกข้อมูลเป้าประสงค์
     * @return apps\common\entity\AffirmativeTarget dataList
     */ 
   //public function saveTarget($pData);
    
    /**
     * @name saveIssue
     * @uri /saveIssue
     * @param apps\common\entity\AffirmativeIssue pData Description
     * @description บันทึกข้อมูลประเด็นยุทธศาสตร์
     * @return apps\common\entity\AffirmativeIssue dataList
     */ 
    //public function saveIssue($pData);
    
    
    /**
     * @name delKpi
     * @uri /delKpi
     * @param apps\common\entity\AffirmativeKpi pData Description
     * @description ลบข้อมูลตัวชี้วัด
     * @return apps\common\entity\AffirmativeKpi dataList
     */ 
    //public function delKpi($pData);
    
    /**
     * @name delStrategy
     * @uri /delStrategy
     * @param apps\common\entity\AffirmativeStrategy pData Description
     * @description ลบข้อมูลกลยุทธ
     * @return apps\common\entity\AffirmativeStrategy dataList
     */ 
    //public function delStrategy($pData);
    
    /**
     * @name delTarget
     * @uri /delTarget
     * @param apps\common\entity\AffirmativeTarget pData Description
     * @description ลบข้อมูลเป้าประสงค์
     * @return apps\common\entity\AffirmativeTarget dataList
     */ 
    //public function delTarget($pData);
    
    /**
     * @name delIssue
     * @uri /delIssue
     * @param apps\common\entity\AffirmativeIssue pData Description
     * @description ลบข้อมูลประเด็นยุทธศาสตร์
     * @return apps\common\entity\AffirmativeIssue dataList
     */ 
    //public function delIssue($pData);
}
