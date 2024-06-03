$(document).ready(function() {
    let count = 2;
    $("#extend").click(function () {
        count += 2;
        $("#reviews").load("review.php", {count: count});
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
    })
});

