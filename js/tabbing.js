document.getElementById("defaultOpen").click();

function openSetting(evt, settingName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(settingName).style.display = "block";
    evt.currentTarget.className += " active";
}

function send()
{
    var events = document.getElementById("event").value;
    location.href = "calm.php?day=" + xx + "&month=" + yy + "&year=" +
        zz + "&events=" + events;
}