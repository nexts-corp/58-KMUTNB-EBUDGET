<?php

namespace apps\report\interfaces;

/**
 * @name ViewService
 * @uri /rptservice
 * @description ViewService
 */
interface IReport3DService
{

    /**
     * @name listDept
     * @uri /listDept
     * @param String group
     * @description หน่วยงานแบ่งตามกลุ่ม
     * @return String[] lists Description
     */
    public function listDept($group);

    /**
     * @name listl3dplan
     * @uri /listl3dplan
     * @description L3D_Plan
     * @return String[] lists Description
     */
    public function listL3DPlan();

    /**
     * @name listl3dfund
     * @uri /listl3dfund
     * @description L3D_Fundgroup
     * @return String[] lists Description
     */
    public function listL3DFund();

}
