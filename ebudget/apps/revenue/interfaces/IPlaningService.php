<?php

namespace apps\revenue\interfaces;

/**
 * @name IPlaningService
 * @uri /planing
 * @description ประมูล
 */
interface IPlaningService {
    /**
     * @name fetchRevenue
     * @uri /fetchRevenue
     * @return String[] lists Description
     * @description หน้าเพิ่มเงินจัดสรรเงินรายได้
     */
    public function fetchRevenue();

    /**
     * @name deleteRevenue
     * @uri /deleteRevenue
     * @param int id
     * @return boolean delete Description
     * @description ลบเงินจัดสรรเงินรายได้
     */
    public function deleteRevenue($id);
}
