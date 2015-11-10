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
     * @description ยื่นคำของบประมาณ
     */
    public function draft();

    /**
     * @name tracking
     * @uri /tracking
     * @description ยื่นคำของบประมาณ
     */
    public function tracking();
}
