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
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    public function listsGroup() {
        $group = new \apps\common\entity\ActivityType();
        return $this->datacontext->getObject($group);
    }

    public function listsMain() {
        $main = new \apps\affirmative\entity\AffirmativeMain();
        $main->periodCode = $this->getPeriod()->year;
        return $this->datacontext->getObject($main);
    }

    public function listsType($mainId) {
        $type = new \apps\affirmative\entity\AffirmativeType();
        $type->mainId = $mainId;
        return $this->datacontext->getObject($type);
    }

    public function listsSetting($groupCode) {
        $setting = new \apps\affirmative\entity\AffirmativeSetting();
        $setting->periodCode = $this->getPeriod()->year;
        $setting->groupCode = $groupCode;
        return $this->datacontext->getObject($setting);
    }

    public function set($setting) {
        return $setting;
    }

}
