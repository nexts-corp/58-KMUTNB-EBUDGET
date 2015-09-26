<?php

namespace apps\bginfo\service;

use apps\bginfo\interfaces\apps;
use apps\common\entity\ActivityType;
use apps\common\entity\L3D\Campus;
use apps\common\entity\L3D\Department;
use apps\common\entity\MappingDepartmentType;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use th\co\bpg\cde\core\CServiceBase;
use apps\bginfo\interfaces\IDepartmentService;
use th\co\bpg\cde\data\CDataContext;


class DepartmentService extends CServiceBase implements IDepartmentService
{

    public $datacontext;

    public $pathEnt = "apps\\common\\entity";

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
        $obj = new Campus();
        $obj->setCampusStatus('Y');
        return $this->datacontext->getObject($obj);
    }

    public function fetchDepartment($campusID)
    {

        $sql = "SELECT dept.id AS deptID,dept.deptName,dept.masterId,maping.id as mapID,act.id AS actTypeID,act.actTypeName "
            . "FROM " . $this->pathEnt . "\\L3D\\Department dept "
            . "LEFT JOIN " . $this->pathEnt . "\\MappingDepartmentType maping "
            . "WITH dept.id = maping.deptId "
            . "LEFT JOIN " . $this->pathEnt . "\\ActivityType act "
            . "WITH maping.actId = act.id WHERE dept.deptStatus = 'Y' AND dept.campusId=" . $campusID;

        return $this->datacontext->getObject($sql);
    }

    public function fetchDepartmentMain($campusID)
    {
        $SQL = "WITH  Departmnet " .
            "AS ( " .
            "SELECT  DEPARTMENTID, [DEPARTMENTNAME], MASTERID,CAMPUSID,CAST(([DEPARTMENTNAME]) AS VARCHAR(1000)) AS 'MultiLevel',DEPARTMENTSTATUS,Level = 0 " .
            "FROM    L3D_DEPARTMENT " .
            "WHERE   DEPARTMENTID = 0 OR MASTERID=  NULL " .
            "UNION ALL " .
            "SELECT  t.DEPARTMENTID, t.[DEPARTMENTNAME], t.MASTERID,t.CAMPUSID,CAST((a.MultiLevel +'|'+ t.DEPARTMENTNAME) AS VARCHAR(1000)) AS 'MultiLevel',t.DEPARTMENTSTATUS,a.Level+1 " .
            "FROM    L3D_DEPARTMENT AS t JOIN Departmnet AS a ON t.MASTERID = a.DEPARTMENTID) " .
            "SELECT DEPARTMENTID,DEPARTMENTNAME,Level FROM Departmnet WHERE CAMPUSID = " . $campusID . " AND DEPARTMENTSTATUS = 'Y' AND LEVEL = 1 ORDER BY DEPARTMENTID";

        return $this->datacontext->pdoQuery($SQL);
    }

    public function fetchActivityType()
    {
        $obj = new ActivityType();
        $obj->setActTypeStatus('Y');

        return $this->datacontext->getObject($obj);
    }


    public function saveDepartment($dataDept, $dataMaping)
    {
        if ($this->datacontext->saveObject($dataDept) && $this->datacontext->saveObject($dataMaping)) {

            return $dataMaping->id;
        } else {
            return false;
        }
    }


    public function editDepartment($dataDept, $dataMaping)
    {
        if ($dataMaping->id == "null" || $dataMaping->id == null) {

            if ($this->datacontext->updateObject($dataDept)) {

                if ($this->datacontext->saveObject($dataMaping)) {
                    return $dataMaping->id;
                } else {
                    return false;
                }
            } else {

            }
        } else {

            if ($this->datacontext->updateObject($dataDept) && $this->datacontext->updateObject($dataMaping)) {

                return $dataMaping->id;
            } else {
                return false;
            }

        }

    }


    public function removeDepartment($idDept, $mapid)
    {
        $obj = new Department();
        $obj->setId($idDept);
        $obj->setDeptStatus('N');

        if ($this->datacontext->updateObject($obj)) {
            $obj2 = new MappingDepartmentType();
            $obj2->setId($mapid);
            return $this->datacontext->removeObject($obj2);
        } else {
            return false;
        }

    }
}