// clearing the registration form
$(document).ready(function(){
    $("#clear").click(function(){
        document.getElementById("name").value=" ";
        document.getElementById("password").value=" ";
        document.getElementById("e_mail").value=" ";
    })
    // $("#submit").click(function(){
    //     $("#submit").hide();
    // })
})