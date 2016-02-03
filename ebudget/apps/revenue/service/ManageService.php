<?php

namespace apps\revenue\service;

use apps\revenue\interfaces\IManageService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class ManageService extends CServiceBase implements IManageService {

    public $datacontext;
    public $logger;
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    function getDept($deptId) {
        $dept = new \apps\common\entity\L3D\Department();
        $dept->id = $deptId;
        return $this->datacontext->getObject($dept)[0];
    }

    public function getAllBudgetRequest() {
        /*$sqlExt = "";
        if (isset($deptId) && $deptId != "") {
            $sqlExt .= "and bgh.deptId = " . $deptId . " ";
        }*/

        $sql = "select bgh.BudgetHeadId, bgh.budgetPeriodId, bgh.FormBudget as formId, "
            . "'เงินรายได้' as formName, bgh.budgetTypeCode, dept.DepartmentId as deptId, dept.DepartmentName as deptName  "
            . "from Budget_Head bgh "
            . "inner join L3D_Department dept on dept.DepartmentId = bgh.DepartmentId "
            . "where bgh.FormBudget = 500 "
            . "and bgh.budgetTypeCode = :type1 "
            . "and bgh.budgetPeriodId = :year1 "
            //. $sqlExt
            . "union "
            . "select bgh.BudgetHeadId, bgh.budgetPeriodId, bgh.FormBudget as formId, "
            . "exp.BudgetExpenseName as formName, bgh.budgetTypeCode, dept.DepartmentId as deptId, dept.DepartmentName as deptName "
            . "from Budget_Head bgh "
            . "inner join Budget_Expense exp on exp.budgetHeadId = bgh.budgetHeadId "
            . "inner join L3D_Department dept on dept.DepartmentId = exp.DepartmentId "
            . "where bgh.FormBudget = 999 "
            . "and bgh.budgetTypeCode = :type2 "
            . "and bgh.budgetPeriodId = :year2 "
            . "order by bgh.budgetPeriodId asc, bgh.FormBudget asc, dept.DepartmentId asc ";

        $param = array(
            "type1" => "K",
            "year1" => $this->getPeriod()->year,
            "type2" => "K",
            "year2" => $this->getPeriod()->year
        );

        $dataBgh = $this->datacontext->pdoQuery($sql, $param);
        return $dataBgh;
    }
}
