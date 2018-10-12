<<<<<<< HEAD
$("document").ready(function(){
    var BASEURL = $("#hiddenUrl").val();
    $("body").delegate(".games","click", function(){
        var id = $(this).data("gameid");
        window.location = "card/" + id;
    });
    $("body").delegate(".num","click", function(){
        
    });
=======
$("document").ready(function(){
    var BASEURL = $("#hiddenUrl").val();
    $("body").delegate(".games","click", function(){
        var id = $(this).data("gameid");
        window.location = "card/" + id;
    });
    $("body").delegate(".num","click", function(){
        
    });
>>>>>>> test commit
});