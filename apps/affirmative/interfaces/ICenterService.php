<?php

namespace apps\affirmative\interfaces;

/**
 * @name ICenterService
 * @uri /center
 * @description ประมูล
 */
interface ICenterService {
    /**
     * @name listsAll
     * @uri /listsAll
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsAll();
} 