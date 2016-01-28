<?php

namespace apps\revenue\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\revenue\interfaces\IViewService;

class ViewService extends CServiceBase implements IViewService {

    public function planing() {
        $view = new CJView("allocate/planing", CJViewType::HTML_VIEW_ENGINE);
        $groupS = new PlaningService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

}
