<?php

namespace apps\budget\interfaces;

/**
 * @name RequestBudgetService
 * @uri /budgetInfo
 * @description RequestBudgetService
 */
interface IRequestBudgetService {

    /**
     * @name saveBg140
     * @uri /saveBg140
     * @param apps\common\entity\BudgetMoneySalary budget140 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.140
     * @authen true
     * @resource 1001
     */
    public function saveBg140($budget140);

    /**
     * @name saveBg141
     * @uri /saveBg141
     * @param apps\common\entity\BudgetMoneySalary budget141 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.141
     * @authen true
     * @resource 1001
     */
    public function saveBg141($budget141);

    /**
     * @name saveBg142
     * @uri /saveBg142
     * @param apps\common\entity\BudgetMoneySalary budget142 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.142
     * @authen true
     * @resource 1001
     */
    public function saveBg142($budget142);

    /**
     * @name saveBg143
     * @uri /saveBg143
     * @param apps\common\entity\BudgetMoneyOperating budget143 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.143
     * @authen true
     * @resource 1001
     */
    public function saveBg143($budget143);

    /**
     * @name saveBg144
     * @uri /saveBg144
     * @param apps\common\entity\BudgetMoneyUtility budget144 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.144
     * @authen true
     * @resource 1001
     */
    public function saveBg144($budget144);

    /**
     * @name saveBg145Durable
     * @uri /saveBg145Durable
     * @param apps\common\entity\BudgetMoneyDurable budget145 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.145 - ครุภัณฑ์
     * @authen true
     * @resource 1001
     */
    public function saveBg145Durable($budget145);

    /**
     * @name saveBg146
     * @uri /saveBg146
     * @param apps\common\entity\BudgetMoneyOperating budget146 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.146
     * @authen true
     * @resource 1001
     */
    public function saveBg146($budget146);

    /**
     * @name saveBgBuilding
     * @uri /saveBgBuilding
     * @param apps\common\entity\BudgetMoneyBuilding building Description
     * @param apps\common\entity\BudgetMoneyBuildingOneyear oneyear Description
     * @return boolean save Description
     * @description คำขอแบบ ง.145 - สิ่งก่อสร้าง 1 ปี
     * @authen true
     * @resource 1001
     */
    public function saveBgBuildingOneyear($building, $oneyear);
    
        /**
     * @name saveBgBuilding
     * @uri /saveBgBuilding
     * @param apps\common\entity\BudgetMoneyBuilding building Description
     * @param apps\common\entity\BudgetMoneyBuildingContinuePeriod period Description
     * @param apps\common\entity\BudgetMoneyBuildingContinueList list Description
     * @return boolean save Description
     * @description คำขอแบบ ง.145 - สิ่งก่อสร้าง ต่อเนื่อง
     * @authen true
     * @resource 1001
     */
    public function saveBgBuildingContinue($building, $period, $list);
}
