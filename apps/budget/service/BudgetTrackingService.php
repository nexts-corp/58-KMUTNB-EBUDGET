<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IBudgetTrackingService;
use apps\budget\interfaces\budgetType;
//use apps\budget\interfaces\objBudget;
//use apps\budget\interfaces\quater;
//use apps\budget\interfaces\year;
use apps\common\entity\BudgetExpense;
use apps\common\entity;

class BudgetTrackingService extends CServiceBase implements IBudgetTrackingService {

    public $datacontext;
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->datacontext = new CDataContext();
    }

    public function getInfoTracking($budgetType, $quater, $year) {
        $dataArr = array();

        if ($budgetType == "1") { //เงินรายได้
            $sql = "SELECT rvt.id,rvt.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL OR tb.budget_quater" . $quater . "_plan = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL OR tb.budget_quater" . $quater . "_used = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                    . "FROM revenue_type rvt LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used) as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'RV' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                    . "ON rvt.id = tb.money_type_id WHERE rvt.master_id = 0 AND rvt.budget_year = " . $year;

            $dataArr = $this->datacontext->pdoQuery($sql);

            for ($i = 0; $i < count($dataArr); $i++) {
                //get lvl2
                $sql = "SELECT rvt.id,rvt.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL OR tb.budget_quater" . $quater . "_plan = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL OR tb.budget_quater" . $quater . "_used = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                        . "FROM revenue_type rvt LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'RV' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                        . "ON rvt.id = tb.money_type_id WHERE rvt.master_id = " . $dataArr[$i]["id"] . " AND rvt.budget_year = " . $year;
                $dataInner = $this->datacontext->pdoQuery($sql);
                for ($y = 0; $y < count($dataInner); $y++) {
                    //get lvl3
                    $sql = "SELECT rvt.id,rvt.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL OR tb.budget_quater" . $quater . "_plan = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL OR tb.budget_quater" . $quater . "_used = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                            . "FROM revenue_type rvt LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'RV' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                            . "ON rvt.id = tb.money_type_id WHERE rvt.master_id = " . $dataInner[$y]["id"] . " AND rvt.budget_year = " . $year;
                    $dataInner2 = $this->datacontext->pdoQuery($sql);

                    for ($z = 0; $z < count($dataInner2); $z++) {
                        //get lvl4
                        $sql = "SELECT rvt.id,rvt.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL OR tb.budget_quater" . $quater . "_plan = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL OR tb.budget_quater" . $quater . "_used = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                                . "FROM revenue_type rvt LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'RV' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                                . "ON rvt.id = tb.money_type_id WHERE rvt.master_id = " . $dataInner2[$z]["id"] . " AND rvt.budget_year = " . $year;
                        $dataInner3 = $this->datacontext->pdoQuery($sql);
                        $dataInner2[$z]["list3"] = $dataInner3;
                    }
                    $dataInner[$y]["list2"] = $dataInner2;
                }
                $dataArr[$i]["list"] = $dataInner;
            }
        } else if ($budgetType == "2") { //เงินงบประมาณแผ่นดิน
            $sql = "SELECT bg.id,bg.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL OR tb.budget_quater" . $quater . "_plan = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL OR tb.budget_quater" . $quater . "_used = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                    . "FROM budget_type bg LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'BG' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                    . "ON bg.id = tb.money_type_id WHERE bg.master_id = 0 AND bg.budget_year = " . $year;

            $dataArr = $this->datacontext->pdoQuery($sql);

            for ($i = 0; $i < count($dataArr); $i++) {
                //get lvl2
                $sql = "SELECT bg.id,bg.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL OR tb.budget_quater" . $quater . "_plan = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL OR tb.budget_quater" . $quater . "_used = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                        . "FROM budget_type bg LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'BG' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                        . "ON bg.id = tb.money_type_id WHERE bg.master_id = " . $dataArr[$i]["id"] . " AND bg.budget_year = " . $year;
                $dataInner = $this->datacontext->pdoQuery($sql);
                for ($y = 0; $y < count($dataInner); $y++) {
                    //get lvl3
                    $sql = "SELECT bg.id,bg.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL OR tb.budget_quater" . $quater . "_plan = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL OR tb.budget_quater" . $quater . "_used = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                            . "FROM budget_type bg LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'BG' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                            . "ON bg.id = tb.money_type_id WHERE bg.master_id = " . $dataInner[$y]["id"] . " AND bg.budget_year = " . $year;
                    $dataInner2 = $this->datacontext->pdoQuery($sql);

                    for ($z = 0; $z < count($dataInner2); $z++) {
                        //get lvl4
                        $sql = "SELECT bg.id,bg.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL OR tb.budget_quater" . $quater . "_plan = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL OR tb.budget_quater" . $quater . "_used = 0) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                                . "FROM budget_type bg LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'BG' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                                . "ON bg.id = tb.money_type_id WHERE bg.master_id = " . $dataInner2[$z]["id"] . " AND bg.budget_year = " . $year;
                        $dataInner3 = $this->datacontext->pdoQuery($sql);
                        $dataInner2[$z]["list3"] = $dataInner3;
                    }
                    $dataInner[$y]["list2"] = $dataInner2;
                }
                $dataArr[$i]["list"] = $dataInner;
            }
        }
        return $dataArr;
    }

    public function saveTracking($objBudget) {

        foreach ($objBudget as $rowOBJ) {

            if ($rowOBJ["id"] != '' && $rowOBJ["budgetType"] != '' && $rowOBJ["quater"] != '' && $rowOBJ["year"] != '' && $rowOBJ["valuePlan"] != 'head' && $rowOBJ["valueUsed"] != 'head') {
                //GET ID
                $tracking = new TrackingBudget();
                $tracking->setMoneyTypeId($rowOBJ["id"]);
                $tracking->setBudgetYear($rowOBJ["year"]);
                $tracking->setMoneyTypeCode($this->getBudgetTypeCODE($rowOBJ["budgetType"]));

                $idTracking = $this->datacontext->getObject($tracking);

                if ($rowOBJ["quater"] == 1) {
                    $tracking->setBudgetQuater1Plan($rowOBJ["valuePlan"]);
                    $tracking->setBudgetQuater1Used($rowOBJ["valueUsed"]);
                } else if ($rowOBJ["quater"] == 2) {
                    $tracking->setBudgetQuater2Plan($rowOBJ["valuePlan"]);
                    $tracking->setBudgetQuater2Used($rowOBJ["valueUsed"]);
                } else if ($rowOBJ["quater"] == 3) {
                    $tracking->setBudgetQuater3Plan($rowOBJ["valuePlan"]);
                    $tracking->setBudgetQuater3Used($rowOBJ["valueUsed"]);
                } else if ($rowOBJ["quater"] == 4) {
                    $tracking->setBudgetQuater4Plan($rowOBJ["valuePlan"]);
                    $tracking->setBudgetQuater4Used($rowOBJ["valueUsed"]);
                }

                if ($idTracking != null) {
                    //have id into UPDATE SQL
                    $tracking->setId($idTracking[0]->id);

                    if ($this->datacontext->updateObject($tracking) != 1) {
                        return false;
                    }
                } else {
                    //not have id into INSERT SQL
                    if ($this->datacontext->saveObject($tracking) != 1) {
                        return false;
                    }
                }
            }
        }//end loop
        return true;
    }

    private function getBudgetTypeCODE($idBudgetType) {
        if ($idBudgetType == 1) {
            return 'RV';
        } else {
            return 'BG';
        }
    }

    public function getQuarter($date) {
        $result = 0;

        if (isset($date)) {
            $month = explode('-', $date)[1];
            $month = intval($month);

            if ($month >= 10 && $month <= 12) {
                $result = 1;
            } else if ($month >= 1 && $month <= 3) {
                $result = 2;
            } else if ($month >= 4 && $month <= 6) {
                $result = 3;
            } else if ($month >= 7 && $month <= 9) {
                $result = 4;
            }
        }

        return $result;
    }

    public function updateBudgetExpense($expenseId, $expenseUsed) {
        $return = true;

        $obj = new entity\BudgetExpensePlan();
        $obj->setId($expenseId);
        $obj->setExpenseUsed($expenseUsed);

        if (!$this->datacontext->updateObject($obj)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function updateStatus($formId, $id, $status, $comment) {
        $return = true;

        if ($formId == 140) {
            $obj = new entity\Budget140();
            $obj->setId($id);
            $obj->setStatusId($status);
            $obj->setComment($comment);
        } else if ($formId == 141) {
            $obj = new entity\Budget141();
            $obj->setId($id);
            $obj->setStatusId($status);
            $obj->setComment($comment);
        } else if ($formId == 142) {
            $obj = new entity\Budget142();
            $obj->setId($id);
            $obj->setStatusId($status);
            $obj->setComment($comment);
        } else if ($formId == 143) {
            $obj = new entity\Budget143();
            $obj->setId($id);
            $obj->setStatusId($status);
            $obj->setComment($comment);
        } else if ($formId == 144) {
            $obj = new entity\Budget144();
            $obj->setId($id);
            $obj->setStatusId($status);
            $obj->setComment($comment);
        } else if ($formId == 145) {
            $obj = new entity\Budget145();
            $obj->setId($id);
            $obj->setStatusId($status);
            $obj->setComment($comment);
        } else if ($formId == 146) {
            $obj = new entity\Budget146();
            $obj->setId($id);
            $obj->setStatusId($status);
            $obj->setComment($comment);
        } else if ($formId == 999) {
            $obj = new entity\BudgetExpense();
            $obj->setId($id);
            $obj->setStatusId($status);
            $obj->setComment($comment);
        }

        if (!$this->datacontext->updateObject($obj)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }


}
