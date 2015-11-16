<?php

namespace apps\affirmative\service;


use apps\affirmative\interfaces\IAdminService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class AdminService extends CServiceBase implements IAdminService{
    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }
    
    public function listsDraft(){
        $repo = new \apps\common\entity\L3D\Department();
        $repo->setDeptGroup("A");
        $repo->setDeptStatus("Y");
        if (isset($campusId) && $campusId != "0") {
            $repo->setCampusId($campusId);
        }
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->deptName;
        }
        return $result;
    }
} 