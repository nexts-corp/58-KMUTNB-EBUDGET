<?php

namespace apps\affirmative\interfaces;

/**
 * @name ICenterService
 * @uri /center
 * @description ประมูล
 */
interface ICenterService {
    /**
     * @name listsAll
     * @uri /listsAll
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsAll();

    /**
     * @name listsKPI
     * @uri /listsKPI
     * @param apps\common\entity\MainPlanKpi mainPlanKpi Description
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsKPI($mainPlanKpi);
} 