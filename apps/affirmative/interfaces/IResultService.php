<?php

namespace apps\affirmative\interfaces;

/**
 * @name IResultService
 * @uri /result
 * @description ประมูล
 */
interface IResultService {

    /**
     * @name listsDepartment
     * @uri /listsDepartment
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsDepartment();

    /**
     * @name listsRound
     * @uri /listsRound
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsRound();

    /**
     * @name department
     * @uri /department
     * @param integer deptId Description
     * @param integer roundId Description
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function department($deptId, $roundId);
}
