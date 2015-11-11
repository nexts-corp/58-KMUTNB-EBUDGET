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
}
