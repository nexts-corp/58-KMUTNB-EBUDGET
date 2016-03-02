<?php
/**
 * Created by PhpStorm.
 * User: KaowNeaw
 * Date: 2/29/2016
 * Time: 11:24 AM
 */

namespace apps\budget\service;


use apps\budget\interfaces\budgetHeadId;
use apps\budget\interfaces\doolean;
use apps\budget\interfaces\facultyId;
use apps\budget\interfaces\IProposedService;
use apps\budget\model\ViewAffirmativeLevel;
use apps\common\entity\BudgetExpense;
use apps\common\entity\KpiType;
use apps\common\service\LookupService;
use apps\revenue\service\ProjectService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class ProposedService extends CServiceBase implements IProposedService
{

    public $datacontext;
    public $ent = "apps\\common\\entity";

    public function __construct()
    {
        $this->datacontext = new CDataContext();
    }

    private function getPeriod()
    {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        //$year->year = 2558;
        return $this->datacontext->getObject($year)[0];
    }

    public function getData($bg146Id)
    {
        $sql = "SELECT * FROM Budget_Expense WHERE Bg146Id = " . $bg146Id;
        $result = $this->datacontext->pdoQuery($sql);

        if (!empty($result)) {

//          $expense = new \apps\common\entity\BudgetExpense();
//          $expense->budgetHeadId = $budgetHeadId;
//          $expense->budgetPeriodId = $this->getPeriod()->year;
//          $expense->budgetTypeCode = 'K';
//          $expense->deptId = $facultyId;
//          $expData = $this->datacontext->getObject($expense);
//          $result = array();
            $expData = $result[0];
//          return $expData;
            $aff = new \apps\common\entity\BudgetExpenseAffirmative();
            $aff->expenseId = $expData["BudgetExpenseId"];
            $affData = $this->datacontext->getObject($aff);

            $int = new \apps\common\entity\BudgetExpenseIntegration();
            $int->expenseId = $expData["BudgetExpenseId"];
            $intData = $this->datacontext->getObject($int);

            $opt = new \apps\common\entity\BudgetExpenseOperating();
            $opt->expenseId = $expData["BudgetExpenseId"];
            $optData = $this->datacontext->getObject($opt);
            $optD = [];
            foreach ($optData as $key => $val) {
                array_push($optD, array(
                    "id" => $val->id,
                    "expenseId" => $val->expenseId,
                    "seq" => $val->seq,
                    "operName" => $val->operName,
                    "timeStart" => ($val->timeStart != null) ? $val->timeStart->format("d-m-Y") : null,
                    "timeEnd" => ($val->timeEnd != null) ? $val->timeEnd->format("d-m-Y") : null,
                ));
            }

            $detail = new \apps\common\entity\BudgetExpenseDetail();
            $detail->expenseId = $expData["BudgetExpenseId"];
            $detailData = $this->datacontext->getObject($detail);

            $kpi = new \apps\common\entity\BudgetExpenseKpi();
            $kpi->expenseId = $expData["BudgetExpenseId"];
            $kpiData = $this->datacontext->getObject($kpi);

            $result = array(
                "id" => $expData["BudgetExpenseId"],
                "responder" => $expData["Responder"],
                "director" => $expData["Director"],
                "projectTypeId" => $expData["ProjectTypeId"],
                "integration" => $intData,
                "affirmative" => $affData,
                "rationale" => $expData["Rationale"],
                "objective" => $expData["Objective"],
                "benefits" => $expData["Benefits"],
                "kpi" => $kpiData,
                "target" => $expData["Target"],
                "operating" => $optD,
                "timeStart" => ($expData["TimeStart"] != null) ? date("d-m-Y", strtotime($expData["TimeStart"])) : null,
                "timeEnd" => ($expData["TimeEnd"] != null) ? date("d-m-Y", strtotime($expData["TimeEnd"])) : null,
                "budgetEstAmount" => $expData["BudgetEstimationAmount"],
                "budgetEstText" => $expData["BudgetEstimationText"],
                "budgetTypeId" => $expData["BudgetTypeId"],
                "projectId" => $expData["L3DProjectId"],
                "detail" => $detailData
            );
        }

        return $result;
    }

    public function getLayouts($facultyId)
    {
        $lookUpSer = new LookupService();
        $proUniSer = new ProjectService();

        $listProject = new \apps\common\entity\BudgetExpense();
        $listProject->setBudgetPeriodId($this->getPeriod()->year);
        $listProject->setDeptId($facultyId);

        return array(
            "integration" => $lookUpSer->listIntegration(),
            "projectType" => $lookUpSer->listProjectType(),
            "subsidies" => $proUniSer->fetchSubsidies(),
            "plan" => $proUniSer->fetchPlan(),
            "budgetType" => $proUniSer->fetchBudgetType(),
            "affirmative" => $this->affirmativeLevel(),
            "listProject" => $this->datacontext->getObject($listProject),
            "kpiType" => $this->fetchKpiType()
        );
    }

    private function affirmativeLevel()
    {

        $modelAF = new ViewAffirmativeLevel();
//        $modelAF->budgetPeriodId = $this->getPeriod()->year;
        $modelAF->budgetPeriodId = 2559;
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

        foreach ($dataAF as $valueRow) {

            $keyNew1 = $valueRow->typeId;
            $keyNew2 = $valueRow->issueId;
            $keyNew3 = $valueRow->targetId;
            $keyNew4 = $valueRow->strategyId;

            if ($keyNew1 !== $keyOld1) {

                array_push($treeAF, array(
                    "typeId" => $valueRow->typeId,
                    "typeName" => $valueRow->typeName,
                    "issue" => array(),
                    "budgetPeriodId" => $valueRow->budgetPeriodId
                ));
                $numRow1++;
                $numRow2 = 0;
            }

            if ($keyNew2 !== $keyOld2) {

                array_push($treeAF[$numRow1 - 1]["issue"], array(
                    "issueId" => $valueRow->issueId,
                    "issueName" => $valueRow->issueName,
                    "target" => array()
                ));

                $numRow2++;
                $numRow3 = 0;
            }

            if ($keyNew3 !== $keyOld3) {

                array_push($treeAF[$numRow1 - 1]["issue"][$numRow2 - 1]["target"], array(
                    "targetId" => $valueRow->targetId,
                    "targetName" => $valueRow->targetName,
                    "strategy" => array()
                ));

                $numRow3++;
            }

            if ($keyNew4 !== $keyOld4) {

                array_push($treeAF[$numRow1 - 1]["issue"][$numRow2 - 1]["target"][$numRow3 - 1]["strategy"], array(
                    "strategyId" => $valueRow->strategyId,
                    "strategyName" => $valueRow->strategyName
                ));
            }


            $keyOld1 = $keyNew1;
            $keyOld2 = $keyNew2;
            $keyOld3 = $keyNew3;
            $keyOld4 = $keyNew4;
        }

        return $treeAF;
    }

    public function fetchKpiType()
    {
        $list = new KpiType();
        return $this->datacontext->getObject($list);
    }


    public function save($project)
    {
//      return $project;
        if (isset($project->id) && !is_null($project->id)) {

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
            $expD->timeStart = new \DateTime(substr($project->timeStart, 6, 4) . "-" . substr($project->timeStart, 3, 2) . "-" . substr($project->timeStart, 0, 2));
            $expD->timeEnd = new \DateTime(substr($project->timeEnd, 6, 4) . "-" . substr($project->timeEnd, 3, 2) . "-" . substr($project->timeEnd, 0, 2));
            $expD->budgetEstAmount = $project->budgetEstAmount;
            $expD->budgetEstText = $project->budgetEstText;
            $expD->benefits = $project->benefits;

            if (!$this->datacontext->updateObject($expD)) {
                return $this->datacontext->getLastMessage();
            }

            $int = new \apps\common\entity\BudgetExpenseIntegration();
            $int->expenseId = $project->id;
            $intD = $this->datacontext->getObject($int);
            //return $intD;
            if ($this->datacontext->removeObject($intD)) {
                foreach ($project->integration as $key => $val) {
                    $int = new \apps\common\entity\BudgetExpenseIntegration();
                    $int->expenseId = $project->id;
                    $int->integrationId = $val->integrationId;
                    $int->deptId = $project->deptId;
                    $int->desc = $val->desc;
                    if (!$this->datacontext->saveObject($int)) {
                        return $this->datacontext->getLastMessage();
                    }
                }
            } else {
                return $this->datacontext->getLastMessage();
            }

            $aff = new \apps\common\entity\BudgetExpenseAffirmative();
            $aff->expenseId = $project->id;
            $affD = $this->datacontext->getObject($aff);
            if ($this->datacontext->removeObject($affD)) {
                foreach ($project->affirmative as $key => $val) {
                    $aff = new \apps\common\entity\BudgetExpenseAffirmative();
                    $aff->expenseId = $project->id;
                    $aff->typeId = $val->typeId;
                    $aff->issueId = $val->issueId;
                    $aff->targetId = $val->targetId;
                    $aff->strategyId = $val->strategyId;
                    if (!$this->datacontext->saveObject($aff)) {
                        return $this->datacontext->getLastMessage();
                    }
                }
            } else {
                return $this->datacontext->getLastMessage();
            }

            $kpi = new \apps\common\entity\BudgetExpenseKpi();
            $kpi->expenseId = $project->id;
            $kpiD = $this->datacontext->getObject($kpi);
            if ($this->datacontext->removeObject($kpiD)) {
                foreach ($project->kpi as $key => $val) {
                    $kpi = new \apps\common\entity\BudgetExpenseKpi();
                    $kpi->expenseId = $project->id;
                    $kpi->budgetDesc = $val->budgetDesc;
                    $kpi->unit = $val->unit;
                    $kpi->goal = $val->goal;
                    $kpi->kpiTypeId = $val->kpiTypeId;
                    if (!$this->datacontext->saveObject($kpi)) {
                        return $this->datacontext->getLastMessage();
                    }
                }
            } else {
                return $this->datacontext->getLastMessage();
            }

            $opt = new \apps\common\entity\BudgetExpenseOperating();
            $opt->expenseId = $project->id;
            $optD = $this->datacontext->getObject($opt);
            if ($this->datacontext->removeObject($optD)) {
                foreach ($project->operating as $key => $val) {
                    $opt = new \apps\common\entity\BudgetExpenseOperating();
                    $opt->expenseId = $project->id;
                    $opt->seq = $key + 1;
                    $opt->operName = $val->operName;
                    $opt->timeStart = new \DateTime(substr($val->timeStart, 6, 4) . "-" . substr($val->timeStart, 3, 2) . "-" . substr($val->timeStart, 0, 2));
                    $opt->timeEnd = new \DateTime(substr($val->timeEnd, 6, 4) . "-" . substr($val->timeEnd, 3, 2) . "-" . substr($val->timeEnd, 0, 2));
                    if (!$this->datacontext->saveObject($opt)) {
                        return $this->datacontext->getLastMessage();
                    }
                }
            } else {
                return $this->datacontext->getLastMessage();
            }

            $dtl = new \apps\common\entity\BudgetExpenseDetail();
            $dtl->expenseId = $project->id;
            $dtlD = $this->datacontext->getObject($dtl);
            if ($this->datacontext->removeObject($dtlD)) {
                foreach ($project->detail as $key => $val) {
                    $dtl = new \apps\common\entity\BudgetExpenseDetail();
                    $dtl->expenseId = $project->id;
                    $dtl->budgetDesc = $val->budgetDesc;
                    $dtl->numOfUnit = $val->numOfUnit;
                    $dtl->pricePerUnit = $val->pricePerUnit;
                    $dtl->totalPrice = $val->totalPrice;
                    $dtl->remark = $val->remark;
                    if (!$this->datacontext->saveObject($dtl)) {
                        return $this->datacontext->getLastMessage();
                    }
                }
            } else {
                return $this->datacontext->getLastMessage();
            }

        } else {
            // not have id it is to insert
            $expD = new \apps\common\entity\BudgetExpense();

//          $expD->budgetTypeId = $project->budgetTypeId;
            $expD->projectId = $project->projectId;
//          $expD->projectTypeId = $project->projectTypeId;
            $expD->budgetTypeCode = "G";
            $expD->budgetTypeId = $project->budgetTypeId;
            $expD->projectId = $project->projectId;
            $expD->projectTypeId = $project->projectTypeId;
            $expD->deptId = $project->deptId;
            $expD->budgetHeadId = $project->budgetHeadId;
            $expD->budgetPeriodId = $project->budgetPeriodId;
            $expD->bg146Id = $project->bg146Id;
            $expD->name = $project->bgExpenseName;
            $expD->director = $project->director;
            $expD->responder = $project->responder;
            $expD->rationale = $project->rationale;
            $expD->objective = $project->objective;
            $expD->target = $project->target;
            $expD->timeStart = new \DateTime(substr($project->timeStart, 6, 4) . "-" . substr($project->timeStart, 3, 2) . "-" . substr($project->timeStart, 0, 2));
            $expD->timeEnd = new \DateTime(substr($project->timeEnd, 6, 4) . "-" . substr($project->timeEnd, 3, 2) . "-" . substr($project->timeEnd, 0, 2));
            $expD->budgetEstAmount = $project->budgetEstAmount;
            $expD->budgetEstText = $project->budgetEstText;
            $expD->benefits = $project->benefits;
            //add
            if (!$this->datacontext->saveObject($expD)) {
                return $this->datacontext->getLastMessage();
            }

            foreach ($project->integration as $key => $val) {

                $int = new \apps\common\entity\BudgetExpenseIntegration();
                $int->expenseId = $expD->id;
                $int->integrationId = $val->integrationId;
                $int->deptId = $project->deptId;
                $int->desc = $val->desc;
                if (!$this->datacontext->saveObject($int)) {
                    return $this->datacontext->getLastMessage();
                }
            }


            foreach ($project->affirmative as $key => $val) {
                $aff = new \apps\common\entity\BudgetExpenseAffirmative();
                $aff->expenseId = $expD->id;
                $aff->typeId = $val->typeId;
                $aff->issueId = $val->issueId;
                $aff->targetId = $val->targetId;
                $aff->strategyId = $val->strategyId;
                if (!$this->datacontext->saveObject($aff)) {
                    return $this->datacontext->getLastMessage();
                }
            }


            foreach ($project->kpi as $key => $val) {
                $kpi = new \apps\common\entity\BudgetExpenseKpi();
                $kpi->expenseId = $expD->id;
                $kpi->budgetDesc = $val->budgetDesc;
                $kpi->unit = $val->unit;
                $kpi->goal = $val->goal;
                $kpi->kpiTypeId = $val->kpiTypeId;
                if (!$this->datacontext->saveObject($kpi)) {
                    return $this->datacontext->getLastMessage();
                }
            }


            foreach ($project->operating as $key => $val) {
                $opt = new \apps\common\entity\BudgetExpenseOperating();
                $opt->expenseId = $expD->id;
                $opt->seq = $key + 1;
                $opt->operName = $val->operName;
                $opt->timeStart = new \DateTime(substr($val->timeStart, 6, 4) . "-" . substr($val->timeStart, 3, 2) . "-" . substr($val->timeStart, 0, 2));
                $opt->timeEnd = new \DateTime(substr($val->timeEnd, 6, 4) . "-" . substr($val->timeEnd, 3, 2) . "-" . substr($val->timeEnd, 0, 2));
                if (!$this->datacontext->saveObject($opt)) {
                    return $this->datacontext->getLastMessage();
                }
            }

            foreach ($project->detail as $key => $val) {
                $dtl = new \apps\common\entity\BudgetExpenseDetail();
                $dtl->expenseId = $expD->id;
                $dtl->budgetDesc = $val->budgetDesc;
                $dtl->numOfUnit = $val->numOfUnit;
                $dtl->pricePerUnit = $val->pricePerUnit;
                $dtl->totalPrice = $val->totalPrice;
                $dtl->remark = $val->remark;
                if (!$this->datacontext->saveObject($dtl)) {
                    return $this->datacontext->getLastMessage();
                }
            }

        }


        return true;
    }
}