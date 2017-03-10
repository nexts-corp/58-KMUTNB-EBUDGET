<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Type")
 */
class BudgetType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetTypeId")
     */
    public $id;

    /** @Column(type="string",length=500, name="BudgetTypeName") */
    public $typeName;

    /** @Column(type="integer",length=5, name="BudgetPeriodId") */
    public $bgPeriodId;

    /** @Column(type="integer",length=11, name="MasterId") */
    public $masterId;

    /** @Column(type="integer",length=11, name="LevelId") */
    public $level;

    /** @Column(type="string",length=1, name="BudgetTypeCode") */
    public $typeCode;

    /** @Column(type="boolean", name="IsFixedCost") */
    public $isFixedCost;

    /** @Column(type="boolean", name="Form140") */
    public $form140;

    /** @Column(type="boolean", name="Form141") */
    public $form141;

    /** @Column(type="boolean", name="Form142") */
    public $form142;

    /** @Column(type="boolean", name="Form143") */
    public $form143;

    /** @Column(type="boolean", name="Form144") */
    public $form144;

    /** @Column(type="boolean", name="Form145") */
    public $form145;

    /** @Column(type="boolean", name="Form146") */
    public $form146;

    /** @Column(type="boolean", name="FormExpense") */
    public $formExpense;

    function getId() {
        return $this->id;
    }

    function getTypeName() {
        return $this->typeName;
    }

    function getBgPeriodId() {
        return $this->bgPeriodId;
    }

    function getMasterId() {
        return $this->masterId;
    }

    function getLevel() {
        return $this->level;
    }

    function getTypeCode() {
        return $this->typeCode;
    }

    function getIsFixedCost() {
        return $this->isFixedCost;
    }

    function getForm140() {
        return $this->form140;
    }

    function getForm141() {
        return $this->form141;
    }

    function getForm142() {
        return $this->form142;
    }

    function getForm143() {
        return $this->form143;
    }

    function getForm144() {
        return $this->form144;
    }

    function getForm145() {
        return $this->form145;
    }

    function getForm146() {
        return $this->form146;
    }

    function getFormExpense() {
        return $this->formExpense;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTypeName($typeName) {
        $this->typeName = $typeName;
    }

    function setBgPeriodId($bgPeriodId) {
        $this->bgPeriodId = $bgPeriodId;
    }

    function setMasterId($masterId) {
        $this->masterId = $masterId;
    }

    function setLevel($level) {
        $this->level = $level;
    }

    function setTypeCode($typeCode) {
        $this->typeCode = $typeCode;
    }

    function setIsFixedCost($isFixedCost) {
        $this->isFixedCost = $isFixedCost;
    }

    function setForm140($form140) {
        $this->form140 = $form140;
    }

    function setForm141($form141) {
        $this->form141 = $form141;
    }

    function setForm142($form142) {
        $this->form142 = $form142;
    }

    function setForm143($form143) {
        $this->form143 = $form143;
    }

    function setForm144($form144) {
        $this->form144 = $form144;
    }

    function setForm145($form145) {
        $this->form145 = $form145;
    }

    function setForm146($form146) {
        $this->form146 = $form146;
    }

    function setFormExpense($formExpense) {
        $this->formExpense = $formExpense;
    }

}

?>
