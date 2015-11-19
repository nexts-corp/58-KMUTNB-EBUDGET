/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package th.ac.kmutnb.ebudget.service.impl;

//import com.sun.org.apache.xerces.internal.impl.dv.util.Base64;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;
import th.ac.kmutnb.ebudget.model.BaseReport;
import th.ac.kmutnb.ebudget.parameter.BaseParameter;
import th.ac.kmutnb.ebudget.service.IReportService;
import th.co.bpg.cde.collection.CJFile;
import th.co.bpg.cde.core.CServiceBase;
import th.co.bpg.cde.data.CDataContext;
import th.co.bpg.cde.report.CReportGenerater;
import com.sun.org.apache.xerces.internal.impl.dv.util.Base64;
import java.io.UnsupportedEncodingException;
import th.co.bpg.cde.collection.CJMessage;

/**
 *
 * @author Panya
 */
public class ReportService extends CServiceBase implements IReportService {

    private final CDataContext dbcon;

    public ReportService() {
        System.setProperty("DEBUG", "false");
        this.dbcon = this.getDataContext();
    }

    private CReportGenerater newReportGenerater(String reportName, String export) {

        CReportGenerater gen = new CReportGenerater();
        if (export.equals("pdf")) {
            gen.setExportMode(CReportGenerater.ExportMode.PDF);
        } else if (export.equals("excel")) {
            gen.setExportMode(CReportGenerater.ExportMode.EXCEL);
        } else if (export.equals("word")) {
            gen.setExportMode(CReportGenerater.ExportMode.WORD);
        } else {
            gen.setExportMode(CReportGenerater.ExportMode.PDF);
        }

        gen.setReport(reportName + ".jasper");
        try {
            gen.setReport(new FileInputStream(this.currentPaht + "/reports/" + reportName + ".jasper"));
        } catch (FileNotFoundException ex) {
            Logger.getLogger(ReportService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return gen;
    }

    private CJFile outputFile(String reportName, String export, byte[] out) {
        if (export.equals("pdf")) {
            CJFile file = new CJFile(out, CJFile.CJFileType.PDF, CJFile.CJFileSourceType.STREAM, reportName + "_" + this.account.getCode() + "_" + DateUtil.currentTimestamp() + ".pdf");
            return file;
        } else if (export.equals("excel")) {
            CJFile file = new CJFile(out, CJFile.CJFileType.EXCEL, CJFile.CJFileSourceType.STREAM, reportName + "_" + this.account.getCode() + "_" + DateUtil.currentTimestamp() + ".xls");
            return file;
        } else if (export.equals("word")) {
            CJFile file = new CJFile(out, CJFile.CJFileType.WORD, CJFile.CJFileSourceType.STREAM, reportName + "_" + this.account.getCode() + "_" + DateUtil.currentTimestamp() + ".doc");
            return file;
        } else if (export.equals("pdfview")) {
            CJFile file = new CJFile(out, CJFile.CJFileType.PDF, CJFile.CJFileSourceType.STREAM);

            return file;
        } else {
            CJFile file = new CJFile(out, CJFile.CJFileType.PDF, CJFile.CJFileSourceType.STREAM, reportName + "_" + this.account.getCode() + "_" + DateUtil.currentTimestamp() + ".pdf");
            return file;
        }
    }

    private String readSQL(String reportName, Object params) {

        StringBuilder sb = new StringBuilder();
        try (Scanner scanner = new Scanner(new FileInputStream(this.currentPaht + "/reports/" + reportName + ".sql"), "UTF-8")) {
            while (scanner.hasNextLine()) {
                sb.append(scanner.nextLine());
                sb.append(" ");
            }
        } catch (FileNotFoundException ex) {
            Logger.getLogger(ReportService.class.getName()).log(Level.SEVERE, null, ex);
        }
        if (params != null) {
            try {
                return BaseParameter.PassArgument(sb.toString(), params);
            } catch (IOException ex) {
                Logger.getLogger(ReportService.class.getName()).log(Level.SEVERE, null, ex);
            }
        }

        return sb.toString();
    }
//String REPORT_CODE, String EXPORT_TYPE, String PERIOD_ID,String BUDGET_TYPE

    @Override
    public CJFile export(String sparam) {
    //public CJFile export(String REPORT_CODE, String EXPORT_TYPE
        //  , String PERIOD_ID, String BUDGET_TYPE, String FAC_ID, String FAC_NAME
        //        , String DEPT_ID, String DEPT_NAME, String PLAN_ID, String PLAN_NAME
        //              , String FUND_ID, String FUND_NAME
        //                    ,String PRODUCT_ID,String PRODUCT_NAME) {
        try {
            sparam = sparam.replaceAll(" ", "+");
            sparam = new String(Base64.decode(sparam), "UTF-8");
            CJMessage json = new CJMessage();
            json.parse(sparam);
            BaseParameter param = (BaseParameter) json.getValue(BaseParameter.class, "");
//            BaseParameter param = new BaseParameter();
//            param.setREPORT_CODE("RPT_01");
//            param.setEXPORT_TYPE("pdfview");

//            BaseParameter param = new BaseParameter();
//            param.setREPORT_CODE(REPORT_CODE);
//            param.setEXPORT_TYPE(EXPORT_TYPE);
//            param.setPERIOD_ID(PERIOD_ID);
//            param.setBUDGET_TYPE(BUDGET_TYPE);
            param.setREPORT_NAME(param.getREPORT_CODE());
            param.setPUBLISHER("Admin");
            param.setREPORT_TYPE(param.getEXPORT_TYPE());
//            param.setDEPT_ID(DEPT_ID);
//            param.setDEPT_NAME(DEPT_NAME);
//            param.setFACULTY_ID(FAC_ID);
//            param.setFACULTY_NAME(FAC_NAME);
//            param.setPLAN_ID(PLAN_ID);
//            param.setPLAN_NAME(PLAN_NAME);
//            param.setFUND_ID(FUND_ID);
//            param.setFUND_NAME(FUND_NAME);
//            param.setPRODUCT_ID(PRODUCT_ID);
//            param.setPRODUCT_NAME(PRODUCT_NAME);
            param.setREPORT_LOCALE(this.locale);

            String reportCode = param.getREPORT_CODE();
            String exportType = param.getEXPORT_TYPE();

            String reportName = param.getREPORT_CODE();// REPORT_CODE;
            Class reportClass = Class.forName("th.ac.kmutnb.ebudget.model." + reportCode.toUpperCase() + "_model");
            String reportSQL = this.readSQL(reportName, param);
            List<BaseReport> datas = (List<BaseReport>) this.dbcon.nativeQuery(reportClass, reportSQL);
            //this.dbcon.nativeQuery(reportClass, sparam, Parameters);
            CReportGenerater gen = this.newReportGenerater(reportName, exportType);

            if (datas != null && !datas.isEmpty()) {
                gen.setReportData(datas);
                param.setREPORT_MAX_COUNT(datas.size());

            } else {
                List<BaseReport> datasx = new ArrayList<>();
                try {
                    datasx.add((BaseReport) reportClass.newInstance());
                    param.setREPORT_MAX_COUNT(0);
                } catch (InstantiationException | IllegalAccessException ex) {
                    Logger.getLogger(ReportService.class.getName()).log(Level.SEVERE, null, ex);
                }
                gen.setReportData(datasx);
            }
            param.setREPORT_TYPE(exportType.toUpperCase());
            gen.setParameter(param);
            byte[] out = gen.Export();
            return this.outputFile(reportName, exportType, out);

        } catch (ClassNotFoundException ex) {
            CJFile file = new CJFile("<b>Report Error</b>", CJFile.CJFileType.HTML, CJFile.CJFileSourceType.STRING);
            return file;
        } catch (UnsupportedEncodingException ex) {
            Logger.getLogger(ReportService.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        CJFile file = new CJFile("<b>Invalid Parameter</b>", CJFile.CJFileType.HTML, CJFile.CJFileSourceType.STRING);
        return file;
    }

    //  @Override
    public CJFile test(String tParam) {
        CJFile file = new CJFile("<html><b>Hello " + tParam + "</b></html>", CJFile.CJFileType.HTML, CJFile.CJFileSourceType.STRING);
        return file;
    }

}
