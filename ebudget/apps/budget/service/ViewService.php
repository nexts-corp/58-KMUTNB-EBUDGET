<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\budget\interfaces\IViewService;

class ViewService extends CServiceBase implements IViewService {

    public function formBudget() {
        $view = new CJView("formBudget", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function formBudgetReview() {
        $view = new CJView("formBudgetReview", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg140() {
        $view = new CJView("bg140", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg141() {
        $view = new CJView("bg141", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg142() {
        $view = new CJView("bg142", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg143() {
        $view = new CJView("bg143", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg144() {
        $view = new CJView("bg144", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg145() {
        $view = new CJView("bg145", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg146() {
        $view = new CJView("bg146", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function formTracking() {
        $view = new CJView("formTracking", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function formReview() {
        $view = new CJView("formReview", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function formTest() {
        $view = new CJView("formTest", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function formRevenue() {
        $view = new CJView("formRevenue", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function formScheme() {
         $view = new CJView("formBudgetScheme", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function draftAll() {
        $view = new CJView("draft/draftAll", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function draft($formId, $l3dPlanId, $fundgroupId, $deptId) {
        if($formId == "140"){
            $view = new CJView("draft/bg140", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "141"){
            $view = new CJView("draft/bg141", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "142"){
            $view = new CJView("draft/bg142", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "143"){
            $view = new CJView("draft/bg143", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "144"){
            $view = new CJView("draft/bg144", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "145"){
            $view = new CJView("draft/bg145", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "146"){
            $view = new CJView("draft/bg146", CJViewType::HTML_VIEW_ENGINE);
        }
        else{
            $view = new CJView("draft/project", CJViewType::HTML_VIEW_ENGINE);
        }
        $view->formId = $formId;
        $view->l3dPlanId = $l3dPlanId;
        $view->fundgroupId = $fundgroupId;
        $view->deptId = $deptId;

        return $view;
    }

    
    public function approve($formId, $l3dPlanId, $fundgroupId, $deptId) {
        if($formId == "140"){
            $view = new CJView("approve/bg140", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "141"){
            $view = new CJView("approve/bg141", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "142"){
            $view = new CJView("approve/bg142", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "143"){
            $view = new CJView("approve/bg143", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "144"){
            $view = new CJView("approve/bg144", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "145"){
            $view = new CJView("approve/bg145", CJViewType::HTML_VIEW_ENGINE);
        }
        elseif($formId == "146"){
            $view = new CJView("approve/bg146", CJViewType::HTML_VIEW_ENGINE);
        }
        else{
            $view = new CJView("approve/project", CJViewType::HTML_VIEW_ENGINE);
        }
        $view->formId = $formId;
        $view->l3dPlanId = $l3dPlanId;
        $view->fundgroupId = $fundgroupId;
        $view->deptId = $deptId;

        return $view;
    }
    
    public function approveAll() {
        $view = new CJView("approve/approveAll", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

}
