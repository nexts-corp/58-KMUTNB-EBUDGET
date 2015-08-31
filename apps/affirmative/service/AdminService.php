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
        $sql = "SELECT * FROM lk_faculty";
        $data = $this->datacontext->pdoQuery($sql);

        return $data;
    }
} 