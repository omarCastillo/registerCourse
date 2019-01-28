function registerCourse() {
    var course = document.getElementById("course").value;
    var action = document.getElementById("action").value;
    var name_first = document.getElementById("name_first").value;
    var name_last = document.getElementById("name_last").value;
    var email = document.getElementById("email").value;

    if (!course || !action || !name_first || !name_last || !email) {
        $(".containerAlert").removeClass("none");
    }
    else{
        var dataString = 'course=' + course + '&action=' + action + '&name_first=' + name_first + '&name_last=' + name_last + '&email=' + email;
    
        $.ajax({
            type: "POST",
            url: "http://localhost:8888/registroCurso/service/actions.php",
            data: dataString,
            cache: false,
            success: function (data) {
                if (data == 200) {
                    $(".containerForm").css("display", "none");
                    $(".containerSucces").removeClass("none");
                } else {
                    $(".containerForm").css("display", "none");
                    $(".containerError").removeClass("none");
                }
            }
        });
    }

}