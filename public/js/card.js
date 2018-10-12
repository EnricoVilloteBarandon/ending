$("document").ready(function(){
    $("body").delegate('.bet','click', function(){
        var sBet =  $(this).data("combination");
        if($(this).hasClass('else')){
            swal($(this).find('span.num').text(),"Bet is already placed in this combination! Try the other combinations.", "error");
            // notie.alert({
            //     type: 'error',
            //     text: $(this).find('span.num').text() + "<br/><h3>Bet is already placed in this combination!</h3>",
            //     stay: true
            // });
        }else if($(this).hasClass('myBet')){
            swal($(this).find('span.num').text(),"You already placed your bet in this combination!", "info");
            // notie.alert({
            //     type: 'info',
            //     text: $(this).find('span.num').text() + "<br/><h3>You already placed your bet in this combination.</h3>"
            // });
        }else{
            swal({
                title: "Confirmation!",
                text: 'Are you sure you want to place your bet on '+ $(this).data("combination") +'?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((res) => {
                if (res) {
                    $(".loader").css("display","block");
                    $.ajax({
                        "url" : $("#hiddenUrl").val() + "/checkBalance",
                        type : "POST",
                        data: {
                            "_token" : $("[name='_token'").val(),
                            "amount" : $("#amount").data("amount"),
                        },
                        success : function(response){
                            if(response == 1){
                                // notie.alert({
                                //     type: 'error',
                                //     text: $(this).find('span.num').text() + "<br/><h3>Balance insufficient.</h3>"
                                // });
                                swal($(this).find('span.num').text() + "Balance insufficient.", {
                                    icon: "error",
                                });
                                $(".loader").css("display","none");
                            }else if(response == 0){
                                $.ajax({
                                    "url" : $("#hiddenUrl").val() + "/submitBet",
                                    type : "POST",
                                    data : {
                                        "_token" : $("[name='_token'").val(),
                                        "bet" : sBet,
                                        "amount" : $("#amount").data("amount"),
                                        "gameid" : $("#title").data("title"),
                                        "playerid" : $("#userid").data("id"),
                                        "amount" : $("#amount").data("amount"),
                                    },
                                    success : function(response){
                                        if(response == 0){
                                            swal( $(this).find('span.num').text() + "Bet successfully placed.", {
                                                icon: "success",
                                            });
                                            // notie.alert({
                                            //     type: 'info',
                                            //     text: $(this).find('span.num').text() + "<br/><h3>Bet successfully placed.</h3>"
                                            // });
                                        }
                                        $(".loader").css("display","none");
                                        // location.reload();
                                        $("button.swal-button--confirm").on("click",function(){
                                            location.reload();
                                        });
                                    },
                                    error : function(error){
                                        swal("Something went wrong!", error, "error");
                                        // notie.alert({
                                        //     type: 'error',
                                        //     text: $(this).find('span.num').text() + "<br/><h3>Something went wrong! "+ error +"</h3>"
                                        // });
                                    }
                                });
                            }
                        },
                        error : function(error){
                            swal("Something went wrong!", error, "error");
                            // notie.alert({
                            //     type: 'error',
                            //     text: $(this).find('span.num').text() + "<br/><h3>Something went wrong! "+ error +"</h3>"
                            // });
                        }
                    });
                //   swal("Poof! Your imaginary file has been deleted!", {
                //     icon: "success",
                //   });
                } else {
                  swal("Cancelled","Transaction Cancelled!","error");
                }
              });
            // notie.confirm({
            //     text: 'Are you sure you want to place your bet on '+ $(this).data("combination") +'?',
            //     cancelCallback: function () {
            //       notie.alert({ 
            //         type: 3, 
            //         text: 'Aw, why not? :(', time: 2 })
            //     },
            //     submitCallback: function () {
                    // $(".loader").css("display","block");
                    // $.ajax({
                    //     "url" : $("#hiddenUrl").val() + "/checkBalance",
                    //     type : "POST",
                    //     data: {
                    //         "_token" : $("[name='_token'").val(),
                    //         "amount" : $("#amount").data("amount"),
                    //     },
                    //     success : function(response){
                    //         if(response == 1){
                    //             notie.alert({
                    //                 type: 'error',
                    //                 text: $(this).find('span.num').text() + "<br/><h3>Balance insufficient.</h3>"
                    //             });
                    //             $(".loader").css("display","none");
                    //         }else if(response == 0){
                    //             $.ajax({
                    //                 "url" : $("#hiddenUrl").val() + "/submitBet",
                    //                 type : "POST",
                    //                 data : {
                    //                     "_token" : $("[name='_token'").val(),
                    //                     "bet" : sBet,
                    //                     "amount" : $("#amount").data("amount"),
                    //                     "gameid" : $("#title").data("title"),
                    //                     "playerid" : $("#userid").data("id"),
                    //                     "amount" : $("#amount").data("amount"),
                    //                 },
                    //                 success : function(response){
                    //                     if(response == 0){
                    //                         notie.alert({
                    //                             type: 'info',
                    //                             text: $(this).find('span.num').text() + "<br/><h3>Bet successfully placed.</h3>"
                    //                         });
                    //                     }
                    //                     $(".loader").css("display","none");
                    //                     // location.reload();
                    //                 },
                    //                 error : function(error){
                    //                     notie.alert({
                    //                         type: 'error',
                    //                         text: $(this).find('span.num').text() + "<br/><h3>Something went wrong! "+ error +"</h3>"
                    //                     });
                    //                 }
                    //             });
                    //         }
                    //     },
                    //     error : function(error){
                    //         notie.alert({
                    //             type: 'error',
                    //             text: $(this).find('span.num').text() + "<br/><h3>Something went wrong! "+ error +"</h3>"
                    //         });
                    //     }
                    // });
                    //  notie.alert({ 
                    //   type: 1, text: 'Good choice! :D', 
                    //   time: 2 
                    // });
            //     }
            //   });
        }
    });
});