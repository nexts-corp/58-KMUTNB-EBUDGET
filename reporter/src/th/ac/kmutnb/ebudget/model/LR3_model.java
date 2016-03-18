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
public class LR3_model extends BaseReport {
    
   
    @Column
    private Integer bgTypeMasterId;
    @Column
    private String bgTypeMasterName;
    @Column
    private Integer bgTypeMainId;
    @Column
    private String bgTypeMainName;
    @Column
    private Integer bgTypeSubId;
    @Column
    private String bgTypeSubName;
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
    private String RevenueName;
    @Column
    private String RevenueDesc;
    @Column
    private BigDecimal budgetSummary;

    public Integer getBgTypeMasterId() {
        return bgTypeMasterId;
    }

    public void setBgTypeMasterId(Integer bgTypeMasterId) {
        this.bgTypeMasterId = bgTypeMasterId;
    }

    public String getBgTypeMasterName() {
        return bgTypeMasterName;
    }

    public void setBgTypeMasterName(String bgTypeMasterName) {
        this.bgTypeMasterName = bgTypeMasterName;
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

    public Integer getBgTypeSubId() {
        return bgTypeSubId;
    }

    public void setBgTypeSubId(Integer bgTypeSubId) {
        this.bgTypeSubId = bgTypeSubId;
    }

    public String getBgTypeSubName() {
        return bgTypeSubName;
    }

    public void setBgTypeSubName(String bgTypeSubName) {
        this.bgTypeSubName = bgTypeSubName;
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

    public BigDecimal getBudgetSummary() {
        return budgetSummary;
    }

    public void setBudgetSummary(BigDecimal budgetSummary) {
        this.budgetSummary = budgetSummary;
    }


   
    
  

}
