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
public class LR4_model extends BaseReport {
    
   
    @Column
    private Integer planId;
    @Column
    private Integer deptId;
    @Column
    private Integer fundgroupId;
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
    private BigDecimal budgetSummary;
    @Column
    private BigDecimal planSummary;
    @Column
    private BigDecimal usedSummary;
    @Column
    private BigDecimal planQ1;
    @Column
    private BigDecimal usedQ1;
    @Column
    private BigDecimal planQ2;
    @Column
    private BigDecimal usedQ2;
    @Column
    private BigDecimal planQ3;
    @Column
    private BigDecimal usedQ3;
    @Column
    private BigDecimal planQ4;
    @Column
    private BigDecimal usedQ4;

    public Integer getPlanId() {
        return planId;
    }

    public void setPlanId(Integer planId) {
        this.planId = planId;
    }

    public Integer getDeptId() {
        return deptId;
    }

    public void setDeptId(Integer deptId) {
        this.deptId = deptId;
    }

    public Integer getFundgroupId() {
        return fundgroupId;
    }

    public void setFundgroupId(Integer fundgroupId) {
        this.fundgroupId = fundgroupId;
    }

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

    public BigDecimal getBudgetSummary() {
        return budgetSummary;
    }

    public void setBudgetSummary(BigDecimal budgetSummary) {
        this.budgetSummary = budgetSummary;
    }

    public BigDecimal getPlanSummary() {
        return planSummary;
    }

    public void setPlanSummary(BigDecimal planSummary) {
        this.planSummary = planSummary;
    }

    public BigDecimal getUsedSummary() {
        return usedSummary;
    }

    public void setUsedSummary(BigDecimal usedSummary) {
        this.usedSummary = usedSummary;
    }

    public BigDecimal getPlanQ1() {
        return planQ1;
    }

    public void setPlanQ1(BigDecimal planQ1) {
        this.planQ1 = planQ1;
    }

    public BigDecimal getUsedQ1() {
        return usedQ1;
    }

    public void setUsedQ1(BigDecimal usedQ1) {
        this.usedQ1 = usedQ1;
    }

    public BigDecimal getPlanQ2() {
        return planQ2;
    }

    public void setPlanQ2(BigDecimal planQ2) {
        this.planQ2 = planQ2;
    }

    public BigDecimal getUsedQ2() {
        return usedQ2;
    }

    public void setUsedQ2(BigDecimal usedQ2) {
        this.usedQ2 = usedQ2;
    }

    public BigDecimal getPlanQ3() {
        return planQ3;
    }

    public void setPlanQ3(BigDecimal planQ3) {
        this.planQ3 = planQ3;
    }

    public BigDecimal getUsedQ3() {
        return usedQ3;
    }

    public void setUsedQ3(BigDecimal usedQ3) {
        this.usedQ3 = usedQ3;
    }

    public BigDecimal getPlanQ4() {
        return planQ4;
    }

    public void setPlanQ4(BigDecimal planQ4) {
        this.planQ4 = planQ4;
    }

    public BigDecimal getUsedQ4() {
        return usedQ4;
    }

    public void setUsedQ4(BigDecimal usedQ4) {
        this.usedQ4 = usedQ4;
    }
    
 
    
    
  

}
