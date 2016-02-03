<?php

namespace apps\actionplan\interfaces;

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

    /**
     * @name result
     * @uri /result
     * @param String[] result Description
     * @param file file Description
     * @return boolean result Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function result($result, $file);

    /**
     * @name export
     * @uri /export
     * @param string departmentId
     * @param string roundId
     * @return file export Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function export($departmentId, $roundId);
}
