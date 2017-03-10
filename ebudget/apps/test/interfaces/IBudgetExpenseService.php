<?php

namespace apps\budget\interfaces;

/**
 * @name IBudgetExpenseService
 * @uri /budgetExpense
 * @description BudgetExpenseService
 */
interface IBudgetExpenseService {

    /**
     * @name listAllBudgetExpense
     * @uri /listAllBudgetExpense
     * @param int facultyId คณะ
     * @return String[] list
     * @description รายการโครงการจากเงินรายได้
     */
    public function listAllBudgetExpense($facultyId);

    /**
     * @name viewBudgetExpense
     * @uri /viewBudgetExpense
     * @param int expId
     * @return string[] result
     * @description แบบเสนอโครงการจากเงินรายได้
     */
    public function viewBudgetExpense($expId);

    /**
     * @name addBudgetExpense
     * @uri /addBudgetExpense
     * @param apps\common\entity\BudgetExpense bgExp
     * @param apps\common\entity\BudgetExpenseAffirmative[] bgAff
     * @param apps\common\entity\BudgetExpenseIntegration[] bgInt
     * @param apps\common\entity\BudgetExpenseOperating[] bgOper
     * @param apps\common\entity\BudgetExpensePlan[] bgPlan
     * @return string[] result
     * @description แบบเสนอโครงการจากเงินรายได้
     */
    public function addBudgetExpense($bgExp, $bgAff, $bgInt, $bgOper, $bgPlan);

    /**
     * @name updateBudgetExpense
     * @uri /updateBudgetExpense
     * @param apps\common\entity\BudgetExpense bgExp
     * @param apps\common\entity\BudgetExpenseAffirmative[] bgAff
     * @param apps\common\entity\BudgetExpenseIntegration[] bgInt
     * @param apps\common\entity\BudgetExpenseOperating[] bgOper
     * @param apps\common\entity\BudgetExpensePlan[] bgPlan
     * @return string[] result
     * @description แบบเสนอโครงการจากเงินรายได้
     */
    public function updateBudgetExpense($bgExp, $bgAff, $bgInt, $bgOper, $bgPlan);
}
