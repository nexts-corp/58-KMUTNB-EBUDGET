<?php

namespace apps\member\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\member\interfaces\IMemberService;
use th\co\bpg\cde\data\CDataContext;

use apps\common\entity\Role;
use apps\common\entity\Member;
use apps\common\entity\MemberRole;
use apps\common\entity\MenuRole;
use apps\common\service\LookupService;
use apps\common\model\VMember;


class MemberService extends CServiceBase implements IMemberService {
    

    public $datacontext;
    public $pathEnt = "apps\\common\\entity";
    public $baseUrl = "api\\member\\Member";
    
    function __construct() {
        $this->datacontext = new CDataContext();
    }
    

    public function viewManage() {
        $view = new CJView("Member/manage", CJViewType::HTML_VIEW_ENGINE);
        
        //ค้นหาประเภทสิทธิการใช้งาน
        $list = new Role();
        $listRole=$this->datacontext->getObject($list);
        $view->listRole=$listRole;
        
        
        //แสดงรายชื่อผู้ใช้งาน
        //$Member = new Member();
        $sql = "select exMember.id, exMember.firstname, exMember.lastname , exMember.email , exMember.telephone, exDept.deptName "
               . " from " . $this->pathEnt . "\\Member exMember"
               . " join " . $this->pathEnt . "\\L3D\\Department exDept with exMember.deptId = exDept.id";
               //. " join " . $this->pathEnt . "\\MemberRole exRole with exRole.memberId = exMember.id ";
        $param = array(
        );
        
        
        $Member=$this->datacontext->getObject($sql);
        
        
        $i=1;
        foreach ($Member as $key => $value) {
           $Member[$key]['rowNo']=$i++;
             
        }
        //print_r($Member);
        $view->Member=$Member;
        
       
        
        return $view;
        
    }

    public function listRole() {
        $list = new Role();
        return $this->datacontext->getObject($list);
    }

    public function viewCreate() {
        

        $view = new CJView("Member/create", CJViewType::HTML_VIEW_ENGINE);
        
        $list = new LookupService();
        $listDept = $list->listDepartment(null);
        $view->dept=$listDept;
        
        //ค้นหาประเภทสิทธิการใช้งาน
        $list = new Role();
        $listRole=$this->datacontext->getObject($list);
        $view->listRole=$listRole;
        
        return $view;
    }

    public function checkUsername($data) {
        
       // print_r($data);
        //ค้นหาจำนวนว่ามี user ซ้ำหรือไม่
       // $Member = new Member();
        $sql = "select exMember "
               . " from " . $this->pathEnt . "\\Member exMember"
               . " WHERE exMember.username = :username ";
        $param = array(
            "username" => $data->username
        );
        
        $Member=$this->datacontext->getObject($sql,$param);
        $count=  count($Member);
        return $count;
    }

    public function saveMember($data) {
        
        //print_r($data);
        $model = new Member();
        $model->setFirstname($data->firstname);
        $model->setLastname($data->lastname);
        $model->setDeptId($data->deptId);
        $model->setEmail($data->email);
        $model->setTelephone($data->telephone);
        $model->setUsername($data->username);
        $model->setPassword(md5($data->password));
        
        if($this->datacontext->saveObject($model)){
            /*
            $id=$model->getId();
            
            $MemberRole = new MemberRole();
            $MemberRole->setMemberId($id);
            
            $MemberRole->setRoleId($data->roleId);
           
            //print_r($MemberRole);
            if($this->datacontext->saveObject($MemberRole)){
                return true;
            }else{
                return false;
            }*/
            return true;
        }else{

            return false;

        }
    }

    public function viewEdit($id=null) {
        
      
        
        $view = new CJView("Member/edit", CJViewType::HTML_VIEW_ENGINE);
        
        $list = new LookupService();
        $listDept = $list->listDepartment(null);
        $view->dept=$listDept;
        
        //ค้นหาประเภทสิทธิการใช้งาน
        $list = new Role();
        $listRole=$this->datacontext->getObject($list);
        //$view->listRole=$listRole;
        
       
        $view->id=$id; //ส่ง id สำหรับค้นหารหัส member
        return $view;
    }

    public function viewForm($id=null) {
        
        $view = new CJView("Member/form", CJViewType::HTML_VIEW_ENGINE);
        
        $list = new LookupService();
        $listDept = $list->listDepartment(null);
        $view->depattment=$listDept;
      
        $getMember=new Member();
        if(isset($id) && $id!=null){
            /*
            $getMember->setId($id);
            $getMember=$this->datacontext->getObject($getMember);
            $getMember=$getMember[0];
            */
            // function __construct($id, $username, $password, $deptId, $firstname, $lastname, $email
            // , $telephone) {
            $sql = "select new \\apps\\common\\model\\VMember( "
                    . " exMember.id,"
                    . " exMember.username, "
                    . " exMember.password, "
                    . " exMember.deptId, "
                    . " exMember.firstname, "
                    . " exMember.lastname, "
                    . " exMember.email, "
                    . " exMember.telephone "
                    //. " exRole.roleId "
                    . ") "
               . " from " . $this->pathEnt . "\\Member exMember"
               . " join " . $this->pathEnt . "\\L3D\\Department exDept with exMember.deptId = exDept.id"
               //. " join " . $this->pathEnt . "\\MemberRole exRole with exRole.memberId = exMember.id "
               . " where exMember.id = :id ";
            $param = array(
                "id" => $id
            );
            $getMember=$this->datacontext->getObject($sql,$param);           
            $getMember=$getMember[0];
            
        }
        $view->member=$getMember;
        //print_r($view->member);
        //ค้นหาประเภทสิทธิการใช้งาน
        /*
        $list = new Role();
        $listRole=$this->datacontext->getObject($list);
        
        $result = array();
        foreach ($listRole as $key => $value) {
            
            $listRole[$key]->year = $value->year;
            
        }
        */
        return $view;
    }

    public function editMember($data) {
        $model = new Member();
        $model->setId($data->id);
        $model->setFirstname($data->firstname);
        $model->setLastname($data->lastname);
        $model->setDeptId($data->deptId);
        $model->setEmail($data->email);
        $model->setTelephone($data->telephone);
        
        if($this->datacontext->updateObject($model)){
            return true;
           /*
            $MemberRole = new MemberRole();
            $MemberRole->setMemberId($data->id);
            $MemberRole->setRoleId($data->roleId);
           
            if($this->datacontext->updateObject($MemberRole)){
                return true;
            }else{
                return false;
            }
            */
        }else{

            return false;

        }
    }

    public function viewChangePassword($id=null) {
        
        $view = new CJView("Member/changepassword", CJViewType::HTML_VIEW_ENGINE);
        
        $getMember=new Member();
        if(isset($id) && $id!=null){
        
            $getMember->setId($id);
            $getMember=$this->datacontext->getObject($getMember);
            $getMember=$getMember[0];
        }
        $view->member=$getMember;
        
        
        return $view;
    }

    public function savePassword($data) {
        $model = new Member();
        $model->setId($data->id);
        $model->setPassword(md5($data->password));

        if($this->datacontext->updateObject($model)){

            return true;

        }else{

            return false;

        }
   
    }

    public function delete($data) {
        
        if($this->datacontext->removeObject($data)){
            return true;
        }else{
            return false;
        }
    }

    public function listMember($data) {
        
        //$view = new CJView("Member/manage", CJViewType::HTML_VIEW_ENGINE);
        
        
        
        
        //แสดงรายชื่อผู้ใช้งาน
        $Member = new Member();
        
        if($data->roleId!=null){
            $sql = "select exMember.id, exMember.firstname, exMember.lastname , exMember.email , exMember.telephone, exDept.deptName "
                   . " from " . $this->pathEnt . "\\Member exMember"
                   . " join " . $this->pathEnt . "\\L3D\\Department exDept with exMember.deptId = exDept.id"
                   . " join " . $this->pathEnt . "\\MemberRole exRole with exRole.memberId = exMember.id "
                   . " where exRole.roleId = :roleId ";
            $param = array(
                "roleId" => $data->roleId
            );
            $Member=$this->datacontext->getObject($sql,$param);
        }else{
            
            $sql = "select exMember.id, exMember.firstname, exMember.lastname , exMember.email , exMember.telephone, exDept.deptName "
                   . " from " . $this->pathEnt . "\\Member exMember"
                   . " join " . $this->pathEnt . "\\L3D\\Department exDept with exMember.deptId = exDept.id"
                   . " join " . $this->pathEnt . "\\MemberRole exRole with exRole.memberId = exMember.id ";
            $Member=$this->datacontext->getObject($sql);
        }
        
        
        
        
        $i=1;
        foreach ($Member as $key => $value) {
           $Member[$key]['rowNo']=$i++;
             
        }
        //print_r($Member);
        

        return $Member;
    }

    public function viewManageRole($data) {
        
        $view = new CJView("role/managerole", CJViewType::HTML_VIEW_ENGINE);
        
        $member=new Member();
        $member->setId($data);
        
        $Member=$this->datacontext->getObject($member);
        $view->Member=$Member;
        return $view;
    }

    public function managerole($data) {
        
        $MenuRole = new MenuRole();
        //$MenuRole->setRoleId($data->roleId);
        $MenuRole->setListId($data->listId);
        $MenuRole->setMemberId($data->memberId);
        $MenuRole=$this->datacontext->getObject($MenuRole);
        /*
        if($data->roleId=="None"){
            foreach ($MenuRole as $key => $value){
                if(!$this->datacontext->removeObject($MenuRole)){
                    return false;
                }

            }

            
        }else{
        */
            if(count($MenuRole)>0){
                foreach ($MenuRole as $key => $value){
                    $MenuRole[$key]->setRoleId($data->roleId);
                    if(!$this->datacontext->updateObject($MenuRole)){
                        return false;
                    }

                }

                //$MenuRole->setRoleId($data->roleId);

                //$this->datacontext->updateObject($MenuRole);



            }else{
                $MenuRole = new MenuRole();
                $MenuRole->setRoleId($data->roleId);
                $MenuRole->setListId($data->listId);
                $MenuRole->setMemberId($data->memberId);
                if($this->datacontext->saveObject($MenuRole)){
                    return true;
                }else{
                    return false;
                }

            }
        
        //}
        
       // print_r($data);
        
    }

    public function checkMenurole($data,$memberId) {

        //echo $data[0]->data[0]->id;
        //echo $memberId;
        $i=0;
        while($i<count($data)){
            
            $j=0;
            while($j<count($data[$i]->func)){
                
                
                $MenuRole = new MenuRole();
                $MenuRole->setListId($data[$i]->func[$j]->id);
                $MenuRole->setMemberId($memberId);
                $MenuRole=$this->datacontext->getObject($MenuRole);
                
                //echo count($MenuRole).'<br/>';
                if(count($MenuRole)>0){

                    $data[$i]->func[$j]->role=$MenuRole[0]->getRoleId();
                }
                //echo $data[$i]->data[$j]->id.'<br>';
                
                
                $j++;
            }
            $i++;
        }
        return $data;
    }

}
