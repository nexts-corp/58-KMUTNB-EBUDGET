<?php

namespace apps\actionplan\service;

use apps\actionplan\interfaces\IHomeAdminService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class HomeAdminService extends CServiceBase implements IHomeAdminService{
    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->year = 2559;
        return $this->datacontext->getObject($year)[0];
    }

    public function centerStatus(){
        $sql = "SELECT
                COUNT(*) AS cAll,
                SUM(
                    CASE
                        WHEN IsApprove = 'Y' THEN 1
                        ELSE 0
                    END
                ) AS cComplete
            FROM Affirmative_Center
            WHERE PeriodCode = :year";
        $param = array(
            "year" => $this->getPeriod()->year
        );

        $data = $this->datacontext->pdoQuery($sql, $param)[0];

        if($data["cComplete"] != 0 && $data["cComplete"] == $data["cAll"]){
            $status = "complete";
        }
        else{
            $status = "no";
        }

        $result = array(
            "process" => "center",
            "status" => "complete",
        );
        return $result;
    }

    public function draftStatus(){
        $sql = "SELECT
                DepartmentId,
                COUNT(*) AS cAll,
                SUM(
                    CASE
                        WHEN IsApprove = 'Y' THEN 1
                        ELSE 0
                    END
                ) AS cComplete
            FROM Affirmative_Draft
            WHERE PeriodCode = :year
            GROUP BY DepartmentId";
        $param = array(
            "year" => $this->getPeriod()->year
        );

        $data = $this->datacontext->pdoQuery($sql, $param);

        $cAll = 0;
        $cComplete = 0;
        foreach($data as $key => $value){
            if($value["cComplete"] != 0 && $value["cComplete"] == $value["cAll"]){
                $cComplete++;
            }
            $cAll++;
        }

        $result = array(
            "process" => "draft",
            "deptAll" => $cAll,
            "deptComplete" => $cComplete
        );
        return $result;
    }

    public function finalStatus(){
        $sql = "SELECT
                ad.DepartmentId,
                COUNT(*) AS cAll,
                SUM(
                    CASE
                        WHEN af.IsApprove = 'Y' THEN 1
                        ELSE 0
                    END
                ) AS cComplete
            FROM Affirmative_Draft ad
            LEFT OUTER JOIN Affirmative_Final af ON ad.AffirmativeDraftId = af.AffirmativeDraftId
            WHERE ad.PeriodCode = :year
            GROUP BY ad.DepartmentId";
        $param = array(
            "year" => $this->getPeriod()->year
        );

        $data = $this->datacontext->pdoQuery($sql, $param);

        $cAll = 0;
        $cComplete = 0;
        foreach($data as $key => $value){
            if($value["cComplete"] != 0 && $value["cComplete"] == $value["cAll"]){
                $cComplete++;
            }
            $cAll++;
        }

        $result = array(
            "process" => "final",
            "deptAll" => $cAll,
            "deptComplete" => $cComplete
        );
        return $result;
    }

    public function resultStatus(){
        $sql = "SELECT
                ad.DepartmentId,
                COUNT(*) AS cAll,
                SUM(
                    CASE
                        WHEN ar.AffirmativeResultId != '' THEN 1
                        ELSE 0
                    END
                ) AS cComplete
            FROM Affirmative_Draft ad
            LEFT OUTER JOIN Affirmative_Final af ON ad.AffirmativeDraftId = af.AffirmativeDraftId
            LEFT OUTER JOIN Affirmative_Result ar ON ar.AffirmativeResultId = ( SELECT TOP 1 AffirmativeResultId FROM Affirmative_Result WHERE AffirmativeFinalId = af.AffirmativeFinalId ORDER BY AffirmativeRoundId DESC )
            WHERE ad.PeriodCode = :year
            GROUP BY ad.DepartmentId";
        $param = array(
            "year" => $this->getPeriod()->year
        );

        $data = $this->datacontext->pdoQuery($sql, $param);

        $cAll = 0;
        $cComplete = 0;
        foreach($data as $key => $value){
            if($value["cComplete"] != 0 && $value["cComplete"] == $value["cAll"]){
                $cComplete++;
            }
            $cAll++;
        }

        $result = array(
            "process" => "result",
            "deptAll" => $cAll,
            "deptComplete" => $cComplete
        );
        return $result;
    }
} 