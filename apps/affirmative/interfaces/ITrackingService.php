<?php

namespace apps\affirmative\interfaces;

/**
 * @name ITrackingService
 * @uri /tracking
 * @description ประมูล
 */
interface ITrackingService {

    /**
     * @name listsDepartment
     * @uri /listsDepartment
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsDepartment();


}
