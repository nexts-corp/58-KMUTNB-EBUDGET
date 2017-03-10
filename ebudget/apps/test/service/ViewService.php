<?php

namespace apps\budget\service;


use th\co\bpg\cde\core\CServiceBase;
use apps\budget\interfaces\IViewService;

class ViewService extends CServiceBase implements IViewService
{
    public function hello(){
	    echo "Hello";
	    exit();
    }
    
}
