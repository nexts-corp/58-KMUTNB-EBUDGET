<?php

namespace apps\budget\interfaces;

/**
 * @name IBudgetReviewService
 * @uri /budgetReview
 * @description BudgetReviewService
 */
interface IBudgetReviewService
{
    /**
     * @name getReview
     * @uri /getReview
     * @param String budgetType Description ������������ҳ
     * @param String year Description �� ��.
     * @return String[] listTracking
     * @description �ʴ������Ż�������������Թ
     */
    public function getReview($budgetType, $year);

}
