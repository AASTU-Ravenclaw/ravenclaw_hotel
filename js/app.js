$(document).ready(function() {
    let count = 2;
    $("#extend").click(function () {
        count += 5;
        $("#reviews").load("comments.php", {count: count});
    });
    $("#logout").click(function () {
        $(document).load("logout.php");
        $.ajax({
            type: 'GET',
            url: 'logout.php',
            success: function () {
                window.location = 'index.php';
            }
        });
    })
    $("#print").click(function () {
        let headstr = "<html><head><title>Booking Details</title></head><body>";
        let footstr1 = "</"; ;
        let footstr2 = "body>";
        let footstr=footstr1 + footstr2;
        let newstr = document.getElementById("result").innerHTML;
        let oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
    })
});

