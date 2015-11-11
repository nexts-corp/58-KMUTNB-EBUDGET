<?php

namespace apps\affirmative\interfaces;

/**
 * @name IGroupService
 * @uri /group
 * @description ประมูล
 */
interface IGroupService {

    /**
     * @name checkApprove
     * @uri /checkApprove
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function checkApprove();

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
     * @param apps\affirmative\entity\AffirmativeDraft draft
     * @return String[] insert Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function insert($draft);

    /**
     * @name update
     * @uri /update
     * @param apps\affirmative\entity\AffirmativeDraft draft
     * @return String[] update Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function update($draft);

    /**
     * @name delete
     * @uri /delete
     * @param apps\affirmative\entity\AffirmativeDraft draft
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
}
