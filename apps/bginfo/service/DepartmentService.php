<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use th\co\bpg\cde\core\CServiceBase;
use apps\bginfo\interfaces\IDepartmentService;
use th\co\bpg\cde\data\CDataContext;
use apps\common\entity\ActivityType;
use apps\common\entity\Campus;
use apps\common\entity\Department;

class DepartmentService extends CServiceBase implements IDepartmentService {

    public $datacontext;

    function __construct() {

        $this->datacontext = new CDataContext();
    }

    public function viewDepartment() {

        $view = new CJView("viewDepartment", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function fetchCampus() {
        $obj = new Campus();
        $obj->setCampusStatus("Y");
        return $this->datacontext->getObject($obj);
    }

    public function fetchDepartment($idFaculty) {
        $obj = new Department();
        $obj->setMasterId($idFaculty);
        $obj->setDeptStatus("Y");
        return $this->datacontext->getObject($obj);
    }

    public function fetchFaculty($idCampus) {
        $obj = new Department();
        $obj->setCampusId($idCampus);
        $obj->setMasterId(0);
        $obj->setDeptStatus("Y");
        return $this->datacontext->getObject($obj);
    }

    public function fetchActivityType() {
        $obj = new ActivityType();
        $obj->setActTypeStatus("Y");
        return $this->datacontext->getObject($obj);
    }

    public function insertCampus($campus) {
        $data = new Campus();
        $data->setCampusName($campus->campusName);
        $data->setCampusStatus($campus->isActive);
        $data->setCreator($campus->creator);

        if ($this->datacontext->saveObject($data)) {
            return true;
        }
        return false;
    }

    public function editCampus($campus) {
        $data = new Campus();
        $data->setId($campus->id);
        $data->setCampusName($campus->campusName);
        if ($this->datacontext->updateObject($data)) {
            return true;
        }
        return false;
    }

    public function removeCampus($campus) {
        $data = new Campus();
        $data->setId($campus->id);
        $data->setCampusStatus($campus->isActive);
        if ($this->datacontext->updateObject($data)) {
            return true;
        }
        return false;
    }

    public function insertFaculty($faculty) {
        $data = new LKFaculty();
        $data->setFacultyName($faculty->facultyName);
        $data->setCampusId($faculty->campusId);
        $data->setIsActive("1");
        $data->setCreator($faculty->creator);
        $data->setActivityTypeId($faculty->activityTypeId);

        if ($this->datacontext->saveObject($data)) {
            return true;
        }
        return false;
    }

    public function editFaculty($faculty) {

        $data = new LKFaculty();
        $data->setId($faculty->id);
        $data->setFacultyName($faculty->facultyName);
        $data->setCampusId($faculty->campusId);
        $data->setCreator($faculty->creator);
        $data->setActivityTypeId($faculty->activityTypeId);
        $data->setUpdater($faculty->updater);

        if ($this->datacontext->updateObject($data)) {
            return true;
        }
        return false;
    }

    public function removeFaculty($faculty) {
        $data = new LKFaculty();
        $data->setId($faculty->id);
        $data->setIsActive($faculty->isActive);
        if ($this->datacontext->updateObject($data)) {
            return true;
        }
        return false;
    }

    public function insertDeaprtment($department) {
        $data = new LKDepartment();
        $data->setIsActive($department->isActive);
        $data->setFacultyId($department->facultyId);
        $data->setDeptName($department->deptName);
        $data->setCampusId($department->campusId);
        $data->setCreator($department->creator);

        if ($this->datacontext->saveObject($data)) {
            return true;
        }
        return false;
    }

    public function editDeaprtment($department) {
        $data = new LKDepartment();
        $data->setId($department->id);
        $data->setIsActive($department->isActive);
        $data->setFacultyId($department->facultyId);
        $data->setDeptName($department->deptName);
        $data->setCampusId($department->campusId);
        $data->setCreator($department->creator);

        if ($this->datacontext->updateObject($data)) {
            return true;
        }
        return false;
    }

    public function removeDeaprtment($department) {
        $data = new LKDepartment();
        $data->setId($department->id);
        $data->setIsActive($department->isActive);
        if ($this->datacontext->updateObject($data)) {
            return true;
        }
        return false;
    }

}
