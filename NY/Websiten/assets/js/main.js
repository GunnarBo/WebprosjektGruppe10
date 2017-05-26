function alertPopup() {
    alert("Du kan ikke bestille bord på denne resturanten");
}

function dropdownMenu() {
    $(".nav li:eq(0)").hover(function(){
        $('.subMenu').show();
    }, function(){
        $('.subMenu').hide();
    });
}

function reloadPage() {
    setTimeout(function() {
        window.location = "/";
    },10000);
}

$("footer form").click(function(e) {
    e.preventDefault();
});

$("#submitnewsletter").click(function() {
    $(".message").html('Takk! Du er nå påmeldt vårt nyhetsbrev');
});


//dropdownMenu();