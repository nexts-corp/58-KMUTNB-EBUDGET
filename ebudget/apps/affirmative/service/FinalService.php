<?php

namespace apps\affirmative\service;

use apps\affirmative\interfaces\IFinalService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class FinalService extends CServiceBase implements IFinalService {

    public $datacontext;
    public $logger;

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function checkApprove($departmentId) {
        $final = new \apps\affirmative\entity\AffirmativeFinal();
        $final->periodCode = $this->getPeriod()->year;
        $final->departmentId = $departmentId;
        $final->isApprove = 'Y';
        $data = $this->datacontext->getObject($final);
        if (count($data) > 0) {
            return false;
        } else {
            return true;
        }
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    function getGroup($group) {
        $sqlGroupl = "select g.id,g.actTypeName,g.actTypeCode from apps\\common\\entity\\ActivityType g "
                . " where g.actTypeCode in (:actTypeCode) ";
        $paramGroup = array(
            "actTypeCode" => $group
        );
        return $this->datacontext->getObject($sqlGroupl, $paramGroup);
    }

    function getUnit($unit) {
        $sqlUnit = "select g.unitId,g.unitName from apps\\affirmative\\entity\\AffirmativeUnit g "
                . " where g.unitId = :unitId ";
        $paramUnit = array(
            "unitId" => $unit
        );
        return $this->datacontext->getObject($sqlUnit, $paramUnit)[0];
    }

    public function listsDept() {
        $sql = "select r from apps\\affirmative\\model\\ViewActivityDepartment r order by r.activityCode";
        $dept = $this->datacontext->getObject($sql);
        $periodCode = $this->getPeriod()->year;

        $group = array();
        $actKey = array();

        foreach ($dept as $keyDept => $valDept) {
            $draft = new \apps\affirmative\entity\AffirmativeDraft();
            $draft->periodCode = $periodCode;
            $draft->departmentId = $valDept->departmentId;
            $draft->isActive = "Y";
            $get = $this->datacontext->getObject($draft);
            if (count($get) > 0) {
                $status = "Y";
            } else {
                $status = "N";
            }
            foreach ($get as $keyGet => $valGet) {
                if ($valGet->isApprove == "N") {
                    $status = "N";
                }
            }
            $dept[$keyDept]->statusDept = $status;

            $final = new \apps\affirmative\entity\AffirmativeFinal();
            $final->periodCode = $periodCode;
            $final->departmentId = $valDept->departmentId;
            $final->isActive = "Y";
            $get = $this->datacontext->getObject($final);
            if (count($get) > 0) {
                $status = "Y";
            } else {
                $status = "N";
            }
            foreach ($get as $keyGet => $valGet) {
                if ($valGet->isApprove == "N") {
                    $status = "N";
                }
            }
            $dept[$keyDept]->statusFinal = $status;

            $actKey[$valDept->activityId] = $valDept->activityName;

            $group[$valDept->activityId][] = $dept[$keyDept];
        }

        $result = array();

        foreach($group as $key => $value){
            $result[] = array(
                "actId" => $key,
                "actName" => $actKey[$key],
                "dept" => $value
            );
        }

        return $result;
    }

    function sortBy($by, $arr) {
        $return = array();
        if (is_array($arr)) {
            foreach ($arr as $key => $object) {
                $return[$key] = array();
                foreach ($object as $field => $value) {
                    if (is_object($value)) {
                        $return[$key][$value->$by] = $value;
                    } elseif (is_array($value)) {
                        $return[$key][$value[$by]] = $value;
                    }
                }
            }
        } elseif (is_object($arr)) {
            foreach ($arr as $field => $value) {
                $return[$field][$value->$by] = $value;
            }
        }
        return $return;
    }

    public function listsAll($departmentId) {
        if ($this->checkApprove($departmentId)) {
            $json = new CJSONDecodeImpl();
            $dept = new \apps\affirmative\model\ViewActivityDepartment();
            $dept->departmentId = $departmentId;
            $dataDept = $this->datacontext->getObject($dept)[0];

            $typeArr = array();
            $targetArr = array();
            $final = new \apps\affirmative\entity\AffirmativeFinal();
            $final->periodCode = $this->getPeriod()->year;
            $final->departmentId = $departmentId;
            $finalData = $this->datacontext->getObject($final);
            foreach ($finalData as $keyFinal => $valueFinal) {
                if ($valueFinal->hasIssue == "Y") {
                    if (empty($targetArr[$valueFinal->targetId][$valueFinal->finalId])) {
                        $targetArr[$valueFinal->targetId][$valueFinal->finalId] = $valueFinal;
                    }
                } elseif ($valueFinal->hasIssue == "N") {
                    if (empty($typeArr[$valueFinal->typeId][$valueFinal->finalId])) {
                        $typeArr[$valueFinal->typeId][$valueFinal->finalId] = $valueFinal;
                    }
                }
            }
            $targetArr = $this->sortBy("kpiSeq", $targetArr);
            $typeArr = $this->sortBy("kpiSeq", $typeArr);

            $sqlMain = "select s.mainId,s.mainSeq,m.mainName "
                    . "from apps\\affirmative\\entity\\AffirmativeSetting s "
                    . "join apps\\affirmative\\entity\\AffirmativeMain m with m.mainId = s.mainId "
                    . "where s.periodCode = :periodCode and s.groupCode = :groupCode "
                    . "group by s.mainId,s.mainSeq,m.mainName "
                    . "order by s.mainSeq";
            $paramMain = array(
                "periodCode" => $this->getPeriod()->year,
                "groupCode" => $dataDept->activityCode
            );
            $mainData = $this->datacontext->getObject($sqlMain, $paramMain);
            $sqlType = "select s.mainId,s.mainSeq,s.typeId,s.typeSeq,m.typeName,m.hasIssue "
                    . "from apps\\affirmative\\entity\\AffirmativeSetting s "
                    . "join apps\\affirmative\\entity\\AffirmativeType m with m.typeId = s.typeId "
                    . "where s.periodCode = :periodCode and s.groupCode = :groupCode "
                    . "group by s.mainId,s.mainSeq,s.typeId,s.typeSeq,m.typeName,m.hasIssue "
                    . "order by s.mainSeq,s.typeSeq";
            $paramType = array(
                "periodCode" => $this->getPeriod()->year,
                "groupCode" => $dataDept->activityCode
            );
            $typeData = $this->datacontext->getObject($sqlType, $paramType);
            foreach ($mainData as $keyMain => $valMain) {
                foreach ($typeData as $keyType => $valueType) {
                    if ($valMain["mainSeq"] == $valueType["mainSeq"]) {
                        $mainData[$keyMain]["type"][$valueType["typeSeq"]] = $valueType;
                        $issueSql = "select v from apps\\affirmative\\entity\\AffirmativeIssue v where v.typeId = :typeId  order by v.issueSeq";
                        $issueParam = array("typeId" => $valueType["typeId"]);
                        $issueData = $this->datacontext->getObject($issueSql, $issueParam);
                        $mainData[$keyMain]["type"][$valueType["typeSeq"]]["issue"] = $issueData;

                        if (array_key_exists($valueType["typeId"], $typeArr)) {
                            $mainData[$keyMain]["type"][$valueType["typeSeq"]]["kpi"] = $typeArr[$valueType["typeId"]];
                        }
                        $title = new \apps\affirmative\entity\AffirmativeSetting();
                        $title->typeId = $valueType["typeId"];
                        $title->periodCode = $this->getPeriod()->year;
                        $title->mainId = $valMain["mainId"];
                        $title->groupCode = $dataDept->activityCode;
                        $title = $this->datacontext->getObject($title);
                        if (count($title) > 0) {
                            $mainData[$keyMain]["type"][$valueType["typeSeq"]]["title"] = $title[0]->title;
                        }
                        foreach ($issueData as $keyIssue => $valueIssue) {
                            $targetSql = "select v from apps\\affirmative\\entity\\AffirmativeTarget v where v.issueId = :issueId  order by v.targetSeq";
                            $targetParam = array("issueId" => $valueIssue->issueId);
                            $targetData = $this->datacontext->getObject($targetSql, $targetParam);
                            $mainData[$keyMain]["type"][$valueType["typeSeq"]]["issue"][$keyIssue]->target = $targetData;
                            foreach ($targetData as $keyTarget => $valueTarget) {
                                if (array_key_exists($valueTarget->targetId, $targetArr)) {
                                    $mainData[$keyMain]["type"][$valueType["typeSeq"]]["issue"][$keyIssue]->target[$keyTarget]->kpi = $targetArr[$valueTarget->targetId];
                                }
                            }
                        }
                    }
                }
            }

            return $mainData;
        } else {
            return false;
        }
    }

    public function insert($final) {
        $dept = new \apps\affirmative\model\ViewActivityDepartment();
        $dept->departmentId = $final->departmentId;
        $deptData = $this->datacontext->getObject($dept)[0];
        if ($final->typeId == 0) {
            $target = new \apps\affirmative\entity\AffirmativeTarget();
            $target->targetId = $final->targetId;
            $targetData = $this->datacontext->getObject($target)[0];
            $final->targetSeq = $targetData->targetSeq;

            $issue = new \apps\affirmative\entity\AffirmativeIssue();
            $issue->issueId = $targetData->issueId;
            $issueData = $this->datacontext->getObject($issue)[0];
            $final->issueId = $issueData->issueId;
            $final->issueSeq = $issueData->issueSeq;

            $final->typeId = $issueData->typeId;
            $final->hasIssue = "Y";
        } else {
            $final->hasIssue = "N";
        }
        $setting = new \apps\affirmative\entity\AffirmativeSetting();
        $setting->typeId = $final->typeId;
        $setting->groupCode = $deptData->activityCode;
        $setting->periodCode = $this->getPeriod()->year;
        $settingData = $this->datacontext->getObject($setting)[0];
        $final->mainId = $settingData->mainId;
        $final->mainSeq = $settingData->mainSeq;
        $final->typeId = $settingData->typeId;
        $final->typeSeq = $settingData->typeSeq;

        $final->periodCode = $this->getPeriod()->year;
        $final->isApprove = "N";
        $final->draftId = 0;
        $final->unitName = $this->getUnit($final->unitId)["unitName"];
        if (!$this->datacontext->saveObject($final)) {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        } else {
            return $final;
        }
    }

    public function update($final) {
        if ($this->datacontext->updateObject($final)) {
            return $this->datacontext->getObject($final)[0];
        } else {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        }
    }

    public function delete($final) {
        $get = new \apps\affirmative\entity\AffirmativeFinal();
        $get->finalId = $final->finalId;
        $data = $this->datacontext->getObject($get)[0];
        if ($data->draftId != 0) {
            $draft = new \apps\affirmative\entity\AffirmativeDraft();
            $draft->draftId = $data->draftId;
            $data = $this->datacontext->getObject($draft)[0];
            $data->isApprove = "N";
            if (!$this->datacontext->updateObject($data)) {
                $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                return false;
            }
        }
        if ($this->datacontext->removeObject($final)) {
            return true;
        } else {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        }
    }

    public function approve($departmentId, $status) {
        $json = new CJSONDecodeImpl();
        $final = new \apps\affirmative\entity\AffirmativeFinal();
        $final->periodCode = $this->getPeriod()->year;
        $final->departmentId = $departmentId;
        $final->isActive = "Y";
        $dataFinal = $this->datacontext->getObject($final);
        foreach ($dataFinal as $keyFinal => $valFinal) {
            $dataFinal[$keyFinal]->isApprove = $status;
        }
        if (!$this->datacontext->updateObject($dataFinal)) {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        } else {
            return true;
        }
    }

}
