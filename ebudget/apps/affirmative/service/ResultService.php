<?php

namespace apps\affirmative\service;

use apps\affirmative\interfaces\IResultService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class ResultService extends CServiceBase implements IResultService {

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

    function sortBy($by, $arr) {
        $return = array();
        if (is_array($arr)) {
            foreach ($arr as $key => $object) {
                $return[$key] = array();
                foreach ($object as $field => $value) {
                    if (is_object($value)) {
                        $return[$key][$value->$by] = $value;
                    } elseif (is_array($value)) {
                        $return[$key][$value[$by]] = $value;
                    }
                }
            }
        } elseif (is_object($arr)) {
            foreach ($arr as $field => $value) {
                $return[$field][$value->$by] = $value;
            }
        }
        return $return;
    }

    public function listsDepartment(){
        $sql = "SELECT
                ad.ActivityId, ad.ActivityName,
                ad.ActivityCode, ad.DepartmentId,
                ad.DepartmentName, rd.AffirmativeRoundId AS RoundId, rd.AffirmativeRoundName AS RoundName,
                COUNT(fl.AffirmativeFinalId) AS cFinal, COUNT(rt.AffirmativeResultId) AS cResult
            FROM View_Activity_Department ad
            CROSS JOIN Affirmative_Round rd
            LEFT OUTER JOIN Affirmative_Final fl ON fl.PeriodCode = rd.PeriodCode AND fl.DepartmentId = ad.DepartmentId
            LEFT OUTER JOIN Affirmative_Result rt ON rt.AffirmativeResultId = ( SELECT TOP 1 AffirmativeResultId FROM Affirmative_Result WHERE AffirmativeFinalId = fl.AffirmativeFinalId AND AffirmativeRoundId <= rd.AffirmativeRoundId ORDER BY AffirmativeRoundId DESC )
            WHERE rd.PeriodCode = :year
            GROUP BY ad.DepartmentId, ad.DepartmentName,
                ad.ActivityId, ad.ActivityName,
                ad.ActivityCode, rd.AffirmativeRoundId, rd.AffirmativeRoundName
            ORDER BY ActivityId ASC";

        $param = array(
            "year" => $this->getPeriod()->year
        );
        $data = $this->datacontext->pdoQuery($sql, $param);

        $group = array();
        $actKey = array();
        $deptKey = array();

        foreach($data as $key => $value){
            $actKey[$value["ActivityId"]] = $value["ActivityName"];
            $deptKey[$value["DepartmentId"]] = $value["DepartmentName"];

            $group[$value["ActivityId"]][$value["DepartmentId"]][] = array(
                "roundId" => $value["RoundId"],
                "roundName" => $value["RoundName"],
                "cFinal" => $value["cFinal"],
                "cResult" => $value["cResult"]
            );
        }

        $result = array();

        foreach($group as $key => $value){
            $dept = array();

            foreach($value as $key2 => $value2){
                $dept[] = array(
                    "deptId" => $key2,
                    "deptName" => $deptKey[$key2],
                    "round" => $value2
                );
            }

            $result[] = array(
                "actId" => $key,
                "actName" => $actKey[$key],
                "dept" => $dept
            );
        }

        return $result;
    }

    public function listsRound(){
        $sql = "SELECT"
                ." rd"
            ." FROM ".$this->ent."\\AffirmativeRound rd"
            ." WHERE rd.periodCode = :period";
        $param = array(
            "period" => $this->getPeriod()->year
        );

        $data = $this->datacontext->getObject($sql, $param);

        return $data;
    }

    public function department($deptId, $roundId){
       // $json = new CJSONDecodeImpl();
        $dept = new \apps\affirmative\model\ViewActivityDepartment();
        $dept->departmentId = $deptId;
        $dataDept = $this->datacontext->getObject($dept)[0];

        $typeArr = array();
        $targetArr = array();

        /*$draft = new \apps\affirmative\entity\AffirmativeFinal();
        $draft->periodCode = $this->getPeriod()->year;
        $draft->departmentId = $deptId;
        $draftData = $this->datacontext->getObject($draft);*/
        $sql = "SELECT
                fl.AffirmativeFinalId AS finalId, fl.PeriodCode AS periodCode,
                fl.DepartmentId AS departmentId, fl.AffirmativeMainId AS mainId,
                fl.AffirmativeMainSeq AS mainSeq, fl.AffirmativeTypeId AS typeId,
                fl.AffirmativeTypeSeq AS typeSeq, fl.HasIssue AS hasIssue,
                fl.AffirmativeIssueId AS issueId, fl.AffirmativeIssueSeq AS issueSeq,
                fl.AffirmativeTargetId AS targetId, fl.AffirmativeTargetSeq AS targetSeq,
                fl.AffirmativeKpiId AS kpiId, fl.AffirmativeKpiSeq AS kpiSeq,
                fl.AffirmativeKpiName AS kpiName, fl.AffirmativeUnitId AS unitId,
                fl.AffirmativeUnitName AS unitName, fl.KpiGoal AS kpiGoal,
                fl.Score1 AS score1, fl.Score2 AS score2, fl.Score3 AS score3,
                fl.Score4 AS score4, fl.Score5 AS score5,
                rt.AffirmativeResultId AS resultId, rt.AffirmativeRoundId AS roundId,
                rt.Detail AS detail, CAST (rt.Dividend AS VARCHAR) AS dividend,
                CAST (rt.Divisor AS VARCHAR) AS divisor, CAST (rt.Result AS VARCHAR) AS result,
                CAST (rt.Score AS VARCHAR) AS score, rt.IsSuccess AS isSuccess,
                rt.Remark AS remark, rt.Attachment AS attachment
            FROM
                Affirmative_Final fl
            LEFT OUTER JOIN Affirmative_Result rt ON AffirmativeResultId = (
                SELECT
                    TOP 1 AffirmativeResultId
                FROM
                    Affirmative_Result
                WHERE
                    AffirmativeFinalId = fl.AffirmativeFinalId
                AND AffirmativeRoundId <= :round
                ORDER BY
                    AffirmativeRoundId DESC
            )
            WHERE
                fl.PeriodCode = :year AND fl.DepartmentId = :dept";
        $param = array(
            "round" => $roundId,
            "year" => $this->getPeriod()->year,
            "dept" => $deptId
        );

        $draftData = $this->datacontext->pdoQuery($sql, $param);
        //return $draftData;
        foreach ($draftData as $keyDraft => $valueDraft) {
            if ($valueDraft["hasIssue"] == "Y") {
                if (empty($targetArr[$valueDraft["targetId"]][$valueDraft["finalId"]])) {
                    $targetArr[$valueDraft["targetId"]][$valueDraft["finalId"]] = $valueDraft;
                }
            } elseif ($valueDraft["hasIssue"] == "N") {
                if (empty($typeArr[$valueDraft["typeId"]][$valueDraft["finalId"]])) {
                    $typeArr[$valueDraft["typeId"]][$valueDraft["finalId"]] = $valueDraft;
                }
            }
        }

        $targetArr = $this->sortBy("kpiSeq", $targetArr);
        $typeArr = $this->sortBy("kpiSeq", $typeArr);

        $sqlMain = "select s.mainId,s.mainSeq,m.mainName "
            . "from apps\\common\\entity\\AffirmativeSetting s "
            . "join apps\\common\\entity\\AffirmativeMain m with m.mainId = s.mainId "
            . "where s.periodCode = :periodCode and s.groupCode = :groupCode "
            . "group by s.mainId,s.mainSeq,m.mainName "
            . "order by s.mainSeq";
        $paramMain = array(
            "periodCode" => $this->getPeriod()->year,
            "groupCode" => $dataDept->activityCode
        );
        $mainData = $this->datacontext->getObject($sqlMain, $paramMain);
        $sqlType = "select s.mainId,s.mainSeq,s.typeId,s.typeSeq,m.typeName,m.hasIssue "
            . "from apps\\common\\entity\\AffirmativeSetting s "
            . "join apps\\common\\entity\\AffirmativeType m with m.typeId = s.typeId "
            . "where s.periodCode = :periodCode and s.groupCode = :groupCode "
            . "group by s.mainId,s.mainSeq,s.typeId,s.typeSeq,m.typeName,m.hasIssue "
            . "order by s.mainSeq,s.typeSeq";
        $paramType = array(
            "periodCode" => $this->getPeriod()->year,
            "groupCode" => $dataDept->activityCode
        );
        $typeData = $this->datacontext->getObject($sqlType, $paramType);
        foreach ($mainData as $keyMain => $valMain) {
            foreach ($typeData as $keyType => $valueType) {
                if ($valMain["mainSeq"] == $valueType["mainSeq"]) {
                    $mainData[$keyMain]["type"][$valueType["typeSeq"]] = $valueType;
                    $issueSql = "select v from apps\\common\\entity\\AffirmativeIssue v where v.typeId = :typeId  order by v.issueSeq";
                    $issueParam = array("typeId" => $valueType["typeId"]);
                    $issueData = $this->datacontext->getObject($issueSql, $issueParam);
                    $mainData[$keyMain]["type"][$valueType["typeSeq"]]["issue"] = $issueData;

                    if (array_key_exists($valueType["typeId"], $typeArr)) {
                        $mainData[$keyMain]["type"][$valueType["typeSeq"]]["kpi"] = $typeArr[$valueType["typeId"]];
                    }
                    $title = new \apps\common\entity\AffirmativeSetting();
                    $title->typeId = $valueType["typeId"];
                    $title->periodCode = $this->getPeriod()->year;
                    $title->mainId = $valMain["mainId"];
                    $title->groupCode = $dataDept->activityCode;
                    $title = $this->datacontext->getObject($title);
                    if (count($title) > 0) {
                        $mainData[$keyMain]["type"][$valueType["typeSeq"]]["title"] = $title[0]->title;
                    }
                    foreach ($issueData as $keyIssue => $valueIssue) {
                        $targetSql = "select v from apps\\common\\entity\\AffirmativeTarget v where v.issueId = :issueId  order by v.targetSeq";
                        $targetParam = array("issueId" => $valueIssue->issueId);
                        $targetData = $this->datacontext->getObject($targetSql, $targetParam);
                        $mainData[$keyMain]["type"][$valueType["typeSeq"]]["issue"][$keyIssue]->target = $targetData;
                        foreach ($targetData as $keyTarget => $valueTarget) {
                            if (array_key_exists($valueTarget->targetId, $targetArr)) {
                                $mainData[$keyMain]["type"][$valueType["typeSeq"]]["issue"][$keyIssue]->target[$keyTarget]->kpi = $targetArr[$valueTarget->targetId];
                            }
                        }
                    }
                }
            }
        }

        return $mainData;
    }

    public function result($result, $file)
    {
        $return = true;

        $check = new \apps\common\entity\AffirmativeResult();
        $check->finalId = $result["finalId"];
        $check->roundId = $result["roundId"];
        $dataCk = $this->datacontext->getObject($check);

        $hasFile = '';
        $fileReturn = '';
        if(count($dataCk) == 0){
            $check->detail = $result["detail"];
            $check->dividend = $result["dividend"];
            $check->divisor = $result["divisor"];
            $check->result = $result["result"];
            $check->score = $result["score"];
            $check->isSuccess = $result["isSuccess"];
            $check->remark = $result["remark"];

            if (!$this->datacontext->saveObject($check)) {
                $return = $this->datacontext->getLastMessage();
            }
        }
        else{
            $hasFile = $dataCk[0]->attachment;

            $fileReturn = $dataCk[0]->attachment;

            $dataCk[0]->detail = $result["detail"];
            $dataCk[0]->dividend = $result["dividend"];
            $dataCk[0]->divisor = $result["divisor"];
            $dataCk[0]->result = $result["result"];
            $dataCk[0]->score = $result["score"];
            $dataCk[0]->isSuccess = $result["isSuccess"];
            $dataCk[0]->remark = $result["remark"];

            if (!$this->datacontext->updateObject($dataCk[0])) {
                $return = $this->datacontext->getLastMessage();
            }
        }
        if($result["fileUpload"] == 1){
            $time = date("YmdHis");
            $target_dir = "apps\\affirmative\\views\\result\\";

            $update = new \apps\common\entity\AffirmativeResult();
            $update->finalId = $result["finalId"];
            $update->roundId = $result["roundId"];
            $data = $this->datacontext->getObject($update);

            if ($hasFile != "") {
                if (file_exists($target_dir . $hasFile)) {
                    unlink($target_dir . $hasFile);
                    $fileReturn = '';

                    $data[0]->attachment = '';

                    if (!$this->datacontext->updateObject($data[0])) {
                        $return = $this->datacontext->getLastMessage();
                    }
                }
            }

            if($file != "undefined") {
                $target_file = $target_dir . "RS" . $time . "-" . $file["name"];
                $fileN = "RS" . $time . "-" . $file["name"];

                if (move_uploaded_file($file["tmp_name"], $target_file)) {


                    $data[0]->attachment = $fileN;

                    if (!$this->datacontext->updateObject($data[0])) {
                        $return = $this->datacontext->getLastMessage();
                    }

                    $fileReturn = $fileN;
                }
            }
        }

        $this->getResponse()->add("filename", $fileReturn);
        return $return;
    }

    public function export($departmentId, $roundId){
        //style
        $center = array(
            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
        );

        $topLeft = array(
            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP
        );

        $topCenter = array(
            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP
        );
        $underline = array(
            'font' => array(
                'underline' => \PHPExcel_Style_Font::UNDERLINE_SINGLE
            )
        );

        $border = array(
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );

        $objPHPExcel = new \PHPExcel();
        $objWorkSheet = $objPHPExcel->createSheet(0);
        $objWorkSheet = $objPHPExcel->setActiveSheetIndex(0);
        $objWorkSheet = $objPHPExcel->getActiveSheet();


        $title = "Sheet 1";
        $objWorkSheet -> setTitle($title);

        $mp = new \apps\affirmative\model\ViewActivityDepartment();
        $mp->departmentId = $departmentId;
        $dept = $this->datacontext->getObject($mp)[0];

        //round detail
        $sql = "SELECT"
                ." rd.roundName"
            ." FROM apps\\common\\entity\\AffirmativeRound rd"
            ." WHERE rd.roundId = :round";
        $param = array(
            "round" => $roundId
        );
        $round =  $this->datacontext->getObject($sql, $param)[0];
        //return $round->roundName;

        $row = 1;
        $objWorkSheet->mergeCells('A1:N2')
            ->setCellValueByColumnAndRow(0, $row, "รายงานผลการดำเนินงานตัวชี้วัดคำรับรองการปฏิบัติงาน ประจำปีงบประมาณ พ.ศ.".$this->getPeriod()->year." ".$round["roundName"]."\n ประเภทส่วนงาน".$dept->activityName." : ".$dept->departmentName)
            ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($center)->setWrapText(true);

        $row =  3;
        $objWorkSheet->mergeCells('A'.$row.':A'.($row+2))->setCellValueByColumnAndRow(0, $row, "ตัวชี้วัดคำรับรอง ปี ".$this->getPeriod()->year)
            ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('B'.$row.':B'.($row+2))->setCellValueByColumnAndRow(1, $row, "หน่วยนับ")
            ->getStyleByColumnAndRow(1, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('C'.$row.':C'.($row+2))->setCellValueByColumnAndRow(2, $row, "ค่าเป้าหมาย\nตัวชี้วัด")
            ->getStyleByColumnAndRow(2, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('D'.$row.':H'.($row+1))->setCellValueByColumnAndRow(3, $row, "เกณฑ์การให้คะแนนผลลัพธ์ของตัวชี้วัด (ระดับคะแนน)")
            ->getStyleByColumnAndRow(3, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('I'.$row.':I'.($row+2))->setCellValueByColumnAndRow(8, $row, "รายละเอียดผลการดำเนินงาน\nตามตัวชี้วัด")
            ->getStyleByColumnAndRow(8, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('J'.$row.':M'.$row)->setCellValueByColumnAndRow(9, $row, "คำนวณผลการดำเนินงานตามตัวชี้วัด")
            ->getStyleByColumnAndRow(9, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('N'.$row.':N'.($row+2))->setCellValueByColumnAndRow(13, $row, "หมายเหตุ")
            ->getStyleByColumnAndRow(13, $row)->getAlignment()->applyFromArray($center);


        $row = 4;
        $objWorkSheet->setCellValueByColumnAndRow(9, $row, "ตัวตั้ง")
            ->getStyleByColumnAndRow(9, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('K'.$row.':K'.($row+1))->setCellValueByColumnAndRow(10, $row, "ผลลัพธ์ตัวชี้วัด")
            ->getStyleByColumnAndRow(10, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('L'.$row.':L'.($row+1))->setCellValueByColumnAndRow(11, $row, "ระดับคะแนน")
            ->getStyleByColumnAndRow(11, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('M'.$row.':M'.($row+1))->setCellValueByColumnAndRow(12, $row, "✔ = บรรลุ\n ✘ = ไม่บรรลุ")
            ->getStyleByColumnAndRow(12, $row)->getAlignment()->applyFromArray($center)->setWrapText(true);

        $row = 5;
        $objWorkSheet->setCellValueByColumnAndRow(3, $row, "คะแนน 1")
            ->getStyleByColumnAndRow(3, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->setCellValueByColumnAndRow(4, $row, "คะแนน 2")
            ->getStyleByColumnAndRow(4, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->setCellValueByColumnAndRow(5, $row, "คะแนน 3")
            ->getStyleByColumnAndRow(5, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->setCellValueByColumnAndRow(6, $row, "คะแนน 4")
            ->getStyleByColumnAndRow(6, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->setCellValueByColumnAndRow(7, $row, "คะแนน 5")
            ->getStyleByColumnAndRow(7, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->setCellValueByColumnAndRow(9, $row, "ตัวหาร")
            ->getStyleByColumnAndRow(9, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->getColumnDimensionByColumn(0)->setWidth(50);
        $objWorkSheet->getColumnDimensionByColumn(1)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(2)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(3)->setWidth(15);
        $objWorkSheet->getColumnDimensionByColumn(4)->setWidth(15);
        $objWorkSheet->getColumnDimensionByColumn(5)->setWidth(15);
        $objWorkSheet->getColumnDimensionByColumn(6)->setWidth(15);
        $objWorkSheet->getColumnDimensionByColumn(7)->setWidth(15);
        $objWorkSheet->getColumnDimensionByColumn(8)->setWidth(40);
        $objWorkSheet->getColumnDimensionByColumn(9)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(10)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(11)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(12)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(13)->setWidth(30);

        $data = $this->department($departmentId, $roundId);

        //return $data;

        $row = 6;
        foreach($data as $key => $value){
            $objWorkSheet->mergeCells('A'.$row.':J'.$row)
                ->setCellValueByColumnAndRow(0, $row, "ส่วนที่ ".$value["mainSeq"]." ".$value["mainName"])
                ->getStyleByColumnAndRow(0, $row)->applyFromArray($underline)->getAlignment()->applyFromArray($center);

            $row++;
            foreach($value["type"] as $key2 => $value2){
                $objWorkSheet->mergeCells('A'.$row.':J'.$row)
                    ->setCellValueByColumnAndRow(0, $row, "ส่วนที่ ".$value["mainSeq"].".".$value2["typeSeq"]." ".$value2["typeName"])
                    ->getStyleByColumnAndRow(0, $row)->applyFromArray($underline);

                $row++;
                if($value2["hasIssue"] == "Y") {
                    foreach ($value2["issue"] as $key3 => $value3) {
                        $objWorkSheet->mergeCells('A' . $row . ':J' . $row)
                            ->setCellValueByColumnAndRow(0, $row, "ประเด็นยุทธศาสตร์ที่ " . $value3->issueSeq . " " . $value3->issueName);

                        $row++;
                        foreach ($value3->target as $key4 => $value4) {
                            $objWorkSheet->mergeCells('A' . $row . ':J' . $row)
                                ->setCellValueByColumnAndRow(0, $row, "เป้าประสงค์ที่ " . $value3->issueSeq . "." . $value4->targetSeq . " " . $value4->targetName);

                            $row++;
                            if (is_array($value4->kpi) && count($value4->kpi) > 0) {
                                foreach ($value4->kpi as $key5 => $value5) {

                                    $rowIn = 0;
                                    if($value5["divisor"] != "") $rowIn = 1;

                                    $isSuccess = '';
                                    if($value5["isSuccess"] == "1") $isSuccess = "✔";
                                    elseif($value["isSuccess"] == "0") $isSuccess = "✘ = ไม่บรรลุ";

                                    $objWorkSheet->mergeCells('A'.$row.':A'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(0, $row, $value3->issueSeq . "." . $value4->targetSeq . "." . $value5["kpiSeq"] . " " . $value5["kpiName"])
                                        ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($topLeft)->setWrapText(true);

                                    $objWorkSheet->mergeCells('B'.$row.':B'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(1, $row, $value5["unitName"])
                                        ->getStyleByColumnAndRow(1, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('C'.$row.':C'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(2, $row, $value5["kpiGoal"])
                                        ->getStyleByColumnAndRow(2, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('D'.$row.':D'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(3, $row, $value5["score1"])
                                        ->getStyleByColumnAndRow(3, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('E'.$row.':E'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(4, $row, $value5["score2"])
                                        ->getStyleByColumnAndRow(4, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('F'.$row.':F'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(5, $row, $value5["score3"])
                                        ->getStyleByColumnAndRow(5, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('G'.$row.':G'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(6, $row, $value5["score4"])
                                        ->getStyleByColumnAndRow(6, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('H'.$row.':H'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(7, $row, $value5["score5"])
                                        ->getStyleByColumnAndRow(7, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('I'.$row.':I'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(8, $row, $value5["detail"])
                                        ->getStyleByColumnAndRow(8, $row)->getAlignment()->applyFromArray($topLeft);

                                    $objWorkSheet->setCellValueByColumnAndRow(9, $row, $value5["dividend"])
                                        ->getStyleByColumnAndRow(9, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('K'.$row.':K'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(10, $row, $value5["result"])
                                        ->getStyleByColumnAndRow(10, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('L'.$row.':L'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(11, $row, $value5["score"])
                                        ->getStyleByColumnAndRow(11, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('M'.$row.':M'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(12, $row, $isSuccess)
                                        ->getStyleByColumnAndRow(12, $row)->getAlignment()->applyFromArray($topCenter);

                                    $objWorkSheet->mergeCells('N'.$row.':N'.($row+$rowIn))
                                        ->setCellValueByColumnAndRow(13, $row, $value5["remark"])
                                        ->getStyleByColumnAndRow(13, $row)->getAlignment()->applyFromArray($topLeft);

                                    $row++;

                                    if($value5["divisor"] != ""){
                                        $objWorkSheet->setCellValueByColumnAndRow(9, $row, $value5["divisor"])
                                            ->getStyleByColumnAndRow(9, $row)->getAlignment()->applyFromArray($topCenter);
                                        $row++;
                                    }
                                }
                            }
                        }
                    }
                }
                elseif($value2["hasIssue"] == "N") {
                    //return isset($value2["kpi"]);
                    if(isset($value2["kpi"])) {
                        foreach ($value2["kpi"] as $key5 => $value5) {

                            $rowIn = 0;
                            if($value5["divisor"] != "") $rowIn = 1;

                            $isSuccess = '';
                            if($value5["isSuccess"] == "1") $isSuccess = "✔";
                            elseif($value["isSuccess"] == "0") $isSuccess = "✘ = ไม่บรรลุ";

                            $objWorkSheet->mergeCells('A'.$row.':A'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(0, $row, $value5["kpiSeq"]. ". " . $value5["kpiName"])
                                ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($topLeft)->setWrapText(true);

                            $objWorkSheet->mergeCells('B'.$row.':B'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(1, $row, $value5["unitName"])
                                ->getStyleByColumnAndRow(1, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('C'.$row.':C'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(2, $row, $value5["kpiGoal"])
                                ->getStyleByColumnAndRow(2, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('D'.$row.':D'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(3, $row, $value5["score1"])
                                ->getStyleByColumnAndRow(3, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('E'.$row.':E'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(4, $row, $value5["score2"])
                                ->getStyleByColumnAndRow(4, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('F'.$row.':F'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(5, $row, $value5["score3"])
                                ->getStyleByColumnAndRow(5, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('G'.$row.':G'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(6, $row, $value5["score4"])
                                ->getStyleByColumnAndRow(6, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('H'.$row.':H'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(7, $row, $value5["score5"])
                                ->getStyleByColumnAndRow(7, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('I'.$row.':I'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(8, $row, $value5["detail"])
                                ->getStyleByColumnAndRow(8, $row)->getAlignment()->applyFromArray($topLeft);

                            $objWorkSheet->setCellValueByColumnAndRow(9, $row, $value5["dividend"])
                                ->getStyleByColumnAndRow(9, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('K'.$row.':K'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(10, $row, $value5["result"])
                                ->getStyleByColumnAndRow(10, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('L'.$row.':L'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(11, $row, $value5["score"])
                                ->getStyleByColumnAndRow(11, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('M'.$row.':M'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(12, $row, $isSuccess)
                                ->getStyleByColumnAndRow(12, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->mergeCells('N'.$row.':N'.($row+$rowIn))
                                ->setCellValueByColumnAndRow(13, $row, $value5["remark"])
                                ->getStyleByColumnAndRow(13, $row)->getAlignment()->applyFromArray($topLeft);

                            $row++;

                            if($value5["divisor"] != ""){
                                $objWorkSheet->setCellValueByColumnAndRow(9, $row, $value5["divisor"])
                                    ->getStyleByColumnAndRow(9, $row)->getAlignment()->applyFromArray($topCenter);
                                $row++;
                            }

                        }
                    }
                }
            }
        }

        $objPHPExcel->getDefaultStyle()->getAlignment()->setWrapText(true);

        $objWorkSheet->getStyle('A1:N'.($row-1))->applyFromArray($border);


        //create excel file
        ob_clean();

        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=ตัวชี้วัดคำรับรองการปฏิบัติงาน_".$dept->departmentName."_".$this->getPeriod()->year.".xls");

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');

        ob_end_flush();
        exit();
    }
}
