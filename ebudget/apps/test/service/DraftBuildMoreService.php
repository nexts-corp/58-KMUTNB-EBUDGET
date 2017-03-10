<?php

namespace apps\budget\service;

use apps\budget\interfaces\apps;
use apps\budget\interfaces\budgetType;
use apps\budget\interfaces\coordinatesChange;
use apps\budget\interfaces\IDraftBuildMoreService;
use apps\budget\interfaces\listIDRemoveBOQ;
use apps\budget\interfaces\listIDRemoveFloor;
use apps\budget\interfaces\listIDRemovePeriod;
use apps\budget\interfaces\quater;
use apps\budget\interfaces\year;
use apps\common\entity\Attachment;
use apps\common\entity\Building;
use apps\common\entity\BuildingBOQ;
use apps\common\entity\BuildingFloorPlan;
use apps\common\entity\BuildingPeriod;
use apps\common\entity\Coordinates;
use apps\common\entity\TrackingStatus;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IDraft146Service;
use apps\common\entity;
use apps\common\entity\BudgetHead;

use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class DraftBuildMoreService extends CServiceBase implements IDraftBuildMoreService
{

    public $datacontext;
    public $ent = "apps\\common\\entity";

    public function __construct()
    {
        $this->datacontext = new CDataContext();
    }


    public function insertBuildingMore($building, $listBuildFloor, $listBOQ, $listBuildPeriod, $listCoordinates,$file)
    {

        $return = array();
        $json = new CJSONDecodeImpl();
        $convBuilding = json_decode($building);
        $convBuildFloor = json_decode($listBuildFloor);
        $convBuildPeriod = json_decode($listBuildPeriod);
        $convlistCoordinates = json_decode($listCoordinates);

        $building = $json->decode(new Building(), $convBuilding);
        $listBuildFloor = $json->decode(new BuildingFloorPlan(), $convBuildFloor);
        $listBuildPeriod = $json->decode(new BuildingPeriod(), $convBuildPeriod);
        $listCoordinates = $json->decode(new Coordinates(), $convlistCoordinates);


        if ($file != '') {

            if ($file != "undefined") {
                $time = date("YmdHis");
                $target_dir = "apps\\budget\\views\\draft\\attachment\\";

                $target_file = $target_dir . "Building" . $time . "-" . $file["name"];
                $fileN = "Building" . $time . "-" . $file["name"];

                if (move_uploaded_file($file["tmp_name"], $target_file)) {

                    $att = new Attachment();
                    $att->path = $fileN;

                    if (!$this->datacontext->saveObject($att)) {

                        $return = $this->datacontext->getLastMessage();
                    } else {
                        //upload success
                        $building[0]->attachmentId = $att->id;
                    }
                }
            }
        }


        foreach ($building as $key => $value) {

            if (!$this->datacontext->saveObject($value)) {

                $return["result"] = false;
                $return["msg"] = $this->datacontext->getLastMessage();

            } else {
                $return["result"] = true;
                $return["idBuilding"] = $building[$key]->id;

                foreach ($listBuildFloor as $key2 => $value2) {

                    $listBuildFloor[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idBuildFloor"] = $listBuildFloor[$key2]->id;
                    }
                }

//                foreach ($listBOQ as $key2 => $value2) {
//
//                    $listBOQ[$key2]->setBuildingId($building[$key]->id);
//
//                    if (!$this->datacontext->saveObject($value2)) {
//                        $return["result"] = false;
//                        $return["msg"] = $this->datacontext->getLastMessage();
//                    } else {
//                        $return["result"] = true;
//                        $return["idBoq"] = $listBOQ[$key2]->id;
//                    }
//                }

                foreach ($listBuildPeriod as $key2 => $value2) {

                    $listBuildPeriod[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idBoq"] = $listBuildPeriod[$key2]->id;
                    }
                }

                foreach ($listCoordinates as $key2 => $value2) {

                    $listCoordinates[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idCoordinate"] = $listCoordinates[$key2]->id;
                    }
                }
            }
        }

        return $return;
    }

    public function editBuildingMore($building, $listBuildFloor, $listBOQ, $listBuildPeriod, $listCoordinates, $listIDRemoveFloor, $listIDRemoveBOQ, $listIDRemovePeriod, $coordinatesChange,$file,$fileUpload)
    {

        $json = new CJSONDecodeImpl();
        $convBuilding = json_decode($building);
        $convBuildFloor = json_decode($listBuildFloor);
        $convBuildPeriod = json_decode($listBuildPeriod);
        $convlistCoordinates = json_decode($listCoordinates);

        $listIDRemoveFloor = json_decode($listIDRemoveFloor);
        $listIDRemovePeriod = json_decode($listIDRemovePeriod);
        $coordinatesChange = json_decode($coordinatesChange);

        $building = $json->decode(new Building(), $convBuilding);
        $listBuildFloor = $json->decode(new BuildingFloorPlan(), $convBuildFloor);
        $listCoordinates = $json->decode(new Coordinates(), $convlistCoordinates);
        $listBuildPeriod = $json->decode(new BuildingPeriod(), $convBuildPeriod);

        $return = array();
        foreach ($building as $key => $value) {

            if ($fileUpload == "1") {
                $time = date("YmdHis");
                $target_dir = "apps\\budget\\views\\draft\\attachment\\";

                $update = new Building();
                $update->id = $value->id;
                $data = $this->datacontext->getObject($update);

                if ($data[0]->attachmentId != null) {

                    $update2 = new Attachment();
                    $update2->id = $data[0]->attachmentId;
                    $data2 = $this->datacontext->getObject($update2);

                    if (file_exists($target_dir . $data2[0]->path)) {

                        unlink($target_dir . $data2[0]->path);
                        $return["path"] = '';

                        $data[0]->attachmentId = null;

                        if (!$this->datacontext->updateObject($data[0])) {
                            $return = $this->datacontext->getLastMessage();
                        } else {
                            if (!$this->datacontext->removeObject($data2[0])) {
                                $return = $this->datacontext->getLastMessage();
                            }
                        }
                    }
                }

                if ($file !== "undefined") {
                    //new upload file
                    $time = date("YmdHis");
                    $target_dir = "apps\\budget\\views\\draft\\attachment\\";

                    $target_file = $target_dir . "Building" . $time . "-" . $file["name"];
                    $fileN = "Building" . $time . "-" . $file["name"];

                    if (move_uploaded_file($file["tmp_name"], $target_file)) {

                        $update = new Attachment();
                        $update->path = $fileN;

                        if (!$this->datacontext->saveObject($update)) {
                            $return = $this->datacontext->getLastMessage();

                        } else {
                            $value->attachmentId = $update->id;
                        }
                    }
                }
            }



            if (!$this->datacontext->updateObject($building)) {

                $return["result"] = false;
                $return["msgBuilding"] = $this->datacontext->getLastMessage();
            } else {

//                foreach ($listBOQ as $key2 => $value2) {
//
//                    $value2->setBuildingId($building[$key]->id);
//                    $value2->setDateCreated(null); // Entity is set Auto
//
//                    if (isset($value2->id)) {
//
//                        if ($this->datacontext->updateObject($value2)) {
//                            $return["result"] = true;
//                            $return["msgBoq"] = $this->datacontext->getLastMessage();
//                        } else {
//                            $return["result"] = false;
//                            $return["msgBoq"] = $this->datacontext->getLastMessage();
//                        }
//                    } else {
//
//                        if ($this->datacontext->saveObject($value2)) {
//                            //insert BuildingDetail
//                            $return["result"] = true;
//                            $return["msgBoq"] = $this->datacontext->getLastMessage();
//                        } else {
//                            $return["result"] = false;
//                            $return["msgBoq"] = $this->datacontext->getLastMessage();
//                        }
//                    }
//                }//end loop $listBOQ

                foreach ($listBuildFloor as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null); // Entity is set Auto

                    if (isset($value2->id) && $value2->id != "-1") {

                        if ($this->datacontext->updateObject($value2)) {
                            $return["result"] = true;
                            $return["msgBuildFloor"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBuildFloor"] = $this->datacontext->getLastMessage();
                        }
                    } else {

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildFloor
                            $return["result"] = true;
                            $return["msgBuildFloor"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBuildFloor"] = $this->datacontext->getLastMessage();
                        }
                    }
                }//end loop $listBuildFloor

                foreach ($listBuildPeriod as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null); // Entity is set Auto

                    if (isset($value2->id) && $value2->id != "-1") {

                        if ($this->datacontext->updateObject($value2)) {
                            $return["result"] = true;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        }
                    } else {

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildingDetail
                            $return["result"] = true;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        }
                    }
                }//end loop $listBuildPeriod

                if ($coordinatesChange) {
                    //remove and new insert coordinates
                    $sql = "DELETE  FROM COORDINATES WHERE BUILDINGID = " . $building[$key]->id;
                    $this->datacontext->pdoDelete($sql);
                    //insert new coordinates
                    foreach ($listCoordinates as $key2 => $value2) {

                        $value2->setBuildingId($building[$key]->id);

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildingDetail
                            $return["result"] = true;
                            $return["msgCoordinates"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgCoordinates"] = $this->datacontext->getLastMessage();
                        }
                    }
                }
            }
        } //loop building

//        foreach ($listIDRemoveBOQ as $key => $value) { //remove object
//            if (isset($value)) {
//                $obj = new BuildingBOQ();
//                $obj->setId($value);
//                if ($this->datacontext->removeObject($obj)) {
//                    $return["result"] = true;
//                    $return["msgRemoveBOQ"] = $this->datacontext->getLastMessage();
//                } else {
//                    $return["result"] = false;
//                    $return["msgRemoveBOQ"] = $this->datacontext->getLastMessage();
//                }
//            }
//        }

        foreach ($listIDRemoveFloor as $key => $value) { //remove object
            if (isset($value)) {
                $obj = new BuildingFloorPlan();
                $obj->setId($value);
                if ($this->datacontext->removeObject($obj)) {
                    $return["result"] = true;
                    $return["msgRemoveBuildingFloorPlan"] = $this->datacontext->getLastMessage();
                } else {
                    $return["result"] = false;
                    $return["msgRemoveBuildingFloorPlan"] = $this->datacontext->getLastMessage();
                }
            }
        }

        foreach ($listIDRemovePeriod as $key => $value) { //remove object
            if (isset($value)) {
                $obj = new BuildingPeriod();
                $obj->setId($value);
                if ($this->datacontext->removeObject($obj)) {
                    $return["result"] = true;
                    $return["msgRemoveBuildingPeriod"] = $this->datacontext->getLastMessage();
                } else {
                    $return["result"] = false;
                    $return["msgRemoveBuildingPeriod"] = $this->datacontext->getLastMessage();
                }
            }
        }

        return $return;
    }

    public function removeBuildingMore($building)
    {
        $return = array();
        foreach ($building as $key => $value) {
            if (isset($building[$key]->id)) {
                //remove Coordinates
                $sql = "DELETE  FROM COORDINATES WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove BUILDING_FLOORPLAN
                $sql = "DELETE  FROM BUILDING_FLOORPLAN WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove BUILDING_PERIOD
                $sql = "DELETE  FROM BUILDING_PERIOD WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove BoQ
                $sql = "DELETE  FROM BUILDING_BOQ WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove Building
                if ($this->datacontext->removeObject($value)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }
            }
        }
        return $return;
    }
}
