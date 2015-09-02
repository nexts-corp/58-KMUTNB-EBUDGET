
$(document).ready(function () {
    
    $(".selChange").change(function () {
        $.post("fetchPlan", {year: $("#selectYear").val(),budget:$("#selectBudget").val()}, function (data) {
            $("#tdtable").html("");
            if(data.listsPlan.length!==0){
                var ilast=0;
                for (var i=0;i<data.listsPlan.length;i++) {
                    ilast++;
                    var html = "";
                    html += '<tr row-id="'+data.listsPlan[i].id+'">';
                    html += '   <td class="text-center">'+(i+1)+'</td>';
                    html += '   <td>';
                    html += '       '+data.listsPlan[i].planName+'';
                    //html += '       <div class="row"><div class="col-md-12">'+data.listsPlan[i].planName+'</div></div>';
                    //html += '       <div class="row"><div class="col-md-2"></div><div class="col-md-10"><div class="form-group"><input type="text" class="form-control" ref-id="txtPlanAdd" placeholder="แผนงาน/โครงการ"></div></div></div>';
                    html += '   </td>';
                    html += '';
                    html += '   <td class="text-center">';
                    html += '       <button ref-id="btnEdit" class="btn btn-warning"><i class="fa fa-pencil"></i> แก้ไข</button>';
                    html += '       <button ref-id="btnUpdate" class="btn btn-success" style="display:none;"><i class="fa fa-floppy-o"></i> แก้ไข</button>';
                    html += '       <button ref-id="btnDel" class="btn btn-danger"><i class="fa fa-trash-o "></i> ลบ</button>';
                    html += '       <button ref-id="btnUnDel" class="btn btn-danger" style="display:none;"><i class="fa fa-undo"></i> ยกเลิก</button>';
                    html += '   </td>';
                    html += '</tr>';
                    $("#tdtable").append(html);
                }

                var html = "";
                html += '<tr>';
                html += '   <td class="text-center"></td>';
                html += '   <td class="text-center">';
                html += '       <div class="form-group">';
                html += '           <input type="text" class="form-control" ref-id="txtPlanAdd" placeholder="ชื่อแผนงาน">';
                html += '       </div>';
                html += '   </td>';
                html += '   <td class="text-center">';
                html += '       <button ref-id="btnSave" class="btn btn-success"><i class="fa fa-plus"></i> เพิ่ม</button>';
                html += '   </td>';
                html += '</tr>';
                $("#tdtable").prepend(html);
            }else{
                $("#tdtable").html('<tr><td colspan="3" class="text-center">ไม่พบข้อมูล</td></tr>');
            }
        });

    });

    $(document).on("click","[ref-id=btnSave]",function(){
        var saveToData = {data:{planName:$("[ref-id=txtPlanAdd]").val(),budgetYear:$("#selectYear").val(),isActive:1},budget:$("#selectBudget").val()};
        
        $.post("insertPlan",JSON.stringify(saveToData), function (req) {

            //alert(JSON.stringify(req, null, 4));

            if(req.reqInsertPlan!=="exist"){
                $("[ref-id=txtPlanAdd]").parent("div").removeClass("has-error");
                var html = "";
                html += '<tr row-id="'+req.reqInsertPlan.id+'">';
                html += '   <td class="text-center">'+$("#tdtable").find("tr").length+'</td>';
                html += '   <td>'+$("[ref-id=txtPlanAdd]").val()+'</td>';
                html += '   <td class="text-center">';
                html += '       <button ref-id="btnEdit" class="btn btn-warning"><i class="fa fa-pencil"></i> แก้ไข</button>';
                html += '       <button ref-id="btnUpdate" class="btn btn-success" style="display:none;"><i class="fa fa-floppy-o"></i> แก้ไข</button>';
                html += '       <button ref-id="btnDel" class="btn btn-danger"><i class="fa fa-trash-o "></i> ลบ</button>';
                html += '       <button ref-id="btnUnDel" class="btn btn-danger" style="display:none;"><i class="fa fa-undo"></i> ยกเลิก</button>';
                html += '   </td>';
                html += '</tr>';
                $("#tdtable").append(html);
                $("[ref-id=txtPlanAdd]").val("");

            }else{
                $("[ref-id=txtPlanAdd]").parent(".form-group").addClass("has-error");
            }

        });

    });

    $(document).on("click","[ref-id=btnEdit]",function(){

            var html = "";
            html += '<div class="form-group">';
            html += '   <input type="text" class="form-control" value="'+$(this).parents("tr").find("td").eq(1).html()+'" ref-id="txtPlanEdit" placeholder="แก้ไขชื่อแผนงาน">';
            html += '</div>';
            $(this).parents("tr").find("td").eq(1).html(html);
            $(this).parents("tr").find("[ref-id=btnEdit]").hide();
            $(this).parents("tr").find("[ref-id=btnDel]").hide();
            $(this).parents("tr").find("[ref-id=btnUpdate]").show();


    });

    $(document).on("click","[ref-id=btnUpdate]",function(){
        var saveToData = {data:{id:$(this).parents("tr").attr("row-id"),planName:$(this).parents("tr").find("[ref-id=txtPlanEdit]").val(),budgetYear:$("#selectYear").val()},budget:$("#selectBudget").val()};
        //alert(JSON.stringify(saveToData, null, 4));
        var thisform = $(this).parents("tr").find(".form-group");
        $.post("updatePlan",JSON.stringify(saveToData), function (req) {
            if(req.reqUpdatePlan!=="exist"){
                $("[row-id="+req.reqUpdatePlan.id+"]").find("td").eq(1).html($("[row-id="+req.reqUpdatePlan.id+"]").find("[ref-id=txtPlanEdit]").val());
                $("[row-id="+req.reqUpdatePlan.id+"]").find("[ref-id=btnUpdate]").hide();
                $("[row-id="+req.reqUpdatePlan.id+"]").find("[ref-id=btnDel]").show();
                $("[row-id="+req.reqUpdatePlan.id+"]").find("[ref-id=btnEdit]").show();
            }else{
                thisform.addClass("has-error");
            }

        });

    });

    $(document).on("click","[ref-id=btnDel]",function(){


        if(confirm("ยืนยันการลบข้อมูล")){
            var ithis = $(this);
            var saveToData = {data:{id:$(this).parents("tr").attr("row-id")},budget:$("#selectBudget").val()};
            $.post("deletePlan",JSON.stringify(saveToData), function (req) {
                ithis.parents("tr").remove();
                for(var i=0;i<$("#tdtable").find("tr").length-1;i++){
                    $("#tdtable").find("tr").eq((i+1)).find("td").eq(0).text((i+1));
                }

            });
        }

    });


});