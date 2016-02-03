<?php

namespace apps\revenue\interfaces;

/**
 * @name ViewService
 * @uri /view
 * @description ViewService
 */
interface IViewService {

    /**
     * @name planning
     * @uri /planning
     * @description จัดสรรงบประมาณเงินรายได้
     */    
    public function planning();

    /**
     * @name manageAll
     * @uri /manageAll
     * @description จัดสรรงบประมาณเงินรายได้
     */
    public function manageAll();

    /**
     * @name manage
     * @uri /manage
     * @param string formId
     * @param string budgetHeadId
     * @param string deptId
     * @description จัดทำคำของบประมาณแผ่นดิน
     */
    public function manage($formId, $budgetHeadId, $deptId);

}
