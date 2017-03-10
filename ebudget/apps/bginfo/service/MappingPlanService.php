<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IMappingPlanService;
use th\co\bpg\cde\data\CDataContext;
use apps\common\entity\MappingPlan;


class MappingPlanService extends CServiceBase implements IMappingPlanService {
    

    public $datacontext;
    public $pathEnt = "apps\\common\\entity\\";
    
    function __construct() {
        $this->datacontext = new CDataContext();
    }
    

    public function manage() {
        $view = new CJView("MappingPlan/manage", CJViewType::HTML_VIEW_ENGINE);
        return $view;
        
    }
    
    
    public function fetchPlan($year) {
        
        $sql = "
            SELECT pla.id AS planId,pla.planName,pro.id,pro.projectName,pro.projectType
            FROM ".$this->pathEnt."BudgetPlan pla
            LEFT JOIN ".$this->pathEnt."BudgetProject pro 
            WITH pla.id = pro.planId
            WHERE pla.periodId = :budgetYear
            ORDER BY pla.id,pro.id
        ";
        
        $dataGetObject = $this->datacontext->getObject($sql,array("budgetYear"=>$year));
        
        
        $treeData = null;
        $idOld = null;
        $idNew = null;
        
        $j = 0;
        for ($i = 0; $i < count($dataGetObject); $i++) {
            
            
            $idNew = $dataGetObject[$i]["planId"];
            
            if($idOld!=$idNew){
                
                $treeData[$j]["planId"] = $dataGetObject[$i]["planId"];
                $treeData[$j]["planName"] = $dataGetObject[$i]["planName"];
                $treeData[$j]["show"] = false;
                $treeData[$j]["produce"] = array();
                $treeData[$j]["project"] = array();
                
                $j++;
                $k = 0;
                $l = 0;
                $idOld = $idNew;
            }
            
            if($dataGetObject[$i]["id"]!=""){
                if($dataGetObject[$i]["projectType"]=="1"){
                    $treeData[$j-1]["produce"][$k]["id"] = $dataGetObject[$i]["id"];
                    $treeData[$j-1]["produce"][$k]["name"] = $dataGetObject[$i]["projectName"];
                    $k++;
                }else if($dataGetObject[$i]["projectType"]=="2"){
                    $treeData[$j-1]["project"][$l]["id"] = $dataGetObject[$i]["id"];
                    $treeData[$j-1]["project"][$l]["name"] = $dataGetObject[$i]["projectName"];
                    $l++;
                }
                
            }
            

        }
        
       
        return $treeData;
        
    }
    
    public function fetchDataFG($budgetPeriodId,$budgetProjectId,$planId) {
        
        $lMapping = new MappingPlan();
        $lMapping->setBudgetperiodId($budgetPeriodId);
        $lMapping->setBudgetProjectId($budgetProjectId);
        $lMapping->setPlanId($planId);
        
        return $this->datacontext->getObject($lMapping);
    }
    
    
    public function saveMappingPlan($budgetPeriodId,$budgetProjectId,$planId,$fundgroupId) {
         
        $cMapping = new MappingPlan();
        $cMapping->setBudgetperiodId($budgetPeriodId);
        $cMapping->setBudgetProjectId($budgetProjectId);
        $cMapping->setPlanId($planId);
        
        $dsql = "DELETE FROM [MAPPINGPLAN] WHERE BUDGETPERIODID = ".$budgetPeriodId." AND BUDGETPROJECTID = ".$budgetProjectId." AND PLANID = ".$planId.";";
        
        if(count($this->datacontext->getObject($cMapping))!=0){
            $this->datacontext->nativeQuery($dsql);
        }
        
        
        for($i=0;$i<count($fundgroupId);$i++){
            
            $sMapping = new MappingPlan();
            $sMapping->setBudgetperiodId($budgetPeriodId);
            $sMapping->setBudgetProjectId($budgetProjectId);
            $sMapping->setPlanId($planId);
            $sMapping->setFundgroupId($fundgroupId[$i]->id);
            
            if(!$this->datacontext->saveObject($sMapping)){
                $this->datacontext->nativeQuery($dsql);
                return FALSE;
            }
            
        }
        
        return TRUE;
    }
    

}
