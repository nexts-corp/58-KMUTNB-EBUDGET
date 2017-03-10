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
     * @param string building Description
     * @param string listBuildFloor Description
     * @param string listBOQ Description
     * @param string listBuildPeriod Description
     * @param string listCoordinates Description
     * @param file file Description
     * @return boolean results Description
     * @description เพิ่มคำชี้แจงรายละเอียดสิ่งก่อสร้างต่อเนื่อง
     */
    public function insertBuildingMore($building, $listBuildFloor, $listBOQ, $listBuildPeriod, $listCoordinates,$file);

    /**
     * @name editBuildingMore
     * @uri /editBuildingMore
     * @param string building Description
     * @param string listBuildFloor Description
     * @param string listBOQ Description
     * @param string listBuildPeriod Description
     * @param string listCoordinates Description
     * @param String listIDRemoveFloor Description
     * @param String listIDRemoveBOQ Description
     * @param String listIDRemovePeriod Description
     * @param String coordinatesChange Description true false
     * @param file file Description
     * @param String fileUpload Description
     * @return boolean results Description
     * @description แก้ไขคำชี้แจงรายละเอียดสิ่งก่อสร้างต่อเนื่อง
     */
    public function editBuildingMore($building, $listBuildFloor, $listBOQ, $listBuildPeriod, $listCoordinates, $listIDRemoveFloor, $listIDRemoveBOQ, $listIDRemovePeriod, $coordinatesChange,$file,$fileUpload);


    /**
     * @name removeBuildingMore
     * @uri /removeBuildingMore
     * @param apps\common\entity\Building building Description
     * @return boolean results Description
     * @description ลบคำชี้แจงรายละเอียดสิ่งก่อสร้าง
     */
    public function removeBuildingMore($building);

}
