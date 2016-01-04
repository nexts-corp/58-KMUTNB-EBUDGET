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
     * @param int year ??????????
     * @return string[] result
     * @description ???????????????????????
     */
    public function approveSumBudgetRequest($year);

}