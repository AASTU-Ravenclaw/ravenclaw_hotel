$(document).ready(function() {
    let count = 5;
    $("#extend").click(function () {
        count += 5;
        $("#reviews").load("extend.php", {count: count});
    });

    $("#find_stay_btn").click(function () {
        confirmation_id = document.getElementById("confirmation_id").value;
        $("#printable_stay").load("stay_display.php", {confirmation_id: confirmation_id});
    });

    $("#print_stay").click(function () {
        let headstr = "<html><head><title>Booking Details</title></head><body>";
        let footstr1 = "</";
        let footstr2 = "body>";
        let footstr=footstr1 + footstr2;
        let newstr = document.getElementById("printable_stay").innerHTML;
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

