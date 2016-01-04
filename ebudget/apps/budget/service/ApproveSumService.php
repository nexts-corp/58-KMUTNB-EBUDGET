<?php
/**
 * Created by PhpStorm.
 * User: KaowNeaw
 * Date: 1/4/2016
 * Time: 10:57 AM
 */

namespace apps\budget\service;


use apps\budget\interfaces\IApproveSumService;
use apps\budget\interfaces\year;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class ApproveSumService extends CServiceBase implements IApproveSumService
{
    public $datacontext;
    public $ent = "apps\\common\\entity";
    public $md = "apps\\common\\model";

    public function __construct()
    {
        $this->datacontext = new CDataContext();
    }

    public function approveSumBudgetRequest($year)
    {

        $sql = " SELECT bgAll.*,bgType.BUDGETTYPENAME as bgTypeName FROM " .
            "(" .
            "SELECT formType,typeId,SUM(bgSum) as Summary FROM " .
            "(" .
            "SELECT '140' as formType,BUDGETHEADID as headId,BUDGETTYPEID as TypeId,BUDGETSUMMARY as bgSum FROM BUDGET140 WHERE BUDGETPERIODID = " . $year . " AND TRACKINGSTATUSID = 3 UNION ALL " .
            "SELECT '141' as formType,BUDGETHEADID as headId,BUDGETTYPEID as TypeId,BUDGETSUMMARY as bgSum FROM BUDGET141 WHERE BUDGETPERIODID = " . $year . " AND TRACKINGSTATUSID = 3  UNION ALL " .
            "SELECT '142' as formType,BUDGETHEADID as headId,BUDGETTYPEID as TypeId,BUDGETSUMMARY as bgSum FROM BUDGET142 WHERE BUDGETPERIODID = " . $year . " AND TRACKINGSTATUSID = 3  UNION ALL " .
            "SELECT '143' as formType,BUDGETHEADID as headId,BUDGETTYPEID as TypeId,BUDGETSUMMARY as bgSum FROM BUDGET143 WHERE BUDGETPERIODID = " . $year . " AND TRACKINGSTATUSID = 3  UNION ALL " .
            "SELECT '144' as formType,BUDGETHEADID as headId,BUDGETTYPEID as TypeId,BUDGETSUMMARY as bgSum FROM BUDGET144 WHERE BUDGETPERIODID = " . $year . " AND TRACKINGSTATUSID = 3  UNION ALL " .
            "SELECT '145' as formType,BUDGETHEADID as headId,BUDGETTYPEID as TypeId,BUDGETSUMMARY as bgSum FROM BUDGET145 WHERE BUDGETPERIODID = " . $year . " AND TRACKINGSTATUSID = 3  UNION ALL " .
            "SELECT '146' as formType,BUDGETHEADID as headId,BUDGETTYPEID as TypeId,BUDGETSUMMARY as bgSum FROM BUDGET146 WHERE BUDGETPERIODID = " . $year . " AND TRACKINGSTATUSID = 3" .
            ") as BUDGETALL GROUP BY TypeId,formType " .

            ") bgAll INNER JOIN BUDGETTYPE bgType ON bgAll.typeId = bgType.BUDGETTYPEID ORDER BY bgAll.TypeId ";

        $result = $this->datacontext->pdoQuery($sql);

        return $result;
    }
}