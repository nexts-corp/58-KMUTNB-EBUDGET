<?php

namespace apps\budget\interfaces;

/**
 * @name IDraftBuildMoreService
 * @uri /draftBmore
 * @description IDraftBuildMoreService
 */
interface IDraftBuildMoreService
{
    /**
     * @name insertBuildingMore
     * @uri /insertBuildingMore
     * @param apps\common\entity\Building building Description
     * @param apps\common\entity\BuildingFloorPlan listBuildFloor Description
     * @param apps\common\entity\BuildingBOQ listBOQ Description
     * @param apps\common\entity\BuildingPeriod listBuildPeriod Description
     * @param apps\common\entity\Coordinates listCoordinates Description
     * @return boolean results Description
     * @description เพิ่มคำชี้แจงรายละเอียดสิ่งก่อสร้างต่อเนื่อง
     */
    public function insertBuildingMore($building, $listBuildFloor, $listBOQ, $listBuildPeriod, $listCoordinates);

    /**
     * @name editBuildingMore
     * @uri /editBuildingMore
     * @param apps\common\entity\Building building Description
     * @param apps\common\entity\BuildingFloorPlan listBuildFloor Description
     * @param apps\common\entity\BuildingBOQ listBOQ Description
     * @param apps\common\entity\BuildingPeriod listBuildPeriod Description
     * @param apps\common\entity\Coordinates listCoordinates Description
     * @param String listIDRemoveFloor Description
     * @param String listIDRemoveBOQ Description
     * @param String listIDRemovePeriod Description
     * @param String coordinatesChange Description true false
     * @return boolean results Description
     * @description แก้ไขคำชี้แจงรายละเอียดสิ่งก่อสร้างต่อเนื่อง
     */
    public function editBuildingMore($building, $listBuildFloor, $listBOQ, $listBuildPeriod, $listCoordinates, $listIDRemoveFloor, $listIDRemoveBOQ, $listIDRemovePeriod, $coordinatesChange);


    /**
     * @name removeBuildingMore
     * @uri /removeBuildingMore
     * @param apps\common\entity\Building building Description
     * @return boolean results Description
     * @description ลบคำชี้แจงรายละเอียดสิ่งก่อสร้าง
     */
    public function removeBuildingMore($building);

}
