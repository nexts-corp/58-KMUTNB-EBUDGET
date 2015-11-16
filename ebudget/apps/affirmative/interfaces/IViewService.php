<?php

namespace apps\affirmative\interfaces;

/**
 * @name ViewService
 * @uri /view
 * @description ViewService
 */
interface IViewService {

    /**
     * @name home
     * @uri /home
     * @description ยื่นคำของบประมาณ
     */
    public function home();

    /**
     * @name homeAdmin
     * @uri /homeAdmin
     * @description ยื่นคำของบประมาณ
     */
    public function homeAdmin();

    /**
     * @name center
     * @uri /center
     * @description ยื่นคำของบประมาณ
     */
    public function center();

    /**
     * @name draft
     * @uri /draft
     * @param string deptId
     * @description ยื่นคำของบประมาณ
     */
    public function draft($deptId);

    /**
     * @name final
     * @uri /final
     * @param string deptId
     * @description ยื่นคำของบประมาณ
     */
    public function finalz($deptId);

    /**
     * @name resultAll
     * @uri /resultAll
     * @description ยื่นคำของบประมาณ
     */
    public function resultAll();

    /**
     * @name result
     * @uri /result
     * @param string deptId
     * @description ยื่นคำของบประมาณ
     */
    public function result($deptId);
}
