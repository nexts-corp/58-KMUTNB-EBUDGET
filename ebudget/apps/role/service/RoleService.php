<?php

namespace apps\role\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\role\interfaces\IRoleService;
use th\co\bpg\cde\data\CDataContext;

use apps\common\entity\Role;
use apps\common\entity\MenuRole;
use apps\common\service\LookupService;


class RoleService extends CServiceBase implements IRoleService {
    

    public $datacontext;
    public $pathEnt = "apps\\common\\entity";
    public $baseUrl = "api\\role\\manage";
    
    function __construct() {
        $this->datacontext = new CDataContext();
    }

    public function viewManage() {
        
        $view = new CJView("role/manage", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function viewlistRole() {
        $model = new Role();
        return $this->datacontext->getObject($model);
    }

    public function checkMenurole($data) {
        
        
        //echo count($data->listdata);
        //echo count($data->roledata);
        $i=0;
        $status=array();
        while($i<count($data->listdata)){
            //$data->listdata[$i][0];
            
            $a=0;
            while($a<count($data->roledata)){
                
                    $sql = "select exMenuRole "
                            . " from " . $this->pathEnt . "\\MenuRole exMenuRole"
                            . " WHERE exMenuRole.listId = :listId "
                            . " AND exMenuRole.roleId = :roleId ";
                     $param = array(
                         "listId" => $data->listdata[$i][0],
                         "roleId" => $data->roledata[$a]
                     );
                     $Menurole=$this->datacontext->getObject($sql,$param);
                     
                     if(count($Menurole)>0){
                        array_push($status, array(
                            "listId" => $data->listdata[$i][0], 
                            "roleId" => $data->roledata[$a], 
                            "status" => 1,
                        ));

                        
                        //return true;
                    }else{
                        array_push($status, array(
                            "listId" => $data->listdata[$i][0], 
                            "roleId" => $data->roledata[$a], 
                            "status" => 0,
                        ));
                        //return false;
                    }
                    
                    
                     
                $a++;
            }
            
            $i++;
        }
        //$object = (object) $status;
        return $status;
        /*
        
        
        $Menurole=$this->datacontext->getObject($sql,$param);
        
        $Menurole = new MenuRole();
        $Menurole->getListId($data->listId);
        $Menurole->getRoleId($data->roleId);
        */
        
    }

    public function managerole($data) {
        if($data->status=="1"){
            
            $MenuRole = new MenuRole();
            $MenuRole->setListId($data->listId);
            $MenuRole->setRoleId($data->roleId);

            print_r($MenuRole);
            
            //print_r($MemberRole);
            if($this->datacontext->saveObject($MenuRole)){
                return true;
            }else{
                return false;
            }
            
        }else{
            //echo "OK";
            $MenuRole = new MenuRole();
            $MenuRole->setListId($data->listId);
            $MenuRole->setRoleId($data->roleId);
            
            $data = $this->datacontext->getObject($MenuRole);
            
            if($this->datacontext->removeObject($data)){
                return true;
            }else{
                return false;
            }
            
        }
    }

}
