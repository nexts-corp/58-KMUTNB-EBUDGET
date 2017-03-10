<?php

namespace apps\affirmative\service;

use apps\affirmative\interfaces\ISettingService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class SettingService extends CServiceBase implements ISettingService {

    public $datacontext;
    public $logger;

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->year = 2559;
        return $this->datacontext->getObject($year)[0];
    }

    public function listsGroup() {
        $group = new \apps\common\entity\ActivityType();
        return $this->datacontext->getObject($group);
    }

    public function listsMain() {
        $main = new \apps\common\entity\AffirmativeMain();
        $main->periodCode = $this->getPeriod()->year;
        return $this->datacontext->getObject($main);
    }

    public function listsType($mainId) {
        $type = new \apps\common\entity\AffirmativeType();
        $type->mainId = $mainId;
        return $this->datacontext->getObject($type);
    }

    public function listsSetting($groupCode) {
        $setting = new \apps\common\entity\AffirmativeSetting();
        $setting->periodCode = $this->getPeriod()->year;
        $setting->groupCode = $groupCode;
        return $this->datacontext->getObject($setting);
    }

    public function set($setting) {
        $periodCode = $this->getPeriod()->year;
        foreach ($setting as $key => $val) {
            $val->periodCode = $periodCode;

            $set = new \apps\common\entity\AffirmativeSetting();
            $set->periodCode = $periodCode;
            $set->groupCode = $val->groupCode;
            $set->mainId = $val->mainId;
            $set->typeId = $val->typeId;
            $data = $this->datacontext->getObject($set);
            if (count($data) > 0 && $val->typeSeq == 0) { //ถ้ามีข้อมูลเดิม แต่ข้อมูลใหม่ typeSeq = 0 ก็ลบข้อมูลเดิมทิ้ง
                if (!$this->datacontext->removeObject($data)) {
                    $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                    return false;
                }
            } elseif (count($data) > 0 && $val->typeSeq != 0) { //ถ้ามีข้อมูลเดิม แต่ข้อมูลใหม่ typeSeq != 0 ให้อัพเดทข้อมูลใหม่
                $val->settingId = $data[0]->settingId; // setting id ให้ ข้อมูลใหม่ จะได้ update ได้เลย
                if (!$this->datacontext->updateObject($val)) {
                    $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                    return false;
                }
            } elseif (count($data) == 0 && $val->typeSeq != 0) { //ถ้าไม่มีข้อมูลเดิม แล้วข้อมูลใหม่ typeSeq != 0 ให้เพิ่มข้อมูล
                if (!$this->datacontext->saveObject($val)) {
                    $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
                    return false;
                }
            }
        }
        return true;
    }

    public function delete($setting) {
        $setting->periodCode = $this->getPeriod()->year;
        $data = $this->datacontext->getObject($setting);
        if (!$this->datacontext->removeObject($data)) {
            $this->getResponse()->add("msg", $this->datacontext->getLastMessage());
            return false;
        }
        return true;
    }

}
