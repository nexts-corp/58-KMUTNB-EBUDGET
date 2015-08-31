<?php

namespace apps\affirmative\service;


use apps\affirmative\interfaces\ICenterService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class CenterService extends CServiceBase implements ICenterService{
    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }
    
    public function listsAll(){
        $sql = "SELECT"
            ." pt"
        ." FROM ".$this->ent."\\";
        $data = $this->datacontext->getObject($sql);

        return $data;
    }
} 