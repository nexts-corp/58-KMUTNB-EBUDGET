<?php

namespace apps\actionplan\service;

use apps\actionplan\interfaces\ICenterService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class CenterService extends CServiceBase implements ICenterService {

    public $datacontext;
    public $logger;
    public $md = "apps\\affirmative\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function checkApprove() {
        $center = new \apps\common\entity\AffirmativeCenter();
        $center->periodCode = $this->getPeriod()->year;
        $data = $this->datacontext->getObject($center);
        // $center->isApprove = "Y";
        if (count($data) > 0) {
            if ($data[0]->isApprove == "N") {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return true;
        }
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->year = 2559;
        return $this->datacontext->getObject($year)[0];
    }

    function getGroup($centerGroupArr) {
        $sqlGroup = "SELECT"
                ." g.id, g.actTypeName AS groupName, g.actTypeCode AS groupCode"
            ." FROM ".$this->ent."\\ActivityType g"
            ." WHERE g.actTypeCode IN (:actTypeCode)";
        $paramGroup = array(
            "actTypeCode" => $centerGroupArr
        );
        return $this->datacontext->getObject($sqlGroup, $paramGroup);
    }

    function getUnit($unit) {
        $sqlUnit = "SELECT"
                ." g.unitId, g.unitName"
            ." FROM ".$this->ent."\\AffirmativeUnit g"
            ." WHERE g.unitId = :unitId";
        $paramUnit = array(
            "unitId" => $unit
        );
        return $this->datacontext->getObject($sqlUnit, $paramUnit)[0];
    }

    function sortBy($by, $arr) {
        $return = array();
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
        return $return;
    }

    function centerData(){
        $json = new CJSONDecodeImpl();
        //  $viewCenter = new \apps\actionplan\model\ViewAffirmativeCenter();
        $viewSql = "SELECT"
                ." v"
            ." FROM ".$this->md."\\ViewAffirmativeCenter v"
            ." WHERE v.periodCode = :periodCode"
            ." ORDER BY v.periodCode, v.mainSeq, v.typeSeq, v.issueSeq, v.targetSeq, v.kpiSeq ASC";
        $viewParam = array(
            "periodCode" => $this->getPeriod()->year
        );
        $centerData = $this->datacontext->getObject($viewSql, $viewParam);

        $typeArr = array();
        $targetArr = array();
        foreach ($centerData as $keyCenter => $valueCenter) {
            if ($valueCenter->centerId != NULL) {
                $center = $json->decode(new \apps\common\entity\AffirmativeCenter(), $valueCenter);
                $centerGroup = $json->decode(new \apps\common\entity\AffirmativeCenterGroup(), $valueCenter);
                $unit = $json->decode(new \apps\common\entity\AffirmativeUnit(), $valueCenter);
                $name = "";
                if ($valueCenter->hasIssue == "Y") {
                    if (empty($targetArr[$valueCenter->targetId][$valueCenter->centerId])) {
                        $targetArr[$valueCenter->targetId][$valueCenter->centerId] = $center;
                    }
                    $targetArr[$valueCenter->targetId][$valueCenter->centerId]->centerGroup[] = $centerGroup;
                    $targetArr[$valueCenter->targetId][$valueCenter->centerId]->unit = $unit;
                } elseif ($valueCenter->hasIssue == "N") {
                    if (empty($typeArr[$valueCenter->typeId][$valueCenter->centerId])) {
                        $typeArr[$valueCenter->typeId][$valueCenter->centerId] = $center;
                    }
                    $typeArr[$valueCenter->typeId][$valueCenter->centerId]->centerGroup[] = $centerGroup;
                    $typeArr[$valueCenter->typeId][$valueCenter->centerId]->unit = $unit;
                }
            }
        }
        $typeArr = $this->sortBy("kpiSeq", $typeArr);
        $targetArr = $this->sortBy("kpiSeq", $targetArr);

        $mainSql = "SELECT"
                ." v"
            ." FROM ".$this->ent."\\AffirmativeMain v"
            ." WHERE v.periodCode = :periodCode"
            ." ORDER BY v.mainSeq ASC";
        $mainParam = array("periodCode" => $this->getPeriod()->year);
        $mainData = $this->datacontext->getObject($mainSql, $mainParam);
        foreach ($mainData as $keyMain => $valueMain) {
            $typeSql = "SELECT"
                    ." v"
                ." FROM ".$this->ent."\\AffirmativeType v"
                ." WHERE v.mainId = :mainId"
                ." ORDER BY v.typeSeq ASC";
            $typeParam = array("mainId" => $valueMain->mainId);
            $typeData = $this->datacontext->getObject($typeSql, $typeParam);
            $mainData[$keyMain]->type = $typeData;
            foreach ($typeData as $keyType => $valueType) {
                $issueSql = "SELECT"
                        ." v"
                    ." FROM ".$this->ent."\\AffirmativeIssue v"
                    ." WHERE v.typeId = :typeId"
                    ." ORDER BY v.issueSeq ASC";
                $issueParam = array("typeId" => $valueType->typeId);
                $issueData = $this->datacontext->getObject($issueSql, $issueParam);
                $mainData[$keyMain]->type[$keyType]->issue = $issueData;
                if (array_key_exists($valueType->typeId, $typeArr)) {
                    $mainData[$keyMain]->type[$keyType]->kpi = $typeArr[$valueType->typeId];
                }
                foreach ($issueData as $keyIssue => $valueIssue) {
                    $targetSql = "SELECT"
                            ." v"
                        ." FROM ".$this->ent."\\AffirmativeTarget v"
                        ." WHERE v.issueId = :issueId"
                        ." ORDER BY v.targetSeq ASC";
                    $targetParam = array("issueId" => $valueIssue->issueId);
                    $targetData = $this->datacontext->getObject($targetSql, $targetParam);
                    $mainData[$keyMain]->type[$keyType]->issue[$keyIssue]->target = $targetData;
                    foreach ($targetData as $keyTarget => $valueTarget) {
                        if (array_key_exists($valueTarget->targetId, $targetArr)) {
                            $mainData[$keyMain]->type[$keyType]->issue[$keyIssue]->target[$keyTarget]->kpi = $targetArr[$valueTarget->targetId];
                        }
                    }
                }
            }
        }
        return $mainData;
    }

    public function listsAll() {
        if ($this->checkApprove()) {
            return $this->centerData();
        } else {
            return false;
        }
    }

    public function listsKpi($targetId) {
        $kpi = new \apps\common\entity\AffirmativeKpi();
        $kpi->targetId = $targetId;
        return $this->datacontext->getObject($kpi);
    }

    public function listsKpiByType($typeId) {
        $sql = "SELECT"
                ." ak"
            ." FROM ".$this->ent."\\AffirmativeKpi ak"
            ." JOIN ".$this->ent."\\AffirmativeTarget ag WITH ag.targetId = ak.targetId"
            ." JOIN ".$this->ent."\\AffirmativeIssue ai WITH ai.issueId = ag.issueId"
            ." JOIN ".$this->ent."\\AffirmativeType ap WITH ap.typeId = ai.typeId"
            ." WHERE ap.typeId = :typeId";
        $param = array(
            "typeId" => $typeId
        );
        return $this->datacontext->getObject($sql, $param);
    }

    public function listsUnit() {
        $unit = new \apps\common\entity\AffirmativeUnit();
        return $this->datacontext->getObject($unit);
    }

    public function insert($center) {
        $centerGroup = $center->centerGroup;
        $center->periodCode = $this->getPeriod()->year;
        $center->isApprove = "N";
        if ($center->typeId == 0) {
            $target = new \apps\common\entity\AffirmativeTarget();
            $target->targetId = $center->targetId;
            $issueId = $this->datacontext->getObject($target)[0]->issueId;

            $issue = new \apps\common\entity\AffirmativeIssue();
            $issue->issueId = $issueId;
            $center->typeId = $this->datacontext->getObject($issue)[0]->typeId;

        }
        if ($this->datacontext->saveObject($center)) {
            $centerId = $center->centerId;
            foreach ($centerGroup as $keyGroup => $groupCode) {
                $cGroup = new \apps\common\entity\AffirmativeCenterGroup();
                $cGroup->centerId = $centerId;
                $cGroup->groupCode = $groupCode;
                if (!$this->datacontext->saveObject($cGroup)) {
                    $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                    return false;
                }
            }
            $center->centerGroup = $this->getGroup($centerGroup);
            $center->unit = $this->getUnit($center->unitId);
        }
        else{
            return $this->datacontext->getLastMessage();
        }
        return $center;
    }

    public function update($center) {
        $centerGroupArr = $center->centerGroup;
        if ($this->datacontext->updateObject($center)) {
            $centerGroup = new \apps\common\entity\AffirmativeCenterGroup();
            $centerGroup->centerId = $center->centerId;
            $dataCenterGroup = $this->datacontext->getObject($centerGroup);
            if ($this->datacontext->removeObject($dataCenterGroup)) {
                foreach ($centerGroupArr as $keyGroup => $groupCode) {
                    $newCenterGroup = new \apps\common\entity\AffirmativeCenterGroup();
                    $newCenterGroup->centerId = $center->centerId;
                    $newCenterGroup->groupCode = $groupCode;
                    if (!$this->datacontext->saveObject($newCenterGroup)) {
                        $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                        return false;
                    }
                }
            } else {
                $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                return false;
            }
        } else {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        }
        $newCenter = new \apps\common\entity\AffirmativeCenter();
        $newCenter->centerId = $center->centerId;
        $center = $this->datacontext->getObject($newCenter)[0];
        $center->centerGroup = $this->getGroup($centerGroupArr);
        $center->unit = $this->getUnit($center->unitId);
        return $center;
    }

    public function delete($center) {
        if ($this->datacontext->removeObject($center)) {
            $centerGroup = new \apps\common\entity\AffirmativeCenterGroup();
            $centerGroup->centerId = $center->centerId;
            $data = $this->datacontext->getObject($centerGroup);
            if (!$this->datacontext->removeObject($data)) {
                $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                return false;
            } else {
                return true;
            }
        }
    }

    public function approve($status) {
        $center = new \apps\common\entity\AffirmativeCenter();
        $center->periodCode = $this->getPeriod()->year;
        $data = $this->datacontext->getObject($center);
        if (count($data) > 0) {
            $json = new CJSONDecodeImpl();
            foreach ($data as $key => $value) {
                $data[$key]->isApprove = $status;
            }
            if ($this->datacontext->updateObject($data) && $status == "Y") {
                $sql = "INSERT INTO Affirmative_Draft(
                        PeriodCode, DepartmentId,
                        AffirmativeMainId, AffirmativeMainSeq,
                        AffirmativeTypeId, AffirmativeTypeSeq,
                        HasIssue, AffirmativeIssueId, AffirmativeIssueSeq,
                        AffirmativeTargetId, AffirmativeTargetSeq,
                        AffirmativeKpiId, AffirmativeKpiSeq, AffirmativeKpiName,
                        AffirmativeUnitId, AffirmativeUnitName, KpiGoal,
                        Score1, Score2, Score3, Score4, Score5,
                        Remark, IsApprove, IsCenter, IsActive
                    )
                    SELECT
                        PeriodCode, DepartmentId,
                        MainId, MainSeq,
                        TypeId, TypeSeq,
                        HasIssue, IssueId, IssueSeq,
                        TargetId, TargetSeq,
                        KpiId, KpiSeq, KpiName,
                        UnitId, UnitName, KpiGoal,
                        Score1, Score2, Score3, Score4, Score5,
                        Remark, 'N', 'Y', 'Y'
                    FROM View_Setting_Center WHERE PeriodCode = :year";

                $param = array(
                    "year" => $this->getPeriod()->year
                );

                $this->datacontext->pdoQuery($sql, $param);
                /*$view = new \apps\actionplan\model\ViewSettingCenter();
                $view->periodCode = $this->getPeriod()->year;
                $data = $this->datacontext->getObject($view);
                foreach ($data as $key => $value) {
                    $data[$key]->isApprove = "N";
                    $data[$key]->isCenter = "Y";
                    $data[$key]->isActive = "Y";
                }
                $draft = $json->decode(new \apps\common\entity\AffirmativeDraft(), $data);
                /*if (!$this->datacontext->saveObject($draft)) {
                    $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                    return false;
                }*/
            } elseif ($status == "N") {
                $data = $this->datacontext->getObject(new \apps\common\entity\AffirmativeDraft());
                $this->datacontext->removeObject($data);
            } else {
                $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                return false;
            }
        }
        return true;
    }

    public function export(){
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

        $row = 1;
        $objWorkSheet->mergeCells('A1:D2')
            ->setCellValueByColumnAndRow(0, $row, "ตัวชี้วัดคำรับรองการปฏิบัติงาน ประจำปีงบประมาณ พ.ศ.".$this->getPeriod()->year." ของส่วนงานภายในมหาวิทยาลัย")
            ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($center);

        $columnT = ["ตัวชี้วัดคำรับรอง ปี ".$this->getPeriod()->year, "หน่วยนับตัวชี้วัด" , "ประเภทส่วนงานที่ดำเนินการ", "หมายเหตุ"];

        $row =  3;
        foreach($columnT as $col => $val){
            if($col == 0) $width = 50;
            elseif($col == 1) $width = 20;
            elseif($col == 2) $width = 30;
            elseif($col == 3) $width = 30;

            $objWorkSheet->getColumnDimensionByColumn($col)->setWidth($width);
            $objWorkSheet->setCellValueByColumnAndRow($col, $row, $val)->getStyleByColumnAndRow($col, $row)->getAlignment()->applyFromArray($center);
        }

        $data = $this->centerData();

        $row = 4;
        foreach($data as $key => $value){
            $objWorkSheet->mergeCells('A'.$row.':D'.$row)
                ->setCellValueByColumnAndRow(0, $row, "ส่วนที่ ".$value->mainSeq." ".$value->mainName)
                ->getStyleByColumnAndRow(0, $row)->applyFromArray($underline)->getAlignment()->applyFromArray($center);

            $row++;
            foreach($value->type as $key2 => $value2){
                $objWorkSheet->mergeCells('A'.$row.':D'.$row)
                    ->setCellValueByColumnAndRow(0, $row, "ส่วนที่ ".$value->mainSeq.".".$value2->typeSeq." ".$value2->typeName)
                    ->getStyleByColumnAndRow(0, $row)->applyFromArray($underline);

                $row++;
                if($value2->hasIssue == "Y") {
                    foreach ($value2->issue as $key3 => $value3) {
                        $objWorkSheet->mergeCells('A' . $row . ':D' . $row)
                            ->setCellValueByColumnAndRow(0, $row, "ประเด็นยุทธศาสตร์ที่ " . $value3->issueSeq . " " . $value3->issueName);

                        $row++;
                        foreach ($value3->target as $key4 => $value4) {
                            $objWorkSheet->mergeCells('A' . $row . ':D' . $row)
                                ->setCellValueByColumnAndRow(0, $row, "เป้าประสงค์ที่ " . $value3->issueSeq . "." . $value4->targetSeq . " " . $value4->targetName);

                            $row++;
                            if (isset($value4->kpi) && count($value4->kpi) > 0) {
                                foreach ($value4->kpi as $key5 => $value5) {

                                    $objWorkSheet->setCellValueByColumnAndRow(0, $row, $value3->issueSeq . "." . $value4->targetSeq . "." . $value5->kpiSeq . " " . $value5->kpiName)
                                        ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($topLeft)->setWrapText(true);

                                    $objWorkSheet->setCellValueByColumnAndRow(1, $row, $value5->unit->unitName)
                                        ->getStyleByColumnAndRow(1, $row)->getAlignment()->applyFromArray($topCenter);

                                    $group = [];
                                    foreach ($value5->centerGroup as $key6 => $value6) {
                                        $group[] = "- " . $value6->groupName;
                                    }

                                    $objWorkSheet->setCellValueByColumnAndRow(2, $row, implode("\n", $group))
                                        ->getStyleByColumnAndRow(2, $row)->getAlignment()->applyFromArray($topLeft)->setWrapText(true);

                                    $objWorkSheet->setCellValueByColumnAndRow(3, $row, $value5->remark)
                                        ->getStyleByColumnAndRow(3, $row)->getAlignment()->applyFromArray($topLeft);


                                    $row++;
                                }
                            }
                        }
                    }
                }
                elseif($value2->hasIssue == "N") {
                    //return isset($value2["kpi"]);
                    if(isset($value2->kpi)) {
                        foreach ($value2->kpi as $key5 => $value5) {

                            $objWorkSheet->setCellValueByColumnAndRow(0, $row, $value5->kpiSeq. ". " . $value5->kpiName)
                                ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($topLeft)->setWrapText(true);

                            $objWorkSheet->setCellValueByColumnAndRow(1, $row, $value5->unitName)
                                ->getStyleByColumnAndRow(1, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->setCellValueByColumnAndRow(2, $row, $value5->kpiGoal)
                                ->getStyleByColumnAndRow(2, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->setCellValueByColumnAndRow(3, $row, $value5->score1)
                                ->getStyleByColumnAndRow(3, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->setCellValueByColumnAndRow(4, $row, $value5->score2)
                                ->getStyleByColumnAndRow(4, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->setCellValueByColumnAndRow(5, $row, $value5->score3)
                                ->getStyleByColumnAndRow(5, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->setCellValueByColumnAndRow(6, $row, $value5->score4)
                                ->getStyleByColumnAndRow(6, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->setCellValueByColumnAndRow(7, $row, $value5->score5)
                                ->getStyleByColumnAndRow(7, $row)->getAlignment()->applyFromArray($topCenter);

                            $objWorkSheet->setCellValueByColumnAndRow(8, $row, $value5->remark)
                                ->getStyleByColumnAndRow(8, $row)->getAlignment()->applyFromArray($topLeft);

                            $row++;
                        }
                    }
                }
            }
        }



        $objPHPExcel->getDefaultStyle()->getAlignment()->setWrapText(true);
        $objWorkSheet->getStyle('A1:D'.($row-1))->applyFromArray($border);

        //create excel file
        ob_clean();

        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=ตัวชี้วัดคำรับรองการปฏิบัติงาน_ส่วนงานภายในมหาวิทยาลัย_".$this->getPeriod()->year.".xls");

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');

        ob_end_flush();
        exit();
    }


}