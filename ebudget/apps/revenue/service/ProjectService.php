<?php

namespace apps\revenue\service;

use apps\common\service\LookupService;
use apps\budget\model\ViewAffirmativeLevel;

use apps\revenue\interfaces\IProjectService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class ProjectService extends CServiceBase implements IProjectService {

    public $datacontext;
    public $logger;
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        //$year->yearStatus = 'Y';
        $year->year = 2559;
        return $this->datacontext->getObject($year)[0];
    }

    public function getLayouts($facultyId) {
        $lookUpSer = new LookupService();
        $proUniSer = new ProjectService();

        $listProject = new \apps\common\entity\BudgetExpense();
        $listProject->setBudgetPeriodId($this->getPeriod()->year);
        $listProject->setDeptId($facultyId);

        return array(
            "integration"=>$lookUpSer->listIntegration(),
            "projectType"=>$lookUpSer->listProjectType(),
            "subsidies"=>$proUniSer->fetchSubsidies(),
            "plan"=>$proUniSer->fetchPlan(),
            "budgetType"=>$proUniSer->fetchBudgetType(),
            "affirmative"=>$this->affirmativeLevel(),
            "listProject"=>$this->datacontext->getObject($listProject)
        );
    }

    private function affirmativeLevel(){

        $modelAF = new ViewAffirmativeLevel();
        $modelAF->budgetPeriodId = $this->getPeriod()->year; 
        $dataAF = $this->datacontext->getObject($modelAF);

        $treeAF = array();

        $keyNew1 = NULL;
        $keyOld1 = NULL;
        $keyNew2 = NULL;
        $keyOld2 = NULL;
        $keyNew3 = NULL;
        $keyOld3 = NULL;
        $keyNew4 = NULL;
        $keyOld4 = NULL;


        $numRow1 = 0;
        $numRow2 = 0;
        $numRow3 = 0;

        foreach ($dataAF as $valueRow){

            $keyNew1=$valueRow->typeId;
            $keyNew2=$valueRow->issueId;
            $keyNew3=$valueRow->targetId;
            $keyNew4=$valueRow->strategyId;

            if($keyNew1!==$keyOld1){

                array_push($treeAF, array(
                    "typeId"=>$valueRow->typeId,
                    "typeName"=>$valueRow->typeName,
                    "issue"=>array(),
                    "budgetPeriodId"=>$valueRow->budgetPeriodId
                ));
                $numRow1++;
                $numRow2 = 0;
            }

            if($keyNew2!==$keyOld2){

                array_push($treeAF[$numRow1-1]["issue"], array(
                    "issueId"=>$valueRow->issueId,
                    "issueName"=>$valueRow->issueName,
                    "target"=>array()
                ));

                $numRow2++;
                $numRow3 = 0;
            }

            if($keyNew3!==$keyOld3){

                array_push($treeAF[$numRow1-1]["issue"][$numRow2-1]["target"], array(
                    "targetId"=>$valueRow->targetId,
                    "targetName"=>$valueRow->targetName,
                    "strategy"=>array()
                ));

                $numRow3++;
            }

            if($keyNew4!==$keyOld4){

                array_push($treeAF[$numRow1-1]["issue"][$numRow2-1]["target"][$numRow3-1]["strategy"], array(
                    "strategyId"=>$valueRow->strategyId,
                    "strategyName"=>$valueRow->strategyName
                ));
            }


            $keyOld1=$keyNew1;
            $keyOld2=$keyNew2;
            $keyOld3=$keyNew3;
            $keyOld4=$keyNew4;
        }

        return $treeAF;
    }




    public function fetchProject($id) {

        $modelBE = new BudgetExpense();
        $modelBE->setId($id);
        $dataBE = $this->datacontext->getObject($modelBE);

        /*การบูรณาการโครงการ*/
        $modelBEI = new BudgetExpenseIntegration();
        $modelBEI->setExpenseId($id);
        $dataBEI = $this->datacontext->getObject($modelBEI);

        /*ความเชื่อมโยงสอดคล้องกับแผนกลยุทธ์*/
        $modelBEA = new BudgetExpenseAffirmative();
        $modelBEA->setExpenseId($id);
        $dataBEA = $this->datacontext->getObject($modelBEA);

        /*ขั้นตอนการดำเนินการ*/
        $modelBEO = new BudgetExpenseOperating();
        $modelBEO->setExpenseId($id);
        $dataBEO = $this->datacontext->getObject($modelBEO);

        return array(
            dataBE=>$dataBE[0],
            dataBEI=>$dataBEI,
            dataBEA=>$dataBEA,
            dataBEO=>$dataBEO
        );




    }

    public function fetchSubsidies() {
        $list = new \apps\common\entity\BudgetType();
        $list->setMasterId(20500000);
        $list->setTypeCode("G");
        return $this->datacontext->getObject($list);
    }

    public function fetchPlan() {
        $list = new \apps\common\entity\L3D\Plan();
        return $this->datacontext->getObject($list);
    }


    public function fetchBudgetType() {

        $sql = "
            SELECT bt1.id,bt1.typeName,bt2.id AS id2,bt2.typeName AS typeName2
            FROM ".$this->ent."\\BudgetType bt1
            LEFT JOIN ".$this->ent."\\BudgetType bt2
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



    private function convertDate($date){
        $ep = explode('/',$date);
        return $ep[2]."/".$ep[1]."/".$ep[0];
    }

    public function saveProject($seriesData) {
        //return $seriesData;

        $list = new \apps\common\entity\BudgetExpense();
        $list->setBudgetHeadId($seriesData->budgetHeadId);

        $listData = $this->datacontext->getObject($list);

        for($i=0;$i<count($listData);$i++){

            $modelBE = new BudgetExpense();

            $modelBE->setId($listData[$i]->id);
            $modelBE->setResponder($seriesData->responder);
            $modelBE->setDirector($seriesData->director);
            $modelBE->setProjectTypeId($seriesData->projectTypeId);
            $modelBE->setRationale($seriesData->rationale);
            $modelBE->setObjective($seriesData->objective);
            $modelBE->setBenefits($seriesData->benefits);
            $modelBE->setTarget($seriesData->target);
            $modelBE->setBudgetEstAmount($seriesData->budgetEstAmount);
            $modelBE->setBudgetEstText($seriesData->budgetEstText);
            $modelBE->setTimeStart(new \DateTime(str_replace("/","-",$seriesData->timeStart)));
            $modelBE->setTimeEnd(new \DateTime(str_replace("/","-",$seriesData->timeEnd)));
            $modelBE->setBudgetTypeId($seriesData->budgetTypeId);
            $modelBE->setPlanId($seriesData->planId);
            //$modelBE->setTimeEnd($this->convertDate($seriesData->timeEnd));

            $this->datacontext->updateObject($modelBE);

            //$test = array();

            $sql = "DELETE FROM [BUDGETEXPENSE_INTEGRATION] WHERE BUDGETEXPENSEID = ".$listData[$i]->id;
            $this->datacontext->nativeQuery($sql);

            foreach($seriesData->integration as $key => $value) {

                if($value->checked){

                    $modelBEI = new BudgetExpenseIntegration();
                    $modelBEI->setExpenseId($listData[$i]->id);
                    $modelBEI->setIntegrationId($key);
                    $modelBEI->setDesc($value->desc);
                    $modelBEI->setDeptId($listData[$i]->deptId);

                    $this->datacontext->saveObject($modelBEI);

                }
                //array_push($test,$value->desc);
            }



            /*ความเชื่อมโยงสอดคล้องกับแผนกลยุทธ์*/

            $sql = "DELETE FROM [BUDGETEXPENSE_AFFIRMATIVE] WHERE BUDGETEXPENSEID = ".$listData[$i]->id;
            $this->datacontext->nativeQuery($sql);


            foreach($seriesData->affirmative as $value) {
                $modelBEA = new BudgetExpenseAffirmative();
                $modelBEA->setExpenseId($listData[$i]->id);
                $modelBEA->setTypeId($value->typeId);
                $modelBEA->setIssueId($value->issueId);
                $modelBEA->setTargetId($value->targetId);
                $modelBEA->setStrategyId($value->strategyId);
                $this->datacontext->saveObject($modelBEA);
            }

            /*ขั้นตอนการดำเนินการ*/
            $sql = "DELETE FROM [BUDGETEXPENSE_OPERATING] WHERE BUDGETEXPENSEID = ".$listData[$i]->id;
            $this->datacontext->nativeQuery($sql);
            $iOper = 0;
            foreach($seriesData->operating as $value) {
                $modelBEO = new BudgetExpenseOperating();
                $modelBEO->setExpenseId($listData[$i]->id);
                $modelBEO->setSeq(++$iOper);
                $modelBEO->setOperName($value->operatingName);
                $modelBEO->setTimeStart(new \DateTime(str_replace("/","-",$value->timeStart)));
                $modelBEO->setTimeEnd(new \DateTime(str_replace("/","-",$value->timeEnd)));
                $this->datacontext->saveObject($modelBEO);

            }

        }

        return $seriesData;
    }
}
