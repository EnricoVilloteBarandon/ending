$("document").ready(function(){
    var BASEURL = $("#hiddenUrl").val();
    $("body").delegate(".btnGame","click",function(){
        var id = $(this).data("id");
        $("#operation").val(1);
        $.ajax({
            "url" : BASEURL + '/getGameInfo',
            type : "POST",
            data : {
                "_token" : $('[name="_token"]').val(),
                id : $(this).data("id")
            },
            success : function(response){
                $("#id").val(response["id"]);
                $("#title").val(response["title"]);
                $("#date").val(response["date"]);
                $("#amount").val(response["bet_amount"]);
                $("#firstqresult").val(response["result"]);
                $("#secondqresult").val(response["result"]);
                $("#thirdqresult").val(response["result"]);
                $("#result").val(response["result"]);
                $("#status").val(response["status"]);
            }
        });
        $("#gameModal").modal("show");
    });
    // $("body").delegate(".btnPrice","click",function(){
    //     var id = $(this).data("id");
    // });
    $("#btnAddGame").on("click",function(){
        $("#frmGame")[0].reset();
        $("#gameModal").modal("show");
    });
    // $("#btnSubmitGame").on("click",function(){
    //     $.ajax({
    //         "url" : BASEURL + '/submitGame',
    //         type : "POST",
    //         data : {
    //             "_token" : $('[name="_token"]').val(),
    //             "title" : $("#title").val(),
    //             "date" :  $("#date").val(),
    //             "amount" :  $("#amount").val(),
    //             "operation" : $("#operation").val(),
    //             "id" : $("#id").val(),
    //             "result" : $("#result").val(),
    //             "status" : $("#status").val()
    //         },
    //         success : function(response){
    //             swal({
    //                 title: "Success",
    //                 text: "Saved!",
    //                 icon: "success",
    //                 button: "Okay",
    //               });
    //               $("button.swal-button--confirm").on("click",function(){
    //                 if(response == 0){
    //                     location.reload();
    //                 }
    //               });
    //         },
    //         error : function(error){
    //             alert(error);
    //         }
    //     });
    // });
    $("#btnSubmitGame").on("click",function(){
        $("#frmGame").submit();
    });
    $("body").delegate(".btnPrice","click",function(){
        var gameId = $(this).data("id");
        $("#gameid").val(gameId);
        $.ajax({
            "url" : BASEURL + '/getPrizesInfo',
            type : "POST",
            data : {
                "_token" : $('[name="_token"]').val(),
                id : $(this).data("id")
            },
            success : function(response){
                if (!$.trim(response)){   
                    alert("What follows is blank: ");
                }
                // $("#gameid").val(response["gameid"]);
                $("#firstQuarter").val(response.firstquarter);
                $("#secondQuarter").val(response["secondquarter"]);
                $("#thirdQuarter").val(response["thirdquarter"]);
                $("#fourthQuarter").val(response["fourthquarter"]);
                $("#grandPrize").val(response["grandprice"]);
                
                if($("#grandPrize").val() == ""){
                    $("#operationPrizes").val(0);
                }else{
                    $("#operationPrizes").val(1);
                }
            }
        });
        $("#prizesModal").modal("show");
    });
    $("#btnSubmitPrice").on("click", function(){
        // $.ajax({
        //     "url" : BASEURL + '/submitPrizes',
        //     type : "POST",
        //     data : {
        //         "_token" : $('[name="_token"]').val(),
        //         "gameid" : $("#gameid").val(),
        //         "grandprize" : $("#grandPrize").val(),
        //         "firstq" : $("#firstQuarter").val(),
        //         "secondq" : $("#secondQuarter").val(),
        //         "thirdq" : $("#thirdQuarter").val(),
        //         "fourthq" : $("#fourthQuarter").val(),
        //         "operation" : $("#operationPrizes").val()
        //     },
        //     success : function(response){
        //         if(response == 0){
        //             location.reload();
        //         }
        //     },
        //     error:function(error){
        //         alert(error);
        //     }
        // });
        $("#frmPrize").submit();
    });
    var optionsGame = {
        beforeSubmit: function()
        {},
        success: function(response){
            swal("Success!", "Game Added!", "success");
            $(".swal-button--confirm").on("click",function(){
                location.reload();
            });
        },
        complete: function() {
            var form = $("#frmGame");
            form[0].reset();
        }
    };
    $("#frmGame").ajaxForm(optionsGame);
    var optionsPrize = {
        beforeSubmit: function()
        {},
        success: function(response){
            swal("Success!", "Prize Added!", "success");
            $(".swal-button--confirm").on("click",function(){
                location.reload();
            });
        },
        complete: function() {
            var form = $("#frmGame");
            form[0].reset();
        }
    };
    $("#frmPrize").ajaxForm(optionsPrize);
});