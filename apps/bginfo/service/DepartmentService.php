<?php

namespace apps\bginfo\service;

use apps\common\entity\BudgetPlan;
use apps\common\entity\Campus;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use th\co\bpg\cde\core\CServiceBase;
use apps\bginfo\interfaces\IDepartmentService;
use th\co\bpg\cde\data\CDataContext;


class DepartmentService extends CServiceBase implements IDepartmentService
{

    public $datacontext;

    function __construct()
    {

        $this->datacontext = new CDataContext();
    }

    public function viewDepartment()
    {
        $view = new CJView("viewDepartment", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function fetchCampus()
    {
        $sql = "SELECT * FROM [3D_CAMPUS] WHERE CAMPUSSTATUS = 'Y'";
        return $this->datacontext->pdoQuery($sql);
    }

    public function fetchDepartment($campusID)
    {
        $sql = $this->toSqlDepartment(0, $campusID);
        $headDepartment = $this->datacontext->pdoQuery($sql);

        for ($i = 0; $i < count($headDepartment); $i++) {

            $masterID = $headDepartment[$i]["DEPARTMENTID"];
            $sql = $this->toSqlDepartment($masterID, $campusID);
            $subDepartment = $this->datacontext->pdoQuery($sql);

            for ($j = 0; $j < count($subDepartment); $j++) {

                $masterID = $subDepartment[$j]["DEPARTMENTID"];
                $sql = $this->toSqlDepartment($masterID, $campusID);
                $sub2Department = $this->datacontext->pdoQuery($sql);
                $subDepartment[$j]["sub2Department"] = $sub2Department;
            }

            $headDepartment[$i]["subDepartment"] = $subDepartment;
        }

        return $headDepartment;
    }

    private function toSqlDepartment($masterID, $campusID)
    {
        $sql = "SELECT * FROM [3D_DEPARTMENT] WHERE  MASTERID = " . $masterID . " AND DEPARTMENTSTATUS = 'Y' AND CAMPUSID = " . $campusID;
        return $sql;
    }

}