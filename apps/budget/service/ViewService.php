<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\budget\interfaces\IViewService;

class ViewService extends CServiceBase implements IViewService
{

    public function formBudget()
    {
        $view = new CJView("formBudget", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg140()
    {
        $view = new CJView("bg140", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg141()
    {
        $view = new CJView("bg141", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg142()
    {
        $view = new CJView("bg142", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg143()
    {
        $view = new CJView("bg143", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg144()
    {
        $view = new CJView("bg144", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg145()
    {
        $view = new CJView("bg145", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function bg146()
    {
        $view = new CJView("bg146", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function formTracking()
    {
        $view = new CJView("formTracking", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }


    public function formReview()
    {
        $view = new CJView("formReview", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }
}
