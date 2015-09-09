<?php

namespace apps\budget\service;

use apps\budget\interfaces\IBudgetTrackingService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class BudgetTrackingService extends CServiceBase implements IBudgetTrackingService
{
    public $datacontext;
    public $pathEnt = "apps\\common\\entity";

    public function __construct()
    {
        $this->datacontext = new CDataContext();
    }


    public function getInfoTracking($budgetType, $quater, $year)
    {
        $dataArr = array();

        if ($budgetType == "1") { //เงินรายได้

            $sql = "SELECT rvt.id,rvt.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                . "FROM revenue_type rvt LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used) as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'RV' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                . "ON rvt.id = tb.money_type_id WHERE rvt.master_id = 0 AND rvt.budget_year = " . $year;

            $dataArr = $this->datacontext->pdoQuery($sql);

            for ($i = 0; $i < count($dataArr); $i++) {
                //get lvl2
                $sql = "SELECT rvt.id,rvt.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                    . "FROM revenue_type rvt LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'RV' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                    . "ON rvt.id = tb.money_type_id WHERE rvt.master_id = " . $dataArr[$i]["id"] . " AND rvt.budget_year = " . $year;
                $dataInner = $this->datacontext->pdoQuery($sql);
                for ($y = 0; $y < count($dataInner); $y++) {
                    //get lvl3
                    $sql = "SELECT rvt.id,rvt.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                        . "FROM revenue_type rvt LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'RV' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                        . "ON rvt.id = tb.money_type_id WHERE rvt.master_id = " . $dataInner[$y]["id"] . " AND rvt.budget_year = " . $year;
                    $dataInner2 = $this->datacontext->pdoQuery($sql);

                    for ($z = 0; $z < count($dataInner2); $z++) {
                        //get lvl4
                        $sql = "SELECT rvt.id,rvt.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
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

            $sql = "SELECT bg.id,bg.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                . "FROM budget_type bg LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'BG' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                . "ON bg.id = tb.money_type_id WHERE bg.master_id = 0 AND bg.budget_year = " . $year;

            $dataArr = $this->datacontext->pdoQuery($sql);

            for ($i = 0; $i < count($dataArr); $i++) {
                //get lvl2
                $sql = "SELECT bg.id,bg.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                    . "FROM budget_type bg LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'BG' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                    . "ON bg.id = tb.money_type_id WHERE bg.master_id = " . $dataArr[$i]["id"] . " AND bg.budget_year = " . $year;
                $dataInner = $this->datacontext->pdoQuery($sql);
                for ($y = 0; $y < count($dataInner); $y++) {
                    //get lvl3
                    $sql = "SELECT bg.id,bg.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
                        . "FROM budget_type bg LEFT JOIN ( SELECT SUM(budget_quater" . $quater . "_plan)as budget_quater" . $quater . "_plan,SUM(budget_quater" . $quater . "_used)as budget_quater" . $quater . "_used,money_type_id FROM tracking_budget WHERE money_type_code = 'BG' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                        . "ON bg.id = tb.money_type_id WHERE bg.master_id = " . $dataInner[$y]["id"] . " AND bg.budget_year = " . $year;
                    $dataInner2 = $this->datacontext->pdoQuery($sql);

                    for ($z = 0; $z < count($dataInner2); $z++) {
                        //get lvl4
                        $sql = "SELECT bg.id,bg.type_name,CASE WHEN (tb.budget_quater" . $quater . "_plan IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_plan END AS budget_quater_plan,CASE WHEN (tb.budget_quater" . $quater . "_used IS NULL) THEN ' ' ELSE tb.budget_quater" . $quater . "_used END  AS budget_quater_used "
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
}