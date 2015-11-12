<?php

namespace apps\affirmative\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\affirmative\interfaces\IViewService;

class ViewService extends CServiceBase implements IViewService {

    public $datacontext;

    public function __construct() {
        $this->datacontext = new \th\co\bpg\cde\data\CDataContext(null);
    }

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

    public function group($deptId) {
        $viewDept = new \apps\affirmative\model\ViewActivityDepartment();
        $viewDept->departmentId = $deptId;
        $data = $this->datacontext->getObject($viewDept)[0];
        $view = new CJView("group", CJViewType::HTML_VIEW_ENGINE);
        $view->department = $data;
        $groupS = new GroupService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

    public function finalz($deptId) {
        $viewDept = new \apps\affirmative\model\ViewActivityDepartment();
        $viewDept->departmentId = $deptId;
        $data = $this->datacontext->getObject($viewDept)[0];
        $view = new CJView("final", CJViewType::HTML_VIEW_ENGINE);
        $view->department = $data;
        $groupS = new GroupService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

    public function tracking() {
        $view = new CJView("tracking", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

}
