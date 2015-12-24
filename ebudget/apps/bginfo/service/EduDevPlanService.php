<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IEduDevPlanService;
use th\co\bpg\cde\data\CDataContext;

use apps\common\entity\AffirmativeType;
use apps\common\entity\AffirmativeKpi;
use apps\common\entity\AffirmativeStrategy;


class EduDevPlanService extends CServiceBase implements IEduDevPlanService {
    

    public $datacontext;
    public $pathEnt = "apps\\common\\entity";
    
    function __construct() {
        $this->datacontext = new CDataContext();
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    public function viewManage() {
        $view = new CJView("EduDevPlan/manage", CJViewType::HTML_VIEW_ENGINE);
        return $view;
        
    }
    
    public function fetchType() {
        $list = new AffirmativeType();
        return $this->datacontext->getObject($list);
    }
    
    public function fetchIssueAndTarget($pData) {
        
  
        $sql = "
            SELECT nIssue.id AS idIssue , nIssue.issueName AS nameIssue , nTarget.id AS idTarget , nTarget.targetName AS nameTarget
            FROM ".$this->pathEnt."\\AffirmativeIssue nIssue
            LEFT JOIN ".$this->pathEnt."\\AffirmativeTarget nTarget
            WITH nIssue.id = nTarget.issueId
            WHERE nIssue.typeId = :typeId
            ORDER BY nIssue.id,nTarget.id
        ";
            
        $dataIAT = $this->datacontext->getObject($sql,array("typeId"=>$pData->typeId));
        
    
        $dataList = null;
        $idIssueOld = null;
        $idIssueNew = null;
        
        $j = 0;
        $k = 0;
        for ($i = 0; $i < count($dataIAT); $i++) {
            
            
            $idIssueNew = $dataIAT[$i]["idIssue"];
            
            if($idIssueOld!=$idIssueNew){
                
                $dataList[$j]["idIssue"] = $dataIAT[$i]["idIssue"];
                $dataList[$j]["nameIssue"] = $dataIAT[$i]["nameIssue"];
                
                $j++;
                $k = 0;
                $idIssueOld = $idIssueNew;
            }
            
            if($dataIAT[$i]["idTarget"]!=""){
                $dataList[$j-1]["target"][$k]["idTarget"] = $dataIAT[$i]["idTarget"];
                $dataList[$j-1]["target"][$k]["nameTarget"] = $dataIAT[$i]["nameTarget"];
            }
            $k++;

        }
        
        return $dataList;
        
    }
    
    
    public function fetchKpi($pData) {
        
        $list = new AffirmativeKpi;
        $list->setTargetId($pData->targetId);
        return $this->datacontext->getObject($list);
        //return $pData;
        
    }
    
    public function fetchStrategy($pData) {
        
        $list = new AffirmativeStrategy();
        $list->setTargetId($pData->targetId);
        return $this->datacontext->getObject($list);
        
    }
    
    
    
    
    public function saveKpi($pData) {
        
        if($pData->id==null){ 
            $this->datacontext->saveObject($pData);
        }else{
            $this->datacontext->updateObject($pData);
        }
        return $pData;
        
    }
    
    public function saveStrategy($pData) {
        
        if($pData->id==null){ 
            $this->datacontext->saveObject($pData);
        }else{
            $this->datacontext->updateObject($pData);
        }
        return $pData;
        
    }
    
    public function saveTarget($pData) {
        
        if($pData->id==null){ 
            $this->datacontext->saveObject($pData);
        }else{
            $this->datacontext->updateObject($pData);
        }
        return $pData;
        
    }
    
    public function saveIssue($pData) {
        
        if($pData->id==null){ 
            $this->datacontext->saveObject($pData);
        }else{
            $this->datacontext->updateObject($pData);
        }
        return $pData;
        
    }

    public function delKpi($pData) {
        $this->datacontext->removeObject($pData);
        return $pData;
    }
    public function delStrategy($pData) {
        $this->datacontext->removeObject($pData);
        return $pData;
    }
    public function delTarget($pData) {
        $this->datacontext->removeObject($pData);
        return $pData;
    }
    public function delIssue($pData) {
        $this->datacontext->removeObject($pData);
        return $pData;
    }

    public function listsType() {
        $list = new AffirmativeType();
        $list->isCommon = 1;
        $list->budgetPeriodId = $this->getPeriod()->year;

        return $this->datacontext->getObject($list);
    }

    public function viewPlan($typeId) {
        $result = [];

        $tmp = [];
        $issue = [];
        $target = [];

        $sql1 = "SELECT"
                ." issue.id AS issueId, issue.seq AS issueSeq, issue.issueName,"
                ." target.id AS targetId, target.seq AS targetSeq, target.targetName,"
                ." kpi.id AS kpiId, kpi.seq AS kpiSeq, kpi.kpiName"
            ." FROM ".$this->pathEnt."\\AffirmativeIssue issue"
            ." LEFT JOIN ".$this->pathEnt."\\AffirmativeTarget target WITH target.issueId = issue.id"
            ." LEFT JOIN ".$this->pathEnt."\\AffirmativeKpi kpi WITH kpi.targetId = target.id"
            ." WHERE issue.typeId = :typeId";
        $param1 = array(
            "typeId" => $typeId
        );
        $data1 = $this->datacontext->getObject($sql1, $param1);

        foreach($data1 as $key => $value){
            $issue[$value["issueId"]] = array(
                "seq" => $value["issueSeq"],
                "name" => $value["issueName"]
            );
            $target[$value["targetId"]] = array(
                "seq" => $value["targetSeq"],
                "name" => $value["targetName"]
            );

            $tmp[$value["issueId"]][$value["targetId"]]["kpi"][] = array(
                "kpiId" => $value["kpiId"],
                "kpiSeq" => $value["kpiSeq"],
                "kpiName" => $value["kpiName"]
            );
        }

        $sql2 = "SELECT"
                ." issue.id AS issueId, issue.seq AS issueSeq, issue.issueName,"
                ." target.id AS targetId, target.seq AS targetSeq, target.targetName,"
                ." strategy.id AS strategyId, strategy.seq AS strategySeq, strategy.strategyName"
            ." FROM ".$this->pathEnt."\\AffirmativeIssue issue"
            ." LEFT JOIN ".$this->pathEnt."\\AffirmativeTarget target WITH target.issueId = issue.id"
            ." LEFT JOIN ".$this->pathEnt."\\AffirmativeStrategy strategy WITH strategy.targetId = target.id"
            ." WHERE issue.typeId = :typeId";
        $param2 = array(
            "typeId" => $typeId
        );
        $data2 = $this->datacontext->getObject($sql2, $param2);

        foreach($data2 as $key => $value){
            $issue[$value["issueId"]] = array(
                "seq" => $value["issueSeq"],
                "name" => $value["issueName"]
            );
            $target[$value["targetId"]] = array(
                "seq" => $value["targetSeq"],
                "name" => $value["targetName"]
            );

            $tmp[$value["issueId"]][$value["targetId"]]["strategy"][] = array(
                "strategyId" => $value["strategyId"],
                "strategySeq" => $value["strategySeq"],
                "strategyName" => $value["strategyName"]
            );
        }

        foreach($tmp as $key => $value){
            $targetArr = [];

            foreach($value as $key2 => $value2){
                $kpiArr = [];
                $strategyArr = [];

                foreach($value2["kpi"] as $key3 => $value3){
                    if($value3["kpiId"] != null) {
                        $kpiArr[] = array(
                            "kpiId" => $value3["kpiId"],
                            "kpiSeq" => $value3["kpiSeq"],
                            "kpiName" => $value3["kpiName"]
                        );
                    }
                }

                foreach($value2["strategy"] as $key3 => $value3){
                    if($value3["strategyId"] != null) {
                        $strategyArr[] = array(
                            "strategyId" => $value3["strategyId"],
                            "strategySeq" => $value3["strategySeq"],
                            "strategyName" => $value3["strategyName"]
                        );
                    }
                }

                $targetArr[] = array(
                    "targetId" => $key2,
                    "targetSeq" => $target[$key2]["seq"],
                    "targetName" => $target[$key2]["name"],
                    "kpi" => $kpiArr,
                    "strategy" => $strategyArr
                );
            }

            $result[] = array(
                "issueId" => $key,
                "issueSeq" => $issue[$key]["seq"],
                "issueName" => $issue[$key]["name"],
                "target" => $targetArr
            );
        }
        return $result;
    }
}
