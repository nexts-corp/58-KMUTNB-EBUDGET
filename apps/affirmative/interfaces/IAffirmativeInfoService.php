<?php

namespace apps\affirmative\interfaces;

/**
 * @name AffirmativeInfoService
 * @uri /affirmativeInfo
 * @description AffirmativeInfoService
 */
interface IAffirmativeInfoService {

    /**
     * @name listMainType
     * @uri /listMainType
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listMainType($budgetYear);

    /**
     * @name listPlan
     * @uri /listPlan
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listPlan($budgetYear);
}
