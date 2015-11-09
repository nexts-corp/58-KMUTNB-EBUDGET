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
     * @name listsAll2
     * @uri /listsAll2
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsAll2();

    /**
     * @name listsKpi
     * @uri /listsKpi
     * @param int targetId Description
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsKpi($targetId);

    /**
     * @name listsKpi2
     * @uri /listsKpi2
     * @param int targetId Description
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsKpi2($targetId);

    /**
     * @name listsUnit
     * @uri /listsUnit
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsUnit();

    /**
     * @name insert
     * @uri /insert
     * @param apps\common\entity\AffirmativePlanCentre affirmative Description
     * @return String[] insert Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function insert($affirmative);

    /**
     * @name insert2
     * @uri /insert2
     * @param apps\affirmative\entity\AffirmativeCenter center
     * @return String[] insert Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function insert2($center);

    /**
     * @name update
     * @uri /update
     * @param apps\common\entity\AffirmativePlanCentre affirmative Description
     * @return boolean update Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function update($affirmative);
     /**
     * @name update2
     * @uri /update2
     * @param apps\affirmative\entity\AffirmativeCenter center
     * @return String[] update Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function update2($center);

    /**
     * @name delete
     * @uri /delete
     * @param integer affirmativeId Description
     * @return boolean delete Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function delete($affirmativeId);
}
