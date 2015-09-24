<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETTYPE")
 */
class BudgetType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BUDGETTYPEID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=500, name="BUDGETTYPENAME") */
    public $typeName;

    /** @Column(type="integer",length=11, name="MASTERID") */
    public $masterId;

    /** @Column(type="integer",length=11, name="LEVELID") */
    public $level;

    /** @Column(type="string",length=1, name="BUDGETTYPECODE") */
    public $typeCode;

    /** @Column(type="boolean", name="FORM140") */
    public $form140;

    /** @Column(type="boolean", name="FORM141") */
    public $form141;

    /** @Column(type="boolean", name="FORM142") */
    public $form142;

    /** @Column(type="boolean", name="FORM143") */
    public $form143;

    /** @Column(type="boolean", name="FORM144") */
    public $form144;

    /** @Column(type="boolean", name="FORM145") */
    public $form145;

    /** @Column(type="boolean", name="FORM146") */
    public $form146;

    /** @Column(type="boolean", name="FORMEXPENSE") */
    public $formExpense;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getTypeName() {
        return $this->typeName;
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

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTypeName($typeName) {
        $this->typeName = $typeName;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
