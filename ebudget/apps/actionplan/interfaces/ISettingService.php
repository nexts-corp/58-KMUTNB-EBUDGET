<?php

namespace apps\actionplan\interfaces;

/**
 * @name ISettingService
 * @uri /setting
 * @description ประมูล
 */
interface ISettingService {

    /**
     * @name listsGroup
     * @uri /listsGroup
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsGroup();

    /**
     * @name listsMain
     * @uri /listsMain
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsMain();

    /**
     * @name listsType
     * @uri /listsType
     * @param string mainId
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsType($mainId);

    /**
     * @name listsSetting
     * @uri /listsSetting
     * @param string groupCode
     * @return String[] lists Description
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function listsSetting($groupCode);

    /**
     * @name set
     * @uri /set
     * @param apps\common\entity\AffirmativeSetting setting
     * @return String[] set
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function set($setting);

    /**
     * @name delete
     * @uri /delete
     * @param apps\common\entity\AffirmativeSetting setting
     * @return String[] delete
     * @description ผู้เสนอราคาสูงสุดต่อคลัง
     */
    public function delete($setting);
}
