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


}
