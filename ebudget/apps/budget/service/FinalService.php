<?php

namespace apps\budget\service;

use apps\budget\interfaces\budgetType;
use apps\budget\interfaces\quater;
use apps\budget\interfaces\year;
use apps\common\entity\TrackingStatus;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IFinalService;
use apps\common\entity;

class FinalService extends CServiceBase implements IFinalService {

    public $datacontext;
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->datacontext = new CDataContext();
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    public function getAllBudgetRequest($deptId)
    {
        /*
        if ($deptId > 0) {
            $sqlExt = "and bgh.statusId = 1 ";
        } else {
            $sqlExt = "and bgh.statusId <> 1 ";
        }
        */

        $sql = "select bgh.id as bghId, bgh.budgetTypeCode, bgh.budgetPeriodId, "
            . "case when bgh.budgetTypeCode = 'G' then 'เงินงบประมาณแผ่นดิน' else 'เงินรายได้' end as budgetTypeName, "
            . "bgh.formId as formId, dept.id as deptId, dept.deptName as deptName, "
            . "faculty.id as facultyId, faculty.deptName as facultyName, "
            . "l3dPlan.id as l3dPlanId, l3dPlan.planName as l3dPlanName, "
            . "bgPlan.id as planId, bgPlan.planName as planName, "
            . "bgProj.id as projectId, bgProj.projectName as projectName, "
            . "fund.id as fundgroupId, fund.fundgroupName as fundName, "
            . "status.id as statusId, status.desc as statusDesc "
            . "from " . $this->ent . "\\BudgetHead bgh "
            . "left outer join " . $this->ent . "\\L3D\\Department dept with dept.id = bgh.deptId "
            . "left outer join " . $this->ent . "\\L3D\\Department faculty with faculty.id = dept.masterId "
            . "left outer join " . $this->ent . "\\L3D\\Plan l3dPlan with l3dPlan.id = bgh.l3dPlanId "
            . "left outer join " . $this->ent . "\\BudgetPlan bgPlan with bgPlan.id = bgh.planId "
            . "left outer join " . $this->ent . "\\BudgetProject bgProj with bgProj.id = bgh.projectId "
            . "left outer join " . $this->ent . "\\L3D\\FundGroup fund with fund.id = bgh.fundgroupId "
            . "left outer join " . $this->ent . "\\TrackingStatus status with status.id = bgh.statusId "
            . "where bgh.budgetTypeCode = :budgetTypeCode "
            . "and bgh.statusId = 5"
            . "and bgh.budgetPeriodId = :budgetPeriodId "
            . "order by bgh.formId asc, faculty.id asc, dept.id asc, l3dPlan.id asc, fund.id asc ";

        $param = array(
            "budgetTypeCode" => "G",
            "budgetPeriodId" => $this->getPeriod()->year
        );
        $data = $this->datacontext->getObject($sql, $param);

        return $data;
    }

    public function listForm(){
        $formArr = array(
            ["id" => 140, "name" => "ง.140 - คำของบประมาณเงินเดือน"],
            ["id" => 141, "name" => "ง.141 - คำของบประมาณค่าจ้างประจำ"],
            ["id" => 142, "name" => "ง.142 - คำของบประมาณค่าจ้างชั่วคราว"],
            ["id" => 143, "name" => "ง.143 - คำของบประมาณเงินอุดหนุนเป็นค่าใช้จ่ายดำเนินงาน (ค่าตอบแทน ใช้สอย และวัสดุ)"],
            ["id" => 144, "name" => "ง.144 - คำของบประมาณเงินอุดหนุนเป็นค่าสาธารณูปโภค"],
            ["id" => 145, "name" => "ง.145 - คำของบประมาณเงินอุดหนุนเป็นค่าครุภัณฑ์ ค่าที่ดิน/สิ่งก่อสร้าง"],
            ["id" => 146, "name" => "ง.146 - คำของบประมาณเงินอุดหนุน"]
            //["id" => 200, "name" => "โครงการที่ตอบสนองยุทธศาสตร์"]
        );

        return $formArr;
    }

    public function list3DPlan() {
        $repo = new entity\L3D\Plan();
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->planName;
        }
        return $result;
    }

    public function listFundgroupWithPlan($l3dPlanId) {
        $sql = "select DISTINCT(map.FUNDGROUPID) as id , fund.FUNDGROUPNAME as name "
            ."from MAPPINGPLAN map "
            ."inner join L3D_FUNDGROUP fund on fund.FUNDGROUPID = map.FUNDGROUPID "
            ."where BUDGETPERIODID = :budgetPeriodId "
            ."and PLANID = :l3dPlanId";

        $param = array(
            "budgetPeriodId" => $this->getPeriod()->year,
            "l3dPlanId" => $l3dPlanId
        );
        $data = $this->datacontext->pdoQuery($sql, $param);

        $result = array();

        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value["id"];
            $result[$key]["name"] = $value["name"];
        }
        return $result;
    }

    public function listFaculty() {
        $repo = new entity\L3D\Department();
        $repo->setDeptGroup("A");
        $repo->setDeptStatus("Y");
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->deptName;
        }
        return $result;
    }

    public function listDepartment($facultyId) {
        $repo = new entity\L3D\Department();
        $repo->setDeptStatus("Y");
        if (isset($facultyId)) {
            $repo->setMasterId($facultyId);
        }
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->deptName;
            $result[$key]["masterId"] = $value->masterId;
        }
        return $result;
    }
}
