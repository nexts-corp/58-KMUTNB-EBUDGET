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
    public $entA = "apps\\affirmative\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
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
        $sql = "SELECT * FROM View_Activity_Department ORDER BY ActivityId ASC";
        $data = $this->datacontext->pdoQuery($sql);

        $group = array();
        $actKey = array();

        foreach($data as $key => $value){
            $actKey[$value["ActivityId"]] = $value["ActivityName"];

            $group[$value["ActivityId"]][] = array(
                "deptId" => $value["DepartmentId"],
                "deptName" => $value["DepartmentName"]
            );
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

    public function listsRound(){
        $sql = "SELECT"
                ." rd"
            ." FROM ".$this->entA."\\AffirmativeRound rd"
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
        $sql = "SELECT"
                ." fl.finalId, fl.periodCode, fl.departmentId, fl.mainId, fl.mainSeq, fl.typeId, fl.typeSeq, fl.hasIssue,"
                ." fl.issueId, fl.issueSeq, fl.targetId, fl.targetSeq, fl.kpiId, fl.kpiSeq, fl.kpiName, fl.unitId, fl.unitName,"
                ." fl.kpiGoal, fl.score1, fl.score2, fl.score3, fl.score4, fl.score5, rt.resultId, rt.roundId, rt.detail,"
                ." rt.dividend, rt.divisor, rt.result, rt.score, rt.isSuccess, rt.remark, rt.attachment"
            ." FROM ".$this->entA."\\AffirmativeFinal fl"
            ." LEFT OUTER JOIN ".$this->entA."\\AffirmativeResult rt WITH rt.finalId = fl.finalId AND rt.roundId = :round"
            ." WHERE fl.periodCode = :period AND fl.departmentId = :dept";
        $param = array(
            "round" => $roundId,
            "period" => $this->getPeriod()->year,
            "dept" => $deptId
        );

        $draftData = $this->datacontext->getObject($sql, $param);
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

    public function result($result, $file)
    {
        $return = true;

        $check = new \apps\affirmative\entity\AffirmativeResult();
        $check->finalId = $result["finalId"];
        $check->roundId = $result["roundId"];
        $dataCk = $this->datacontext->getObject($check);

        $hasFile = $dataCk[0]->attachment;

        $fileReturn = $dataCk[0]->attachment;

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
        if($result["fileUpload"] == 1 && $file != "undefined"){
            $time = date("YmdHis");
            $target_dir = "apps\\affirmative\\views\\result\\";

            $target_file = $target_dir . "RS" . $time . "-" . $file["name"];
            $fileN = "RS" . $time . "-" . $file["name"];

            $update = new \apps\affirmative\entity\AffirmativeResult();
            $update->finalId = $result["finalId"];
            $update->roundId = $result["roundId"];
            $data = $this->datacontext->getObject($update);

            if($hasFile !=  ""){
                if (file_exists($target_dir.$hasFile)){
                    unlink($target_dir.$hasFile);
                    $fileReturn = '';

                    $data[0]->attachment = '';

                    if (!$this->datacontext->updateObject($data[0])) {
                        $return = $this->datacontext->getLastMessage();
                    }
                }
            }

            if (move_uploaded_file($file["tmp_name"], $target_file)) {


                $data[0]->attachment = $fileN;

                if (!$this->datacontext->updateObject($data[0])) {
                    $return = $this->datacontext->getLastMessage();
                }

                $fileReturn = $fileN;
            }
        }



        $this->getResponse()->add("filename", $fileReturn);
        return $return;
    }
}
