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
     * @name manage
     * @uri /manage
     * @description จัดสรรงบประมาณเงินรายได้
     */
    public function manage();

}
