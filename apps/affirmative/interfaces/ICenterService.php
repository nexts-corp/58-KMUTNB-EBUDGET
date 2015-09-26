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
     * @param apps\common\entity\AffirmativePlanCentre affirmative Description
     * @return String[] insert Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function insert($affirmative);

    /**
     * @name update
     * @uri /update
     * @param apps\common\entity\AffirmativePlanCentre affirmative Description
     * @return boolean update Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function update($affirmative);

    /**
     * @name delete
     * @uri /delete
     * @param integer affirmativeId Description
     * @return boolean delete Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function delete($affirmativeId);
} 