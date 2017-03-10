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
     * @param string departmentId
     * @param string typeId
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsAll($departmentId, $typeId);

    /**
     * @name export
     * @uri /export
     * @param string departmentId
     * @return file export Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function export($departmentId);

    /**
     * @name insert
     * @uri /insert
     * @param string final
     * @return String[] insert Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function insert($final);

    /**
     * @name update
     * @uri /update
     * @param string final
     * @return String[] update Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function update($final);
    
     /**
     * @name delete
     * @uri /delete
     * @param string final
     * @return String[] delete Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function delete($final);
}
