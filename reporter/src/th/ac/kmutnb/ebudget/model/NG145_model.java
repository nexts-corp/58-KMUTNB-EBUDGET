/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package th.ac.kmutnb.ebudget.model;

import java.math.BigDecimal;
import javax.persistence.Column;
import javax.persistence.Entity;

/**
 *
 * @author KaowNeaw
 */
@Entity
public class NG145_model extends BaseReport{
    
    @Column
    Integer bgPlanId;
    @Column
    String bgPlanName;
    @Column
    Integer bgProjectId;
    @Column
    String bgProjectName;
    @Column
    Integer facultyId;
    @Column
    String facultyName;
    @Column
    Integer deptId;
    @Column
    String deptName;
    @Column
    Integer bgTypeMainId;
    @Column
    String bgTypeMainName;
    @Column
    Integer bgTypeId;
    @Column
    String bgTypeName;
    @Column
    String bgName;
    @Column
    Integer bgQty;
    @Column
    BigDecimal bgPrice = BigDecimal.ZERO;
    String bgUnit;
    @Column
    BigDecimal bgPriceTotal = BigDecimal.ZERO;
    @Column
    Integer bgNeeded;
    @Column
    Integer bgNumWork;
    @Column
    Integer bgNumUnwork;
    @Column
    String remark;

    public Integer getBgPlanId() {
        return bgPlanId;
    }

    public void setBgPlanId(Integer bgPlanId) {
        this.bgPlanId = bgPlanId;
    }

    public String getBgPlanName() {
        return bgPlanName;
    }

    public void setBgPlanName(String bgPlanName) {
        this.bgPlanName = bgPlanName;
    }

    public Integer getBgProjectId() {
        return bgProjectId;
    }

    public void setBgProjectId(Integer bgProjectId) {
        this.bgProjectId = bgProjectId;
    }

    public String getBgProjectName() {
        return bgProjectName;
    }

    public void setBgProjectName(String bgProjectName) {
        this.bgProjectName = bgProjectName;
    }

    public Integer getFacultyId() {
        return facultyId;
    }

    public void setFacultyId(Integer facultyId) {
        this.facultyId = facultyId;
    }

    public String getFacultyName() {
        return facultyName;
    }

    public void setFacultyName(String facultyName) {
        this.facultyName = facultyName;
    }

    public Integer getDeptId() {
        return deptId;
    }

    public void setDeptId(Integer deptId) {
        this.deptId = deptId;
    }

    public String getDeptName() {
        return deptName;
    }

    public void setDeptName(String deptName) {
        this.deptName = deptName;
    }

    public Integer getBgTypeMainId() {
        return bgTypeMainId;
    }

    public void setBgTypeMainId(Integer bgTypeMainId) {
        this.bgTypeMainId = bgTypeMainId;
    }

    public String getBgTypeMainName() {
        return bgTypeMainName;
    }

    public void setBgTypeMainName(String bgTypeMainName) {
        this.bgTypeMainName = bgTypeMainName;
    }

    public Integer getBgTypeId() {
        return bgTypeId;
    }

    public void setBgTypeId(Integer bgTypeId) {
        this.bgTypeId = bgTypeId;
    }

    public String getBgTypeName() {
        return bgTypeName;
    }

    public void setBgTypeName(String bgTypeName) {
        this.bgTypeName = bgTypeName;
    }

    public String getBgName() {
        return bgName;
    }

    public void setBgName(String bgName) {
        this.bgName = bgName;
    }

    public Integer getBgQty() {
        return bgQty;
    }

    public void setBgQty(Integer bgQty) {
        this.bgQty = bgQty;
    }

    public BigDecimal getBgPrice() {
        return bgPrice;
    }

    public void setBgPrice(BigDecimal bgPrice) {
        this.bgPrice = bgPrice;
    }

    public String getBgUnit() {
        return bgUnit;
    }

    public void setBgUnit(String bgUnit) {
        this.bgUnit = bgUnit;
    }

    public BigDecimal getBgPriceTotal() {
        return bgPriceTotal;
    }

    public void setBgPriceTotal(BigDecimal bgPriceTotal) {
        this.bgPriceTotal = bgPriceTotal;
    }

    public Integer getBgNeeded() {
        return bgNeeded;
    }

    public void setBgNeeded(Integer bgNeeded) {
        this.bgNeeded = bgNeeded;
    }

    public Integer getBgNumWork() {
        return bgNumWork;
    }

    public void setBgNumWork(Integer bgNumWork) {
        this.bgNumWork = bgNumWork;
    }

    public Integer getBgNumUnwork() {
        return bgNumUnwork;
    }

    public void setBgNumUnwork(Integer bgNumUnwork) {
        this.bgNumUnwork = bgNumUnwork;
    }

    public String getRemark() {
        return remark;
    }

    public void setRemark(String remark) {
        this.remark = remark;
    }
   


}
