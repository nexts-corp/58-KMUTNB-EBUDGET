<?php

namespace apps\budget\interfaces;

/**
 * @name BudgetInfoService
 * @uri /budgetInfo
 * @description BudgetInfoService
 */
interface IBudgetInfoService {

    /**
     * @name listBudgetType140
     * @uri /listBudgetType140
     * @return apps\common\entity\BudgetType[] list Description
     * @description เลือกประเภทรายจ่ายของฟอร์ม
     */
    public function listBudgetType140();

    /**
     * @name listBudgetType141
     * @uri /listBudgetType141
     * @return apps\common\entity\BudgetType[] list Description
     * @description เลือกประเภทรายจ่ายของฟอร์ม
     */
    public function listBudgetType141();

    /**
     * @name listBudgetType142
     * @uri /listBudgetType142
     * @return apps\common\entity\BudgetType[] list Description
     * @description เลือกประเภทรายจ่ายของฟอร์ม
     */
    public function listBudgetType142();

    /**
     * @name listBudgetType143
     * @uri /listBudgetType143
     * @return apps\common\entity\BudgetType[] list Description
     * @description เลือกประเภทรายจ่ายของฟอร์ม
     */
    public function listBudgetType143();

    /**
     * @name listBudgetType144
     * @uri /listBudgetType144
     * @return apps\common\entity\BudgetType[] list Description
     * @description เลือกประเภทรายจ่ายของฟอร์ม
     */
    public function listBudgetType144();

    /**
     * @name listBudgetType145
     * @uri /listBudgetType145
     * @return apps\common\entity\BudgetType[] list Description
     * @description เลือกประเภทรายจ่ายของฟอร์ม
     */
    public function listBudgetType145();

    /**
     * @name listBudgetType146
     * @uri /listBudgetType146
     * @return apps\common\entity\BudgetType[] list Description
     * @description เลือกประเภทรายจ่ายของฟอร์ม
     */
    public function listBudgetType146();

    /**
     * @name viewBudget140
     * @uri /viewBudget140
     * @param apps\common\entity\model\BudgetFilter param 
     * @return apps\common\entity\Budget140[] budget Description
     * @description แสดงข้อมูลฟอร์ม 140 
     */
    public function viewBudget140($param);

    /**
     * @name viewBudget141
     * @uri /viewBudget141
     * @param apps\common\entity\model\BudgetFilter param
     * @return apps\common\entity\Budget141[] budget Description
     * @description แสดงข้อมูลฟอร์ม 141
     */
    public function viewBudget141($param);

    /**
     * @name viewBudget142
     * @uri /viewBudget142
     * @param apps\common\entity\model\BudgetFilter param
     * @return apps\common\entity\Budget142[] budget Description
     * @description แสดงข้อมูลฟอร์ม 142
     */
    public function viewBudget142($param);

    /**
     * @name viewBudget143
     * @uri /viewBudget143
     * @param apps\common\entity\model\BudgetFilter param
     * @return apps\common\entity\Budget143[] budget Description
     * @description แสดงข้อมูลฟอร์ม 143
     */
    public function viewBudget143($param);

    /**
     * @name viewBudget144
     * @uri /viewBudget144
     * @param apps\common\entity\model\BudgetFilter param
     * @return apps\common\entity\Budget144[] budget Description
     * @description แสดงข้อมูลฟอร์ม 144
     */
    public function viewBudget144($param);

    /**
     * @name viewBudget145
     * @uri /viewBudget145
     * @param apps\common\entity\model\BudgetFilter param
     * @return apps\common\entity\Budget145[] budget Description
     * @description แสดงข้อมูลฟอร์ม 145
     */
    public function viewBudget145($param);

    /**
     * @name viewBudget146
     * @uri /viewBudget146
     * @param apps\common\entity\model\BudgetFilter param
     * @return apps\common\entity\Budget146[] budget Description
     * @description แสดงข้อมูลฟอร์ม 146
     */
    public function viewBudget146($param);


    /**
     * @name viewBuildingOne
     * @uri /viewBuildingOne
     * @param String bg145Id
     * @param String type
     * @return apps\common\entity\Building[] budget Description
     * @description คำชี้แจงค่าก่อสร้าง 1 ปี
     */
    public function viewBuildingOne($bg145Id,$type);


    /**
     * @name viewBuildingMore
     * @uri /viewBuildingMore
     * @param String bg145Id
     * @param String type
     * @return apps\common\entity\Building[] budget Description
     * @description คำชี้แจงค่าก่อสร้างต่อเนื่อง
     */
    public function viewBuildingMore($bg145Id,$type);
}
