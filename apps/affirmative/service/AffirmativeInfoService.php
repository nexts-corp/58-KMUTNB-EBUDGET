<?php

namespace apps\affirmative\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\affirmative\interfaces\IAffirmativeInfoService;

class AffirmativeInfoService extends CServiceBase implements IAffirmativeInfoService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function listMainType($budgetYear) {
        
    }

    public function listPlan($budgetYear) {
        
    }

}
