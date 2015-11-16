<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IProjectUniverService;

use apps\common\entity\BudgetType;
use apps\common\entity\L3D\Plan;

class ProjectUniverService extends CServiceBase implements IProjectUniverService {

    public $datacontext;
    public $logger;
    
    private $pathEnt = "apps\\common\\entity\\";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function fetchSubsidies() {
        $list = new BudgetType();
        $list->setMasterId(20500000);
        $list->setTypeCode("G");
        return $this->datacontext->getObject($list);
    }
    
    public function fetchPlan() {
        $list = new Plan();
        return $this->datacontext->getObject($list);
    }
    
    
    public function fetchBudgetType() {
        
        $sql = "
            SELECT bt1.id,bt1.typeName,bt2.id AS id2,bt2.typeName AS typeName2
            FROM ".$this->pathEnt."BudgetType bt1
            LEFT JOIN ".$this->pathEnt."BudgetType bt2
            WITH bt1.id = bt2.masterId 
            WHERE bt1.id >= 50000000
            AND bt1.masterId=0
        ";
        
        $dataIAT = $this->datacontext->getObject($sql);
        
    
        $dataList = null;
        $idIssueOld = null;
        $idIssueNew = null;
        
        $j = 0;
        $k = 0;
        for ($i = 0; $i < count($dataIAT); $i++) {
            
            
            $idIssueNew = $dataIAT[$i]["id"];
            
            if($idIssueOld!=$idIssueNew){
                
                $dataList[$j]["id"] = $dataIAT[$i]["id"];
                $dataList[$j]["typeName"] = $dataIAT[$i]["typeName"];
                
                $j++;
                $k = 0;
                $idIssueOld = $idIssueNew;
            }
            
            if($dataIAT[$i]["id2"]!=""){
                $dataList[$j-1]["sub"][$k]["id"] = $dataIAT[$i]["id2"];
                $dataList[$j-1]["sub"][$k]["typeName"] = $dataIAT[$i]["typeName2"];
            }
            $k++;

        }
        
        return $dataList;
        
    }

}
