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
     * @name listsKpi
     * @uri /listsKpi
     * @param int targetId Description
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsKpi($targetId);

    /**
     * @name insert
     * @uri /insert
     * @param /apps/common/entity/AffirmativePlanCenter affirmative Description
     * @return String[] add Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function insert($affirmative);
} 