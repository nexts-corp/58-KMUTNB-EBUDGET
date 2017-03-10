function CheckUsername(){


    var lists = [];
    var data = {};
    data['username'] = $("#username").val();

    var jdata = {};
    jdata['data'] = data;
    
    

    var result=callAjax(ngContextPath+'/api/member/Member/checkUsername', 'post', jsonEncode(jdata),'json');

    if(result>0){
        
        swal({   
            title: "เกิดข้อผิดพลาด!",   
            text: "Username นี้มีผู้ใช้งานอยู่แล้ว กรุณาเปลี่ยน Username ใหม่อีกครั้ง",   
            type: "error",   
            confirmButtonText: "ตกลง" 
        });
        return false;
    }else{
        var listValue = {
            firstname: $("#firstname").val(),
            lastname: $("#lastname").val(),
            deptId: $("#deptId").val(),
            email: $("#email").val(),
            tel: $("#tel").val(),
            username: $("#username").val(),
            password: $("#password").val(),

        };
        lists.push(listValue);
        
        console.log(listValue);
        return false;
    }
    
    
    //return false;
    
}

$(document).ready(function () {
    //alert("OK");
    $("#deptId").select2().trigger("change");
    
});