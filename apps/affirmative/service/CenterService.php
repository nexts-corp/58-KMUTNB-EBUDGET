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
    
    public function listsAll(){
        $sql = "SELECT"
            ." pt.id as typeId, pt.planTypeName,"
            ." pi.id as issueId, pi.issueName,"
            ." pg.id as targetId, pg.targetName,"
            ." ac.id, ac.mainPlanKpiId, ac.no, ac.name,"
            ." ac.unit, ac.score1, ac.score2, ac.score3,"
            ." ac.score4, ac.score5, ac.isEducation,"
            ." ac.isSupport, ac.isService, ac.remark, ac.target"
        ." FROM ".$this->ent."\\MainPlanTarget pg"
        ." INNER JOIN ".$this->ent."\\MainPlanIssue pi WITH pi.id = pg.mainPlanIssueId"
        ." INNER JOIN ".$this->ent."\\MainPlanType pt WITH pt.id=pi.mainPlanTypeId"
        ." LEFT JOIN ".$this->ent."\\AffirmativeCentre ac WITH ac.mainPlanTargetId=pg.id";

        $data = $this->datacontext->getObject($sql);

        $group = [];
        $typeKey = [];
        $issueKey = [];
        $targetKey = [];
        foreach($data as $key => $val){
            $typeKey[$val["typeId"]] = $val["planTypeName"];
            $issueKey[$val["issueId"]] = $val["issueName"];
            $targetKey[$val["targetId"]] = $val["targetName"];

            $group[$val["typeId"]][$val["issueId"]][$val["issueId"]][] = array(
                "id" => $val["id"],
                "mainPlanKpiId" => $val["mainPlanKpiId"],
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

                foreach($type as $key3 => $target){
                    $kpiArr = [];

                    foreach($target as $key4 => $kpi){
                        $kpiArr[] = $kpi;
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
                "planTypeName" => $typeKey[$key1],
                "issue" => $issueArr
            );
        }
        return $result;
    }
} 