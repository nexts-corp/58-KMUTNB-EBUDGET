<?php

namespace apps\actionplan\interfaces;

/**
 * @name IFinalService
 * @uri /final
 * @description ประมูล
 */
interface IFinalService {

    /**
     * @name listsDept
     * @uri /listsDept
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsDept();

    /**
     * @name listsAll
     * @uri /listsAll
     * @param integer departmentId
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsAll($departmentId);

    /**
     * @name insert
     * @uri /insert
     * @param apps\common\entity\AffirmativeFinal final
     * @return String[] insert Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function insert($final);

    /**
     * @name update
     * @uri /update
     * @param apps\common\entity\AffirmativeFinal final
     * @return String[] update Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function update($final);

    /**
     * @name delete
     * @uri /delete
     * @param apps\common\entity\AffirmativeFinal final
     * @return boolean delete Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function delete($final);

    /**
     * @name approve
     * @uri /approve
     * @param string departmentId
     * @param string status
     * @return boolean approve
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function approve($departmentId, $status);

    /**
     * @name export
     * @uri /export
     * @param string departmentId
     * @return file export Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function export($departmentId);
}