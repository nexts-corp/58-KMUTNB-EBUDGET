<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\budget\interfaces\IAllocateService;

class AllocateService extends CServiceBase implements IAllocateService {

    public $datacontext;
    //public $logger;
    
    private $pathEnt = "apps\\common\\entity\\";

    public function __construct() {
        //$this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext();
    }

    public function managePlanning() {
        $view = new CJView("allocate/managePlanning", CJViewType::HTML_VIEW_ENGINE);
        
        return $view;
    }
    

}
