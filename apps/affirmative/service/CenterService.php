<?php

namespace apps\affirmative\service;


use apps\affirmative\interfaces\ICenterService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class CenterService extends CServiceBase implements ICenterService{
    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function getYear() {
        $sql = "SELECT"
                ." yr"
            ." FROM ".$this->ent."\\Year yr"
            ." WHERE yr.yearStatus = :active";
        $param = array(
            "active" => "Y"
        );
        $data = $this->datacontext->getObject($sql, $param); //get STATUS is Active

        return $data[0];
    }

    public function listsAll(){
        $sql = "SELECT"
                ." tp.id AS typeId, tp.typeName,"
                ." ai.id AS issueId, ai.issueName,"
                ." tg.id AS targetId, tg.targetName,"
                ." ac.id, ac.affKpiId as kpiId, ac.no, ac.name,"
                ." ac.unit, ac.score1, ac.score2, ac.score3,"
                ." ac.score4, ac.score5, ac.isEducation,"
                ." ac.isSupport, ac.isService, ac.remark, ac.target"
            ." FROM ".$this->ent."\\AffirmativeTarget tg"
            ." JOIN ".$this->ent."\\AffirmativeIssue ai WITH ai.id = tg.issueId"
            ." JOIN ".$this->ent."\\AffirmativeType tp WITH tp.id = ai.typeId"
            ." LEFT JOIN ".$this->ent."\\AffirmativePlanCentre ac WITH ac.affTargetId = tg.id"
            ." WHERE tp.budgetPeriodId = :year";
        $param = array(
            "year" => $this->getYear()->year
        );
        $data = $this->datacontext->getObject($sql, $param);

        $group = [];
        $typeKey = [];
        $issueKey = [];
        $targetKey = [];
        foreach($data as $key => $val){
            $typeKey[$val["typeId"]] = $val["typeName"];
            $issueKey[$val["issueId"]] = $val["issueName"];
            $targetKey[$val["targetId"]] = $val["targetName"];

            $group[$val["typeId"]][$val["issueId"]][$val["targetId"]][] = array(
                "id" => $val["id"],
                "kpiId" => $val["kpiId"],
                "no" => $val["no"],
                "name" => $val["name"],
                "unit" => $val["unit"],
                "score1" => $val["score1"],
                "score2" => $val["score2"],
                "score3" => $val["score3"],
                "score4" => $val["score4"],
                "score5" => $val["score5"],
                "isEducation" => $val["isEducation"],
                "isSupport" => $val["isSupport"],
                "isService" => $val["isService"],
                "remark" => $val["remark"]
            );
        }

        $result = [];
        foreach($group as $key1 => $type){
            $issueArr = [];

            foreach($type as $key2 => $issue){
                $targetArr = [];

                foreach($issue as $key3 => $target){
                    $kpiArr = [];

                    foreach($target as $key4 => $kpi){
                        if($kpi["id"] != ""){
                            $kpiArr[] = $kpi;
                        }
                    }
                    $targetArr[] = array(
                        "targetId" => $key3,
                        "targetName" => $targetKey[$key3],
                        "kpi" => $kpiArr
                    );
                }

                $issueArr[] = array(
                    "issueId" => $key2,
                    "issueName" => $issueKey[$key2],
                    "target" => $targetArr
                );
            }
            $result[] = array(
                "typeId" => $key1,
                "typeName" => $typeKey[$key1],
                "issue" => $issueArr
            );
        }

        return $result;
    }

    public function listsKpi($targetId){
        $sql = "SELECT"
                ." ak.id, ak.kpiName"
            ." FROM ".$this->ent."\\AffirmativeKpi ak"
            ." WHERE ak.targetId = :targetId";
        $param = array(
            "targetId" => $targetId
        );
        $data = $this->datacontext->getObject($sql, $param);

        return $data;
    }

    public function insert($affirmative){
        $return = array();

        foreach($affirmative as $key => $val){
            $val->budgetPeriodId = $this->getYear()->year;

            if (!$this->datacontext->saveObject($val)) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $affirmative[$key]->id;
            }
        }

        return $return;
    }

    public function update($affirmative){
        $return = true;

        $affirmative[0]->budgetPeriodId = $this->getYear()->year;

        if (!$this->datacontext->updateObject($affirmative[0])) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function delete($affirmativeId){
        $return = true;

        $aff = new \apps\common\entity\AffirmativePlanCentre();
        $aff->id = $affirmativeId;

        if (!$this->datacontext->removeObject($aff)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }
} 