<?php
/**
 * Created by PhpStorm.
 * User: KaowNeaw
 * Date: 1/4/2016
 * Time: 10:57 AM
 */

namespace apps\budget\service;


use apps\budget\interfaces\apps;
use apps\budget\interfaces\IApproveSumService;
use apps\budget\interfaces\year;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\budget\interfaces\IViewService;


use apps\common\service\LookupService;

class ApproveSumService extends CServiceBase implements IApproveSumService
{
    public $datacontext;
    public $ent = "apps\\common\\entity";
    public $md = "apps\\common\\model";

    public function __construct()
    {
        $this->datacontext = new CDataContext();
    }

    public function approveSumBudgetRequest($budgetPeriodId)
    {

        $sql = 'exec SP_SUM_BG ' . $budgetPeriodId . ',"G"';
        $status = $this->datacontext->pdoInsert($sql);

        if ($status != -1 && $status != false) {
            return true;
        } else {
            return false;
        }

    }


    public function toFinalBg($year)
    {
        $sqlDelete = '';//140 - 146
        $sqlInsert = '';
        $sqlUpdate = '';
        for ($i = 0; $i <= 6; $i++) {

            $sqlDelete .= "DELETE  FROM Final_14" . $i . " WHERE BudgetPeriodId =" . $year . "; ";// clear data on table FINAL
            $sqlInsert .= "INSERT INTO Final_14" . $i . " SELECT * FROM Budget_14" . $i . " WHERE BudgetPeriodId = " . $year . "; "; //Insert
            $sqlUpdate .= "UPDATE Final_14" . $i . " SET Status = 'Y' WHERE BudgetPeriodId = " . $year . "; "; //Update status =y
        }

        $status = $this->datacontext->pdoDelete($sqlDelete);
        if ($status != -1 && $status != false) {
            $status = $this->datacontext->pdoInsert($sqlInsert);
            if (!$status) {
                $status = $this->datacontext->pdoUpdate($sqlUpdate);
                if ($status != -1 && $status != false) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {

            return false;
        }

    }

    public function viewApproveSum($year)
    {
        $view = new CJView("approve/approveSum", CJViewType::HTML_VIEW_ENGINE);
        $view->year = $year;
        return $view;
    }

    public function LoadpproveSum($year)
    {

        $sql = "SELECT l.DEPARTMENTNAME,* FROM Budget_Summarize bs
                INNER JOIN L3D_DEPARTMENT l ON bs.DepartmentId = l.DEPARTMENTID
                 WHERE bs.BudgetPeriodId=" . $year;
        $sql .= " ORDER BY bs.DEPARTMENTID";
        $result = $this->datacontext->pdoQuery($sql);
        return $result;
    }


    public function updateApproveSum($bgSumList, $type)
    {

        $sql = '';
        foreach ($bgSumList as $key => $value) {

            if ($value->budget != "") {

                $budget = $value->budget;

                if ($type == "BudgetAfterReview") {

                    //update 2 col BudgetAfterReview and BudgetFinal
                    $sql .= "UPDATE Budget_Summarize SET BudgetAfterReview = " . $budget . ",BudgetFinal = " . $budget . " WHERE " .
                        "BudgetPeriodId = " . $value->bgPeriodId . " AND BudgetTypeId = " . $value->bgTypeId . " AND DepartmentId = " . $value->deptId . ";";

                } else {
                    //update BudgetFinal 1 col
                    $sql .= "UPDATE Budget_Summarize SET " . $type . " = " . $budget . " WHERE " .
                        "BudgetPeriodId = " . $value->bgPeriodId . " AND BudgetTypeId = " . $value->bgTypeId . " AND DepartmentId = " . $value->deptId . ";";
                }
            }
        }

        if ($this->datacontext->pdoUpdate($sql)) {
            return true;
        } else {
            return false;
        }

    }
}