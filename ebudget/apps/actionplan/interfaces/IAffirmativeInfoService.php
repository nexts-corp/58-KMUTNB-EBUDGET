<?php

namespace apps\actionplan\interfaces;

/**
 * @name AffirmativeInfoService
 * @uri /affirmativeInfo
 * @description AffirmativeInfoService
 */
interface IAffirmativeInfoService {

    /**
     * @name listMainType
     * @uri /listMainType
     * @param int budgetYear Description
     * @return String[] lists Description
     * @description ประเภทแผน
     */
    public function listMainType($budgetYear);

    /**
     * @name listMainIssue
     * @uri /listMainIssue
     * @param int typeId Description
     * @return String[] lists Description
     * @description ประเด็นยุทธศาสตร์
     */
    public function listMainIssue($typeId);

    /**
     * @name listMainTarget
     * @uri /listMainTarget
     * @param int issueId Description
     * @return String[] lists Description
     * @description เป้าประสงค์
     */
    public function listMainTarget($issueId);

    /**
     * @name listMainKpi
     * @uri /listMainKpi
     * @param int targetId Description
     * @return String[] lists Description
     * @description ตัวชี้วัด
     */
    public function listMainKpi($targetId);

    /**
     * @name listMainStrategy
     * @uri /listMainStrategy
     * @param int targetId Description
     * @return String[] lists Description
     * @description ตัวชี้วัด
     */
    public function listMainStrategy($targetId);

    /**
     * @name listMainPlan
     * @uri /listMainPlan
     * @param int budgetYear Description
     * @return String[] lists Description
     * @description แผนหลัก
     */
    public function listMainPlan($budgetYear);
}
