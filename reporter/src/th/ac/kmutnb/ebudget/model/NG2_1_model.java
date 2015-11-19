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
public class NG2_1_model extends BaseReport {
    
@Column
private Integer facultyId;
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
private Integer budgetTypeMasterId;
@Column
private String budgetTypeMasterName;
@Column
private Integer budgetTypeMainId;
@Column
private String budgetTypeMainName;
@Column
private BigDecimal salary = BigDecimal.ZERO;
@Column
private BigDecimal wages = BigDecimal.ZERO;
@Column
private BigDecimal compensationEmp = BigDecimal.ZERO;
@Column
private BigDecimal staffSalary = BigDecimal.ZERO;
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

    public Integer getBudgetTypeMasterId() {
        return budgetTypeMasterId;
    }

    public void setBudgetTypeMasterId(Integer budgetTypeMasterId) {
        this.budgetTypeMasterId = budgetTypeMasterId;
    }

    public String getBudgetTypeMasterName() {
        return budgetTypeMasterName;
    }

    public void setBudgetTypeMasterName(String budgetTypeMasterName) {
        this.budgetTypeMasterName = budgetTypeMasterName;
    }

    public Integer getBudgetTypeMainId() {
        return budgetTypeMainId;
    }

    public void setBudgetTypeMainId(Integer budgetTypeMainId) {
        this.budgetTypeMainId = budgetTypeMainId;
    }

    public String getBudgetTypeMainName() {
        return budgetTypeMainName;
    }

    public void setBudgetTypeMainName(String budgetTypeMainName) {
        this.budgetTypeMainName = budgetTypeMainName;
    }

    public BigDecimal getSalary() {
        return salary;
    }

    public void setSalary(BigDecimal salary) {
        this.salary = salary;
    }

    public BigDecimal getWages() {
        return wages;
    }

    public void setWages(BigDecimal wages) {
        this.wages = wages;
    }

    public BigDecimal getCompensationEmp() {
        return compensationEmp;
    }

    public void setCompensationEmp(BigDecimal compensationEmp) {
        this.compensationEmp = compensationEmp;
    }

    public BigDecimal getStaffSalary() {
        return staffSalary;
    }

    public void setStaffSalary(BigDecimal staffSalary) {
        this.staffSalary = staffSalary;
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
