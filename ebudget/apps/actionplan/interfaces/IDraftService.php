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
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsDept();

    /**
     * @name listsAll
     * @uri /listsAll
     * @param integer departmentId
     * @param integer typeId
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsAll($departmentId,$typeId);

    /**
     * @name insert
     * @uri /insert
     * @param apps\common\entity\AffirmativeDraft draft
     * @return String[] insert Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function insert($draft);

    /**
     * @name update
     * @uri /update
     * @param apps\common\entity\AffirmativeDraft draft
     * @return String[] update Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function update($draft);

    /**
     * @name delete
     * @uri /delete
     * @param apps\actionplan\entity\AffirmativeDraft draft
     * @return boolean delete Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function delete($draft);

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