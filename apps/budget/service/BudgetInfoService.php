<?php

namespace apps\budget\service;

use apps\budget\interfaces\apps;
use apps\budget\interfaces\bg145Id;
use apps\budget\interfaces\type;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IBudgetInfoService;
use apps\budget\model\BudgetFilter;
use apps\common\entity;

class BudgetInfoService extends CServiceBase implements IBudgetInfoService
{

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct()
    {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function listBudgetType140()
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '10000000' and typ.typeCode = 'G' and typ.form140 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key => $value) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.form140 = true and typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key]["lv2"] = $list2;

            foreach ($list2 as $key => $value) {
                $sql3 = " SELECT typ.id, typ.typeName, typ.masterId "
                    . " FROM " . $this->ent . "\\BudgetType typ "
                    . " WHERE typ.form140 = true and typ.masterId = :masterId ";
                $param3 = array(
                    "masterId" => $list2[$key]["id"]
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list2[$key]["lv2"] = $list3;
            }
        }

        return $list1;
    }

    public function listBudgetType141()
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20100000' and typ.typeCode = 'G' and typ.form141 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key => $value) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.form141 = true and typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key]["lv2"] = $list2;

            foreach ($list2 as $key => $value) {
                $sql3 = " SELECT typ.id, typ.typeName, typ.masterId "
                    . " FROM " . $this->ent . "\\BudgetType typ "
                    . " WHERE typ.form141 = true and typ.masterId = :masterId ";
                $param3 = array(
                    "masterId" => $list2[$key]["id"]
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list2[$key]["lv2"] = $list3;
            }
        }

        return $list1;
    }

    public function listBudgetType142()
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20100000' and typ.typeCode = 'G' and typ.form142 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key => $value) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.form142 = true and typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key]["lv2"] = $list2;

            foreach ($list2 as $key => $value) {
                $sql3 = " SELECT typ.id, typ.typeName, typ.masterId "
                    . " FROM " . $this->ent . "\\BudgetType typ "
                    . " WHERE typ.form142 = true and typ.masterId = :masterId ";
                $param3 = array(
                    "masterId" => $list2[$key]["id"]
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list2[$key]["lv2"] = $list3;
            }
        }

        return $list1;
    }

    public function listBudgetType143()
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20000000' and typ.typeCode = 'G' and typ.form143 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key => $value) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.form143 = true and typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key]["lv2"] = $list2;

            foreach ($list2 as $key => $value) {
                $sql3 = " SELECT typ.id, typ.typeName, typ.masterId "
                    . " FROM " . $this->ent . "\\BudgetType typ "
                    . " WHERE typ.form143 = true and typ.masterId = :masterId ";
                $param3 = array(
                    "masterId" => $list2[$key]["id"]
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list2[$key]["lv2"] = $list3;
            }
        }

        return $list1;
    }

    public function listBudgetType144()
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20200000' and typ.typeCode = 'G' and typ.form144 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key => $value) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.form144 = true and typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key]["lv2"] = $list2;

            foreach ($list2 as $key => $value) {
                $sql3 = " SELECT typ.id, typ.typeName, typ.masterId "
                    . " FROM " . $this->ent . "\\BudgetType typ "
                    . " WHERE typ.form144 = true and typ.masterId = :masterId ";
                $param3 = array(
                    "masterId" => $list2[$key]["id"]
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list2[$key]["lv2"] = $list3;
            }
        }

        return $list1;
    }

    public function listBudgetType145()
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20300000' and typ.typeCode = 'G' and typ.form145 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key => $value) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.form145 = true and typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key]["lv2"] = $list2;

            foreach ($list2 as $key => $value) {
                $sql3 = " SELECT typ.id, typ.typeName, typ.masterId "
                    . " FROM " . $this->ent . "\\BudgetType typ "
                    . " WHERE typ.form145 = true and typ.masterId = :masterId ";
                $param3 = array(
                    "masterId" => $list2[$key]["id"]
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list2[$key]["lv2"] = $list3;
            }
        }

        return $list1;
    }

    public function listBudgetType146()
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20500000' and typ.typeCode = 'G' and typ.form146 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key => $value) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.form146 = true and typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key]["lv2"] = $list2;

            foreach ($list2 as $key => $value) {
                $sql3 = " SELECT typ.id, typ.typeName, typ.masterId "
                    . " FROM " . $this->ent . "\\BudgetType typ "
                    . " WHERE typ.form146 = true and typ.masterId = :masterId ";
                $param3 = array(
                    "masterId" => $list2[$key]["id"]
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list2[$key]["lv2"] = $list3;
            }
        }

        return $list1;
    }

    public function viewBudget140($param)
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '10000000' and typ.typeCode = 'G' and typ.form140 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key1 => $value1) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key1]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key1]["lv2"] = $list2;

            foreach ($list2 as $key2 => $value2) {
                $sql3 = " select bg.id, bg.positionName, bg.occupy, bg.vacancy, bg.rateNo, bg.salary, bg.salaryTotal, bg.remark,bg.attachmentId,att.desc,att.path"
                    . " from " . $this->ent . "\\Budget140 bg "
                    . " left join " . $this->ent . "\\BudgetHead head with head.id = bg.budgetHeadId "
                    . " left join " . $this->ent . "\\Attachment att with bg.attachmentId = att.id "
                    . " where head.formId = :formId "
                    . " and bg.budgetTypeId = :budgetTypeId "
                    . " and bg.budgetPeriodId = :budgetPeriodId "
                    . " and bg.budgetTypeCode = :budgetTypeCode "
                    . " and bg.planId = :planId "
                    . " and bg.projectId = :projectId "
                    . " and bg.fundgroupId = :fundgroupId "
                    . " and bg.deptId = :deptId";

                $param3 = array(
                    "formId" => "140",
                    "budgetTypeId" => $value2["id"],
                    "budgetPeriodId" => $param->budgetPeriodId,
                    "budgetTypeCode" => $param->budgetTypeCode,
                    "planId" => $param->planId,
                    "projectId" => $param->projectId,
                    "fundgroupId" => $param->fundgroupId,
                    "deptId" => $param->deptId
                );

                $list3 = $this->datacontext->getObject($sql3, $param3);

                //$list2[$key]["budget"] = $list3;
                $list1[$key1]["lv2"][$key2]["budget"] = $list3;
            }
        }

        return $list1;

        /*
          $bg = new entity\Budget140();
          $bg->setBudgetPeriodId($param->budgetPeriodId);
          $bg->setBudgetTypeCode($param->budgetTypeCode);
          $bg->setPlanId($param->L3dPlanId);
          $bg->setProjectId($param->L3dProjectId);
          $bg->setFundgroupId($param->fundgroupId);
          $bg->setDeptId($param->departmentId);

          $dataBG = $this->datacontext->getObject($bg);
         */
    }

    public function viewBudget141($param)
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20100000' and typ.typeCode = 'G' and typ.form141 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key1 => $value1) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.form141 = true and typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key1]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key1]["lv2"] = $list2;

            foreach ($list2 as $key2 => $value2) {
                $sql3 = " select bg.id, bg.positionName, bg.occupy, bg.vacancy, bg.rateNo, bg.salary, bg.salaryTotal, bg.remark,bg.attachmentId,att.desc,att.path "
                    . " from " . $this->ent . "\\Budget141 bg "
                    . " left join " . $this->ent . "\\BudgetHead head with head.id = bg.budgetHeadId "
                    . " left join " . $this->ent . "\\Attachment att with bg.attachmentId = att.id "
                    . " where head.formId = :formId and "
                    . " bg.budgetTypeId = :budgetTypeId and "
                    . " bg.budgetPeriodId = :budgetPeriodId and "
                    . " bg.budgetTypeCode = :budgetTypeCode and "
                    . " bg.planId = :planId and "
                    . " bg.projectId = :projectId and "
                    . " bg.fundgroupId = :fundgroupId and "
                    . " bg.deptId = :deptId";

                $param3 = array(
                    "formId" => "141",
                    "budgetTypeId" => $value2["id"],
                    "budgetPeriodId" => $param->budgetPeriodId,
                    "budgetTypeCode" => $param->budgetTypeCode,
                    "planId" => $param->planId,
                    "projectId" => $param->projectId,
                    "fundgroupId" => $param->fundgroupId,
                    "deptId" => $param->deptId
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list1[$key1]["lv2"][$key2]["budget"] = $list3;
            }
        }

        return $list1;
    }

    public function viewBudget142($param)
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20100000' and typ.typeCode = 'G' and typ.form142 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key1 => $value1) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key1]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key1]["lv2"] = $list2;

            foreach ($list2 as $key2 => $value2) {
                $sql3 = " select bg.id, bg.positionName, bg.occupy, bg.vacancy, bg.rateNo, bg.salary, bg.salaryTotal, bg.remark,bg.remark,bg.attachmentId,att.desc,att.path "
                    . " from " . $this->ent . "\\Budget142 bg "
                    . " left join " . $this->ent . "\\BudgetHead head with head.id = bg.budgetHeadId "
                    . " left join " . $this->ent . "\\Attachment att with bg.attachmentId = att.id "
                    . " where head.formId = :formId and "
                    . " bg.budgetTypeId = :budgetTypeId and "
                    . " bg.budgetPeriodId = :budgetPeriodId and "
                    . " bg.budgetTypeCode = :budgetTypeCode and "
                    . " bg.planId = :planId and "
                    . " bg.projectId = :projectId and "
                    . " bg.fundgroupId = :fundgroupId and "
                    . " bg.deptId = :deptId";
                $param3 = array(
                    "formId" => "142",
                    "budgetTypeId" => $value2["id"],
                    "budgetPeriodId" => $param->budgetPeriodId,
                    "budgetTypeCode" => $param->budgetTypeCode,
                    "planId" => $param->planId,
                    "projectId" => $param->projectId,
                    "fundgroupId" => $param->fundgroupId,
                    "deptId" => $param->deptId
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list1[$key1]["lv2"][$key2]["budget"] = $list3;
            }
        }

        return $list1;
    }

    public function viewBudget143($param)
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20000000' and typ.typeCode = 'G' and typ.form143 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key1 => $value1) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key1]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key1]["lv2"] = $list2;

            foreach ($list2 as $key2 => $value2) {
                $sql3 = " select bg.id, bg.operName, bg.operDesc, bg.bgRequest, bg.bgReceive, bg.bgHistory, bg.remark , bg.remark,bg.remark,bg.attachmentId,att.desc,att.path"
                    . " from " . $this->ent . "\\Budget143 bg "
                    . " left join " . $this->ent . "\\BudgetHead head with head.id = bg.budgetHeadId "
                    . " left join " . $this->ent . "\\Attachment att with bg.attachmentId = att.id "
                    . " where head.formId = :formId and "
                    . " bg.budgetTypeId = :budgetTypeId and "
                    . " bg.budgetPeriodId = :budgetPeriodId and "
                    . " bg.budgetTypeCode = :budgetTypeCode and "
                    . " bg.planId = :planId and "
                    . " bg.projectId = :projectId and "
                    . " bg.fundgroupId = :fundgroupId and "
                    . " bg.deptId = :deptId";
                $param3 = array(
                    "formId" => "143",
                    "budgetTypeId" => $value2["id"],
                    "budgetPeriodId" => $param->budgetPeriodId,
                    "budgetTypeCode" => $param->budgetTypeCode,
                    "planId" => $param->planId,
                    "projectId" => $param->projectId,
                    "fundgroupId" => $param->fundgroupId,
                    "deptId" => $param->deptId
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list1[$key1]["lv2"][$key2]["budget"] = $list3;
            }
        }

        return $list1;
    }

    public function viewBudget144($param)
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20200000' and typ.typeCode = 'G' and typ.form144 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key1 => $value1) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key1]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key1]["lv2"] = $list2;

            foreach ($list2 as $key2 => $value2) {
                $sql3 = " select bg.id, bg.utilName, bg.utilDesc, bg.bgRequest, bg.bgReceive, bg.bgHistory, "
                    . " bg.nonBgRequest, bg.nonBgReceive, bg.nonBgHistory, bg.remark, bg.remark,bg.remark,bg.attachmentId,att.desc,att.path "
                    . " from " . $this->ent . "\\Budget144 bg "
                    . " left join " . $this->ent . "\\BudgetHead head with head.id = bg.budgetHeadId "
                    . " left join " . $this->ent . "\\Attachment att with bg.attachmentId = att.id "
                    . " where head.formId = :formId and "
                    . " bg.budgetTypeId = :budgetTypeId and "
                    . " bg.budgetPeriodId = :budgetPeriodId and "
                    . " bg.budgetTypeCode = :budgetTypeCode and "
                    . " bg.planId = :planId and "
                    . " bg.projectId = :projectId and "
                    . " bg.fundgroupId = :fundgroupId and "
                    . " bg.deptId = :deptId";
                $param3 = array(
                    "formId" => "144",
                    "budgetTypeId" => $value2["id"],
                    "budgetPeriodId" => $param->budgetPeriodId,
                    "budgetTypeCode" => $param->budgetTypeCode,
                    "planId" => $param->planId,
                    "projectId" => $param->projectId,
                    "fundgroupId" => $param->fundgroupId,
                    "deptId" => $param->deptId
                );
                $list3 = $this->datacontext->getObject($sql3, $param3);
                $list1[$key1]["lv2"][$key2]["budget"] = $list3;
            }
        }

        return $list1;
    }

    public function viewBudget145($param)
    {

        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20000000' and typ.typeCode = 'G' and typ.form145 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key1 => $value1) {

            if ($list1[$key1]["id"] == "20300000") {

                $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                    . " FROM " . $this->ent . "\\BudgetType typ "
                    . " WHERE typ.masterId = :masterId ";
                $param2 = array(
                    "masterId" => $list1[$key1]["id"]
                );
                $list2 = $this->datacontext->getObject($sql2, $param2);
                $list1[$key1]["lv2"] = $list2;

                foreach ($list2 as $key2 => $value2) {
                    $sql3 = " select bg.id, bg.durableName, bg.durableDesc, bg.qty, bg.unit, bg.price, bg.totalPrice, "
                        . " bg.numNeeded, bg.numWork, bg.numUnwork, bg.remark,bg.attachmentId,att.desc,att.path"
                        . " from " . $this->ent . "\\Budget145 bg "
                        . " left join " . $this->ent . "\\BudgetHead head with head.id = bg.budgetHeadId "
                        . " left join " . $this->ent . "\\Attachment att with bg.attachmentId = att.id "
                        . " where head.formId = :formId and "
                        . " bg.budgetTypeId = :budgetTypeId and "
                        . " bg.budgetPeriodId = :budgetPeriodId and "
                        . " bg.budgetTypeCode = :budgetTypeCode and "
                        . " bg.planId = :planId and "
                        . " bg.projectId = :projectId and "
                        . " bg.fundgroupId = :fundgroupId and "
                        . " bg.deptId = :deptId";
                    $param3 = array(
                        "formId" => "145",
                        "budgetTypeId" => $value2["id"],
                        "budgetPeriodId" => $param->budgetPeriodId,
                        "budgetTypeCode" => $param->budgetTypeCode,
                        "planId" => $param->planId,
                        "projectId" => $param->projectId,
                        "fundgroupId" => $param->fundgroupId,
                        "deptId" => $param->deptId
                    );
                    $list3 = $this->datacontext->getObject($sql3, $param3);
                    $list1[$key1]["lv2"][$key2]["budget"] = $list3;
                }
            } else {

                $sql2 = " select bg.id, bg.durableName, bg.durableDesc, bg.qty, bg.unit, bg.price, bg.totalPrice, "
                    . " bg.numNeeded, bg.numWork, bg.numUnwork, bg.remark ,bg.attachmentId,att.desc,att.path"
                    . " from " . $this->ent . "\\Budget145 bg "
                    . " left join " . $this->ent . "\\BudgetHead head with head.id = bg.budgetHeadId "
                    . " left join " . $this->ent . "\\Attachment att with bg.attachmentId = att.id "
                    . " where head.formId = :formId and "
                    . " bg.budgetTypeId = :budgetTypeId and "
                    . " bg.budgetPeriodId = :budgetPeriodId and "
                    . " bg.budgetTypeCode = :budgetTypeCode and "
                    . " bg.planId = :planId and "
                    . " bg.projectId = :projectId and "
                    . " bg.fundgroupId = :fundgroupId and "
                    . " bg.deptId = :deptId";
                $param2 = array(
                    "formId" => "145",
                    "budgetTypeId" => $list1[$key1]["id"],
                    "budgetPeriodId" => $param->budgetPeriodId,
                    "budgetTypeCode" => $param->budgetTypeCode,
                    "planId" => $param->planId,
                    "projectId" => $param->projectId,
                    "fundgroupId" => $param->fundgroupId,
                    "deptId" => $param->deptId
                );
                $list2 = $this->datacontext->getObject($sql2, $param2);
                $list1[$key1]["lv2"] = $list2;
                foreach ($list2 as $key2 => $value2) {
                    $list1[$key1]["lv2"][$key2]["budget"] = array();
                }
            }
        }//end for each

        return $list1;
    }

    public function viewBudget146($param)
    {
        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20500000' and typ.typeCode = 'G' and typ.form146 = true ";
        $list1 = $this->datacontext->getObject($sql1);

//        foreach ($list1 as $key1 => $value1) {
//            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
//                    . " FROM " . $this->ent . "\\BudgetType typ "
//                    . " WHERE typ.masterId = :masterId ";
//            $param2 = array(
//                "masterId" => $list1[$key1]["id"]
//            );
//            $list2 = $this->datacontext->getObject($sql2, $param2);
//            $list1[$key1]["lv2"] = $list2;

        foreach ($list1 as $key1 => $value1) {
            $sql2 = " select bg.id, bg.bursaryName, bg.bursaryDesc, bg.bgRequest, bg.bgHistory, bg.remark , bg.remark,bg.remark,bg.attachmentId,att.desc,att.path"
                . " from " . $this->ent . "\\Budget146 bg "
                . " left join " . $this->ent . "\\BudgetHead head with head.id = bg.budgetHeadId "
                . " left join " . $this->ent . "\\Attachment att with bg.attachmentId = att.id "
                . " where head.formId = :formId and "
                . " bg.budgetTypeId = :budgetTypeId and "
                . " bg.budgetPeriodId = :budgetPeriodId and "
                . " bg.budgetTypeCode = :budgetTypeCode and "
                . " bg.planId = :planId and "
                . " bg.projectId = :projectId and "
                . " bg.fundgroupId = :fundgroupId and "
                . " bg.deptId = :deptId";
            $param2 = array(
                "formId" => "146",
                "budgetTypeId" => $value1["id"],
                "budgetPeriodId" => $param->budgetPeriodId,
                "budgetTypeCode" => $param->budgetTypeCode,
                "planId" => $param->planId,
                "projectId" => $param->projectId,
                "fundgroupId" => $param->fundgroupId,
                "deptId" => $param->deptId
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            //$list2[$key]["budget"] = $list3;
            $list1[$key1]["lv2"] = $list2;
        }
//    }

        return $list1;
    }


    public function viewBuildingOne($bg145Id, $type)
    {
        $sql = " SELECT build"
            . " FROM " . $this->ent . "\\Building build"
            . " WHERE build.bg145Id = :bg145Id AND build.typeId = :typeId";
        $param = array(
            "bg145Id" => $bg145Id,
            "typeId" => $type
        );

        $listBuilding = $this->datacontext->getObject($sql, $param);

        foreach ($listBuilding as $key1 => $value1) {
            $sql2 = " SELECT detail"
                . " FROM " . $this->ent . "\\BuildingDetail detail"
                . " WHERE detail.buildingId = :buildingId";

            $param2 = array(
                "buildingId" => $value1->id
            );
            $listDetail = $this->datacontext->getObject($sql2, $param2);
            $listBuilding[$key1]->listDetail = $listDetail;

            $sql2 = " SELECT boq"
                . " FROM " . $this->ent . "\\BuildingBOQ boq"
                . " WHERE boq.buildingId = :buildingId";


            $listBOQ = $this->datacontext->getObject($sql2, $param2);
            $listBuilding[$key1]->listBOQ = $listBOQ;


        }

        return $listBuilding;
    }


    public function viewBuildingMore($bg145Id, $type)
    {
        $sql = " SELECT build"
            . " FROM " . $this->ent . "\\Building build"
            . " WHERE build.bg145Id = :bg145Id AND build.typeId = :typeId";
        $param = array(
            "bg145Id" => $bg145Id,
            "typeId" => $type
        );

        $listBuilding = $this->datacontext->getObject($sql, $param);

        foreach ($listBuilding as $key1 => $value1) {

            $sql2 = " SELECT boq"
                . " FROM " . $this->ent . "\\BuildingBOQ boq"
                . " WHERE boq.buildingId = :buildingId";

            $param2 = array(
                "buildingId" => $value1->id
            );

            $listBOQ = $this->datacontext->getObject($sql2, $param2);
            $listBuilding[$key1]->listBOQ = $listBOQ;

            $sql2 = " SELECT prid"
                . " FROM " . $this->ent . "\\BuildingPeriod prid"
                . " WHERE prid.buildingId = :buildingId";


            $listPrid = $this->datacontext->getObject($sql2, $param2);
            $listBuilding[$key1]->listPrid = $listPrid;


            $sql2 = " SELECT flp"
                . " FROM " . $this->ent . "\\BuildingFloorPlan flp"
                . " WHERE flp.buildingId = :buildingId";


            $listflp = $this->datacontext->getObject($sql2, $param2);
            $listBuilding[$key1]->listflp = $listflp;

        }

        return $listBuilding;
    }
}
