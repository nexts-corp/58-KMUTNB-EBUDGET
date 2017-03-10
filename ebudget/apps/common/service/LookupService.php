<?php

namespace apps\common\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use th\co\bpg\cde\data\CDataContext;
use apps\common\interfaces\ILookupService;
use apps\common\entity;
use apps\common\entity\L3D;

class LookupService extends CServiceBase implements ILookupService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext();
    }

    public function listCampus() {
        $repo = new L3D\Campus();
        $repo->setCampusStatus("Y");
        $data = $this->datacontext->getObject($repo);
        return $data;
    }

    public function listFaculty($campusId) {
        $repo = new L3D\Department();
        $repo->setDeptGroup("A");
        $repo->setDeptStatus("Y");
        if (isset($campusId) && $campusId != "0") {
            $repo->setCampusId($campusId);
        }
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->deptName;
        }
        return $result;
    }

    public function listDepartment($facultyId) {
        $repo = new L3D\Department();
        $repo->setDeptStatus("Y");
        if (isset($facultyId) && $facultyId != null) {
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

    public function listFundgroup() {
        $repo = new L3D\FundGroup();
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->fundgroupName;
        }
        return $result;
    }

    public function listBudgetPlan($budgetYear) {
        $repo = new entity\BudgetPlan();
        $repo->setPeriodId($budgetYear);
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->planName;
        }
        return $result;
    }

    public function listBudgetProject($planId) {
        $repo = new entity\BudgetProject();
        $repo->setPlanId($planId);
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->projectName;
            $result[$key]["type"] = $value->projectType;
        }
        return $result;
    }

    public function listYear() {
        $sql = "select max(y.year) AS fmax,min(y.year) AS fmin from " . $this->ent . "\\Year y";
        $data = $this->datacontext->getObject($sql);
        $list = null;
        $k = 0;
        for ($i = (int) $data[0]["fmin"]; $i < (int) $data[0]["fmax"] + 2; $i++) {
            $list[$k]["year"] = $i;
            $k++;
        }
        return $list;
    }

    public function listBudgetSource() {
        $list = array();
        array_push($list, array("id" => "G", "name" => "เงินงบประมาณแผ่นดิน"));
        array_push($list, array("id" => "K", "name" => "เงินรายได้"));
        //array_push($list, array("id" => "U", "name" => "เงินงบประมาณแผ่นดินและเงินรายได้"));
        return $list;
    }

    public function listBudgetType() {
        $sql = "SELECT bgt FROM " . $this->ent . "\\BudgetType bgt WHERE (bgt.typeCode = 'K' OR bgt.typeCode = 'U') AND bgt.masterId = 0";
        return $this->datacontext->getObject($sql);
    }

    public function listProjectType() {
        $repo = new entity\ProjectType();
        $repo->setTypeStatus("Y");
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->typeName;
        }
        return $result;
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

    public function list3DPproject($planId) {
        $repo = new entity\L3D\Project();
        $repo->setPlanId($planId);
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->planName;
        }

        return $result;
    }

    public function listAffirmativeType() {
        $list = new entity\AffirmativeType();
        return $this->datacontext->getObject($list);
    }

    public function listAffirmativeIssue($id) {
        $list = new entity\AffirmativeIssue();
        $list->setTypeId($id);
        return $this->datacontext->getObject($list);
    }

    public function listAffirmativeTarget($id) {
        $list = new entity\AffirmativeTarget();
        $list->setIssueId($id);
        return $this->datacontext->getObject($list);
    }

    public function listAffirmativeStrategy($id) {
        $list = new entity\AffirmativeStrategy();
        $list->setTargetId($id);
        return $this->datacontext->getObject($list);
    }

    public function listIntegration() {
        $list = new entity\Integration();
        return $this->datacontext->getObject($list);
    }

    public function listFundgroupWithPlan($budgetPeriodId, $l3dPlanId) {
        $sql = "select DISTINCT(map.fundgroupId) as id , fund.FundGroupName as name "
                . "from Mapping_Plan map "
                . "inner join L3D_Fund_Group fund on fund.FundGroupId = map.FundGroupId "
                . "where map.BudgetPeriodId = '" . $budgetPeriodId . "'"
                . "and map.PlanId = '" . $l3dPlanId . "'";

        $data = $this->datacontext->pdoQuery($sql);

        $result = array();

        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value["id"];
            $result[$key]["name"] = $value["name"];
        }
        return $result;
    }

    public function listYearOld() {
        $sql = "select y from " . $this->ent . "\\Year y ORDER BY y.year DESC ";

        $data = $this->datacontext->getObject($sql);

        return $data;
    }

    public function str2date($date, $format, $operation = "") {
        if ($format == "Y-m-d") {
            $date = explode("-", $date);
            if ($operation == "+") {
                $date[0] = (int) $date[0] + 543;
            } elseif ($operation == "-") {
                $date[0] = (int) $date[0] - 543;
            }
            $date = $date[0] . "-" . $date[1] . "-" . $date[2];
        } elseif ($format == "d-m-Y") {
            $date = explode("-", $date);
            if ($operation == "+") {
                $date[2] = (int) $date[2] + 543;
            } elseif ($operation == "-") {
                $date[2] = (int) $date[2] - 543;
            }
            $date = $date[2] . "-" . $date[1] . "-" . $date[0];
        } elseif ($format == "Y-m-d H:i:s") {
            $datetime = explode(" ", $date);
            $date = explode("-", $datetime[0]);
            if ($operation == "+") {
                $date[0] = (int) $date[0] + 543;
            } elseif ($operation == "-") {
                $date[0] = (int) $date[0] - 543;
            }
            $date = $date[0] . "-" . $date[1] . "-" . $date[2] . " " . $datetime[1];
        } elseif ($format == "d-m-Y H:i:s") {
            $datetime = explode(" ", $date);
            $date = explode("-", $datetime[0]);
            if ($operation == "+") {
                $date[2] = (int) $date[2] + 543;
            } elseif ($operation == "-") {
                $date[2] = (int) $date[2] - 543;
            }
            $date = $date[2] . "-" . $date[1] . "-" . $date[0] . " " . $datetime[1];
        }
        return new \DateTime($date);
    }

    public function date2str($date, $format, $operation = "") {
        $date = $date->format($format);
        if ($format == "Y-m-d") {
            $date = explode("-", $date);
            if ($operation == "+") {
                $date[0] = (int) $date[0] + 543;
            } elseif ($operation == "-") {
                $date[0] = (int) $date[0] - 543;
            }
            $date = $date[0] . "-" . $date[1] . "-" . $date[2];
        } elseif ($format == "d-m-Y") {
            $date = explode("-", $date);
            if ($operation == "+") {
                $date[2] = (int) $date[2] + 543;
            } elseif ($operation == "-") {
                $date[2] = (int) $date[2] - 543;
            }
            $date = $date[0] . "-" . $date[1] . "-" . $date[2];
        } elseif ($format == "Y-m-d H:i:s") {
            $datetime = explode(" ", $date);
            $date = explode("-", $datetime[0]);
            if ($operation == "+") {
                $date[0] = (int) $date[0] + 543;
            } elseif ($operation == "-") {
                $date[0] = (int) $date[0] - 543;
            }
            $date = $date[0] . "-" . $date[1] . "-" . $date[2] . " " . $datetime[1];
        } elseif ($format == "d-m-Y H:i:s") {
            $datetime = explode(" ", $date);
            $date = explode("-", $datetime[0]);
            if ($operation == "+") {
                $date[2] = (int) $date[2] + 543;
            } elseif ($operation == "-") {
                $date[2] = (int) $date[2] - 543;
            }
            $date = $date[0] . "-" . $date[1] . "-" . $date[2] . " " . $datetime[1];
        }
        return $date;
    }

    public function afterGet($object, $remove = array()) {
        $rowNo = 1;
        if (count($object) > 1 || is_array($object)) {
            foreach ($object as $key => $data) {
                $object[$key]->rowNo = $rowNo++;
                foreach ($data as $field => $value) {
                    if (in_array($field, $remove)) {
                        unset($object[$key]->$field);
                    } else {
                        if (is_a($value, "DateTime")) {
                            $object[$key]->$field = $this->date2str($value, "d-m-Y", "+");
                        }
                    }
                }
            }
        } else {
            $object->rowNo = $rowNo++;
            foreach ($object as $field => $value) {
                if (in_array($field, $remove)) {
                    //   if ($field == "dateCreated" || $field == "dateUpdated" || $field == "createBy" || $field == "updateBy") {
                    unset($object->$field);
                } else {
                    if (is_a($value, "DateTime")) {
                        $object->$field = $this->date2str($value, "d-m-Y", "+");
                    }
                }
            }
        }
        return $object;
    }

}
