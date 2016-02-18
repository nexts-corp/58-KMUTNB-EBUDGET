<?php
namespace apps\bginfo\interfaces;

/**
 * @name UnitService
 * @uri /unit
 * @description ระบบจัดการหน่วยงาน
 */
interface IUnitService {
    /**
     * @name listsUnit
     * @uri /listsUnit
     * @description แผนกลยุทธ์
     * @return String[] lists Description
     */
    public function listsUnit();

    /**
     * @name insertUnit
     * @uri /insertUnit
     * @param apps\common\entity\AffirmativeUnit pData Description
     * @return boolean add Description
     * @description เพิ่มหน่วยนับ
     */
    public function insertUnit($pData);

    /**
     * @name updateUnit
     * @uri /updateUnit
     * @param apps\common\entity\AffirmativeUnit pData Description
     * @return boolean update Description
     * @description แก้ไขหน่วยนับ
     */
    public function updateUnit($pData);

    /**
     * @name deleteUnit
     * @uri /deleteUnit
     * @param integer id Description
     * @return boolean delete Description
     * @description ลบหน่วยนับ
     */
    public function deleteUnit($id);

}
