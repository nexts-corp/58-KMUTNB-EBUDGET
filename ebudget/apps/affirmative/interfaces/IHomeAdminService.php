<?php

namespace apps\affirmative\interfaces;

/**
 * @name IHomeAdminService
 * @uri /homeAdmin
 * @description ประมูล
 */
interface IHomeAdminService {
    /**
     * @name centerStatus
     * @uri /centerStatus
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function centerStatus();

    /**
     * @name draftStatus
     * @uri /draftStatus
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function draftStatus();

    /**
     * @name finalStatus
     * @uri /finalStatus
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function finalStatus();

    /**
     * @name resultStatus
     * @uri /resultStatus
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function resultStatus();
} 