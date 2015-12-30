<?php

namespace apps\budget\service;

use apps\budget\interfaces\apps;
use apps\budget\interfaces\budgetType;
use apps\budget\interfaces\coordinatesChange;
use apps\budget\interfaces\IDraftBuildOneService;
use apps\budget\interfaces\listIDRemoveBOQ;
use apps\budget\interfaces\listIDRemoveBuildingOne;
use apps\budget\interfaces\quater;
use apps\budget\interfaces\year;
use apps\common\entity\BuildingBOQ;
use apps\common\entity\BuildingDetail;
use apps\common\entity\TrackingStatus;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IDraft146Service;
use apps\common\entity;
use apps\common\entity\BudgetHead;

use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class DraftBuildOneService extends CServiceBase implements IDraftBuildOneService
{

    public $datacontext;
    public $ent = "apps\\common\\entity";

    public function __construct()
    {
        $this->datacontext = new CDataContext();
    }

    public function insertBuildingOne($building, $listBuildDetail, $listBOQ, $listCoordinates)
    {
        $return = array();

        foreach ($building as $key => $value) {

            if (!$this->datacontext->saveObject($value)) {
                $return["result"] = false;
                $return["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return["result"] = true;
                $return["idBuilding"] = $building[$key]->id;

                foreach ($listBuildDetail as $key2 => $value2) {

                    $listBuildDetail[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idBuildDetail"] = $listBuildDetail[$key2]->id;
                    }
                }

                foreach ($listBOQ as $key2 => $value2) {

                    $listBOQ[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idBoq"] = $listBOQ[$key2]->id;
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

    public function editBuildingOne($building, $listBuildDetail, $listBOQ, $listCoordinates, $listIDRemoveBuildingOne, $listIDRemoveBOQ, $coordinatesChange)
    {
        $return = array();
        foreach ($building as $key => $value) {

            if (!$this->datacontext->updateObject($building)) {

                $return["result"] = false;
                $return["msgBuilding"] = $this->datacontext->getLastMessage();
            } else {

                foreach ($listBOQ as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null); // Entity is set Auto

                    if (isset($value2->id)) {

                        if ($this->datacontext->updateObject($value2)) {
                            $return["result"] = true;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        }
                    } else {

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildingDetail
                            $return["result"] = true;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        }
                    }
                }//end loop $listBOQ

                foreach ($listBuildDetail as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null); // Entity is set Auto

                    if (isset($value2->id)) {

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
                }//end loop $listBuildDetail

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

            }//else update building is ok
        } //loop building

        foreach ($listIDRemoveBOQ as $key => $value) { //remove object
            if (isset($value)) {
                $obj = new BuildingBOQ();
                $obj->setId($value);
                if ($this->datacontext->removeObject($obj)) {
                    $return["result"] = true;
                    $return["msgRemoveBOQ"] = $this->datacontext->getLastMessage();
                } else {
                    $return["result"] = false;
                    $return["msgRemoveBOQ"] = $this->datacontext->getLastMessage();
                }
            }
        }

        foreach ($listIDRemoveBuildingOne as $key => $value) { //remove object
            if (isset($value)) {
                $obj = new BuildingDetail();
                $obj->setId($value);
                if ($this->datacontext->removeObject($obj)) {
                    $return["result"] = true;
                    $return["msgRemoveBuildingOne"] = $this->datacontext->getLastMessage();
                } else {
                    $return["result"] = false;
                    $return["msgRemoveBuildingOne"] = $this->datacontext->getLastMessage();
                }
            }
        }

        return $return;
    }

    public function removeBuildingOne($building)
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

                //remove BUILDING_DETAIL
                $sql = "DELETE  FROM BUILDING_DETAIL WHERE BUILDINGID = " . $building[$key]->id;
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
