<?php

namespace apps\affirmative\service;

use apps\affirmative\interfaces\IGroupService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class GroupService extends CServiceBase implements IGroupService {

    public $datacontext;
    public $logger;

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function checkApprove() {
        $draft = new \apps\affirmative\entity\AffirmativeDraft();
        $draft->periodCode = $this->getPeriod()->year;
        $data = $this->datacontext->getObject($draft);
        // $draft->isApprove = "Y";
        if (count($data) > 0) {
            if ($data[0]->isApprove == $status) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    function getGroup($centerGroupArr) {
        $sqlGroup = "select g.id,g.actTypeName,g.actTypeCode from apps\\common\\entity\\ActivityType g "
                . " where g.actTypeCode in (:actTypeCode) ";
        $paramGroup = array(
            "actTypeCode" => $centerGroupArr
        );
        return $this->datacontext->getObject($sqlGroup, $paramGroup);
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
            $dept[$keyDept]->status = $status;
        }
        return $dept;
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
        $json = new CJSONDecodeImpl();
        $dept = new \apps\affirmative\model\ViewActivityDepartment();
        $dept->departmentId = $departmentId;
        $dataDept = $this->datacontext->getObject($dept)[0];

        $typeArr = array();
        $targetArr = array();
        $draft = new \apps\affirmative\entity\AffirmativeDraft();
        $draft->periodCode = $this->getPeriod()->year;
        $draft->departmentId = $departmentId;
        $draftData = $this->datacontext->getObject($draft);
        foreach ($draftData as $keyDraft => $valueDraft) {
            if ($valueDraft->hasIssue == "Y") {
                if (empty($targetArr[$valueDraft->targetId][$valueDraft->draftId])) {
                    $targetArr[$valueDraft->targetId][$valueDraft->draftId] = $valueDraft;
                }
            } elseif ($valueDraft->hasIssue == "N") {
                if (empty($typeArr[$valueDraft->typeId][$valueDraft->draftId])) {
                    $typeArr[$valueDraft->typeId][$valueDraft->draftId] = $valueDraft;
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
    }

    public function insert($draft) {
        $dept = new \apps\affirmative\model\ViewActivityDepartment();
        $dept->departmentId = $draft->departmentId;
        $deptData = $this->datacontext->getObject($dept)[0];
        if ($draft->typeId == 0) {
            $target = new \apps\affirmative\entity\AffirmativeTarget();
            $target->targetId = $draft->targetId;
            $targetData = $this->datacontext->getObject($target)[0];
            $draft->targetSeq = $targetData->targetSeq;

            $issue = new \apps\affirmative\entity\AffirmativeIssue();
            $issue->issueId = $targetData->issueId;
            $issueData = $this->datacontext->getObject($issue)[0];
            $draft->issueId = $issueData->issueId;
            $draft->issueSeq = $issueData->issueSeq;

            $draft->typeId = $issueData->typeId;
            $draft->hasIssue = "Y";
        } else {
            $draft->hasIssue = "N";
        }
        $setting = new \apps\affirmative\entity\AffirmativeSetting();
        $setting->typeId = $draft->typeId;
        $setting->groupCode = $deptData->activityCode;
        $setting->periodCode = $this->getPeriod()->year;
        $settingData = $this->datacontext->getObject($setting)[0];
        $draft->mainId = $settingData->mainId;
        $draft->mainSeq = $settingData->mainSeq;
        $draft->typeId = $settingData->typeId;
        $draft->typeSeq = $settingData->typeSeq;

        $draft->periodCode = $this->getPeriod()->year;
        $draft->isApprove = "N";
        $draft->isCenter = 'N';
        $draft->unitName = $this->getUnit($draft->unitId)["unitName"];
        if (!$this->datacontext->saveObject($draft)) {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        } else {
            return $draft;
        }
    }

    public function update($draft) {
        if ($this->datacontext->updateObject($draft)) {
            return $this->datacontext->getObject($draft)[0];
        } else {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        }
    }

    public function delete($draft) {
        if ($this->datacontext->removeObject($draft)) {
            return true;
        } else {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        }
    }

    public function approve($departmentId, $status) {
        $json = new CJSONDecodeImpl();
        $draft = new \apps\affirmative\entity\AffirmativeDraft();
        $draft->periodCode = $this->getPeriod()->year;
        $draft->departmentId = $departmentId;
        $draft->isActive = "Y";
        $dataDraft = $this->datacontext->getObject($draft);
        if ($status == "Y") {
            foreach ($dataDraft as $keyDraft => $valueDraft) {
                if ($valueDraft->kpiGoal != NULL && $valueDraft->score1 != NULL && $valueDraft->score2 != NULL && $valueDraft->score3 != NULL && $valueDraft->score4 != NULL && $valueDraft->score5 != NULL && $valueDraft->isApprove != "Y") {
                    $valueDraft->isApprove = $status;
                    if ($this->datacontext->updateObject($valueDraft)) {
                        $final = $json->decode(new \apps\affirmative\entity\AffirmativeFinal(), $valueDraft);
                        $final->isApprove = "N";
                        if (!$this->datacontext->saveObject($final)) {
                            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                            return false;
                        }
                    } else {
                        $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                        return false;
                    }
                }
            }
        } elseif ($status == "N") {
            foreach ($dataDraft as $keyDraft => $valueDraft) {
                $dataDraft[$keyDraft]->isApprove = $status;
            }
            if ($this->datacontext->updateObject($dataDraft)) {
                $final = new \apps\affirmative\entity\AffirmativeFinal();
                $final->periodCode = $this->getPeriod()->year;
                $final->departmentId = $departmentId;
                $del = $this->datacontext->getObject($final);
                if (!$this->datacontext->removeObject($del)) {
                    $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                    return false;
                }
            } else {
                $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                return false;
            }
        }
        return true;
    }

}
