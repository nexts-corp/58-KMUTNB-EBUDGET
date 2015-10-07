<?php

namespace apps\budget\interfaces;

/**
 * @name BudgetSaveService
 * @uri /budgetSave
 * @description BudgetSaveService
 */
interface IBudgetSaveService {

    /**
     * @name insertBudget140
     * @uri /insertBudget140
     * @param apps\common\entity\Budget140 budget Description
     * @return boolean result 
     * @description เพิ่มคำขอแบบ ง.140
     */
    public function insertBudget140($budget);

    /**
     * @name updateBudget140
     * @uri /updateBudget140
     * @param apps\common\entity\Budget140 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.140
     */
    public function updateBudget140($budget);

    /**
     * @name deleteBudget140
     * @uri /deleteBudget140
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.140
     */
    public function deleteBudget140($budgetId);

    /**
     * @name insertBudget141
     * @uri /insertBudget141
     * @param apps\common\entity\Budget141 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.141
     */
    public function insertBudget141($budget);

    /**
     * @name updateBudget141
     * @uri /updateBudget141
     * @param apps\common\entity\Budget141 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.141
     */
    public function updateBudget141($budget);

    /**
     * @name deleteBudget141
     * @uri /deleteBudget141
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.141
     */
    public function deleteBudget141($budgetId);

    /**
     * @name insertBudget142
     * @uri /insertBudget142
     * @param apps\common\entity\Budget142 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.142
     */
    public function insertBudget142($budget);

    /**
     * @name updateBudget142
     * @uri /updateBudget142
     * @param apps\common\entity\Budget142 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.142
     */
    public function updateBudget142($budget);

    /**
     * @name deleteBudget142
     * @uri /deleteBudget142
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.142
     */
    public function deleteBudget142($budgetId);

    /**
     * @name insertBudget143
     * @uri /insertBudget143
     * @param apps\common\entity\Budget143 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.143
     */
    public function insertBudget143($budget);

    /**
     * @name updateBudget143
     * @uri /updateBudget143
     * @param apps\common\entity\Budget143 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.143
     */
    public function updateBudget143($budget);

    /**
     * @name deleteBudget143
     * @uri /deleteBudget143
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.143
     */
    public function deleteBudget143($budgetId);

    /**
     * @name insertBudget144
     * @uri /insertBudget144
     * @param apps\common\entity\Budget144 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.144
     */
    public function insertBudget144($budget);

    /**
     * @name updateBudget144
     * @uri /updateBudget144
     * @param apps\common\entity\Budget144 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.144
     */
    public function updateBudget144($budget);

    /**
     * @name deleteBudget144
     * @uri /deleteBudget144
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.144
     */
    public function deleteBudget144($budgetId);

    /**
     * @name insertBudget145
     * @uri /insertBudget145
     * @param apps\common\entity\Budget145 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.145
     */
    public function insertBudget145($budget);

    /**
     * @name updateBudget145
     * @uri /updateBudget145
     * @param apps\common\entity\Budget145 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.145
     */
    public function updateBudget145($budget);

    /**
     * @name deleteBudget145
     * @uri /deleteBudget145
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.145
     */
    public function deleteBudget145($budgetId);

    /**
     * @name insertBudget146
     * @uri /insertBudget146
     * @param apps\common\entity\Budget146 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.146
     */
    public function insertBudget146($budget);

    /**
     * @name updateBudget146
     * @uri /updateBudget146
     * @param apps\common\entity\Budget146 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.146
     */
    public function updateBudget146($budget);

    /**
     * @name deleteBudget146
     * @uri /deleteBudget146
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.146
     */
    public function deleteBudget146($budgetId);


    /**
     * @name insertBuilding
     * @uri /insertBuilding
     * @param apps\common\entity\Building building Description
     * @param apps\common\entity\BuildingDetail buildingDetail Description
     * @return boolean result Description
     * @description เพิ่มคำชี้แจงรายละเอียดสิ่งก่อสร้าง
     */
    public function insertBuilding($building, $buildingDetail);

}