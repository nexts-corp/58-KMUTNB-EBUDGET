<?php
namespace apps\budget\interfaces;

/**
 * @name IUpdateTrackingStatus
 * @uri /updateTrackingService
 * @description UpdateTrackingStatus
 */
interface IUpdateTrackingStatus
{

    /**
     * @name updateTracking
     * @uri /updateTracking
     * @param string bgType Description
     * @param object listBg Description listID Budget
     * @param string status Description
     * @return boolean results Description
     * @description update status tracking
     */
    public function updateTrackingBG($bgType, $listBg, $status);

}