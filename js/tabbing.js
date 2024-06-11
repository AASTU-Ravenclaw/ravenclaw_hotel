let data_tablink = sessionStorage.getItem("default_tablink");
let data_tabcontent = sessionStorage.getItem("default_tabcontent");
$(document).ready(function() {
    if (document.getElementById(data_tabcontent) == null) {
        document.getElementById("Book").style.display = "block";
        tablinks = document.getElementsByClassName("tablinks");
        tablinks[0].className += " active";
    } else {
        document.getElementById(data_tabcontent).style.display = "block";
    }
});
function openSetting(evt, settingName) {
    // Declare all variables
    var i, tabcontent, tablinks;
    sessionStorage.setItem("key", "value");

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
    sessionStorage.setItem("default_tablink", evt.currentTarget.className);
    sessionStorage.setItem("default_tabcontent", settingName);
}
