<?php

namespace apps\report\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\report\interfaces\IViewService;

class ViewService extends CServiceBase implements IViewService {

    public function report3D() {
        $view = new CJView("report3D", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function reportBudget() {
        $view = new CJView("reportBudget", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

}
