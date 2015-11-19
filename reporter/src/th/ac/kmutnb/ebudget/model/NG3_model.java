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
 * @author Panya
 */
@Entity
public class NG3_model extends BaseReport {
    
    
    @Column
    private Integer facultyId ;
    
    @Column
    private String facultyName;
    @Column
    private Integer deptId;
    @Column
    private String deptName;
    @Column
    private Integer planId;
    @Column
    private String planName;
    @Column
    private Integer fundgroupId;
    @Column
    private String fundgroupName;
    @Column
    private Integer masterBgId;
    @Column
    private String masterBgName;
    @Column
    private Integer mainBgId;
    @Column
    private String mainBgName;
    @Column
    private Integer bgId;
    @Column
    private String bgName;
    @Column
    private BigDecimal budgetSummary = BigDecimal.ZERO;

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

    public Integer getFundgroupId() {
        return fundgroupId;
    }

    public void setFundgroupId(Integer fundgroupId) {
        this.fundgroupId = fundgroupId;
    }

    public String getFundgroupName() {
        return fundgroupName;
    }

    public void setFundgroupName(String fundgroupName) {
        this.fundgroupName = fundgroupName;
    }

    public Integer getMasterBgId() {
        return masterBgId;
    }

    public void setMasterBgId(Integer masterBgId) {
        this.masterBgId = masterBgId;
    }

    public String getMasterBgName() {
        return masterBgName;
    }

    public void setMasterBgName(String masterBgName) {
        this.masterBgName = masterBgName;
    }

    public Integer getMainBgId() {
        return mainBgId;
    }

    public void setMainBgId(Integer mainBgId) {
        this.mainBgId = mainBgId;
    }

    public String getMainBgName() {
        return mainBgName;
    }

    public void setMainBgName(String mainBgName) {
        this.mainBgName = mainBgName;
    }

    public Integer getBgId() {
        return bgId;
    }

    public void setBgId(Integer bgId) {
        this.bgId = bgId;
    }

    public String getBgName() {
        return bgName;
    }

    public void setBgName(String bgName) {
        this.bgName = bgName;
    }

    public BigDecimal getBudgetSummary() {
        return budgetSummary;
    }

    public void setBudgetSummary(BigDecimal budgetSummary) {
        this.budgetSummary = budgetSummary;
    }
    
    
  
   

}
