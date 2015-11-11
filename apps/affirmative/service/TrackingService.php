<?php

namespace apps\affirmative\service;

use apps\affirmative\interfaces\ITrackingService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class TrackingService extends CServiceBase implements ITrackingService {

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
        $sql = "SELECT dp.id, mt.actId, ac.actTypeName, dp.deptName"
            ." FROM ".$this->ent."\\MappingDepartmentType mt"
            ." JOIN ".$this->ent."\\ActivityType ac WITH ac.id = mt.actId"
            ." JOIN ".$this->ent."\\L3D\\Department dp WITH dp.id = mt.deptId"
            ." ORDER BY mt.actId, mt.deptId ASC";
        $data = $this->datacontext->getObject($sql);

        $group = array();
        $actKey = array();

        foreach($data as $key => $value){
            $actKey[$value["actId"]] = $value["actTypeName"];

            $group[$value["actId"]][] = array(
                "deptId" => $value["id"],
                "deptName" => $value["deptName"]
            );
        }

        $result = array();

        foreach($group as $key => $value){
            $result[] = array(
                "actId" => $key,
                "actTypeName" => $actKey[$key],
                "dept" => $value
            );
        }

        return $result;
    }

}
