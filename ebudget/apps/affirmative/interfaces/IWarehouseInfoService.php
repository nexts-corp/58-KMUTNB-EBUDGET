<?php

namespace apps\affirmative\interfaces;

/**
 * @name IWarehouseInfoService
 * @uri /warehouseInfo
 * @description ประมูล
 */
interface IWarehouseInfoService {
    /**
     * @name listsRice
     * @uri /listsRice
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsRice();
} 