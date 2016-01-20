/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package th.ac.kmutnb.ebudget.parameter;

import com.github.mustachejava.DefaultMustacheFactory;
import com.github.mustachejava.Mustache;
import com.github.mustachejava.MustacheFactory;
import java.io.IOException;
import java.io.StringReader;
import java.io.StringWriter;
import java.util.Locale;

/**
 *
 * @author Panya
 */
public class BaseParameter {

    private String REPORT_CODE;
    private String REPORT_NAME;

    private Locale REPORT_LOCALE;
    private String REPORT_TYPE;

    private int REPORT_MAX_COUNT;
    private String EXPORT_TYPE;

    private String PUBLISHER;

    private String PERIOD_ID;
    private String PERIOD_NAME;
//    private String FACULTY_ID;
//    private String FACULTY_NAME;
//    private String DEPT_ID;
//    private String DEPT_NAME;
//    private String PLAN_ID;
//    private String PLAN_NAME;
//    private String FUND_ID;
//    private String FUND_NAME;
//    private String PRODUCT_ID;
//    private String PRODUCT_NAME;
    
    private String BUDGET_TYPE;
    private String BUDGET_TYPE_NAME;

    private String FACULTY_ID;
    private String FACULTY_NAME;
    private String DEPT_ID_START;
    private String DEPT_NAME_START;
    private String DEPT_ID_END;
    private String DEPT_NAME_END;
    private String PLAN_ID_START;
    private String PLAN_NAME_START;
    private String PLAN_ID_END;
    private String PLAN_NAME_END;
    private String FUND_ID_START;
    private String FUND_NAME_START;
    private String FUND_ID_END;
    private String FUND_NAME_END;

//    public String getPRODUCT_ID() {
//        return PRODUCT_ID;
//    }
//
//    public void setPRODUCT_ID(String PRODUCT_ID) {
//        this.PRODUCT_ID = PRODUCT_ID;
//    }
//
//    public String getPRODUCT_NAME() {
//        return PRODUCT_NAME;
//    }
//
//    public void setPRODUCT_NAME(String PRODUCT_NAME) {
//        this.PRODUCT_NAME = PRODUCT_NAME;
//    }
    public String getREPORT_CODE() {
        return REPORT_CODE;
    }

    public void setREPORT_CODE(String REPORT_CODE) {
        this.REPORT_CODE = REPORT_CODE;
    }

    public String getEXPORT_TYPE() {
        return EXPORT_TYPE;
    }

    public void setEXPORT_TYPE(String EXPORT_TYPE) {
        this.EXPORT_TYPE = EXPORT_TYPE;
    }

    public Locale getREPORT_LOCALE() {
        return REPORT_LOCALE;
    }

    public void setREPORT_LOCALE(Locale REPORT_LOCALE) {
        this.REPORT_LOCALE = REPORT_LOCALE;
    }

    public String getREPORT_NAME() {
        return REPORT_NAME;
    }

    public void setREPORT_NAME(String REPORT_NAME) {
        this.REPORT_NAME = REPORT_NAME;
    }

    public static String PassArgument(String sql, Object params) throws IOException {
        MustacheFactory mf = new DefaultMustacheFactory();
        Mustache mustache = mf.compile(new StringReader(sql), "sql_reader");
        StringWriter writer = new StringWriter();
        mustache.execute(writer, params).flush();
        return writer.toString();

    }

    public int getREPORT_MAX_COUNT() {
        return REPORT_MAX_COUNT;
    }

    public void setREPORT_MAX_COUNT(int REPORT_MAX_COUNT) {
        this.REPORT_MAX_COUNT = REPORT_MAX_COUNT;
    }

    public String getREPORT_TYPE() {
        return REPORT_TYPE;
    }

    public void setREPORT_TYPE(String REPORT_TYPE) {
        this.REPORT_TYPE = REPORT_TYPE;
    }

    public String getPERIOD_ID() {
        return PERIOD_ID;
    }

    public void setPERIOD_ID(String PERIOD_ID) {
        this.PERIOD_ID = PERIOD_ID;
    }

    public String getPERIOD_NAME() {
        return PERIOD_NAME;
    }

    public void setPERIOD_NAME(String PERIOD_NAME) {
        this.PERIOD_NAME = PERIOD_NAME;
    }

    public String getFACULTY_ID() {
        return FACULTY_ID;
    }

    public void setFACULTY_ID(String FACULTY_ID) {
        this.FACULTY_ID = FACULTY_ID;
    }

    public String getFACULTY_NAME() {
        return FACULTY_NAME;
    }

    public void setFACULTY_NAME(String FACULTY_NAME) {
        this.FACULTY_NAME = FACULTY_NAME;
    }

//    public String getDEPT_ID() {
//        return DEPT_ID;
//    }
//
//    public void setDEPT_ID(String DEPT_ID) {
//        this.DEPT_ID = DEPT_ID;
//    }
//
//    public String getDEPT_NAME() {
//        return DEPT_NAME;
//    }
//
//    public void setDEPT_NAME(String DEPT_NAME) {
//        this.DEPT_NAME = DEPT_NAME;
//    }
//
//    public String getPLAN_ID() {
//        return PLAN_ID;
//    }
//
//    public void setPLAN_ID(String PLAN_ID) {
//        this.PLAN_ID = PLAN_ID;
//    }
//
//    public String getPLAN_NAME() {
//        return PLAN_NAME;
//    }
//
//    public void setPLAN_NAME(String PLAN_NAME) {
//        this.PLAN_NAME = PLAN_NAME;
//    }
//
//    public String getFUND_ID() {
//        return FUND_ID;
//    }
//
//    public void setFUND_ID(String FUND_ID) {
//        this.FUND_ID = FUND_ID;
//    }
//
//    public String getFUND_NAME() {
//        return FUND_NAME;
//    }
//
//    public void setFUND_NAME(String FUND_NAME) {
//        this.FUND_NAME = FUND_NAME;
//    }
//
//
    public String getBUDGET_TYPE() {
        return BUDGET_TYPE;
    }

    public void setBUDGET_TYPE(String BUDGET_TYPE) {
        this.BUDGET_TYPE = BUDGET_TYPE;
    }

    public String getBUDGET_TYPE_NAME() {
        return BUDGET_TYPE_NAME;
    }

    public void setBUDGET_TYPE_NAME(String BUDGET_TYPE_NAME) {
        this.BUDGET_TYPE_NAME = BUDGET_TYPE_NAME;
    }
    public String getPUBLISHER() {
        return PUBLISHER;
    }

    public void setPUBLISHER(String PUBLISHER) {
        this.PUBLISHER = PUBLISHER;
    }

    public String getDEPT_ID_START() {
        return DEPT_ID_START;
    }

    public void setDEPT_ID_START(String DEPT_ID_START) {
        this.DEPT_ID_START = DEPT_ID_START;
    }

    public String getDEPT_NAME_START() {
        return DEPT_NAME_START;
    }

    public void setDEPT_NAME_START(String DEPT_NAME_START) {
        this.DEPT_NAME_START = DEPT_NAME_START;
    }

    public String getDEPT_ID_END() {
        return DEPT_ID_END;
    }

    public void setDEPT_ID_END(String DEPT_ID_END) {
        this.DEPT_ID_END = DEPT_ID_END;
    }

    public String getDEPT_NAME_END() {
        return DEPT_NAME_END;
    }

    public void setDEPT_NAME_END(String DEPT_NAME_END) {
        this.DEPT_NAME_END = DEPT_NAME_END;
    }

    public String getPLAN_ID_START() {
        return PLAN_ID_START;
    }

    public void setPLAN_ID_START(String PLAN_ID_START) {
        this.PLAN_ID_START = PLAN_ID_START;
    }

    public String getPLAN_NAME_START() {
        return PLAN_NAME_START;
    }

    public void setPLAN_NAME_START(String PLAN_NAME_START) {
        this.PLAN_NAME_START = PLAN_NAME_START;
    }

    public String getPLAN_ID_END() {
        return PLAN_ID_END;
    }

    public void setPLAN_ID_END(String PLAN_ID_END) {
        this.PLAN_ID_END = PLAN_ID_END;
    }

    public String getPLAN_NAME_END() {
        return PLAN_NAME_END;
    }

    public void setPLAN_NAME_END(String PLAN_NAME_END) {
        this.PLAN_NAME_END = PLAN_NAME_END;
    }

    public String getFUND_ID_START() {
        return FUND_ID_START;
    }

    public void setFUND_ID_START(String FUND_ID_START) {
        this.FUND_ID_START = FUND_ID_START;
    }

    public String getFUND_NAME_START() {
        return FUND_NAME_START;
    }

    public void setFUND_NAME_START(String FUND_NAME_START) {
        this.FUND_NAME_START = FUND_NAME_START;
    }

    public String getFUND_ID_END() {
        return FUND_ID_END;
    }

    public void setFUND_ID_END(String FUND_ID_END) {
        this.FUND_ID_END = FUND_ID_END;
    }

    public String getFUND_NAME_END() {
        return FUND_NAME_END;
    }

    public void setFUND_NAME_END(String FUND_NAME_END) {
        this.FUND_NAME_END = FUND_NAME_END;
    }

    
    
}
