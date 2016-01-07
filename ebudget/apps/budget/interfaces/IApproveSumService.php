<?php

namespace apps\budget\interfaces;

/**
 * @name IApproveSumService
 * @uri /approveSum
 * @description ApproveSumService
 */
interface IApproveSumService{

    /**
     * @name ApproveSum
     * @uri /approveSumBg
     * @param int budgetPeriodId ??????????
     * @return string[] result
     * @description ???????????????????????
     */
    public function approveSumBudgetRequest($budgetPeriodId);

    /**
     * @name BackUptoFinalBg
     * @uri /toFinalBg
     * @param int year ??????????
     * @return string result
     * @description ???????????????????????
     */
    public function toFinalBg($year);

    /**
     * @name viewApproveSum
     * @uri /viewApproveSum
     * @param int budgetPeriodId ??????????
     * @return string[] result
     * @description ???????????????????????
     */
    public function viewApproveSum($year);
    
    /**
     * @name LoadpproveSum
     * @uri /LoadpproveSum
     * @param int budgetPeriodId ??????????
     * @return string[] result
     * @description ???????????????????????
     */
    public function LoadpproveSum($year);

    /**
     * @name updateApproveSum
     * @uri /updateApproveSum
     * @param apps\common\entity\BudgetSummarize data
     * @return string[] result
     * @description update BudgetSummarize
     */
    public function updateApproveSum($data);
}