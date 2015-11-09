<?php

namespace apps\affirmative\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\affirmative\interfaces\IViewService;

class ViewService extends CServiceBase implements IViewService {

    public function home() {
        $view = new CJView("home", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function homeAdmin() {
        $view = new CJView("homeAdmin", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function center() {
        $view = new CJView("center", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function center2() {
        $view = new CJView("center2", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

}
