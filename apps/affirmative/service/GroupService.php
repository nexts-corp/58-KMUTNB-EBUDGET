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
        $center = new \apps\affirmative\entity\AffirmativeDraft();
        $center->periodCode = $this->getPeriod()->year;
        $data = $this->datacontext->getObject($center);
        // $center->isApprove = "Y";
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
        $sql = "select r from apps\\affirmative\\model\\ViewActivityDepartment r order by r.activityId";
        return $this->datacontext->getObject($sql);
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

}
