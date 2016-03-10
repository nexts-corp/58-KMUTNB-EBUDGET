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
     * @param string typeId
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsDept($typeId);

    /**
     * @name listsAll
     * @uri /listsAll
     * @param integer departmentId
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsAll($departmentId);

    /**
     * @name export
     * @uri /export
     * @param string departmentId
     * @return file export Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function export($departmentId);
}
