<?php

namespace apps\budget\interfaces;

/**
 * @name BudgetInfoService
 * @uri /budgetInfo
 * @description BudgetInfoService
 */
interface IBudgetInfoService {

    /**
     * @name saveBg140
     * @uri /saveBg140
     * @param apps\common\entity\BudgetMoneySalary budget140 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.140
     */
    public function saveBg140($budget140);

    /**
     * @name saveBg141
     * @uri /saveBg141
     * @param apps\common\entity\BudgetMoneySalary budget141 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.141
     */
    public function saveBg141($budget141);

    /**
     * @name saveBg142
     * @uri /saveBg142
     * @param apps\common\entity\BudgetMoneySalary budget142 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.142
     */
    public function saveBg142($budget142);

    /**
     * @name saveBg143
     * @uri /saveBg143
     * @param apps\common\entity\BudgetMoneyOperating budget143 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.143
     */
    public function saveBg143($budget143);

    /**
     * @name saveBg144
     * @uri /saveBg144
     * @param apps\common\entity\BudgetMoneyUtility budget144 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.144
     */
    public function saveBg144($budget144);

    /**
     * @name saveBg145Durable
     * @uri /saveBg145Durable
     * @param apps\common\entity\BudgetMoneyDurable budget145 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.145 - ครุภัณฑ์
     */
    public function saveBg145Durable($budget145);

    /**
     * @name saveBg146
     * @uri /saveBg146
     * @param apps\common\entity\BudgetMoneyOperating budget146 Description
     * @return boolean save Description
     * @description คำขอแบบ ง.146
     */
    public function saveBg146($budget146);

    /**
     * @name saveBgBuildingOneyear
     * @uri /saveBgBuildingOneyear
     * @param int durableId BudgetMoneyDurable
     * @param apps\common\entity\BudgetMoneyBuilding building Description1
     * @param apps\common\entity\BudgetMoneyBuildingOneyear oneyear Description2
     * @return boolean save BudgetMoneyDurable Description1 Description2
     * @description คำขอแบบ ง.145 - สิ่งก่อสร้าง 1 ปี
     */
    public function saveBgBuildingOneyear($durableId, $building, $oneyear);

    /**
     * @name saveBgBuildingContinue
     * @uri /saveBgBuildingContinue
     * @param int durableId BudgetMoneyDurable
     * @param apps\common\entity\BudgetMoneyBuilding building Description
     * @param apps\common\entity\BudgetMoneyBuildingContinuePeriod period Description
     * @param apps\common\entity\BudgetMoneyBuildingContinueList list Description
     * @return boolean save Description
     * @description คำขอแบบ ง.145 - สิ่งก่อสร้าง ต่อเนื่อง
     */
    public function saveBgBuildingContinue($durableId, $building, $period, $list);
}
