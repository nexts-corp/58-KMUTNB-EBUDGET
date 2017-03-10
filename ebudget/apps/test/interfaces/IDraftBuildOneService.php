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
     * @param string building Description
     * @param string listBuildDetail Description
     * @param string listBOQ Description
     * @param string listCoordinates Description
     * @param file file Description
     * @return boolean results Description
     * @description เพิ่มคำชี้แจงรายละเอียดสิ่งก่อสร้าง
     */
    public function insertBuildingOne($building, $listBuildDetail, $listBOQ, $listCoordinates,$file);


    /**
     * @name editBuildingOne
     * @uri /editBuildingOne
     * @param string building Description
     * @param string listBuildDetail Description
     * @param string listBOQ Description
     * @param string listCoordinates Description
     * @param String listIDRemoveBuildingOne Description
     * @param String listIDRemoveBOQ Description
     * @param String coordinatesChange Description true false
     * @param file file Description
     * @param String fileUpload Description
     * @return boolean results Description
     * @description แก้ไขคำชี้แจงรายละเอียดสิ่งก่อสร้าง
     */
    public function editBuildingOne($building, $listBuildDetail, $listBOQ, $listCoordinates, $listIDRemoveBuildingOne, $listIDRemoveBOQ, $coordinatesChange,$file,$fileUpload);

    /**
     * @name removeBuildingOne
     * @uri /removeBuildingOne
     * @param apps\common\entity\Building building Description
     * @return boolean results Description
     * @description ลบคำชี้แจงรายละเอียดสิ่งก่อสร้าง
     */
    public function removeBuildingOne($building);


}
