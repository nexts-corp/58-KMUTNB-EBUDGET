<?php

namespace apps\member\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\member\interfaces\IMemberService;
use th\co\bpg\cde\data\CDataContext;

use apps\common\entity\Member;


class MemberService extends CServiceBase implements IMemberService {
    

    public $datacontext;
    public $pathEnt = "apps\\common\\entity";
    
    function __construct() {
        $this->datacontext = new CDataContext();
    }
    

    public function viewManage() {
        $view = new CJView("Member/manage", CJViewType::HTML_VIEW_ENGINE);
        return $view;
        
    }

    
    public function fetchMember($pData) {
        
        return $this->datacontext->getObject($pData);
        
    }
    
    
    public function saveMember($pData,$editId) {
        //return $pData;
        if($editId==NULL){ 
            $this->datacontext->saveObject($pData);
        }else{
            $query = new Member();
            $query->setId($editId);
            if($this->datacontext->removeObject($query)){
                $this->datacontext->saveObject($pData);
            }
        }
        return $pData;
    }
    
    public function delMember($pData) {
        $query = new Member();
        $query->setId($pData->id);
        return $this->datacontext->removeObject($query);
    }
}
