<?php

namespace apps\affirmative\service;

use apps\affirmative\interfaces\ICenterService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class CenterService extends CServiceBase implements ICenterService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
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

    function sortBy($by, $arr) {
        $return = array();
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
        return $return;
    }

//    public function listsAll() {
//        $sql = "SELECT"
//                . " tp.id AS typeId, tp.typeName,"
//                . " ai.id AS issueId, ai.issueName,"
//                . " tg.id AS targetId, tg.targetName,"
//                . " ac.id, ac.affKpiId as kpiId, ac.no, ac.name,"
//                . " ac.unit, ac.score1, ac.score2, ac.score3,"
//                . " ac.score4, ac.score5, ac.isEducation,"
//                . " ac.isSupport, ac.isService, ac.remark, ac.target"
//                . " FROM " . $this->ent . "\\AffirmativeTarget tg"
//                . " JOIN " . $this->ent . "\\AffirmativeIssue ai WITH ai.id = tg.issueId"
//                . " JOIN " . $this->ent . "\\AffirmativeType tp WITH tp.id = ai.typeId"
//                . " LEFT JOIN " . $this->ent . "\\AffirmativePlanCentre ac WITH ac.affTargetId = tg.id"
//                . " WHERE tp.budgetPeriodId = :year";
//        $param = array(
//            //"year" => $this->getYear()->year
//            "year" => $this->getPeriod()->periodName
//        );
//        $data = $this->datacontext->getObject($sql, $param);
//
//        $group = [];
//        $typeKey = [];
//        $issueKey = [];
//        $targetKey = [];
//        foreach ($data as $key => $val) {
//            $typeKey[$val["typeId"]] = $val["typeName"];
//            $issueKey[$val["issueId"]] = $val["issueName"];
//            $targetKey[$val["targetId"]] = $val["targetName"];
//
//            $group[$val["typeId"]][$val["issueId"]][$val["targetId"]][] = array(
//                "id" => $val["id"],
//                "kpiId" => $val["kpiId"],
//                "no" => $val["no"],
//                "name" => $val["name"],
//                "unit" => $val["unit"],
//                "score1" => $val["score1"],
//                "score2" => $val["score2"],
//                "score3" => $val["score3"],
//                "score4" => $val["score4"],
//                "score5" => $val["score5"],
//                "isEducation" => $val["isEducation"],
//                "isSupport" => $val["isSupport"],
//                "isService" => $val["isService"],
//                "remark" => $val["remark"]
//            );
//        }
//        $result = [];
//        foreach ($group as $key1 => $type) {
//            $issueArr = [];
//
//            foreach ($type as $key2 => $issue) {
//                $targetArr = [];
//
//                foreach ($issue as $key3 => $target) {
//                    $kpiArr = [];
//
//                    foreach ($target as $key4 => $kpi) {
//                        if ($kpi["id"] != "") {
//                            $kpiArr[] = $kpi;
//                        }
//                    }
//                    $targetArr[] = array(
//                        "targetId" => $key3,
//                        "targetName" => $targetKey[$key3],
//                        "kpi" => $kpiArr
//                    );
//                }
//
//                $issueArr[] = array(
//                    "issueId" => $key2,
//                    "issueName" => $issueKey[$key2],
//                    "target" => $targetArr
//                );
//            }
//            $result[] = array(
//                "typeId" => $key1,
//                "typeName" => $typeKey[$key1],
//                "issue" => $issueArr
//            );
//        }
//
//        return $result;
//    }

    public function listsAll() {
        $json = new CJSONDecodeImpl();
        //  $viewCenter = new \apps\affirmative\model\ViewAffirmativeCenter();
        $viewSql = "select v from apps\\affirmative\\model\\ViewAffirmativeCenter v "
                . " where v.periodCode = :periodCode "
                . " order by v.periodCode,v.mainSeq,v.typeSeq,v.issueSeq,v.targetSeq,v.kpiSeq";
        $viewParam = array("periodCode" => $this->getPeriod()->year);
        $centerData = $this->datacontext->getObject($viewSql, $viewParam);

        $typeArr = array();
        $targetArr = array();
        foreach ($centerData as $keyCenter => $valueCenter) {
            if ($valueCenter->centerId != NULL) {
                $center = $json->decode(new \apps\affirmative\entity\AffirmativeCenter(), $valueCenter);
                $centerGroup = $json->decode(new \apps\affirmative\entity\AffirmativeCenterGroup(), $valueCenter);
                $unit = $json->decode(new \apps\affirmative\entity\AffirmativeUnit(), $valueCenter);
                $name = "";
                if ($valueCenter->hasIssue == "Y") {
                    if (empty($targetArr[$valueCenter->targetId][$valueCenter->centerId])) {
                        $targetArr[$valueCenter->targetId][$valueCenter->centerId] = $center;
                    }
                    $targetArr[$valueCenter->targetId][$valueCenter->centerId]->centerGroup[] = $centerGroup;
                    $targetArr[$valueCenter->targetId][$valueCenter->centerId]->unit = $unit;
                } elseif ($valueCenter->hasIssue == "N") {
                    if (empty($typeArr[$valueCenter->typeId][$valueCenter->centerId])) {
                        $typeArr[$valueCenter->typeId][$valueCenter->centerId] = $center;
                    }
                    $typeArr[$valueCenter->typeId][$valueCenter->centerId]->centerGroup[] = $centerGroup;
                    $typeArr[$valueCenter->typeId][$valueCenter->centerId]->unit = $unit;
                }
            }
        }
        $typeArr = $this->sortBy("kpiSeq", $typeArr);
        $targetArr = $this->sortBy("kpiSeq", $targetArr);

//        $main = new \apps\affirmative\entity\AffirmativeMain();
//        $main->periodCode = $this->getPeriod()->periodCode;
        $mainSql = "select v from apps\\affirmative\\entity\\AffirmativeMain v where v.periodCode = :periodCode  order by v.mainSeq";
        $mainParam = array("periodCode" => $this->getPeriod()->year);
        $mainData = $this->datacontext->getObject($mainSql, $mainParam);
        foreach ($mainData as $keyMain => $valueMain) {
//            $type = new \apps\affirmative\entity\AffirmativeType();
//            $type->mainId = $valueMain->mainId;
            $typeSql = "select v from apps\\affirmative\\entity\\AffirmativeType v where v.mainId = :mainId  order by v.typeSeq";
            $typeParam = array("mainId" => $valueMain->mainId);
            $typeData = $this->datacontext->getObject($typeSql, $typeParam);
            $mainData[$keyMain]->type = $typeData;
            foreach ($typeData as $keyType => $valueType) {
//                $issue = new \apps\affirmative\entity\AffirmativeIssue();
//                $issue->typeId = $valueType->typeId;
                $issueSql = "select v from apps\\affirmative\\entity\\AffirmativeIssue v where v.typeId = :typeId  order by v.issueSeq";
                $issueParam = array("typeId" => $valueType->typeId);
                $issueData = $this->datacontext->getObject($issueSql, $issueParam);
                $mainData[$keyMain]->type[$keyType]->issue = $issueData;
                if (array_key_exists($valueType->typeId, $typeArr)) {
                    $mainData[$keyMain]->type[$keyType]->kpi = $typeArr[$valueType->typeId];
                }
                foreach ($issueData as $keyIssue => $valueIssue) {
//                    $target = new \apps\affirmative\entity\AffirmativeTarget();
//                    $target->issueId = $valueIssue->issueId;
                    $targetSql = "select v from apps\\affirmative\\entity\\AffirmativeTarget v where v.issueId = :issueId  order by v.targetSeq";
                    $targetParam = array("issueId" => $valueIssue->issueId);
                    $targetData = $this->datacontext->getObject($targetSql, $targetParam);
                    $mainData[$keyMain]->type[$keyType]->issue[$keyIssue]->target = $targetData;
                    foreach ($targetData as $keyTarget => $valueTarget) {
                        if (array_key_exists($valueTarget->targetId, $targetArr)) {
                            $mainData[$keyMain]->type[$keyType]->issue[$keyIssue]->target[$keyTarget]->kpi = $targetArr[$valueTarget->targetId];
                        }
                    }
                }
            }
        }
        return $mainData;
    }

//    public function listsKpi($targetId) {
//        $sql = "SELECT"
//                . " ak.id, ak.kpiName"
//                . " FROM " . $this->ent . "\\AffirmativeKpi ak"
//                . " WHERE ak.targetId = :targetId";
//        $param = array(
//            "targetId" => $targetId
//        );
//        $data = $this->datacontext->getObject($sql, $param);
//
//        return $data;
//    }

    public function listsKpi($targetId) {
        $kpi = new \apps\affirmative\entity\AffirmativeKpi();
        $kpi->targetId = $targetId;
        return $this->datacontext->getObject($kpi);
    }

    public function listsUnit() {
        return $this->datacontext->getObject(new \apps\affirmative\entity\AffirmativeUnit());
    }

//    public function insert($affirmative) {
//        $return = array();
//
//        foreach ($affirmative as $key => $val) {
//            $val->budgetPeriodId = $this->getYear()->year;
//
//            if (!$this->datacontext->saveObject($val)) {
//                $return[$key]["result"] = false;
//                $return[$key]["msg"] = $this->datacontext->getLastMessage();
//            } else {
//                $return[$key]["result"] = true;
//                $return[$key]["id"] = $affirmative[$key]->id;
//            }
//        }
//
//        return $return;
//    }

    public function insert($center) {
        $centerGroup = $center->centerGroup;
        $center->periodCode = $this->getPeriod()->year;
        $center->isApprove = "N";
        if ($center->typeId == 0) {
            $target = new \apps\affirmative\entity\AffirmativeTarget();
            $target->targetId = $center->targetId;
            $issueId = $this->datacontext->getObject($target)[0]->issueId;
            $issue = new \apps\affirmative\entity\AffirmativeIssue();
            $issue->issueId = $issueId;
            $center->typeId = $this->datacontext->getObject($issue)[0]->typeId;
        }
        if ($this->datacontext->saveObject($center)) {
            $centerId = $center->centerId;
            foreach ($centerGroup as $keyGroup => $groupCode) {
                $cGroup = new \apps\affirmative\entity\AffirmativeCenterGroup();
                $cGroup->centerId = $centerId;
                $cGroup->groupCode = $groupCode;
                if (!$this->datacontext->saveObject($cGroup)) {
                    $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                    return false;
                }
            }
            $center->centerGroup = $this->getGroup($centerGroup);
            $center->unit = $this->getUnit($center->unitId);
        }
        return $center;
    }

//    public function update($affirmative) {
//        $return = true;
//
//        $affirmative[0]->budgetPeriodId = $this->getYear()->year;
//
//        if (!$this->datacontext->updateObject($affirmative[0])) {
//            $return = $this->datacontext->getLastMessage();
//        }
//
//        return $return;
//    }

    public function update($center) {
        $centerGroupArr = $center->centerGroup;
        if ($this->datacontext->updateObject($center)) {
            $centerGroup = new \apps\affirmative\entity\AffirmativeCenterGroup();
            $centerGroup->centerId = $center->centerId;
            $dataCenterGroup = $this->datacontext->getObject($centerGroup);
            if ($this->datacontext->removeObject($dataCenterGroup)) {
                foreach ($centerGroupArr as $keyGroup => $groupCode) {
                    $newCenterGroup = new \apps\affirmative\entity\AffirmativeCenterGroup();
                    $newCenterGroup->centerId = $center->centerId;
                    $newCenterGroup->groupCode = $groupCode;
                    if (!$this->datacontext->saveObject($newCenterGroup)) {
                        $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                        return false;
                    }
                }
            } else {
                $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                return false;
            }
        } else {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        }
        $newCenter = new \apps\affirmative\entity\AffirmativeCenter();
        $newCenter->centerId = $center->centerId;
        $center = $this->datacontext->getObject($newCenter)[0];
        $center->centerGroup = $this->getGroup($centerGroupArr);
        $center->unit = $this->getUnit($center->unitId);
        return $center;
    }

//    public function delete($affirmativeId) {
//        $return = true;
//
//        $aff = new \apps\common\entity\AffirmativePlanCentre();
//        $aff->id = $affirmativeId;
//
//        if (!$this->datacontext->removeObject($aff)) {
//            $return = $this->datacontext->getLastMessage();
//        }
//
//        return $return;
//    }

    public function delete($center) {
        if ($this->datacontext->removeObject($center)) {
            $centerGroup = new \apps\affirmative\entity\AffirmativeCenterGroup();
            $centerGroup->centerId = $center->centerId;
            $data = $this->datacontext->getObject($centerGroup);
            if (!$this->datacontext->removeObject($data)) {
                $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                return false;
            } else {
                return true;
            }
        }
    }

}
