<?php

namespace apps\revenue\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\revenue\interfaces\IViewService;

class ViewService extends CServiceBase implements IViewService {

    public function allocateAll() {
        $view = new CJView("allocate/budget", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function doRevenue($budgetYear, $deptId) {
        
    }

}
