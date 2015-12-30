<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IViewService;

class ViewService extends CServiceBase implements IViewService {

    public $datacontext;

    public function __construct() {
        $this->datacontext = new \th\co\bpg\cde\data\CDataContext(null);
    }

    public function manageEduPlan() {
        $view = new CJView("manageEduPlan", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }
}
