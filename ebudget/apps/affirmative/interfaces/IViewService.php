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
     * @name setting
     * @uri /setting
     * @description ยื่นคำของบประมาณ
     */
    public function setting();

    /**
     * @name center
     * @uri /center
     * @description ยื่นคำของบประมาณ
     */
    public function center();

    /**
     * @name draftAll
     * @uri /draftAll
     * @description ยื่นคำของบประมาณ
     */
    public function draftAll();

    /**
     * @name draft
     * @uri /draft
     * @param string deptId
     * @description ยื่นคำของบประมาณ
     */
    public function draft($deptId);

    /**
     * @name finalAll
     * @uri /finalAll
     * @description ยื่นคำของบประมาณ
     */
    public function finalAll();

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
