<?php

namespace apps\affirmative\service;

use apps\affirmative\interfaces\IFinalService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class FinalService extends CServiceBase implements IFinalService {

    public $datacontext;
    public $logger;

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function checkApprove($departmentId) {
        $final = new \apps\affirmative\entity\AffirmativeFinal();
        $final->periodCode = $this->getPeriod()->year;
        $final->departmentId = $departmentId;
        $final->isApprove = 'Y';
        $data = $this->datacontext->getObject($final);
        if (count($data) > 0) {
            return false;
        } else {
            return true;
        }
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    function getGroup($group) {
        $sqlGroupl = "select g.id,g.actTypeName,g.actTypeCode from apps\\common\\entity\\ActivityType g "
                . " where g.actTypeCode in (:actTypeCode) ";
        $paramGroup = array(
            "actTypeCode" => $group
        );
        return $this->datacontext->getObject($sqlGroupl, $paramGroup);
    }

    function getUnit($unit) {
        $sqlUnit = "select g.unitId,g.unitName from apps\\affirmative\\entity\\AffirmativeUnit g "
                . " where g.unitId = :unitId ";
        $paramUnit = array(
            "unitId" => $unit
        );
        return $this->datacontext->getObject($sqlUnit, $paramUnit)[0];
    }

    public function listsDept() {
        $sql = "select r from apps\\affirmative\\model\\ViewActivityDepartment r order by r.activityCode";
        $dept = $this->datacontext->getObject($sql);
        $periodCode = $this->getPeriod()->year;

        $group = array();
        $actKey = array();

        foreach ($dept as $keyDept => $valDept) {
            $draft = new \apps\affirmative\entity\AffirmativeDraft();
            $draft->periodCode = $periodCode;
            $draft->departmentId = $valDept->departmentId;
            $draft->isActive = "Y";
            $get = $this->datacontext->getObject($draft);
            if (count($get) > 0) {
                $status = "Y";
            } else {
                $status = "N";
            }
            foreach ($get as $keyGet => $valGet) {
                if ($valGet->isApprove == "N") {
                    $status = "N";
                }
            }
            $dept[$keyDept]->statusDept = $status;

            $final = new \apps\affirmative\entity\AffirmativeFinal();
            $final->periodCode = $periodCode;
            $final->departmentId = $valDept->departmentId;
            $final->isActive = "Y";
            $get = $this->datacontext->getObject($final);
            if (count($get) > 0) {
                $status = "Y";
            } else {
                $status = "N";
            }
            foreach ($get as $keyGet => $valGet) {
                if ($valGet->isApprove == "N") {
                    $status = "N";
                }
            }
            $dept[$keyDept]->statusFinal = $status;

            $actKey[$valDept->activityId] = $valDept->activityName;

            $group[$valDept->activityId][] = $dept[$keyDept];
        }

        $result = array();

        foreach($group as $key => $value){
            $result[] = array(
                "actId" => $key,
                "actName" => $actKey[$key],
                "dept" => $value
            );
        }

        return $result;
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

    function finalData($departmentId){
        $json = new CJSONDecodeImpl();
        $dept = new \apps\affirmative\model\ViewActivityDepartment();
        $dept->departmentId = $departmentId;
        $dataDept = $this->datacontext->getObject($dept)[0];

        $typeArr = array();
        $targetArr = array();
        $final = new \apps\affirmative\entity\AffirmativeFinal();
        $final->periodCode = $this->getPeriod()->year;
        $final->departmentId = $departmentId;
        $finalData = $this->datacontext->getObject($final);
        foreach ($finalData as $keyFinal => $valueFinal) {
            if ($valueFinal->hasIssue == "Y") {
                if (empty($targetArr[$valueFinal->targetId][$valueFinal->finalId])) {
                    $targetArr[$valueFinal->targetId][$valueFinal->finalId] = $valueFinal;
                }
            } elseif ($valueFinal->hasIssue == "N") {
                if (empty($typeArr[$valueFinal->typeId][$valueFinal->finalId])) {
                    $typeArr[$valueFinal->typeId][$valueFinal->finalId] = $valueFinal;
                }
            }
        }
        $targetArr = $this->sortBy("kpiSeq", $targetArr);
        $typeArr = $this->sortBy("kpiSeq", $typeArr);

        $sqlMain = "select s.mainId,s.mainSeq,m.mainName "
            . "from apps\\affirmative\\entity\\AffirmativeSetting s "
            . "join apps\\affirmative\\entity\\AffirmativeMain m with m.mainId = s.mainId "
            . "where s.periodCode = :periodCode and s.groupCode = :groupCode "
            . "group by s.mainId,s.mainSeq,m.mainName "
            . "order by s.mainSeq";
        $paramMain = array(
            "periodCode" => $this->getPeriod()->year,
            "groupCode" => $dataDept->activityCode
        );
        $mainData = $this->datacontext->getObject($sqlMain, $paramMain);
        $sqlType = "select s.mainId,s.mainSeq,s.typeId,s.typeSeq,m.typeName,m.hasIssue "
            . "from apps\\affirmative\\entity\\AffirmativeSetting s "
            . "join apps\\affirmative\\entity\\AffirmativeType m with m.typeId = s.typeId "
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
                    $issueSql = "select v from apps\\affirmative\\entity\\AffirmativeIssue v where v.typeId = :typeId  order by v.issueSeq";
                    $issueParam = array("typeId" => $valueType["typeId"]);
                    $issueData = $this->datacontext->getObject($issueSql, $issueParam);
                    $mainData[$keyMain]["type"][$valueType["typeSeq"]]["issue"] = $issueData;

                    if (array_key_exists($valueType["typeId"], $typeArr)) {
                        $mainData[$keyMain]["type"][$valueType["typeSeq"]]["kpi"] = $typeArr[$valueType["typeId"]];
                    }
                    $title = new \apps\affirmative\entity\AffirmativeSetting();
                    $title->typeId = $valueType["typeId"];
                    $title->periodCode = $this->getPeriod()->year;
                    $title->mainId = $valMain["mainId"];
                    $title->groupCode = $dataDept->activityCode;
                    $title = $this->datacontext->getObject($title);
                    if (count($title) > 0) {
                        $mainData[$keyMain]["type"][$valueType["typeSeq"]]["title"] = $title[0]->title;
                    }
                    foreach ($issueData as $keyIssue => $valueIssue) {
                        $targetSql = "select v from apps\\affirmative\\entity\\AffirmativeTarget v where v.issueId = :issueId  order by v.targetSeq";
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

    public function listsAll($departmentId) {
        if ($this->checkApprove($departmentId)) {
            return $this->finalData($departmentId);
        } else {
            return false;
        }
    }

    public function insert($final) {
        $dept = new \apps\affirmative\model\ViewActivityDepartment();
        $dept->departmentId = $final->departmentId;
        $deptData = $this->datacontext->getObject($dept)[0];
        if ($final->typeId == 0) {
            $target = new \apps\affirmative\entity\AffirmativeTarget();
            $target->targetId = $final->targetId;
            $targetData = $this->datacontext->getObject($target)[0];
            $final->targetSeq = $targetData->targetSeq;

            $issue = new \apps\affirmative\entity\AffirmativeIssue();
            $issue->issueId = $targetData->issueId;
            $issueData = $this->datacontext->getObject($issue)[0];
            $final->issueId = $issueData->issueId;
            $final->issueSeq = $issueData->issueSeq;

            $final->typeId = $issueData->typeId;
            $final->hasIssue = "Y";
        } else {
            $final->hasIssue = "N";
        }
        $setting = new \apps\affirmative\entity\AffirmativeSetting();
        $setting->typeId = $final->typeId;
        $setting->groupCode = $deptData->activityCode;
        $setting->periodCode = $this->getPeriod()->year;
        $settingData = $this->datacontext->getObject($setting)[0];
        $final->mainId = $settingData->mainId;
        $final->mainSeq = $settingData->mainSeq;
        $final->typeId = $settingData->typeId;
        $final->typeSeq = $settingData->typeSeq;

        $final->periodCode = $this->getPeriod()->year;
        $final->isApprove = "N";
        $final->draftId = 0;
        $final->unitName = $this->getUnit($final->unitId)["unitName"];
        if (!$this->datacontext->saveObject($final)) {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        } else {
            return $final;
        }
    }

    public function update($final) {
        if ($this->datacontext->updateObject($final)) {
            return $this->datacontext->getObject($final)[0];
        } else {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        }
    }

    public function delete($final) {
        $get = new \apps\affirmative\entity\AffirmativeFinal();
        $get->finalId = $final->finalId;
        $data = $this->datacontext->getObject($get)[0];
        if ($data->draftId != 0) {
            $draft = new \apps\affirmative\entity\AffirmativeDraft();
            $draft->draftId = $data->draftId;
            $data = $this->datacontext->getObject($draft)[0];
            $data->isApprove = "N";
            if (!$this->datacontext->updateObject($data)) {
                $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                return false;
            }
        }
        if ($this->datacontext->removeObject($final)) {
            return true;
        } else {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        }
    }

    public function approve($departmentId, $status) {
        $json = new CJSONDecodeImpl();
        $final = new \apps\affirmative\entity\AffirmativeFinal();
        $final->periodCode = $this->getPeriod()->year;
        $final->departmentId = $departmentId;
        $final->isActive = "Y";
        $dataFinal = $this->datacontext->getObject($final);
        foreach ($dataFinal as $keyFinal => $valFinal) {
            $dataFinal[$keyFinal]->isApprove = $status;
        }
        if (!$this->datacontext->updateObject($dataFinal)) {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        } else {
            return true;
        }
    }

    public function export($departmentId){
        //style
        $center = array(
            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
        );

        $topLeft = array(
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

        $objPHPExcel = new \PHPExcel();
        $objWorkSheet = $objPHPExcel->createSheet(0);
        $objWorkSheet = $objPHPExcel->setActiveSheetIndex(0);
        $objWorkSheet = $objPHPExcel->getActiveSheet();

        $title = "Sheet 1";
        $objWorkSheet -> setTitle($title);

        $mp = new \apps\affirmative\model\ViewActivityDepartment();
        $mp->departmentId = $departmentId;
        $dept = $this->datacontext->getObject($mp)[0];

        //last year
        $sql = "SELECT"
                ." yr.year"
            ." FROM apps\\common\\entity\\Year yr"
            ." WHERE yr.year < :year"
            ." ORDER BY yr.year DESC";
        $param = array(
            "year" => $this->getPeriod()->year
        );
        $lastYear =  $this->datacontext->getObject($sql, $param, 1)[0];
       //return $lastYear;

        $row = 1;
        $objWorkSheet->mergeCells('A1:J2')
            ->setCellValueByColumnAndRow(0, $row, "ตัวชี้วัดคำรับรองการปฏิบัติงาน ประจำปีงบประมาณ พ.ศ.".$this->getPeriod()->year."\n ประเภทส่วนงาน".$dept->activityName." : ".$dept->departmentName)
            ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($center)->setWrapText(true);

        $row =  3;
        $objWorkSheet->mergeCells('A'.$row.':A'.($row+1))->setCellValueByColumnAndRow(0, $row, "ตัวชี้วัดคำรับรอง ปี ".$this->getPeriod()->year)
            ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('B'.$row.':B'.($row+1))->setCellValueByColumnAndRow(1, $row, "หน่วยนับ")
            ->getStyleByColumnAndRow(1, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('C'.$row.':C'.($row+1))->setCellValueByColumnAndRow(2, $row, "ผลลัพธ์\nปี ".$lastYear["year"])
            ->getStyleByColumnAndRow(2, $row)->getAlignment()->applyFromArray($center)->setWrapText(true);

        $objWorkSheet->mergeCells('D'.$row.':D'.($row+1))->setCellValueByColumnAndRow(3, $row, "ค่าเป้าหมาย\nตัวชี้วัด")
            ->getStyleByColumnAndRow(3, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('E'.$row.':I'.$row)->setCellValueByColumnAndRow(4, $row, "เกณฑ์การให้คะแนนผลลัพธ์ของตัวชี้วัด (ระดับคะแนน)")
            ->getStyleByColumnAndRow(4, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('J'.$row.':J'.($row+1))->setCellValueByColumnAndRow(9, $row, "หมายเหตุ")
            ->getStyleByColumnAndRow(9, $row)->getAlignment()->applyFromArray($center);

        $row = 4;
        $objWorkSheet->setCellValueByColumnAndRow(4, $row, "คะแนน 1")
            ->getStyleByColumnAndRow(4, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->setCellValueByColumnAndRow(5, $row, "คะแนน 2")
            ->getStyleByColumnAndRow(5, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->setCellValueByColumnAndRow(6, $row, "คะแนน 3")
            ->getStyleByColumnAndRow(6, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->setCellValueByColumnAndRow(7, $row, "คะแนน 4")
            ->getStyleByColumnAndRow(7, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->setCellValueByColumnAndRow(8, $row, "คะแนน 5")
            ->getStyleByColumnAndRow(8, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->getColumnDimensionByColumn(0)->setWidth(50);
        $objWorkSheet->getColumnDimensionByColumn(1)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(2)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(3)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(4)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(5)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(6)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(7)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(8)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(9)->setWidth(30);

        $data = $this->finalData($departmentId);

        //return $data;

        $row = 5;
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
                foreach($value2["issue"] as $key3 => $value3){
                    $objWorkSheet->mergeCells('A'.$row.':J'.$row)
                        ->setCellValueByColumnAndRow(0, $row, "ประเด็นยุทธศาสตร์ที่ ".$value3->issueSeq." ".$value3->issueName);

                    $row++;
                    foreach($value3->target as $key4 => $value4){
                        $objWorkSheet->mergeCells('A'.$row.':J'.$row)
                            ->setCellValueByColumnAndRow(0, $row, "เป้าประสงค์ที่ ".$value3->issueSeq.".".$value4->targetSeq." ".$value4->targetName);

                        $row++;
                        if(is_array( $value4->kpi) && count( $value4->kpi ) > 0 ) {
                            foreach ($value4->kpi as $key5 => $value5) {

                                $objWorkSheet->setCellValueByColumnAndRow(0, $row, $value3->issueSeq . "." . $value4->targetSeq . "." . $value5->kpiSeq . " " . $value5->kpiName)
                                    ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($topLeft)->setWrapText(true);

                                $objWorkSheet->setCellValueByColumnAndRow(1, $row, $value5->unitName)
                                    ->getStyleByColumnAndRow(1, $row)->getAlignment()->applyFromArray($topCenter);

                                $objWorkSheet->setCellValueByColumnAndRow(3, $row, $value5->kpiGoal)
                                    ->getStyleByColumnAndRow(3, $row)->getAlignment()->applyFromArray($topCenter);

                                $objWorkSheet->setCellValueByColumnAndRow(4, $row, $value5->score1)
                                    ->getStyleByColumnAndRow(4, $row)->getAlignment()->applyFromArray($topCenter);

                                $objWorkSheet->setCellValueByColumnAndRow(5, $row, $value5->score2)
                                    ->getStyleByColumnAndRow(5, $row)->getAlignment()->applyFromArray($topCenter);

                                $objWorkSheet->setCellValueByColumnAndRow(6, $row, $value5->score3)
                                    ->getStyleByColumnAndRow(6, $row)->getAlignment()->applyFromArray($topCenter);

                                $objWorkSheet->setCellValueByColumnAndRow(7, $row, $value5->score4)
                                    ->getStyleByColumnAndRow(7, $row)->getAlignment()->applyFromArray($topCenter);

                                $objWorkSheet->setCellValueByColumnAndRow(8, $row, $value5->score5)
                                    ->getStyleByColumnAndRow(8, $row)->getAlignment()->applyFromArray($topCenter);

                                $objWorkSheet->setCellValueByColumnAndRow(9, $row, $value5->remark)
                                    ->getStyleByColumnAndRow(9, $row)->getAlignment()->applyFromArray($topLeft);

                                $row++;
                            }
                        }
                    }
                }
            }
        }

        $objPHPExcel->getDefaultStyle()->getAlignment()->setWrapText(true);

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
