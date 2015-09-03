<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IProductionPlanService;
use th\co\bpg\cde\data\CDataContext;

use apps\common\entity\BudgetPlan;
use apps\common\entity\RevenuePlan;
use apps\common\entity\BudgetProduct;
use apps\common\entity\RevenueProduct;

class ProductionPlanService extends CServiceBase implements IProductionPlanService {
    

    public $datacontext;
    function __construct() {
        $this->datacontext = new CDataContext();
    }
    

    public function viewManage() {
        $view = new CJView("ProductionPlan/manage", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }
    
    
    
    
    public function fetchPlan($year,$budget) {
        $sql="SELECT plan FROM apps\\common\\entity\\".$budget."Plan plan WHERE plan.budgetYear=:budgetYear AND plan.isActive=1 ORDER BY plan.id";
        return $this->datacontext->getObject($sql,array("budgetYear"=>$year));
    }
    
    public function fetchProduct($planId,$budget) {
        $sql="SELECT product FROM apps\\common\\entity\\".$budget."Product product WHERE product.budgetPlanId=:planId AND product.isActive=1 ORDER BY product.id";
        return $this->datacontext->getObject($sql,array("planId"=>$planId));
    }
    
    
    
    
    public function insertPlan($year,$name,$budget){
        if($budget=="Budget"){
            $lists = new BudgetPlan();
        }else if($budget=="Revenue"){
            $lists = new RevenuePlan();
        }
        
        $lists->setBudgetYear($year);
        $lists->setPlanName($name);
        $lists->setIsActive(1);
        
        if(!$this->datacontext->getObject($lists)){
            $this->datacontext->saveObject($lists);
            return $lists;
        }else{
            return "exist";
        }
    }
    
    
    public function insertProduct($year,$planId,$name,$type,$budget){
        if($budget=="Budget"){
            $lists = new BudgetProduct();
        }else if($budget=="Revenue"){
            $lists = new RevenueProduct();
        }
        
        $lists->setBudgetYear($year);
        $lists->setProductName($name);
        $lists->setBudgetPlanId($planId);
        $lists->setType($type);
        $lists->setIsActive(1);
        
        if(!$this->datacontext->getObject($lists)){
            $this->datacontext->saveObject($lists);
            return $lists;
        }else{
            return "exist";
        }
    }
    
    
    
    
    
    
    
    public function updatePlan($year,$id,$name,$budget){
        
        if($budget=="Budget"){
            $lists = new BudgetPlan();
        }else if($budget=="Revenue"){
            $lists = new RevenuePlan();
        }
        
        
        $lists->setBudgetYear($year);
        $lists->setPlanName($name);
        $lists->setIsActive(1);
        
        $chNotExist = false;
        if(!$this->datacontext->getObject($lists)){
            $lists->setId($id);
            $chNotExist = true;
            
        }else{
            $lists->setId($id);
            if($this->datacontext->getObject($lists)){
                $chNotExist = true;
            }
        }
        
        if($chNotExist){
            $this->datacontext->updateObject($lists);
            return $lists;
        }else{
            return "exist";
        }
        
        
    }
    
    
    public function updateProduct($year,$id,$name,$type,$budget){
        
        if($budget=="Budget"){
            $lists = new BudgetProduct();
        }else if($budget=="Revenue"){
            $lists = new RevenueProduct();
        }
        
        
        $lists->setBudgetYear($year);
        $lists->setProductName($name);
        $lists->setType($type);
        $lists->setIsActive(1);
        
        $chNotExist = false;
        if(!$this->datacontext->getObject($lists)){
            $lists->setId($id);
            $chNotExist = true;
            
        }else{
            $lists->setId($id);
            if($this->datacontext->getObject($lists)){
                $chNotExist = true;
            }
        }
        
        if($chNotExist){
            $this->datacontext->updateObject($lists);
            return $lists;
        }else{
            return "exist";
        }
        
        
    }
    
    
    
    public function deletePlan($id,$budget){
        
        if($budget=="Budget"){
            $lists=new BudgetPlan();
        }else if($budget=="Revenue"){
            $lists=new RevenuePlan();
        }
        
        $lists->setId($id);
        $lists->setIsActive(0);
        
        return $this->datacontext->updateObject($lists);

    }
    
    
    
    public function deleteProduct($id,$budget){
        
        if($budget=="Budget"){
            $lists=new BudgetProduct();
        }else if($budget=="Revenue"){
            $lists=new RevenueProduct();
        }
        
        $lists->setId($id);
        $lists->setIsActive(0);
        
        return $this->datacontext->updateObject($lists);

    }
    
    
    

}
