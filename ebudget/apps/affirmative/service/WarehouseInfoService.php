<?php

namespace apps\affirmative\service;


use apps\affirmative\interfaces\IWarehouseInfoService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class WarehouseInfoService extends CServiceBase implements IWarehouseInfoService{
    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }
    
    public function listsRice(){
        $sql = "SELECT"
                ." ri.id, ri.provinceId, pv.provinceNameTH, ri.silo, ac.associate,"
                ." ri.warehouse, ri.stack, ri.projectId, pj.project, ri.typeId, tp.type, ri.gradeId, gd.grade, ri.discountRate, ri.statusKeyword, st.status"
            ." FROM ".$this->ent."\\RiceInfo ri"
            ." JOIN ".$this->ent."\\Province pv WITH pv.id = ri.provinceId"
            ." JOIN ".$this->ent."\\Associate ac WITH ac.id = ri.associateId"
            ." JOIN ".$this->ent."\\Project pj WITH pj.id = ri.projectId"
            ." JOIN ".$this->ent."\\Type tp WITH tp.id = ri.typeId"
            ." JOIN ".$this->ent."\\Grade gd WITH gd.id = ri.gradeId"
            ." LEFT JOIN ".$this->ent."\\Status st WITH st.keyword = ri.statusKeyword";
        $data = $this->datacontext->getObject($sql);
        
        /*$projArr = array();
        $provArr = array();
        $typeArr = array();
        $siloArr = array();
        $gradeArr = array();
        $statusArr = array();
        
        foreach ($data as $key => $value) {
            $provArr[$value["provinceId"]] = $value["provinceNameTH"];
            $projArr[$value["projectId"]] = $value["project"];
            $typeArr[$value["typeId"]] = $value["type"];
            $siloArr[$value["silo"]] = $value["silo"];
            $gradeArr[$value["gradeId"]] = $value["grade"];
            $statusArr[$value["statusKeyword"]] = $value["status"];
        }
        
        $this->getResponse()->add("province", $provArr);
        $this->getResponse()->add("project", $projArr);
        $this->getResponse()->add("type", $typeArr);
        $this->getResponse()->add("silo", $siloArr);
        $this->getResponse()->add("grade", $gradeArr);
        $this->getResponse()->add("status", $statusArr);*/
        
        return $data;
    }
} 