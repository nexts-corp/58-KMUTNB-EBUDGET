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
     * @name listsUnit
     * @uri /listsUnit
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsUnit();

    /**
     * @name insert
     * @uri /insert
     * @param apps\affirmative\entity\AffirmativeCenter center
     * @return String[] insert Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function insert($center);

    /**
     * @name update
     * @uri /update
     * @param apps\affirmative\entity\AffirmativeCenter center
     * @return String[] update Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function update($center);

    /**
     * @name delete
     * @uri /delete
     * @param apps\affirmative\entity\AffirmativeCenter center
     * @return boolean delete Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function delete($center);
}
