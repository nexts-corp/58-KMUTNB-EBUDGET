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
    

}
