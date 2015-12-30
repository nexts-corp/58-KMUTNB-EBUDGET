<?php

namespace apps\budget\interfaces;

/**
 * @name IDraftBuildOneService
 * @uri /draftBone
 * @description IDraftBuildOneService
 */
interface IDraftBuildOneService
{
    /**
     * @name insertBuildingOne
     * @uri /insertBuildingOne
     * @param apps\common\entity\Building building Description
     * @param apps\common\entity\BuildingDetail listBuildDetail Description
     * @param apps\common\entity\BuildingBOQ listBOQ Description
     * @param apps\common\entity\Coordinates listCoordinates Description
     * @return boolean results Description
     * @description เพิ่มคำชี้แจงรายละเอียดสิ่งก่อสร้าง
     */
    public function insertBuildingOne($building, $listBuildDetail, $listBOQ, $listCoordinates);


    /**
     * @name editBuildingOne
     * @uri /editBuildingOne
     * @param apps\common\entity\Building building Description
     * @param apps\common\entity\BuildingDetail listBuildDetail Description
     * @param apps\common\entity\BuildingBOQ listBOQ Description
     * @param apps\common\entity\Coordinates listCoordinates Description
     * @param String listIDRemoveBuildingOne Description
     * @param String listIDRemoveBOQ Description
     * @param String coordinatesChange Description true false
     * @return boolean results Description
     * @description แก้ไขคำชี้แจงรายละเอียดสิ่งก่อสร้าง
     */
    public function editBuildingOne($building, $listBuildDetail, $listBOQ, $listCoordinates, $listIDRemoveBuildingOne, $listIDRemoveBOQ, $coordinatesChange);

    /**
     * @name removeBuildingOne
     * @uri /removeBuildingOne
     * @param apps\common\entity\Building building Description
     * @return boolean results Description
     * @description ลบคำชี้แจงรายละเอียดสิ่งก่อสร้าง
     */
    public function removeBuildingOne($building);


}
