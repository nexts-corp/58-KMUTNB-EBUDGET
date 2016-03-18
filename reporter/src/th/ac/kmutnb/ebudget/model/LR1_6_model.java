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
public class LR1_6_model extends BaseReport {

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
    private BigDecimal generalFund;
    @Column
    private BigDecimal eduFund;
    @Column
    private BigDecimal researchFunds;
    @Column
    private BigDecimal outreachFund;
    @Column
    private BigDecimal affairsFund;
    @Column
    private BigDecimal assetsFund;
    @Column
    private BigDecimal otherFund;
    @Column
    private BigDecimal culturalFund;
    @Column
    private BigDecimal funds;
    @Column
    private BigDecimal welfareFund;
    @Column
    private BigDecimal devFund;
    @Column
    private BigDecimal boardFund;
    @Column
    private BigDecimal institutionsFund;
    @Column
    private BigDecimal purposeFund;
    @Column
    private BigDecimal inventoryFund;
    @Column
    private BigDecimal techKMUTNBFund;

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

    public BigDecimal getGeneralFund() {
        return generalFund;
    }

    public void setGeneralFund(BigDecimal generalFund) {
        this.generalFund = generalFund;
    }

    public BigDecimal getEduFund() {
        return eduFund;
    }

    public void setEduFund(BigDecimal eduFund) {
        this.eduFund = eduFund;
    }

    public BigDecimal getResearchFunds() {
        return researchFunds;
    }

    public void setResearchFunds(BigDecimal researchFunds) {
        this.researchFunds = researchFunds;
    }

    public BigDecimal getOutreachFund() {
        return outreachFund;
    }

    public void setOutreachFund(BigDecimal outreachFund) {
        this.outreachFund = outreachFund;
    }

    public BigDecimal getAffairsFund() {
        return affairsFund;
    }

    public void setAffairsFund(BigDecimal affairsFund) {
        this.affairsFund = affairsFund;
    }

    public BigDecimal getAssetsFund() {
        return assetsFund;
    }

    public void setAssetsFund(BigDecimal assetsFund) {
        this.assetsFund = assetsFund;
    }

    public BigDecimal getOtherFund() {
        return otherFund;
    }

    public void setOtherFund(BigDecimal otherFund) {
        this.otherFund = otherFund;
    }

    public BigDecimal getCulturalFund() {
        return culturalFund;
    }

    public void setCulturalFund(BigDecimal culturalFund) {
        this.culturalFund = culturalFund;
    }

    public BigDecimal getFunds() {
        return funds;
    }

    public void setFunds(BigDecimal funds) {
        this.funds = funds;
    }

    public BigDecimal getWelfareFund() {
        return welfareFund;
    }

    public void setWelfareFund(BigDecimal welfareFund) {
        this.welfareFund = welfareFund;
    }

    public BigDecimal getDevFund() {
        return devFund;
    }

    public void setDevFund(BigDecimal devFund) {
        this.devFund = devFund;
    }

    public BigDecimal getBoardFund() {
        return boardFund;
    }

    public void setBoardFund(BigDecimal boardFund) {
        this.boardFund = boardFund;
    }

    public BigDecimal getInstitutionsFund() {
        return institutionsFund;
    }

    public void setInstitutionsFund(BigDecimal institutionsFund) {
        this.institutionsFund = institutionsFund;
    }

    public BigDecimal getPurposeFund() {
        return purposeFund;
    }

    public void setPurposeFund(BigDecimal purposeFund) {
        this.purposeFund = purposeFund;
    }

    public BigDecimal getInventoryFund() {
        return inventoryFund;
    }

    public void setInventoryFund(BigDecimal inventoryFund) {
        this.inventoryFund = inventoryFund;
    }

    public BigDecimal getTechKMUTNBFund() {
        return techKMUTNBFund;
    }

    public void setTechKMUTNBFund(BigDecimal techKMUTNBFund) {
        this.techKMUTNBFund = techKMUTNBFund;
    }

    

}
