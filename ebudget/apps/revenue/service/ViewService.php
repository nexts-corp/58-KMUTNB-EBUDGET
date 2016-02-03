<?php

namespace apps\revenue\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;
use apps\revenue\interfaces\IViewService;

class ViewService extends CServiceBase implements IViewService {

    public function planning() {
        $view = new CJView("allocate/planning", CJViewType::HTML_VIEW_ENGINE);
        $groupS = new PlaningService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

    public function manageAll() {
        $view = new CJView("operate/manageAll", CJViewType::HTML_VIEW_ENGINE);
        $groupS = new ManageService();
        $view->year = $groupS->getPeriod()->year;
        return $view;
    }

    public function manage($formId, $budgetHeadId, $deptId) {
        $view = '';

        if ($formId == "500") {
            $view = new CJView("operate/budget", CJViewType::HTML_VIEW_ENGINE);
        } elseif ($formId == "999") {
            $view = new CJView("operate/project", CJViewType::HTML_VIEW_ENGINE);
        }

        $groupS = new ManageService();
        $view->year = $groupS->getPeriod()->year;
        $view->formId = $formId;
        $view->budgetHeadId = $budgetHeadId;
        $view->deptId = $deptId;
        $view->deptName = $groupS->getDept($deptId)->deptName;

        return $view;
    }

    public function progressRevenuePlanAll() {
        $view = new CJView("progress/progressRevenuePlanAll", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function progressRevenuePlan($facultyId, $fundgroupId, $planId, $catId) {
        $view = new CJView("progress/progressRevenuePlan", CJViewType::HTML_VIEW_ENGINE);

        $view->facultyId = $facultyId;
        $view->fundgroupId = $fundgroupId;
        $view->planId = $planId;
        $view->catId = $catId;

        return $view;
    }

    public function progressRevenueAll() {
        $view = new CJView("progress/progressRevenueAll", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function progressRevenue($facultyId, $fundgroupId, $planId, $catId) {
        $view = new CJView("progress/progressRevenue", CJViewType::HTML_VIEW_ENGINE);

        //$view->bgPeriodId = $bgPeriodId;
        $view->facultyId = $facultyId;
        $view->fundgroupId = $fundgroupId;
        $view->planId = $planId;
        $view->catId = $catId;

        return $view;
    }

}
