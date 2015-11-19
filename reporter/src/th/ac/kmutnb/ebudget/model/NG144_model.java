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
public class NG144_model extends BaseReport{
    
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
    String utilName;
    @Column
    BigDecimal historyBudget = BigDecimal.ZERO;
    @Column
    BigDecimal historyNonBudget = BigDecimal.ZERO;
    @Column
    BigDecimal historySummary = BigDecimal.ZERO;
    @Column
    BigDecimal requestBudget = BigDecimal.ZERO;
    @Column
    BigDecimal requestNonBudget = BigDecimal.ZERO;
    @Column
    BigDecimal requestSummary = BigDecimal.ZERO;
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

    public String getUtilName() {
        return utilName;
    }

    public void setUtilName(String utilName) {
        this.utilName = utilName;
    }

    public BigDecimal getHistoryBudget() {
        return historyBudget;
    }

    public void setHistoryBudget(BigDecimal historyBudget) {
        this.historyBudget = historyBudget;
    }

    public BigDecimal getHistoryNonBudget() {
        return historyNonBudget;
    }

    public void setHistoryNonBudget(BigDecimal historyNonBudget) {
        this.historyNonBudget = historyNonBudget;
    }

    public BigDecimal getHistorySummary() {
        return historySummary;
    }

    public void setHistorySummary(BigDecimal historySummary) {
        this.historySummary = historySummary;
    }

    public BigDecimal getRequestBudget() {
        return requestBudget;
    }

    public void setRequestBudget(BigDecimal requestBudget) {
        this.requestBudget = requestBudget;
    }

    public BigDecimal getRequestNonBudget() {
        return requestNonBudget;
    }

    public void setRequestNonBudget(BigDecimal requestNonBudget) {
        this.requestNonBudget = requestNonBudget;
    }

    public BigDecimal getRequestSummary() {
        return requestSummary;
    }

    public void setRequestSummary(BigDecimal requestSummary) {
        this.requestSummary = requestSummary;
    }

    public String getRemark() {
        return remark;
    }

    public void setRemark(String remark) {
        this.remark = remark;
    }
       
    
    


}
