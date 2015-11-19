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
public class NG141_model extends BaseReport{
    
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
    String positionName;
    @Column
    String rateNo;
    @Column
    Integer vacancy;
    @Column
    Integer occupied;
    @Column
    BigDecimal salaryMonth;
    @Column
    BigDecimal salaryTotal;
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

    public String getPositionName() {
        return positionName;
    }

    public void setPositionName(String positionName) {
        this.positionName = positionName;
    }

    public String getRateNo() {
        return rateNo;
    }

    public void setRateNo(String rateNo) {
        this.rateNo = rateNo;
    }

    public Integer getVacancy() {
        return vacancy;
    }

    public void setVacancy(Integer vacancy) {
        this.vacancy = vacancy;
    }

    public Integer getOccupied() {
        return occupied;
    }

    public void setOccupied(Integer occupied) {
        this.occupied = occupied;
    }

    public BigDecimal getSalaryMonth() {
        return salaryMonth;
    }

    public void setSalaryMonth(BigDecimal salaryMonth) {
        this.salaryMonth = salaryMonth;
    }

    public BigDecimal getSalaryTotal() {
        return salaryTotal;
    }

    public void setSalaryTotal(BigDecimal salaryTotal) {
        this.salaryTotal = salaryTotal;
    }

    public String getRemark() {
        return remark;
    }

    public void setRemark(String remark) {
        this.remark = remark;
    }
   
    
}
