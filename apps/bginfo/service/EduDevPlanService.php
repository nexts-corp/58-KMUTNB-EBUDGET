<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IEduDevPlanService;
use th\co\bpg\cde\data\CDataContext;

use apps\common\entity\MainPlanType;
use apps\common\entity\MainPlanIssue;
use apps\common\entity\MainPlanTarget;


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
        $list = new MainPlanType();
        return $this->datacontext->getObject($list);
    }
    
    public function fetchIssueAndTarget($pData) {
        
        $sql="SELECT nIssue.id AS idIssue , nIssue.issueName AS nameIssue , nTarget.id AS idTarget , nTarget.targetName AS nameTarget "
            ."FROM ".$this->pathEnt."\\MainPlanIssue nIssue "
            ."LEFT JOIN ".$this->pathEnt."\\MainPlanTarget nTarget "
            ."WITH nIssue.id = nTarget.mainPlanIssueId "
            ."WHERE nIssue.mainPlanTypeId = :typeId "    
            ."ORDER BY nIssue.id,nTarget.id";
        
        $dataIAT = $this->datacontext->getObject($sql,array("typeId"=>$pData->mainPlanTypeId));
        
    
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
        //return $pData;
        
    }
    
    

}
