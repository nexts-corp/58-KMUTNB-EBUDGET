<?php
/**
 * Created by PhpStorm.
 * User: KaowNeaw
 * Date: 11/16/2015
 * Time: 2:01 PM
 */

namespace apps\report\service;


use apps\common\entity\BudgetSetting;
use apps\common\entity\L3D\Department;
use apps\common\entity\L3D\FundGroup;
use apps\common\entity\L3D\Plan;
use apps\report\interfaces\group;
use apps\report\interfaces\IReport3DService;
use apps\report\interfaces\periodId;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class Report3DService extends CServiceBase implements IReport3DService
{

    public $datacontext;

    private $pathEnt = "apps\\common\\entity\\";

    public function __construct()
    {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext();
    }


    public function listDept($group)
    {
        // TODO: Implement listDept() method.
        $obj = new Department();
        $obj->setDeptGroup($group);
        return $this->datacontext->getObject($obj);

    }


    public function listL3DPlan()
    {
        $obj = new Plan(); //L3D_Plan

        return $this->datacontext->getObject($obj);

    }


    public function listL3DFund()
    {
        $obj = new FundGroup(); //L3D_Fundgroup

        return $this->datacontext->getObject($obj);
    }


    public function budgetSetting($periodId)
    {
        $obj = new BudgetSetting();

        $list = $this->datacontext->getObject($obj);

        foreach ($list as $key => $value) {
            if ($value->budgetPeriodId == $periodId) {

                if ($value->isClosed == "N") {
                    //check table on store procedure
                    return "BUDGET";
                } else {

                    return "FINAL";
                }
            }
        }

    }
}