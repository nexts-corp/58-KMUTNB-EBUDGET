<?php

namespace apps\affirmative\interfaces;

/**
 * @name IAdminService
 * @uri /admin
 * @description ประมูล
 */
interface IAdminService {
    /**
     * @name listsDraft
     * @uri /listsDraft
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsDraft();
} 