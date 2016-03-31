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
                . "left join " . $this->ent . "\\BudgetSetting setting with year.year = setting.budgetPeriodId";

        $dataYear = $this->datacontext->getObject($year);
        $list = array();
        foreach ($dataYear as $key => $value) {
            $data = array(
                "id" => $value["id"],
                "year" => $value["year"],
                "yearStatus" => $value["yearStatus"],
                "dateClose" => $value["dateClose"]->format('d-m-Y'),
                "isClosed" => $value["isClosed"]
            );
            $list[$key] = $data;
        }
        return $list;
    }

    public function saveSetting($bgPeriodId, $activeYear, $setClose, $dateClose) {
        $year = new entity\Year();
        $year->setYear($bgPeriodId);
        $dataYear = $this->datacontext->getObject($year);

        $dataYear[0]->setYearStatus($activeYear);
        $dataYear[0]->setDateUpdated(date("Y-m-d H:i:s"));

        if (!$this->datacontext->updateObject($dataYear[0])) {
            return false;
        }

        $setting = new entity\BudgetSetting();
        $setting->setBudgetPeriodId($bgPeriodId);
        $dataSetting = $this->datacontext->getObject($setting);

        $dataSetting[0]->setIsClosed($setClose);     
        //$dataSetting[0]->setDateClose(date_format($dateClose, 'd-m-Y'));
        $dataSetting[0]->setDateUpdated(date("Y-m-d H:i:s"));
        if (!$this->datacontext->updateObject($dataSetting[0])) {
            return false;
        }

        return true;
    }

}
