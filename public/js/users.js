<<<<<<< HEAD
$("document").ready(function(){
    var BASEURL = $("#hiddenUrl").val();
    loadDataTableUsers();
    $("#btnAddUsers").on("click", function(){
        $("#usersModal form#frmUsers")[0].reset();
        $("#usersModal").modal("show");
        $("#operation").val(0);
    });
    $("body").delegate(".btnEdit","click", function(){
        var id = $(this).data(id);
        $.ajax({
            "url": BASEURL + "/getUserInfoById",
            type: "POST",
            data: {
                "_token": $('[name="_token"]').val(),
                "id" : id
            },
            success: function(response){
                $("#id").val(response.id);
                $("#firstname").val(response.firstname);
                $("#lastname").val(response.lastname);
                $("#email").val(response.email);
                $("#contact").val(response.contact);
                $("#balance").val(response.balance);
                $("#usertype").val(response.usertype);
                $("#operation").val(1);
            },
            error : function(error){
                alert(error);
            }
        });
        $("#usersModal").modal("show");
    });
    $("#btnSubmitUser").on("click", function(){
        $("#frmUsers").submit();
        // $.ajax({
        //     "url": BASEURL + "/submitUser",
        //     type: "POST",
        //     data: {
        //         "_token":  $('[name="_token"]').val(),
        //         // "frmData": $("#frmUsers").serialize(),
        //         "operation": $("#operation").val(),
        //         "id": $("#id").val(),
        //         "firstname": $("#firstname").val(),
        //         "lastname": $("#lastname").val(),
        //         "email": $("#email").val(),
        //         "contact": $("#contact").val(),
        //         "balance": $("#balance").val(),
        //         "usertype": $("#usertype").val(),
        //         "password": $("#password").val(),
        //     },
        //     success: function(response){
        //         notie.force({ 
        //             type: 1,
        //             text: 'Update Success!', 
        //             stay: true, 
        //             callback: function (value) {
        //                 $("#usersModal").modal("hide");
        //             }
        //         })
        //     },
        //     error: function(error){
        //         alert(error);
        //     }
        // });
    });
    var optionsUsers = {
        beforeSubmit: function()
        {},
        success: function(response){
            var text = 'Successfully '+((response ==  0) ? "Added" : "Updated")+' User';
            $("#usersModal").modal("hide");
            notie.alert({ type: 1, text: text, stay: true });
            loadDataTableUsers();
        },
        complete: function() {
            var form = $("#frmUsers");
            form[0].reset();
        }
    };
    $("#frmUsers").ajaxForm(optionsUsers);
});
function loadDataTableUsers(){
    var url = $("#hiddenUrl").val();
    $("#tblUsers").dataTable().fnDestroy();
    $("#tblUsers").DataTable({
        "responsive": true,
        "aaSorting": [],
        "pageLength": 10,
        "ajax" : {
            "url" : url + '/getAllUsers',
            "type" : "POST",
            "data" : {
                "_token": $('[name="_token"]').val(),
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "fullname" },
            { "data": "email" },
            { "data": "usertype" },
            { "data": "created_at" },
            { "data": "action" }
        ]
    });
=======
$("document").ready(function(){
    var BASEURL = $("#hiddenUrl").val();
    loadDataTableUsers();
    $("#btnAddUsers").on("click", function(){
        $("#usersModal form#frmUsers")[0].reset();
        $("#usersModal").modal("show");
        $("#operation").val(0);
    });
    $("body").delegate(".btnEdit","click", function(){
        var id = $(this).data(id);
        $.ajax({
            "url": BASEURL + "/getUserInfoById",
            type: "POST",
            data: {
                "_token": $('[name="_token"]').val(),
                "id" : id
            },
            success: function(response){
                $("#id").val(response.id);
                $("#firstname").val(response.firstname);
                $("#lastname").val(response.lastname);
                $("#email").val(response.email);
                $("#contact").val(response.contact);
                $("#balance").val(response.balance);
                $("#usertype").val(response.usertype);
                $("#operation").val(1);
            },
            error : function(error){
                alert(error);
            }
        });
        $("#usersModal").modal("show");
    });
    $("#btnSubmitUser").on("click", function(){
        $("#frmUsers").submit();
        // $.ajax({
        //     "url": BASEURL + "/submitUser",
        //     type: "POST",
        //     data: {
        //         "_token":  $('[name="_token"]').val(),
        //         // "frmData": $("#frmUsers").serialize(),
        //         "operation": $("#operation").val(),
        //         "id": $("#id").val(),
        //         "firstname": $("#firstname").val(),
        //         "lastname": $("#lastname").val(),
        //         "email": $("#email").val(),
        //         "contact": $("#contact").val(),
        //         "balance": $("#balance").val(),
        //         "usertype": $("#usertype").val(),
        //         "password": $("#password").val(),
        //     },
        //     success: function(response){
        //         notie.force({ 
        //             type: 1,
        //             text: 'Update Success!', 
        //             stay: true, 
        //             callback: function (value) {
        //                 $("#usersModal").modal("hide");
        //             }
        //         })
        //     },
        //     error: function(error){
        //         alert(error);
        //     }
        // });
    });
    var optionsUsers = {
        beforeSubmit: function()
        {},
        success: function(response){
            var text = 'Successfully '+((response ==  0) ? "Added" : "Updated")+' User';
            $("#usersModal").modal("hide");
            notie.alert({ type: 1, text: text, stay: true });
            loadDataTableUsers();
        },
        complete: function() {
            var form = $("#frmUsers");
            form[0].reset();
        }
    };
    $("#frmUsers").ajaxForm(optionsUsers);
});
function loadDataTableUsers(){
    var url = $("#hiddenUrl").val();
    $("#tblUsers").dataTable().fnDestroy();
    $("#tblUsers").DataTable({
        "responsive": true,
        "aaSorting": [],
        "pageLength": 10,
        "ajax" : {
            "url" : url + '/getAllUsers',
            "type" : "POST",
            "data" : {
                "_token": $('[name="_token"]').val(),
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "fullname" },
            { "data": "email" },
            { "data": "usertype" },
            { "data": "created_at" },
            { "data": "action" }
        ]
    });
>>>>>>> test commit
}