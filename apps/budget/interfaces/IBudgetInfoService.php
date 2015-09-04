<?php

namespace apps\budget\interfaces;

/**
 * @name BudgetInfoService
 * @uri /budgetInfo
 * @description BudgetInfoService
 */
interface IBudgetInfoService {

    /**
     * @name saveBgSalary
     * @uri /saveBgSalary
     * @param apps\common\entity\BudgetMoneySalary budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.140-ง.142
     */
    public function saveBgSalary($budget);

    /**
     * @name saveBgOperating
     * @uri /saveBgOperating
     * @param apps\common\entity\BudgetMoneyOperating budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.143, ง.146
     */
    public function saveBgOperating($budget);

    /**
     * @name saveBgUtility
     * @uri /saveBgUtility
     * @param apps\common\entity\BudgetMoneyUtility budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.144
     */
    public function saveBgUtility($budget);

    /**
     * @name saveBgDurable
     * @uri /saveBgDurable
     * @param apps\common\entity\BudgetMoneyDurable budget Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำขอแบบ ง.145 - ครุภัณฑ์
     */
    public function saveBgDurable($budget);

    /**
     * @name saveBgBuilding1Year
     * @uri /saveBgBuilding1Year
     * @param apps\common\entity\BudgetMoneyBuilding building Description
     * @param apps\common\entity\BudgetMoneyBuildingOneyear[] oneyear Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำชี้แจงสิ่งก่อสร้าง 1 ปี
     */
    public function saveBgBuilding1Year($building, $oneyear);

    /**
     * @name saveBgBuildingContinue
     * @uri /saveBgBuildingContinue
     * @param apps\common\entity\BudgetMoneyBuilding building Description
     * @param apps\common\entity\BudgetMoneyBuildingContinuePeriod period Description
     * @param apps\common\entity\BudgetMoneyBuildingContinueList list Description
     * @return boolean save Description
     * @description เพิ่ม/แก้ไขคำชี้แจงสิ่งก่อสร้าง ต่อเนื่อง
     */
    public function saveBgBuildingContinue($building, $period, $list);

    /**
     * @name deleteBg140
     * @uri /deleteBg140
     * @param int budget140 Description
     * @return boolean delete Description
     * @description ลบคำขอแบบ ง.140
     */
    public function deleteBg140($budget140);

    /**
     * @name deleteBg141
     * @uri /deleteBg141
     * @param int budget141 Description
     * @return boolean delete Description
     * @description ลบคำขอแบบ ง.141
     */
    public function deleteBg141($budget141);

    /**
     * @name deleteBg142
     * @uri /deleteBg142
     * @param int budget142 Description
     * @return boolean delete Description
     * @description ลบคำขอแบบ ง.142
     */
    public function deleteBg142($budget142);

    /**
     * @name deleteBg143
     * @uri /deleteBg143
     * @param int budget143 Description
     * @return boolean delete Description
     * @description ลบคำขอแบบ ง.143
     */
    public function deleteBg143($budget143);

    /**
     * @name deleteBg144
     * @uri /deleteBg144
     * @param int budget144 Description
     * @return boolean delete Description
     * @description ลบคำขอแบบ ง.144
     */
    public function deleteBg144($budget144);

    /**
     * @name deleteBg145
     * @uri /deleteBg145
     * @param int budget145 Description
     * @return boolean delete Description
     * @description ลบคำขอแบบ ง.145
     */
    public function deleteBg145($budget145);

    /**
     * @name deleteBg146
     * @uri /deleteBg146
     * @param int budget146 Description
     * @return boolean delete Description
     * @description ลบคำขอแบบ ง.146
     */
    public function deleteBg146($budget146);

    /**
     * @name deleteBgBuilding
     * @uri /deleteBgBuilding
     * @param int building Description
     * @return boolean delete Description
     * @description ลบคำชี้แจงสิ่งก่อสร้าง 1 ปี / ต่อเนื่อง
     */
    public function deleteBgBuilding($building);

    /**
     * @name selectBg140
     * @uri /selectBg140
     * @param apps\budget\model\BudgetForm bgForm Description
     * @return apps\common\entity\BudgetMoneySalary[] select Description
     * @description แบบ ง.140
     */
    public function selectBg140($bgForm);

    /**
     * @name selectBg141
     * @uri /selectBg141
     * @param apps\budget\model\BudgetForm bgForm Description
     * @return apps\common\entity\BudgetMoneySalary[] select Description
     * @description แบบ ง.141
     */
    public function selectBg141($bgForm);

    /**
     * @name selectBg142
     * @uri /selectBg142
     * @param apps\budget\model\BudgetForm bgForm Description
     * @return apps\common\entity\BudgetMoneySalary[] select Description
     * @description แบบ ง.142
     */
    public function selectBg142($bgForm);

    /**
     * @name selectBg143
     * @uri /selectBg143
     * @param apps\budget\model\BudgetForm bgForm Description
     * @return apps\common\entity\BudgetMoneyOperating[] select Description
     * @description แบบ ง.143
     */
    public function selectBg143($bgForm);

    /**
     * @name selectBg144
     * @uri /selectBg144
     * @param apps\budget\model\BudgetForm bgForm Description
     * @return apps\common\entity\BudgetMoneyUtility[] select Description
     * @description แบบ ง.144
     */
    public function selectBg144($bgForm);

    /**
     * @name selectBg145
     * @uri /selectBg145
     * @param apps\budget\model\BudgetForm bgForm Description
     * @return apps\common\entity\BudgetMoneyDurable[] select Description
     * @description แบบ ง.145
     */
    public function selectBg145($bgForm);

    /**
     * @name selectBg146
     * @uri /selectBg146
     * @param apps\budget\model\BudgetForm bgForm Description
     * @return apps\common\entity\BudgetMoneyOperating[] select Description
     * @description แบบ ง.146
     */
    public function selectBg146($bgForm);
}
