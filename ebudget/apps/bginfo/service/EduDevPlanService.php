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
        //return $this->datacontext->getObject($year)[0];
        $data = $this->datacontext->getObject($year)[0];
        $data->year = 2559;
        return $data;
    }

    public function listsType() {
        $sql = "SELECT"
                ." aft"
            ." FROM ".$this->pathEnt."\\AffirmativeType aft"
            ." JOIN ".$this->pathEnt."\\AffirmativeMain afm WITH afm.mainId = aft.mainId"
            ." WHERE afm.periodCode = :year AND aft.isCommon = 1";
        $param = array(
            "year" => $this->getPeriod()->year
        );
        return $this->datacontext->getObject($sql, $param);
    }

    public function viewPlan($typeId) {
        $result = [];

        $tmp = [];
        $issue = [];
        $target = [];

        $sql1 = "SELECT"
                ." issue.issueId, issue.issueSeq, issue.issueName,"
                ." target.targetId, target.targetSeq, target.targetName,"
                ." kpi.kpiId, kpi.kpiSeq, kpi.kpiName"
            ." FROM ".$this->pathEnt."\\AffirmativeIssue issue"
            ." LEFT JOIN ".$this->pathEnt."\\AffirmativeTarget target WITH target.issueId = issue.issueId"
            ." LEFT JOIN ".$this->pathEnt."\\AffirmativeKpi kpi WITH kpi.targetId = target.targetId"
            ." WHERE issue.typeId = :typeId"
            ." ORDER BY issue.issueSeq, target.targetSeq, kpi.kpiSeq ASC";
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
                ." issue.issueId, issue.issueSeq, issue.issueName,"
                ." target.targetId, target.targetSeq, target.targetName,"
                ." strategy.strategyId, strategy.strategySeq, strategy.strategyName"
            ." FROM ".$this->pathEnt."\\AffirmativeIssue issue"
            ." LEFT JOIN ".$this->pathEnt."\\AffirmativeTarget target WITH target.issueId = issue.issueId"
            ." LEFT JOIN ".$this->pathEnt."\\AffirmativeStrategy strategy WITH strategy.targetId = target.targetId"
            ." WHERE issue.typeId = :typeId"
            ." ORDER BY issue.issueSeq, target.targetSeq, strategy.strategySeq ASC";
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

                if($key2 != null) {
                    $targetArr[] = array(
                        "targetId" => $key2,
                        "targetSeq" => $target[$key2]["seq"],
                        "targetName" => $target[$key2]["name"],
                        "kpi" => $kpiArr,
                        "strategy" => $strategyArr
                    );
                }
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

    public function insertIssue($pData) {
        $return = true;
        if(!$this->datacontext->saveObject($pData)){
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function updateIssue($pData) {
        $return = true;
        if(!$this->datacontext->updateObject($pData)){
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteIssue($id){
        $return = true;

        $issue = new \apps\common\entity\AffirmativeIssue();
        $issue->issueId = $id;
        $dIssue = $this->datacontext->getObject($issue);

        $target = new \apps\common\entity\AffirmativeTarget();
        $target->issueId = $id;
        $dTarget = $this->datacontext->getObject($target);

        foreach($dTarget as $key => $value){
            $kpi = new \apps\common\entity\AffirmativeKpi();
            $kpi->targetId = $value->targetId;
            $dKpi = $this->datacontext->getObject($kpi);
            if(!$this->datacontext->removeObject($dKpi)){
                return $this->datacontext->getLastMessage();
            }

            $strategy = new \apps\common\entity\AffirmativeStrategy();
            $strategy->targetId = $value->targetId;
            $dStrategy = $this->datacontext->getObject($strategy);
            if(!$this->datacontext->removeObject($dStrategy)){
                return $this->datacontext->getLastMessage();
            }
        }

        if(!$this->datacontext->removeObject($dTarget)){
            return $this->datacontext->getLastMessage();
        }

        if(!$this->datacontext->removeObject($dIssue)){
            return $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function insertTarget($pData) {
        $return = true;
        if(!$this->datacontext->saveObject($pData)){
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function updateTarget($pData) {
        $return = true;
        if(!$this->datacontext->updateObject($pData)){
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteTarget($id){
        $return = true;

        $target = new \apps\common\entity\AffirmativeTarget();
        $target->targetId = $id;
        $dTarget = $this->datacontext->getObject($target);

        foreach($dTarget as $key => $value){
            $kpi = new \apps\common\entity\AffirmativeKpi();
            $kpi->targetId = $value->targetId;
            $dKpi = $this->datacontext->getObject($kpi);
            if(!$this->datacontext->removeObject($dKpi)){
                return $this->datacontext->getLastMessage();
            }

            $strategy = new \apps\common\entity\AffirmativeStrategy();
            $strategy->targetId = $value->targetId;
            $dStrategy = $this->datacontext->getObject($strategy);
            if(!$this->datacontext->removeObject($dStrategy)){
                return $this->datacontext->getLastMessage();
            }
        }

        if(!$this->datacontext->removeObject($dTarget)){
            return $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function insertKpi($pData) {
        $return = true;
        if(!$this->datacontext->saveObject($pData)){
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function updateKpi($pData) {
        $return = true;
        if(!$this->datacontext->updateObject($pData)){
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteKpi($id){
        $return = true;

        $kpi = new \apps\common\entity\AffirmativeKpi();
        $kpi->kpiId = $id;
        $dKpi = $this->datacontext->getObject($kpi);
        if(!$this->datacontext->removeObject($dKpi)){
            return $this->datacontext->getLastMessage();
        }
        return $return;
    }

    public function insertStrategy($pData) {
        $return = true;
        if(!$this->datacontext->saveObject($pData)){
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function updateStrategy($pData) {
        $return = true;
        if(!$this->datacontext->updateObject($pData)){
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteStrategy($id){
        $return = true;

        $strategy = new \apps\common\entity\AffirmativeStrategy();
        $strategy->strategyId = $id;
        $dStrategy = $this->datacontext->getObject($strategy);
        if(!$this->datacontext->removeObject($dStrategy)){
            return $this->datacontext->getLastMessage();
        }
        return $return;
    }

    /*
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
    */
}
