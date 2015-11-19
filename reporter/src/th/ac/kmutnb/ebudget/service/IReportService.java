package th.ac.kmutnb.ebudget.service;

import th.ac.kmutnb.ebudget.parameter.BaseParameter;
import th.co.bpg.cde.annotation.CIOperation;
import th.co.bpg.cde.annotation.CIParam;
import th.co.bpg.cde.annotation.CIService;
import th.co.bpg.cde.collection.CJFile;

@CIService(Uri = "/report")
public interface IReportService {

//    @CIOperation(Uri = "/export", Authentication = false, ResourceCode = "*")
//    public CJFile export(@CIParam(Name = "param") BaseParameter param);
    
    
   
  @CIOperation(Uri = "/export", Authentication = false, ResourceCode = "*")
  public CJFile export(@CIParam(Name = "REPORT_CODE") String REPORT_CODE,@CIParam(Name = "EXPORT_TYPE") String EXPORT_TYPE,@CIParam(Name = "PERIOD_ID") String PERIOD_ID
  ,@CIParam(Name = "BUDGET_TYPE") String BUDGET_TYPE,@CIParam(Name = "FAC_ID") String FAC_ID,@CIParam(Name = "FAC_NAME") String FAC_NAME,@CIParam(Name = "DEPT_ID") String DEPT_ID
  ,@CIParam(Name = "DEPT_NAME") String DEPT_NAME,@CIParam(Name = "PLAN_ID") String PLAN_ID,@CIParam(Name = "PLAN_ID") String PLAN_NAME,@CIParam(Name = "FUND_ID") String FUND_ID,@CIParam(Name = "FUND_NAME") String FUND_NAME
  ,@CIParam(Name = "PRODUCT_ID") String PRODUCT_ID,@CIParam(Name = "PRODUCT_NAME") String PRODUCT_NAME);

  @CIOperation(Uri = "/test", Authentication = false, ResourceCode = "*")
    public CJFile test(@CIParam(Name = "tParam") String tParam);
}
