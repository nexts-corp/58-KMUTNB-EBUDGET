<?php

namespace apps\actionplan\interfaces;

/**
 * @name IDraftService
 * @uri /draft
 * @description ประมูล
 */
interface IDraftService {

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
     * @param integer typeId
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsAll($departmentId, $typeId);

    /**
     * @name listsType
     * @uri /listsType
     * @return String[] lists Description
     * @description ลิสต์แผนยุทธศาสตร์
     */
    public function listsType();

    /**
     * @name insert
     * @uri /insert
     * @param string draft
     * @return String[] insert Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function insert($draft);

    /**
     * @name update
     * @uri /update
     * @param string draft
     * @return String[] update Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function update($draft);

    /**
     * @name delete
     * @uri /delete
     * @param string draft
     * @return String[] delete Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function delete($draft);

    /**
     * @name approve
     * @uri /approve
     * @param string departmentId
     * @param string status
     * @param string typeId
     * @return boolean approve
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function approve($departmentId, $status, $typeId);

    /**
     * @name export
     * @uri /export
     * @param string departmentId
     * @return file export Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function export($departmentId);
}
