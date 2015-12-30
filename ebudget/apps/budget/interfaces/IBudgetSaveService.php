<?php

namespace apps\budget\interfaces;

/**
 * @name BudgetSaveService
 * @uri /budgetSave
 * @description BudgetSaveService
 */
interface IBudgetSaveService
{

    /**
     * @name insertBudget140
     * @uri /insertBudget140
     * @param apps\common\entity\Budget140 budget Description
     * @return boolean result
     * @description เพิ่มคำขอแบบ ง.140
     */
    public function insertBudget140($budget);

    /**
     * @name updateBudget140
     * @uri /updateBudget140
     * @param apps\common\entity\Budget140 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.140
     */
    public function updateBudget140($budget);

    /**
     * @name deleteBudget140
     * @uri /deleteBudget140
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.140
     */
    public function deleteBudget140($budgetId);

    /**
     * @name insertBudget141
     * @uri /insertBudget141
     * @param apps\common\entity\Budget141 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.141
     */
    public function insertBudget141($budget);

    /**
     * @name updateBudget141
     * @uri /updateBudget141
     * @param apps\common\entity\Budget141 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.141
     */
    public function updateBudget141($budget);

    /**
     * @name deleteBudget141
     * @uri /deleteBudget141
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.141
     */
    public function deleteBudget141($budgetId);

    /**
     * @name insertBudget142
     * @uri /insertBudget142
     * @param apps\common\entity\Budget142 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.142
     */
    public function insertBudget142($budget);

    /**
     * @name updateBudget142
     * @uri /updateBudget142
     * @param apps\common\entity\Budget142 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.142
     */
    public function updateBudget142($budget);

    /**
     * @name deleteBudget142
     * @uri /deleteBudget142
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.142
     */
    public function deleteBudget142($budgetId);

    /**
     * @name insertBudget143
     * @uri /insertBudget143
     * @param apps\common\entity\Budget143 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.143
     */
    public function insertBudget143($budget);

    /**
     * @name updateBudget143
     * @uri /updateBudget143
     * @param apps\common\entity\Budget143 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.143
     */
    public function updateBudget143($budget);

    /**
     * @name deleteBudget143
     * @uri /deleteBudget143
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.143
     */
    public function deleteBudget143($budgetId);

    /**
     * @name insertBudget144
     * @uri /insertBudget144
     * @param apps\common\entity\Budget144 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.144
     */
    public function insertBudget144($budget);

    /**
     * @name updateBudget144
     * @uri /updateBudget144
     * @param apps\common\entity\Budget144 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.144
     */
    public function updateBudget144($budget);

    /**
     * @name deleteBudget144
     * @uri /deleteBudget144
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.144
     */
    public function deleteBudget144($budgetId);

    /**
     * @name insertBudget145
     * @uri /insertBudget145
     * @param apps\common\entity\Budget145 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.145
     */
    public function insertBudget145($budget);

    /**
     * @name updateBudget145
     * @uri /updateBudget145
     * @param apps\common\entity\Budget145 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.145
     */
    public function updateBudget145($budget);

    /**
     * @name deleteBudget145
     * @uri /deleteBudget145
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.145
     */
    public function deleteBudget145($budgetId);

    /**
     * @name insertBudget146
     * @uri /insertBudget146
     * @param apps\common\entity\Budget146 budget Description
     * @return boolean result Description
     * @description เพิ่มคำขอแบบ ง.146
     */
    public function insertBudget146($budget);

    /**
     * @name updateBudget146
     * @uri /updateBudget146
     * @param apps\common\entity\Budget146 budget Description
     * @return boolean result Description
     * @description แก้ไขคำขอแบบ ง.146
     */
    public function updateBudget146($budget);

    /**
     * @name deleteBudget146
     * @uri /deleteBudget146
     * @param int budgetId Description
     * @return boolean result Description
     * @description ลบคำขอแบบ ง.146
     */
    public function deleteBudget146($budgetId);


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

    /**
     * @name uploadF
     * @uri /uploadF
     * @param file file
     * @return boolean results Description
     * @description แนบไฟล์เอกสาร
     */
    public function uploadFileAttachment($file);

    /**
     * @name insertAtt
     * @uri /insertAtt
     * @param apps\common\entity\Attachment att Description
     * @return boolean results Description
     * @description ตารางข้อมูลเอกสาร
     */
    public function InsertAttachment($att);

    /**
     * @name editAtt
     * @uri /editAtt
     * @param apps\common\entity\Attachment att Description
     * @return boolean results Description
     * @description แก้ไขตารางข้อมูลเอกสาร
     */
    public function editAttachment($att);


    /**
     * @name delAtt
     * @uri /delAtt
     * @param string attachmentID Description
     * @param string path Description
     * @param string budgetID Description
     * @param string formBudget Description
     * @return boolean results Description
     * @description ลบตารางข้อมูลเอกสาร
     */
    public function deleteAttachment($attachmentID, $path, $budgetID, $formBudget);

    /**
     * @name updateStatus
     * @uri /updateStatus
     * @param string bgType Description
     * @param object listBg Description listID Budget
     * @param string status Description
     * @return boolean results Description
     * @description เปลี่ยนแปลงสถานะทั้งหมด
     */
    public function updateStatusBG($bgType, $listBg, $status);

     /**
     * @name updateComment
     * @uri /updateComment
     * @param apps\common\entity\Budget data
     * @param apps\common\entity\Budget bgType
     * @return boolean result Description
     * @description อัพเดทหมายเหตุ
     */
    public function updateComment($data,$bgType);
    
    
}
