<?php

namespace apps\budget\interfaces;

/**
 * @name BudgetSaveService
 * @uri /budgetSave
 * @description BudgetSaveService
 */
interface IBudgetSaveService {

    /**
     * @name saveBudget140
     * @uri /saveBudget140
     * @param apps\common\entity\Budget140[] budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.140
     */
    public function saveBudget140($budget);

    /**
     * @name saveBudget141
     * @uri /saveBudget141
     * @param apps\common\entity\Budget141[] budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.141
     */
    public function saveBudget141($budget);

    /**
     * @name saveBudget142
     * @uri /saveBudget142
     * @param apps\common\entity\Budget142[] budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.142
     */
    public function saveBudget142($budget);

    /**
     * @name saveBudget143
     * @uri /saveBudget143
     * @param apps\common\entity\Budget143[] budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.143
     */
    public function saveBudget143($budget);

    /**
     * @name saveBudget144
     * @uri /saveBudget144
     * @param apps\common\entity\Budget144[] budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.144
     */
    public function saveBudget144($budget);

    /**
     * @name saveBudget145
     * @uri /saveBudget145
     * @param apps\common\entity\Budget145[] budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.145
     */
    public function saveBudget145($budget);

    /**
     * @name saveBudget146
     * @uri /saveBudget146
     * @param apps\common\entity\Budget146[] budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.146
     */
    public function saveBudget146($budget);
}
