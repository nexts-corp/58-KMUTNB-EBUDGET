<?php

namespace apps\actionplan\service;

use apps\actionplan\interfaces\IDraftService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class DraftService extends CServiceBase implements IDraftService {

    public $datacontext;
    public $logger;

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function checkApprove($departmentId) {
        $final = new \apps\common\entity\AffirmativeFinal();
        $final->periodCode = $this->getPeriod()->year;
        $final->departmentId = $departmentId;
        $data = $this->datacontext->getObject($final);
        if (count($data) > 0) {
            return false;
        } else {
            return true;
        }
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->year = 2559;
        return $this->datacontext->getObject($year)[0];
    }

    function getGroup($centerGroupArr) {
        $sqlGroup = "select g.id,g.actTypeName,g.actTypeCode from apps\\common\\entity\\ActivityType g "
                . " where g.actTypeCode in (:actTypeCode) ";
        $paramGroup = array(
            "actTypeCode" => $centerGroupArr
        );
        return $this->datacontext->getObject($sqlGroup, $paramGroup);
    }

    function getUnit($unit) {
        $sqlUnit = "select g.unitId,g.unitName from apps\\common\\entity\\AffirmativeUnit g "
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
            $draft = new \apps\common\entity\AffirmativeDraft();
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
            $dept[$keyDept]->status = $status;

            $actKey[$valDept->activityId] = $valDept->activityName;

            $group[$valDept->activityId][] = $dept[$keyDept];
        }

        $result = array();

        foreach ($group as $key => $value) {
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

    function draftData($departmentId, $typeId) {
        $json = new CJSONDecodeImpl();
        $dept = new \apps\actionplan\model\ViewActivityDepartment();
        $dept->departmentId = $departmentId;
        $dataDept = $this->datacontext->getObject($dept)[0];
        //ข้อมูลที่มีอยู่แล้วใน Draft
        $strategyArr = array();
        $draft = new \apps\common\entity\ActionPlanDraft();
        $draft->periodCode = $this->getPeriod()->year;
        $draft->departmentId = $departmentId;
        $draft->typeId = $typeId;
        $draftData = $this->datacontext->getObject($draft);

        foreach ($draftData as $keyDraft => $valueDraft) {
            if (empty($strategyArr[$valueDraft->strategyId][$valueDraft->draftId])) {
                $detailSql = "select v from apps\\common\\entity\\ActionPlanDetail v where v.draftId = :draftId  order by v.detailSeq";
                $detailParam = array("draftId" => $valueDraft->draftId);
                $detailData = $this->datacontext->getObject($detailSql, $detailParam);
                $valueDraft->detail = $detailData;
                $strategyArr[$valueDraft->strategyId][$valueDraft->draftId] = $valueDraft;
            }
        }
        $strategyArr = $this->sortBy("projectSeq", $strategyArr);
        //--ข้อมูลใน draft
        // return $strategyArr;

        $type = new \apps\common\entity\AffirmativeType();
        $type->typeId = $typeId;
        $typeData = $this->datacontext->getObject($type);

        $issueSql = "select v from apps\\common\\entity\\AffirmativeIssue v where v.typeId = :typeId  order by v.issueSeq";
        $issueParam = array("typeId" => $typeId);
        $typeData[0]->issue = $this->datacontext->getObject($issueSql, $issueParam);
        foreach ($typeData[0]->issue as $keyIssue => $valueIssue) {
            $targetSql = "select v from apps\\common\\entity\\AffirmativeTarget v where v.issueId = :issueId  order by v.targetSeq";
            $targetParam = array("issueId" => $valueIssue->issueId);
            $targetData = $this->datacontext->getObject($targetSql, $targetParam);
            $typeData[0]->issue[$keyIssue]->target = $targetData;
            foreach ($typeData[0]->issue[$keyIssue]->target as $keyTarget => $valueTarget) {
                $strategySql = "select v from apps\\common\\entity\\AffirmativeStrategy v where v.targetId = :targetId  order by v.strategySeq";
                $strategyParam = array("targetId" => $valueTarget->targetId);
                $strategyData = $this->datacontext->getObject($strategySql, $strategyParam);
                $typeData[0]->issue[$keyIssue]->target[$keyTarget]->strategy = $strategyData;
                foreach ($typeData[0]->issue[$keyIssue]->target[$keyTarget]->strategy as $keyStrategy => $valueStrategy) {
                    if (array_key_exists($valueStrategy->strategyId, $strategyArr)) {
                        $typeData[0]->issue[$keyIssue]->target[$keyTarget]->strategy[$keyStrategy]->draft = $strategyArr[$valueStrategy->strategyId];
                    }
                }
//                
            }
        }

        return $typeData;
    }

    public function listsAll($departmentId, $typeId) {
        // if ($this->checkApprove($departmentId)) {
        return $this->draftData($departmentId, $typeId);
//        } else {
//            return false;
//        }
    }

    public function insert($draft) {
        //$draft->periodCode = $this->getPeriod()->year;
        $draft->isApprove = "N";
        $json = new \th\co\bpg\cde\collection\impl\CJSONDecodeImpl();
        $type = "";
        if (isset($draft->draftId)) {
            $draft = $json->decode(new \apps\common\entity\ActionPlanDetail(), $draft);
            $type = "detail";
        } else {
            $draft = $json->decode(new \apps\common\entity\ActionPlanDraft(), $draft);
            $type = "draft";
        }
        //  return $draft;
        if (!$this->datacontext->saveObject($draft)) {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        } else {
            $this->getResponse()->add("type", $type);
            return $draft;
        }
    }

    public function update($draft) {
        //$draft->isApprove = "N";
        $json = new \th\co\bpg\cde\collection\impl\CJSONDecodeImpl();
        $type = "";
        if (isset($draft->detailId)) {
            $draft = $json->decode(new \apps\common\entity\ActionPlanDetail(), $draft);
            $type = "detail";
        } else {
            $draft = $json->decode(new \apps\common\entity\ActionPlanDraft(), $draft);
            $type = "draft";
        }
        //return $draft;
        if (!$this->datacontext->updateObject($draft)) {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        } else {
            $this->getResponse()->add("type", $type);
//            if ($type == "draft") {
//                $draft = $this->datacontext->getObject($draft)[0];
//                $detail = new \apps\common\entity\ActionPlanDetail();
//                $detail->draftId = $draft->draftId;
//                $draft->detail = $this->datacontext->getObject($detail);
//            } else {
//                return $this->datacontext->getObject($draft)[0];
//            }
            return $this->datacontext->getObject($draft)[0];
        }
    }

    public function delete($draft) {
        $json = new \th\co\bpg\cde\collection\impl\CJSONDecodeImpl();
        $type = "";
        if (isset($draft->detailId)) {
            $draft = $json->decode(new \apps\common\entity\ActionPlanDetail(), $draft);
            $type = "detail";
        } else {
            $draft = $json->decode(new \apps\common\entity\ActionPlanDraft(), $draft);
            $type = "draft";
        }
        //return $draft;
        if (!$this->datacontext->removeObject($draft)) {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        } else {
            $this->getResponse()->add("type", $type);
            return $draft;
        }
    }

    public function approve($departmentId, $status) {
        $json = new CJSONDecodeImpl();
        $draft = new \apps\common\entity\AffirmativeDraft();
        $draft->periodCode = $this->getPeriod()->year;
        $draft->departmentId = $departmentId;
        $draft->isActive = "Y";
        $dataDraft = $this->datacontext->getObject($draft);
        if ($status == "Y") {
            $check = true;
            foreach ($dataDraft as $keyDraft => $valueDraft) {
                if ($valueDraft->kpiGoal != NULL && $valueDraft->score1 != NULL && $valueDraft->score2 != NULL && $valueDraft->score3 != NULL && $valueDraft->score4 != NULL && $valueDraft->score5 != NULL && $valueDraft->isApprove != "Y") {
                    $dataDraft[$keyDraft]->isApprove = $status;
                } else {
                    $check = false;
                    $this->getResponse()->add('msg', 'ข้อมูลตัวชี้วัดไม่ครบถ้วน');
                    return false;
                }
            }
            if ($check == true) {
                if ($this->datacontext->updateObject($dataDraft)) {
                    $sql = "INSERT INTO Affirmative_Final(
                            PeriodCode, AffirmativeDraftId, DepartmentId,
                            AffirmativeMainId, AffirmativeMainSeq,
                            AffirmativeTypeId, AffirmativeTypeSeq,
                            HasIssue, AffirmativeIssueId, AffirmativeIssueSeq,
                            AffirmativeTargetId, AffirmativeTargetSeq,
                            AffirmativeKpiId, AffirmativeKpiSeq, AffirmativeKpiName,
                            AffirmativeUnitId, AffirmativeUnitName,
                            KpiGoal, Score1, Score2, Score3, Score4, Score5,
                            Remark, IsApprove, IsActive
                        )
                        SELECT
                            PeriodCode, AffirmativeDraftId, DepartmentId,
                            AffirmativeMainId, AffirmativeMainSeq,
                            AffirmativeTypeId, AffirmativeTypeSeq,
                            HasIssue, AffirmativeIssueId, AffirmativeIssueSeq,
                            AffirmativeTargetId, AffirmativeTargetSeq,
                            AffirmativeKpiId, AffirmativeKpiSeq, AffirmativeKpiName,
                            AffirmativeUnitId, AffirmativeUnitName,
                            KpiGoal, Score1, Score2, Score3, Score4, Score5,
                            Remark, 'N', IsActive
                        FROM Affirmative_Draft WHERE PeriodCode = :year AND DepartmentId = :deptId";
                    $param = array(
                        "year" => $this->getPeriod()->year,
                        "deptId" => $departmentId
                    );
                    $this->datacontext->pdoQuery($sql, $param);
                    /* if (!$this->datacontext->pdoQuery($sql, $param)) {
                      $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                      return false;
                      } */
                    /* foreach ($dataDraft as $keyDraft => $valueDraft) {
                      $final = $json->decode(new \apps\common\entity\AffirmativeFinal(), $valueDraft);
                      $final->isApprove = "N";
                      if (!$this->datacontext->saveObject($final)) {
                      $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                      return false;
                      }
                      } */
                } else {
                    $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                    return false;
                }
            }
        } elseif ($status == "N") {
            foreach ($dataDraft as $keyDraft => $valueDraft) {
                $dataDraft[$keyDraft]->isApprove = $status;
            }
            if ($this->datacontext->updateObject($dataDraft)) {
                $final = new \apps\common\entity\AffirmativeFinal();
                $final->periodCode = $this->getPeriod()->year;
                $final->departmentId = $departmentId;
                $del = $this->datacontext->getObject($final);
                if (!$this->datacontext->removeObject($del)) {
                    $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                    return false;
                }
            } else {
                $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                return false;
            }
        }
        return true;
    }

    public function export($departmentId) {
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
        $objWorkSheet->setTitle($title);

        $mp = new \apps\actionplan\model\ViewActivityDepartment();
        $mp->departmentId = $departmentId;
        $dept = $this->datacontext->getObject($mp)[0];

        $row = 1;
        $objWorkSheet->mergeCells('A1:I2')
                ->setCellValueByColumnAndRow(0, $row, "(ร่าง) ตัวชี้วัดคำรับรองการปฏิบัติงาน ประจำปีงบประมาณ พ.ศ." . $this->getPeriod()->year . "\n ประเภทส่วนงาน" . $dept->activityName . " : " . $dept->departmentName)
                ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($center)->setWrapText(true);

        $row = 3;
        $objWorkSheet->mergeCells('A' . $row . ':A' . ($row + 1))->setCellValueByColumnAndRow(0, $row, "ตัวชี้วัดคำรับรอง ปี " . $this->getPeriod()->year)
                ->getStyleByColumnAndRow(0, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('B' . $row . ':B' . ($row + 1))->setCellValueByColumnAndRow(1, $row, "หน่วยนับ")
                ->getStyleByColumnAndRow(1, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('C' . $row . ':C' . ($row + 1))->setCellValueByColumnAndRow(2, $row, "ค่าเป้าหมาย\nตัวชี้วัด")
                ->getStyleByColumnAndRow(2, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('D' . $row . ':H' . $row)->setCellValueByColumnAndRow(3, $row, "เกณฑ์การให้คะแนนผลลัพธ์ของตัวชี้วัด (ระดับคะแนน)")
                ->getStyleByColumnAndRow(3, $row)->getAlignment()->applyFromArray($center);

        $objWorkSheet->mergeCells('I' . $row . ':I' . ($row + 1))->setCellValueByColumnAndRow(8, $row, "หมายเหตุ")
                ->getStyleByColumnAndRow(8, $row)->getAlignment()->applyFromArray($center);

        $row = 4;
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

        $objWorkSheet->getColumnDimensionByColumn(0)->setWidth(50);
        $objWorkSheet->getColumnDimensionByColumn(1)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(2)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(3)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(4)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(5)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(6)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(7)->setWidth(20);
        $objWorkSheet->getColumnDimensionByColumn(8)->setWidth(30);

        $data = $this->draftData($departmentId);
//return $data;
        $row = 5;
        foreach ($data as $key => $value) {
            $objWorkSheet->mergeCells('A' . $row . ':I' . $row)
                    ->setCellValueByColumnAndRow(0, $row, "ส่วนที่ " . $value["mainSeq"] . " " . $value["mainName"])
                    ->getStyleByColumnAndRow(0, $row)->applyFromArray($underline)->getAlignment()->applyFromArray($center);

            $row++;
            foreach ($value["type"] as $key2 => $value2) {
                $objWorkSheet->mergeCells('A' . $row . ':I' . $row)
                        ->setCellValueByColumnAndRow(0, $row, "ส่วนที่ " . $value["mainSeq"] . "." . $value2["typeSeq"] . " " . $value2["typeName"])
                        ->getStyleByColumnAndRow(0, $row)->applyFromArray($underline);

                $row++;
                if ($value2["hasIssue"] == "Y") {
                    foreach ($value2["issue"] as $key3 => $value3) {
                        $objWorkSheet->mergeCells('A' . $row . ':I' . $row)
                                ->setCellValueByColumnAndRow(0, $row, "ประเด็นยุทธศาสตร์ที่ " . $value3->issueSeq . " " . $value3->issueName);

                        $row++;
                        foreach ($value3->target as $key4 => $value4) {
                            $objWorkSheet->mergeCells('A' . $row . ':I' . $row)
                                    ->setCellValueByColumnAndRow(0, $row, "เป้าประสงค์ที่ " . $value3->issueSeq . "." . $value4->targetSeq . " " . $value4->targetName);

                            $row++;
                            if (is_array($value4->kpi) && count($value4->kpi) > 0) {
                                foreach ($value4->kpi as $key5 => $value5) {

                                    $objWorkSheet->setCellValueByColumnAndRow(0, $row, $value3->issueSeq . "." . $value4->targetSeq . "." . $value5->kpiSeq . " " . $value5->kpiName)
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
                } elseif ($value2["hasIssue"] == "N") {
                    //return isset($value2["kpi"]);
                    if (isset($value2["kpi"])) {
                        foreach ($value2["kpi"] as $key5 => $value5) {

                            $objWorkSheet->setCellValueByColumnAndRow(0, $row, $value5->kpiSeq . ". " . $value5->kpiName)
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
        $objWorkSheet->getStyle('A1:I' . ($row - 1))->applyFromArray($border);

        //create excel file
        ob_clean();

        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=(ร่าง)ตัวชี้วัดคำรับรองการปฏิบัติงาน_" . $dept->departmentName . "_" . $this->getPeriod()->year . ".xls");

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');

        ob_end_flush();
        exit();
    }

    public function listsType() {
        $thisYear = $this->getPeriod()->year;
        $main = new \apps\common\entity\AffirmativeMain();
        $main->periodCode = $thisYear;
        $mainData = $this->datacontext->getObject($main);
        $mainId = array();
        foreach ($mainData as $key => $value) {
            array_push($mainId, $value->mainId);
        }
        $type = "select t from apps\\common\\entity\\AffirmativeType t where t.mainId in ( :mainId )";
        $param = array("mainId" => $mainId);
        return $this->datacontext->getObject($type, $param);
//        $type = new \apps\common\entity\AffirmativeType();
//        
//        return $this->datacontext->getObject($type,$mainData);
    }

}
