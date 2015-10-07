<?php

namespace apps\budget\interfaces;

/**
 * @name AllocateService
 * @uri /allocate
 * @description AllocateService
 */
interface IAllocateService {

    /**
     * @name managePlan
     * @uri /managePlanning
     * @description หน้าจัดสรรงบประมาณของกองแผนงาน
     */
    public function managePlanning();
    

}
