<?php
/**
 * Created by PhpStorm.
 * User: KaowNeaw
 * Date: 12/24/2015
 * Time: 10:06 AM
 */

namespace apps\budget\service;


use apps\budget\interfaces\IUpdateTrackingStatus;
use apps\common\entity\BudgetHead;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class updateTrackingStatus extends CServiceBase implements IUpdateTrackingStatus
{

    public $datacontext;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct()
    {
        $this->datacontext = new CDataContext();
    }

    public function updateTrackingBG($bgType, $listBg, $status)
    {
        $return = array();

        foreach ($listBg as $key => $value) {

            if (isset($value)) {

                $class = $this->ent . "\\" . $bgType;
                $object = new $class();

                if ($status == 2) {

                    if ($value->statusId == 1 || $value->statusId == 4) {

                        $object->setId($value->id);
                        $object->setStatusId($status);

                    } else if ($value->statusId == 2) {

                        $return["status"] = true;
                    }

                } else if ($status == 3 || $status == 4) {

                    $object->setId($value->id);
                    $object->setStatusId($status);
                }

                if ($object->getId() != null) {

                    if ($this->datacontext->updateObject($object)) {
                        $return["status"] = true;
                        if (isset($value->budgetHeadId)) {

                            if ($this->updateBudgetHead($value->budgetHeadId, $bgType, $status)) {
                                $return["status"] = true;
                            } else {
                                $return["status"] = false;
                                $return["msg"] = $this->datacontext->getLastMessage();
                            }
                        }
                    } else {
                        $return["status"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    }
                }
            }// end isset
        }

        return $return;
    }

    private function updateBudgetHead($id, $formType, $statusId)
    {
        $result = true;

        if ($statusId == "2" || $statusId == "4") {

            $bgh = new BudgetHead();
            $bgh->setId($id);
            $bgh->setStatusId($statusId);
            if (!$this->datacontext->updateObject($bgh)) {
                $result = false;
            }

        } else if ($statusId == "3") {

            $sql = "select count(*) as num from " . $this->ent . "\\" . $formType . " bg "
                . "where bg.budgetHeadId = :budgetHeadId "
                . "and bg.statusId in (1,2,4) ";
            $param = array("budgetHeadId" => $id);
            $bg = $this->datacontext->getObject($sql, $param);

            if (count($bg) == 0) {
                $bgh = new BudgetHead();
                $bgh->setId($id);
                $bgh->setStatusId(5);
                if (!$this->datacontext->updateObject($bgh)) {
                    $result = false;
                }
            }
        }

        return $result;
    }


}