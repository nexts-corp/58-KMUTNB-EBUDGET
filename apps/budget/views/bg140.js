function bg140Form(param) {
    console.log(param);
    var html = '<div id="panelTable" class="col-md-12">'

        + '<div class="form-group">'

            + '<div class="col-md-6">'
                + '<label class="col-md-4 control-label text-right" for="budgetPeriodId">ปีงบประมาณ : </label>'
                + '<div class="col-md-6">'+param["budgetPeriodId"]+'</div>'
            + '</div>'

            + '<div class="col-md-6">'
                + '<label class="col-md-4 control-label text-right" for="budgetPeriodId">แผนงาน : </label>'
                + '<div class="col-md-6">'+param["planId"]+'</div>'
            + '</div>'

        + '</div>'

        + '<div class="form-group">'

            + '<div class="col-md-6">'
                + '<label class="col-md-4 control-label text-right" for="budgetPeriodId">ผลผลิต/โครงการ : </label>'
                + '<div class="col-md-6">'+param["projectId"]+'</div>'
            + '</div>'

            + '<div class="col-md-6">'
                + '<label class="col-md-4 control-label text-right" for="budgetPeriodId">กองทุน : </label>'
                + '<div class="col-md-6">'+param["fundgroupId"]+'</div>'
            + '</div>'

        + '</div>'

        + '<section class="panel">'
            + '<div class="panel-body">'
                + '<div class="col-md-12 text-right">'
                    + '<a href="#" id="expandAll"><i class="fa fa-plus-square"></i> แสดงทั้งหมด</a>&nbsp;/&nbsp;'
                    + '<a href="#" id="collapseAll"><i class="fa fa-minus-square"></i> ซ่อนทั้งหมด</a>'
                + '</div>'
                + '<table id="table140" class="table table-bordered table-striped mb-none treetable">'
                    + '<thead>'
                        + '<tr>'
                            + '<th rowspan="3" class="text-center" style="vertical-align: middle;">ลำดับ</th>'
                            + '<th rowspan="3" class="text-center" style="vertical-align: middle;">ชื่อตำแหน่ง</th>'
                            + '<th colspan="5" class="text-center" style="vertical-align: middle;">อัตราเดิม (ตามบัญชีถือจ่าย ณ ต.ค.57)</th>'
                            + '<th rowspan="3" class="text-center" style="vertical-align: middle;">คำชี้แจง</th>'
                            + '<th rowspan="3" class="text-center" style="vertical-align: middle;">เครื่องมือ</th>'
                        + '</tr>'
                        + '<tr>'
                            + '<th rowspan="2" class="text-center" style="vertical-align: middle;">ระดับ</th>'
                            + '<th rowspan="2" class="text-center" style="vertical-align: middle;">อัตราเงินเดือน</th>'
                            + '<th colspan="2" class="text-center" style="vertical-align: middle;">จำนวนอัตรา</th>'
                            + '<th rowspan="2" class="text-center" style="vertical-align: middle;">จำนวนเงินทั้งปี</th>'
                        + '</tr>'
                        + '<tr>'
                            + '<th class="text-center" style="vertical-align: middle;">มีคนครอง</th>'
                            + '<th class="text-center" style="vertical-align: middle;">อัตราว่าง</th>'
                        + '</tr>'
                        + '<tr>'
                            + '<th></th>'
                            + '<th class="text-center">รวมทั้งสิ้น</th>'
                            + '<th></th>'
                            + '<th></th>'
                            + '<th></th>'
                            + '<th></th>'
                            + '<th></th>'
                            + '<th></th>'
                            + '<th></th>'
                        + '</tr>'
                    + '</thead>'
                    + '<tbody>'
                        + '<tr>'
                            + '<td colspan="9" class="text-center">-</td>'
                        + '</tr>'
                    + '</tbody>'
                + '</table>'
            + '</div>'
        + '</section>'
    + '</div>'

    + '<div id="panelForm" aria-labelledby="bidderLabel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">'
        + '<div class="modal-dialog">'
            + '<div class="modal-content">'
                + '<div class="modal-header">'
                    + '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
                    + '<h4 class="modal-title" id="myModalLabel">คำของบประมาณ : <span id="modalHead"></span></h4>'
                + '</div>'
                + '<div class="modal-body">'
                    + '<form id="form" onsubmit="return false;">'
                        + '<div class="form-group">'
                            + '<label class="col-md-12 control-label req" for="positionName">ชื่อตำแหน่ง</label>'
                            + '<div class="col-md-12">'
                                + '<input type="text" id="positionName" name="positionName" class="form-control input-sm" required>'
                            + '</div>'
                        + '</div>'

                        + '<div class="form-group">'
                            + '<label class="col-md-12 control-label req" for="rateNo">ระดับ</label>'
                            + '<div class="col-md-12">'
                                + '<input type="text" id="rateNo" name="rateNo" class="form-control input-sm" required>'
                            + '</div>'
                        + '</div>'

                        + '<div class="form-group">'
                            + '<label class="col-md-12 control-label req" for="salary">อัตราเงินเดือน</label>'
                            + '<div class="col-md-12">'
                                + '<input type="text" id="salary" name="salary" class="form-control input-sm" required>'
                            + '</div>'
                        + '</div>'

                        + '<div class="form-group">'
                            + '<label class="col-md-12 control-label">จำนวนอัตรา</label>'
                            + '<div class="col-md-12">'
                                    + '<label class="col-md-3 control-label req text-right" for="occupy">มีคนครอง</label>'
                                    + '<div class="col-md-3">'
                                        + '<input type="text" id="occupy" name="occupy" class="form-control input-sm" required>'
                                    + '</div>'

                                    + '<label class="col-md-3 control-label req text-right" for="vacancy">อัตราว่าง</label>'
                                    + '<div class="col-md-3">'
                                        + '<input type="text" id="vacancy" name="vacancy" class="form-control input-sm" required>'
                                    + '</div>'
                            + '</div>'
                        + '</div>'

                        + '<div class="form-group">'
                            + '<label class="col-md-12 control-label req" for="salaryTotal">จำนวนเงินทั้งปี</label>'
                            + '<div class="col-md-12">'
                                + '<input type="text" id="salaryTotal" name="salaryTotal" class="form-control input-sm" required>'
                            + '</div>'
                        + '</div>'

                        + '<div class="form-group">'
                            + '<label class="col-md-12 control-label" for="remark">คำชี้แจง</label>'
                            + '<div class="col-md-12">'
                                + '<textarea id="remark" name="remark" class="form-control input-sm"></textarea>'
                            + '</div>'
                        + '</div>'
                    + '</form>'
                + '</div>'
                + '<div class="modal-footer">'
                    + '<button type="button" class="btn btn-success save" data-dismiss="modal"><i class="fa fa-save"></i> บันทึก</button>'
                    + '<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'
                + '</div>'
            + '</div>'
        + '</div>'
    + '</div>';

    $("#divForm").html(html);

    toggleShow("form");

    bg140Detail();
}

function bg140Detail(){
    var listArr = [];

    $("#table140 tbody").html('<td colspan="8" class="text-center">Loading...</td>');

    setTimeout(function(){
        var datas = callAjax(js_context_path+"/api/budget/budgetInfo/listBudgetType140", "post", {}, "json");
        if(typeof datas !== "undefined" && datas !== null){
            var html = '';
            var pCount = 0;
            $.each(datas["list"], function(key, value){
                html += '<tr data-tt-id="'+value["id"]+'">'
                    + '<td class="text-center"></td>'
                    + '<td class="text-bold">'+(++pCount)+'. '+value["typeName"]+'</td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                + '</tr>';

                var cCount = 0;
                $.each(value["lv2"], function(key2, value2){
                    html += '<tr data-tt-id="'+value2["id"]+'" data-tt-parent-id="'+value["id"]+'">'
                        + '<td class="text-center"></td>'
                        + '<td class="text-bold" style="padding-left: 20px;">'
                            + pCount+'.'+(++cCount)+' '+value2["typeName"]
                        +'</td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td>'
                            + '<button class="btn btn-sm btn-success addList" data-id="'+value2["id"]+'"><i class="fa fa-plus"></i> เพิ่ม</button>'
                        + '</td>'
                    + '</tr>';

                    listArr[value2["id"]] = value2["typeName"];
                });
            });

            $("#table140 tbody").html(html);

            // set default table to tree table
            $("#table140").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function(){
                $("#table140").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function(){
                $("#table140").treetable("expandAll");
            });

            // when you press to add button
            $("button.addList").unbind("click").click(function(){
                var id = $(this).attr("data-id");

                // reset form for new insert
                $("#modalHead").empty().html(listArr[id]);
                $("#form").trigger('reset');
                $("#panelForm").modal("show");

                $("button.save").unbind("click").click(function(){
                    var isValid = true;
                    $('#form input[required]').each(function() {
                        if($(this).val() == "" && !$(this).prop("disabled"))
                            isValid = false;
                    });
                    if(isValid){
                        // insert node in branch
                        var positionName = $("#positionName").val();
                        var rateNo = $("#rateNo").val();
                        var salary = $("#salary").val();
                        var occupy = $("#occupy").val();
                        var vacancy = $("#vacancy").val();
                        var salaryTotal = $("#salaryTotal").val();
                        var remark = $("#remark").val();
                        var input = '<tr data-tt-id="" data-tt-parent-id="'+id+'">'
                                + '<td></td>'
                                + '<td>'+positionName+'</td>'
                                + '<td>'+rateNo+'</td>'
                                + '<td>'+salary+'</td>'
                                + '<td>'+occupy+'</td>'
                                + '<td>'+vacancy+'</td>'
                                + '<td>'+salaryTotal+'</td>'
                                + '<td>'+remark+'</td>'
                                + '<td>'
                                    + '<div class="btn-group">'
                                        + '<button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> แก้ไข</button>'
                                        + '<button class="btn btn-sm btn-default"><i class="fa fa-trash"></i> ลบ</button>'
                                    + '</div>'
                                + '</td>'
                            + '</tr>';

                        var node = $("#table140").treetable("node", id);
                        $("#table140").treetable("loadBranch", node, input);
                    }
                });
            });
        }
    }, 100);
}