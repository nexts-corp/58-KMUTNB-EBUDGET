<?php

namespace apps\budget\service;

use apps\budget\interfaces\ISettingService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;
use apps\common\entity;

class SettingService extends CServiceBase implements ISettingService {

    public $datacontext;
    public $logger;
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    public function listsYear() {
        $year = "select year.id, year.year, year.yearStatus, setting.dateClose, setting.isClosed "
                . "from " . $this->ent . "\\Year year "
                . "join " . $this->ent . "\\BudgetSetting setting with year.year = setting.budgetPeriodId";

        $dataYear = $this->datacontext->getObject($year);
        return $dataYear;
    }

    public function saveSetting($bgPeriodId, $activeYear, $setClose, $dateClose) {
        $year = new entity\Year();
        $year->setYear($bgPeriodId);
        $dataYear = $this->datacontext->getObject($year);

        $year->setYearStatus($activeYear);
        if (!$this->datacontext->updateObject($year)) {
            return false;
        }

        $setting = new entity\BudgetSetting();
        $setting->setBudgetPeriodId($bgPeriodId);
        $dataSetting = $this->datacontext->getObject($setting);

        $setting->setIsClosed($setClose);
        $setting->setDateClose($dateClose);
        if (!$this->datacontext->updateObject($setting)) {
            return false;
        }

        return true;
    }

}
