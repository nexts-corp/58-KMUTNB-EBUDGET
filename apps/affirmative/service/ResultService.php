<?php

namespace apps\affirmative\service;

use apps\affirmative\interfaces\IResultService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class ResultService extends CServiceBase implements IResultService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function getYear() {
        $sql = "SELECT"
                . " yr"
                . " FROM " . $this->ent . "\\Year yr"
                . " WHERE yr.yearStatus = :active";
        $param = array(
            "active" => "Y"
        );
        return $this->datacontext->getObject($sql, $param)[0];  //get STATUS is Active
    }

    function getPeriod() {
        $period = new \apps\affirmative\entity\AffirmativePeriod();
        $period->setIsActive('Y');
        return $this->datacontext->getObject($period)[0];
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
                ." "
            ." FROM ".$this->ent."\\AffirmativeRound";
    }

}
