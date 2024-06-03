$(document).ready(function() {

    $("#logout").click(function () {
        $.ajax({
            type: "POST",
            url: "logout.php",

        }).done(function () {
                window.location = "index.php";
        });
    });
});

