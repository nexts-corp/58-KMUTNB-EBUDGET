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
        $groupS = new HomeAdminService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

    public function setting() {
        $view = new CJView("setting/setting", CJViewType::HTML_VIEW_ENGINE);
        $groupS = new DraftService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

    public function center() {
        $view = new CJView("center/center", CJViewType::HTML_VIEW_ENGINE);
        $groupS = new CenterService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

    public function draftAll() {
        $view = new CJView("draft/draftAll", CJViewType::HTML_VIEW_ENGINE);
        $groupS = new DraftService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

    public function draft($deptId) {
        $viewDept = new \apps\affirmative\model\ViewActivityDepartment();
        $viewDept->departmentId = $deptId;
        $data = $this->datacontext->getObject($viewDept)[0];
        $view = new CJView("draft/draft", CJViewType::HTML_VIEW_ENGINE);
        $view->department = $data;
        $groupS = new DraftService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

    public function finalAll() {
        $view = new CJView("final/finalAll", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function finalz($deptId) {
        $viewDept = new \apps\affirmative\model\ViewActivityDepartment();
        $viewDept->departmentId = $deptId;
        $data = $this->datacontext->getObject($viewDept)[0];
        $view = new CJView("final/final", CJViewType::HTML_VIEW_ENGINE);
        $view->department = $data;
        $groupS = new DraftService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

    public function resultAll() {
        $view = new CJView("result/resultAll", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function result($deptId) {
        $viewDept = new \apps\affirmative\model\ViewActivityDepartment();
        $viewDept->departmentId = $deptId;
        $data = $this->datacontext->getObject($viewDept)[0];
        $view = new CJView("result/result", CJViewType::HTML_VIEW_ENGINE);
        $view->department = $data;
        $groupS = new DraftService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

}
