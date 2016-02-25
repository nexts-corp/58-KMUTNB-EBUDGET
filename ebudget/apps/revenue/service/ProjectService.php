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
        $year->yearStatus = 'Y';
        //$year->year = 2558;
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
            "listProject"=>$this->datacontext->getObject($listProject),
            "kpiType" => $this->fetchKpiType()
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

    public function fetchKpiType(){
        $list = new \apps\common\entity\KpiType();
        return $this->datacontext->getObject($list);
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
    
    public function getAllProject($facultyId) {
        $sql = "select bgh.BudgetHeadId, bgh.budgetPeriodId, bgh.FormBudget as formId, "
                . "exp.BudgetExpenseName as formName, bgh.budgetTypeCode, dept.DepartmentId as deptId, dept.DepartmentName as deptName "
                . "from Budget_Head bgh "
                . "inner join Budget_Expense exp on exp.budgetHeadId = bgh.budgetHeadId "
                . "inner join L3D_Department dept on dept.DepartmentId = exp.DepartmentId "
                . "where bgh.FormBudget = 999 "
                . "and bgh.budgetTypeCode = :type "
                . "and bgh.budgetPeriodId = :year "
                . "and dept.DepartmentId = :dept "
                . "order by bgh.budgetPeriodId asc, bgh.FormBudget asc, dept.DepartmentId asc ";

        $param = array(
            "type" => 'K',
            "year" => $this->getPeriod()->year,
            "dept" => $facultyId
        );

        $dataBgh = $this->datacontext->pdoQuery($sql, $param);
        return $dataBgh;
    }
    
    public function getData($budgetHeadId, $facultyId) {
        $expense = new \apps\common\entity\BudgetExpense();
        $expense->budgetHeadId = $budgetHeadId;
        $expense->budgetPeriodId = $this->getPeriod()->year;
        $expense->budgetTypeCode = 'K';
        $expense->deptId = $facultyId;
        
        $expData = $this->datacontext->getObject($expense)[0];
        
        $aff = new \apps\common\entity\BudgetExpenseAffirmative();
        $aff->expenseId = $expData->id;
        $affData = $this->datacontext->getObject($aff);

        $int = new \apps\common\entity\BudgetExpenseIntegration();
        $int->expenseId = $expData->id;
        $intData = $this->datacontext->getObject($int);

        $opt = new \apps\common\entity\BudgetExpenseOperating();
        $opt->expenseId = $expData->id;
        $optData = $this->datacontext->getObject($opt);
        $optD = [];
        foreach ($optData as $key => $val){
            array_push($optD, array(
                "id" => $val->id,
                "expenseId" => $val->expenseId,
                "seq" => $val->seq,
                "operName" => $val->operName,
                "timeStart" =>  ($val->timeStart != null) ? $val->timeStart->format("d-m-Y") : null,
                "timeEnd" => ($val->timeEnd != null) ? $val->timeEnd->format("d-m-Y") : null,
            ));
        }

        $detail = new \apps\common\entity\BudgetExpenseDetail();
        $detail->expenseId = $expData->id;
        $detailData = $this->datacontext->getObject($detail);
        
        $kpi = new \apps\common\entity\BudgetExpenseKpi();
        $kpi->expenseId = $expData->id;
        $kpiData = $this->datacontext->getObject($kpi);
        
        $result = array(
            "id" => $expData->id,
            "responder" => $expData->responder,
            "director" => $expData->director,
            "projectTypeId" => $expData->projectTypeId,
            "integration" => $intData,
            "affirmative" => $affData,
            "rationale" => $expData->rationale,
            "objective" => $expData->objective,
            "benefits" => $expData->benefits,
            "kpi" => $kpiData,
            "target" => $expData->target,
            "operating" => $optD,
            "timeStart" => ($expData->timeStart != null) ? $expData->timeStart->format("d-m-Y") : null,
            "timeEnd" => ($expData->timeEnd != null) ? $expData->timeEnd->format("d-m-Y") : null,
            "budgetEstAmount" => $expData->budgetEstAmount,
            "budgetEstText" => $expData->budgetEstText,
            "budgetTypeId" => $expData->budgetTypeId,
            "projectId" => $expData->projectId,
            "detail" => $detailData
        );
        
        return $result;              
    }
    
    public function save($project){
        $exp = new \apps\common\entity\BudgetExpense();
        $exp->id = $project->id;
        $expD = $this->datacontext->getObject($exp)[0];
        
        $expD->budgetTypeId = $project->budgetTypeId;
        $expD->projectId = $project->projectId;
        $expD->projectTypeId = $project->projectTypeId;
        $expD->director = $project->director;
        $expD->responder = $project->responder;
        $expD->rationale = $project->rationale;
        $expD->objective = $project->objective;
        $expD->target = $project->target;
        $expD->timeStart = new \DateTime(substr($project->timeStart, 6, 4)."-".substr($project->timeStart, 3, 2)."-".substr($project->timeStart, 0, 2));
        $expD->timeEnd = new \DateTime(substr($project->timeEnd, 6, 4)."-".substr($project->timeEnd, 3, 2)."-".substr($project->timeEnd, 0, 2));
        $expD->budgetEstAmount = $project->budgetEstAmount;
        $expD->budgetEstText = $project->budgetEstText;
        $expD->benefits = $project->benefits;
        
        if(!$this->datacontext->updateObject($expD)){
            return $this->datacontext->getLastMessage();
        }
        
        $int = new \apps\common\entity\BudgetExpenseIntegration();
        $int->expenseId = $project->id;
        $intD = $this->datacontext->getObject($int);
        //return $intD;
        if($this->datacontext->removeObject($intD)){
            foreach($project->integration as $key => $val){
                $int = new \apps\common\entity\BudgetExpenseIntegration();
                $int->expenseId = $project->id;
                $int->integrationId = $val->integrationId;
                $int->deptId = $project->deptId;
                $int->desc = $val->desc;
                if(!$this->datacontext->saveObject($int)){
                    return $this->datacontext->getLastMessage();
                }
            }
        }
        else{
            return $this->datacontext->getLastMessage();
        }
        
        $aff = new \apps\common\entity\BudgetExpenseAffirmative();
        $aff->expenseId = $project->id;
        $affD = $this->datacontext->getObject($aff);
        if($this->datacontext->removeObject($affD)){
            foreach($project->affirmative as $key => $val){
                $aff = new \apps\common\entity\BudgetExpenseAffirmative();
                $aff->expenseId = $project->id;
                $aff->typeId = $val->typeId;
                $aff->issueId = $val->issueId;
                $aff->targetId = $val->targetId;
                $aff->strategyId = $val->strategyId;
                if(!$this->datacontext->saveObject($aff)){
                    return $this->datacontext->getLastMessage();
                }
            }
        }
        else{
            return $this->datacontext->getLastMessage();
        }
        
        $kpi = new \apps\common\entity\BudgetExpenseKpi();
        $kpi->expenseId = $project->id;
        $kpiD = $this->datacontext->getObject($kpi);
        if($this->datacontext->removeObject($kpiD)){
            foreach($project->kpi as $key => $val){
                $kpi = new \apps\common\entity\BudgetExpenseKpi();
                $kpi->expenseId = $project->id;
                $kpi->budgetDesc = $val->budgetDesc;
                $kpi->unit = $val->unit;
                $kpi->goal = $val->goal;
                $kpi->kpiTypeId = $val->kpiTypeId;
                if(!$this->datacontext->saveObject($kpi)){
                    return $this->datacontext->getLastMessage();
                }
            }
        }
        else{
            return $this->datacontext->getLastMessage();
        }
        
        $opt = new \apps\common\entity\BudgetExpenseOperating();
        $opt->expenseId = $project->id;
        $optD = $this->datacontext->getObject($opt);
        if($this->datacontext->removeObject($optD)){
            foreach($project->operating as $key => $val){
                $opt = new \apps\common\entity\BudgetExpenseOperating();
                $opt->expenseId = $project->id;
                $opt->seq = $key+1;
                $opt->operName = $val->operName;
                $opt->timeStart = new \DateTime(substr($val->timeStart, 6, 4)."-".substr($val->timeStart, 3, 2)."-".substr($val->timeStart, 0, 2));
                $opt->timeEnd = new \DateTime(substr($val->timeEnd, 6, 4)."-".substr($val->timeEnd, 3, 2)."-".substr($val->timeEnd, 0, 2));
                if(!$this->datacontext->saveObject($opt)){
                    return $this->datacontext->getLastMessage();
                }
            }
        }
        else{
            return $this->datacontext->getLastMessage();
        }
        
        $dtl = new \apps\common\entity\BudgetExpenseDetail();
        $dtl->expenseId = $project->id;
        $dtlD = $this->datacontext->getObject($dtl);
        if($this->datacontext->removeObject($dtlD)){
            foreach($project->detail as $key => $val){
                $dtl = new \apps\common\entity\BudgetExpenseDetail();
                $dtl->expenseId = $project->id;
                $dtl->budgetDesc = $val->budgetDesc;
                $dtl->numOfUnit = $val->numOfUnit;
                $dtl->pricePerUnit = $val->pricePerUnit;
                $dtl->totalPrice = $val->totalPrice;
                $dtl->remark = $val->remark;
                if(!$this->datacontext->saveObject($dtl)){
                    return $this->datacontext->getLastMessage();
                }
            }
        }
        else{
            return $this->datacontext->getLastMessage();
        }
        
        return true;
    }
}
