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
public class LR1_4_model extends BaseReport {

    @Column
    Integer planId;
    @Column
    String planName;
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
    BigDecimal subSide = BigDecimal.ZERO;
    @Column
    private BigDecimal tempWages = BigDecimal.ZERO;
    @Column
    private BigDecimal compensation = BigDecimal.ZERO;
    @Column
    private BigDecimal livingCost = BigDecimal.ZERO;
    @Column
    private BigDecimal matCost = BigDecimal.ZERO;
    @Column
    private BigDecimal utilityCost = BigDecimal.ZERO;
    @Column
    private BigDecimal durableCost = BigDecimal.ZERO;
    @Column
    private BigDecimal buildingCost = BigDecimal.ZERO;
    @Column
    private BigDecimal otherCost = BigDecimal.ZERO;

    public Integer getPlanId() {
        return planId;
    }

    public void setPlanId(Integer planId) {
        this.planId = planId;
    }

    public String getPlanName() {
        return planName;
    }

    public void setPlanName(String planName) {
        this.planName = planName;
    }

    public BigDecimal getSubSide() {
        return subSide;
    }

    public void setSubSide(BigDecimal subSide) {
        this.subSide = subSide;
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

    public BigDecimal getTempWages() {
        return tempWages;
    }

    public void setTempWages(BigDecimal tempWages) {
        this.tempWages = tempWages;
    }

    public BigDecimal getCompensation() {
        return compensation;
    }

    public void setCompensation(BigDecimal compensation) {
        this.compensation = compensation;
    }

    public BigDecimal getLivingCost() {
        return livingCost;
    }

    public void setLivingCost(BigDecimal livingCost) {
        this.livingCost = livingCost;
    }

    public BigDecimal getMatCost() {
        return matCost;
    }

    public void setMatCost(BigDecimal matCost) {
        this.matCost = matCost;
    }

    public BigDecimal getUtilityCost() {
        return utilityCost;
    }

    public void setUtilityCost(BigDecimal utilityCost) {
        this.utilityCost = utilityCost;
    }

    public BigDecimal getDurableCost() {
        return durableCost;
    }

    public void setDurableCost(BigDecimal durableCost) {
        this.durableCost = durableCost;
    }

    public BigDecimal getBuildingCost() {
        return buildingCost;
    }

    public void setBuildingCost(BigDecimal buildingCost) {
        this.buildingCost = buildingCost;
    }

    public BigDecimal getOtherCost() {
        return otherCost;
    }

    public void setOtherCost(BigDecimal otherCost) {
        this.otherCost = otherCost;
    }

}
