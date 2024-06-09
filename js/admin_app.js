$(document).ready(function() {

    $("#logout").click(function () {
        $.ajax({
            type: "POST",
            url: "logout.php",
        }).done(function () {
                window.location = "index.php";
        });
    });

    $("#add_admin_btn").click(function () {
        $.ajax({
            type: "POST",
            url: "admin/add_admin.php",
        }).done(function () {
            console.log("DONE");
        });
    });

    $("#print").click(function () {
        let headstr = "<html><head><title>Booking Details</title></head><body>";
        let footstr1 = "</";
        let footstr2 = "body>";
        let footstr=footstr1 + footstr2;
        let newstr = document.getElementById("result").innerHTML;
        let oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
    });

    $("#payment").click(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "payment.php",
            dataType: 'json',
            success: function(response) {
                console.log(response);
                window.location = response.data.checkout_url;
            },
            error: function() {
                alert('Error occurred');
            }
        })
    });


});

