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

    public function checkApprove() {
        $center = new \apps\affirmative\entity\AffirmativeCenter();
        $center->periodCode = $this->getPeriod()->year;
        $data = $this->datacontext->getObject($center);
        // $center->isApprove = "Y";
        if (count($data) > 0) {
            if ($data[0]->isApprove == "N") {
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

    public function listsAll() {
        if ($this->checkApprove()) {
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

            $mainSql = "select v from apps\\affirmative\\entity\\AffirmativeMain v where v.periodCode = :periodCode  order by v.mainSeq";
            $mainParam = array("periodCode" => $this->getPeriod()->year);
            $mainData = $this->datacontext->getObject($mainSql, $mainParam);
            foreach ($mainData as $keyMain => $valueMain) {
                $typeSql = "select v from apps\\affirmative\\entity\\AffirmativeType v where v.mainId = :mainId  order by v.typeSeq";
                $typeParam = array("mainId" => $valueMain->mainId);
                $typeData = $this->datacontext->getObject($typeSql, $typeParam);
                $mainData[$keyMain]->type = $typeData;
                foreach ($typeData as $keyType => $valueType) {
                    $issueSql = "select v from apps\\affirmative\\entity\\AffirmativeIssue v where v.typeId = :typeId  order by v.issueSeq";
                    $issueParam = array("typeId" => $valueType->typeId);
                    $issueData = $this->datacontext->getObject($issueSql, $issueParam);
                    $mainData[$keyMain]->type[$keyType]->issue = $issueData;
                    if (array_key_exists($valueType->typeId, $typeArr)) {
                        $mainData[$keyMain]->type[$keyType]->kpi = $typeArr[$valueType->typeId];
                    }
                    foreach ($issueData as $keyIssue => $valueIssue) {
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
        } else {
            return null;
        }
    }

    public function listsKpi($targetId) {
        $kpi = new \apps\affirmative\entity\AffirmativeKpi();
        $kpi->targetId = $targetId;
        return $this->datacontext->getObject($kpi);
    }

    public function listsUnit() {
        return $this->datacontext->getObject(new \apps\affirmative\entity\AffirmativeUnit());
    }

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

    public function approve($status) {
        $center = new \apps\affirmative\entity\AffirmativeCenter();
        $center->periodCode = $this->getPeriod()->year;
        $data = $this->datacontext->getObject($center);
        if (count($data) > 0) {
            $json = new CJSONDecodeImpl();
            foreach ($data as $key => $value) {
                $data[$key]->isApprove = $status;
            }
            if ($this->datacontext->updateObject($data) && $status == "Y") {
                $view = new \apps\affirmative\model\ViewSettingCenter();
                $view->periodCode = $this->getPeriod()->year;
                $data = $this->datacontext->getObject($view);
                foreach ($data as $key => $value) {
                    $data[$key]->isApprove = "N";
                    $data[$key]->isCenter = "Y";
                    $data[$key]->isActive = "Y";
                }
                $draft = $json->decode(new \apps\affirmative\entity\AffirmativeDraft(), $data);
                if (!$this->datacontext->saveObject($draft)) {
                    $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                    return false;
                }
            } elseif ($status == "N") {
                $data = $this->datacontext->getObject(new \apps\affirmative\entity\AffirmativeDraft());
                $this->datacontext->removeObject($data);
            } else {
                $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                return false;
            }
        }
        return true;
    }

}
